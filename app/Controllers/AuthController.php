<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;
use App\Models\EmailVerificationModel;
use Google\Client as GoogleClient;
use Google\Service\Oauth2;
use App\Libraries\Hash;

class AuthController extends BaseController
{
    protected $emailHelper;

    public function __construct()
    {
        helper(['url', 'email']);
    }

    public function register()
    {
        if ($this->request->isAJAX()) {
            $email = $this->request->getPost('email');
            $name  = $this->request->getPost('name');
            $method = $this->request->getPost('method') ?? 'both'; // fallback

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Please enter a valid email address.'
                ]);
            }

            $userModel   = new UserModel();
            $verifyModel = new EmailVerificationModel();

            // Check if user exists
            $user = $userModel->where('email', $email)->first();

            if (!$user) {
                // Create new user
                $userId = $userModel->insert(['email' => $email, 'name' => $name]);
                if (!$userId) {
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'Could not create user.'
                    ]);
                }
                $user = $userModel->find($userId);
            }

            // Double-check we have an ID now
            if (empty($user) || empty($user['id'])) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'User creation failed.'
                ]);
            }

            // Send either OTP or Magic Link
            switch ($method) {
                case 'otp':
                    $otp = $verifyModel->createOTP($user['id']);
                    $this->sendOTPEmail($email, $otp);
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'OTP sent to your email.'
                    ]);

                case 'magic':
                    $token = $verifyModel->createMagicLink($user['id']);
                    $this->sendMagicLink($email, $token);
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'Magic link sent to your email.'
                    ]);

                default:
                    if (!empty($user['is_verified'])) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Email already verified.'
                        ]);
                    }

                    $mix = $verifyModel->createMagicOtp($user['id']);
                    if (!$this->sendVerificationEmail($email, $mix['otp'], $mix['token'])) {
                        return $this->response->setJSON([
                            'status' => 'error',
                            'message' => 'Failed to send verification email. Please try again.'
                        ]);
                    }
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'A magic link and OTP have been sent to your email.'
                    ]);
            }
        }

        return redirect()->back();
    }

    public function login()
    {
        if ($this->request->isAJAX()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $rememberMe = $this->request->getPost('rememberMe') ?? null;

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Please enter a valid email address.'
                ]);
            }

            if (empty($password)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Password is required.'
                ]);
            }

            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();

            if (!$user) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No account found with that email.'
                ]);
            }

            if (is_null($user['password_hash'])) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Password not set for this account.'
                ]);
            }

            if (!Hash::check($password, $user['password_hash'])) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Invalid password.'
                ]);
            }

            // Login successful
            session()->set('user_id', $user['id']);

            // Remember me logic
            if ($rememberMe) {
                $token = bin2hex(random_bytes(32));
                $userModel->update($user['id'], ['remember_token' => $token]);
                setcookie('remember_token', $token, [
                    'expires' => time() + (86400 * 30),
                    'path' => '/',
                    'secure' => isset($_SERVER['HTTPS']),
                    'httponly' => true,
                    'samesite' => 'Lax'
                ]);
            }

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Welcome back, ' . esc($user['email']) . '!',
                'redirect' => base_url()
            ]);
        }

        return redirect()->back();
    }

    private function sendVerificationEmail($to, $otp, $token)
    {
        $link = base_url('/auth/verify-magic?token=' . $token);

        $config = [
            'protocol'   => 'smtp',
            'SMTPHost'   => env('email.SMTPHost'),
            'SMTPUser'   => env('email.SMTPUser'),
            'SMTPPass'   => env('email.SMTPPass'),
            'SMTPPort'   => (int) env('email.SMTPPort'),
            'SMTPCrypto' => env('email.SMTPCrypto'),
            'mailType'   => 'html',
            'charset'    => 'utf-8',
            'wordWrap'   => true,
            'fromEmail'  => env('email.fromEmail'),
            'fromName'   => env('email.fromName'),
        ];

        $email = service('email');
        $email->initialize($config);

        $data = [
            'otp'  => $otp,
            'link' => $link,
            'to'   => $to
        ];

        $messageView = view('fronts/email-templates/EmailVerification', $data);

        $email->setFrom($config['fromEmail'], $config['fromName']);
        $email->setTo($to);
        $email->setSubject('Verify Your Email & Login');
        $email->setMessage($messageView ?: "Your OTP: <b>{$otp}</b><br>Or click to log in: <a href='{$link}'>{$link}</a>");

        if ($email->send()) {
            log_message('info', "✅ Verification mail sent to {$to}");
            return true;
        } else {
            log_message('error', 'Mailtrap send failed: ' . print_r($email->printDebugger(['headers', 'subject', 'body']), true));
            return false;
        }
    }
    private function sendOTPEmail($to, $otp)
    {
        $email = service('email');
        // Load Mailtrap credentials from .env
        $config = [
            'protocol'   => 'smtp',
            'SMTPHost'   => env('email.SMTPHost'),
            'SMTPUser'   => env('email.SMTPUser'),
            'SMTPPass'   => env('email.SMTPPass'),
            'SMTPPort'   => (int) env('email.SMTPPort'),
            'SMTPCrypto' => env('email.SMTPCrypto'),
            'mailType'   => 'html',
            'charset'    => 'utf-8',
            'wordWrap'   => true,
            'fromEmail'  => env('email.fromEmail'),
            'fromName'   => env('email.fromName'),
        ];
        // Initialize with runtime config
        $email->initialize($config);
        // Compose and send
        $email->setFrom($config['fromEmail'], $config['fromName']);
        $email->setTo($to);
        $email->setSubject('Your OTP Code');
        $email->setMessage("Your login code is: <b>{$otp}</b>");

        if (!$email->send()) {
            log_message('error', 'Mailtrap send failed: ' . print_r($email->printDebugger(['headers']), true));
        }
    }

    private function sendMagicLink($to, $token)
    {
        $link = base_url('/auth/verify-magic?token=' . $token);

        $config = [
            'protocol'   => 'smtp',
            'SMTPHost'   => env('email.SMTPHost'),
            'SMTPUser'   => env('email.SMTPUser'),
            'SMTPPass'   => env('email.SMTPPass'),
            'SMTPPort'   => (int) env('email.SMTPPort'),
            'SMTPCrypto' => env('email.SMTPCrypto'),
            'mailType'   => 'html',
            'charset'    => 'utf-8',
            'wordWrap'   => true,
            'fromEmail'  => env('email.fromEmail'),
            'fromName'   => env('email.fromName'),
        ];

        $email = service('email');
        $email->initialize($config);

        $data = ['link' => $link, 'to' => $to];
        $messageView = view('fronts/email-templates/EmailVerification', $data);

        $email->setFrom($config['fromEmail'], $config['fromName']);
        $email->setTo($to);
        $email->setSubject('Verify email');
        $email->setMessage($messageView ?: "Click to log in: <a href='{$link}'>{$link}</a>");

        if (!$email->send()) {
            log_message('error', 'Mailtrap send failed: ' . print_r($email->printDebugger(['headers', 'subject', 'body']), true));
        } else {
            log_message('info', "✅ Mailtrap sent successfully to {$to}");
        }
    }

    public function verifyOTP()
    {
        $email = $this->request->getPost('email');
        $otp   = $this->request->getPost('otp');

        $userModel = new UserModel();
        $verifyModel = new EmailVerificationModel();

        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User not found.'
            ]);
        }

        $record = $verifyModel
            ->where('user_id', $user['id'])
            ->where('otp_code', $otp)
            ->groupStart()
            ->where('type', 'otp')
            ->orWhere('type', 'mix')
            ->groupEnd()
            ->where('expires_at >=', date('Y-m-d H:i:s'))
            ->first();

        if ($record) {
            // Mark user verified
            $userModel->update($user['id'], ['is_verified' => true]);
            session()->set('user_id', $user['id']);

            // ✅ Delete used verification record
            $verifyModel->delete($record['id']);

            // Optional: cleanup any expired ones
            $verifyModel->cleanOldRecords($user['id']);

            $redirect = session('redirect_url') ?? base_url();
            session()->remove('redirect_url');

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'OTP verified successfully!',
                'redirect' => $redirect
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Invalid or expired OTP.'
        ]);
    }

    public function verifyMagicLink()
    {
        $token = $this->request->getGet('token');
        if (empty($token)) {
            return redirect()->to(base_url())->with('error', 'Invalid verification link.');
        }

        $verifyModel = new EmailVerificationModel();
        $record = $verifyModel
            ->where('token', $token)
            ->whereIn('type', ['magic_link', 'mix'])
            ->where('expires_at >=', date('Y-m-d H:i:s'))
            ->first();

        if (!$record) {
            return redirect()->to(base_url())->with('error', 'Invalid or expired link.');
        }

        $userModel = new UserModel();
        $user = $userModel->find($record['user_id']);

        if (!$user) {
            return redirect()->to(base_url())->with('error', 'User not found.');
        }

        // Mark user verified
        $userModel->update($user['id'], ['is_verified' => true]);

        // Delete used token
        $verifyModel->delete($record['id']);

        // Set session
        session()->set('user_id', $user['id']);

        // Redirect to target page
        $redirect = session('redirect_url') ?? base_url();
        session()->remove('redirect_url');

        return redirect()->to($redirect)->with('success', 'Email verified successfully!');
    }


    public function redirectToGoogle()
    {
        $client = new GoogleClient();
        $client->setClientId(env('google.client_id'));
        $client->setClientSecret(env('google.client_secret'));
        $client->setRedirectUri(env('google.redirect_uri'));
        $client->addScope(['email', 'profile']);

        return redirect()->to($client->createAuthUrl());
    }

    public function handleGoogleCallback()
    {
        $code = $this->request->getVar('code');
        if (!$code) {
            return redirect()->to(base_url())->with('error', 'Google login failed');
        }

        $client = new GoogleClient();
        $client->setClientId(env('google.client_id'));
        $client->setClientSecret(env('google.client_secret'));
        $client->setRedirectUri(env('google.redirect_uri'));

        $token = $client->fetchAccessTokenWithAuthCode($code);
        if (isset($token['error'])) {
            return redirect()->to(base_url())->with('fail', 'Google authentication failed');
        }

        $client->setAccessToken($token['access_token']);
        $googleService = new Oauth2($client);
        $googleUser = $googleService->userinfo->get();

        // Use user info
        $email = $googleUser->email;
        $name  = $googleUser->name;

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            // Register new user
            $userId = $userModel->insert([
                'name' => $name,
                'email' => $email,
                'is_verified' => 1, // Gmail is already verified
                'created_at' => date('Y-m-d H:i:s')
            ]);
        } else {
            $userId = $user['id'];
        }

        session()->set(['user_id' => $userId]);

        return redirect()->to(base_url())->with('success', 'Welcome, ' . $name);
    }

    public function forgotPassword()
    {
        if ($this->request->isAJAX()) {
            $email = $this->request->getPost('email');

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Enter a valid email.']);
            }

            $userModel = new UserModel();
            $verifyModel = new EmailVerificationModel();
            $user = $userModel->where('email', $email)->first();

            if (!$user) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Email not found.']);
            }

            $otp = $verifyModel->createOTP($user['id']);
            $this->sendOTPEmail($email, $otp);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'OTP sent to your email for password reset.'
            ]);
        }

        return redirect()->back();
    }

    public function verifyForgotOtp()
    {
        if ($this->request->isAJAX()) {
            $email = $this->request->getPost('email');
            $otp = $this->request->getPost('otp');

            $userModel = new UserModel();
            $verifyModel = new EmailVerificationModel();
            $user = $userModel->where('email', $email)->first();

            if (!$user) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'User not found.']);
            }

            $record = $verifyModel
                ->where('user_id', $user['id'])
                ->where('otp_code', $otp)
                ->where('expires_at >=', date('Y-m-d H:i:s'))
                ->first();

            if (!$record) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid or expired OTP.']);
            }

            session()->set('reset_user_id', $user['id']);
            $verifyModel->delete($record['id']);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'OTP verified. You can now reset your password.'
            ]);
        }

        return redirect()->back();
    }

    public function resetPassword()
    {
        if ($this->request->isAJAX()) {
            $userId = session('reset_user_id');
            $newPassword = $this->request->getPost('new-password');
            $rePassword  = $this->request->getPost('re-new-password');

            if (empty($userId)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Session expired. Please verify OTP again.'
                ]);
            }

            if (empty($newPassword) || strlen($newPassword) < 6) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Password must be at least 6 characters long.'
                ]);
            }

            if ($newPassword !== $rePassword) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Passwords do not match.'
                ]);
            }

            $userModel = new UserModel();
            $hash = Hash::make($newPassword);

            $userModel->update($userId, [
                'password_hash' => $hash,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            // Clear the reset session
            session()->remove('reset_user_id');

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Password has been reset successfully! Please log in again.'
            ]);
        }
        
        return redirect()->back();
    }


    public function logout()
    {
        $userId = session('user_id');

        // Remove "Remember Me" cookie if it exists
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, '/', '', isset($_SERVER['HTTPS']), true);
        }

        // Clear remember_token in database if logged in
        if ($userId) {
            $userModel = new UserModel();
            $userModel->update($userId, ['remember_token' => null]);
        }

        // Destroy the current session
        session()->destroy();

        // Redirect to home or login page
        return redirect()->to(base_url())->with('success', 'You have been logged out successfully.');
    }
}
