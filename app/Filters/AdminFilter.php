<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Libraries\CiAdmin;
use App\Models\AdminModel;

class AdminFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $isLoggedIn = CiAdmin::check();

        // ---------------------------
        // Remember Me Auto Login
        // ---------------------------
        if (!$session->has('admindata') && isset($_COOKIE['remember_token'])) {
            $adminModel = new AdminModel();
            $adminInfo = $adminModel->where('remember_token', $_COOKIE['remember_token'])->first();

            if ($adminInfo && hash_equals($adminInfo['remember_token'], $_COOKIE['remember_token'])) {
                CiAdmin::setCiAdmin($adminInfo);
                $isLoggedIn = true;
            }
        }


        // ---------------------------
        // 1) Guest-only routes
        // filter: AdminFilter:auth
        // ---------------------------
        if (in_array('auth', $arguments ?? [])) {
            if ($isLoggedIn) {
                return redirect()->to('admin/home');
            }
            return $request;
        }

        // ---------------------------
        // 2) Login required ONLY
        // filter: AdminFilter:login
        // ---------------------------
        if (in_array('login', $arguments ?? [])) {
            if (!$isLoggedIn) {
                $session->set('admin_redirect_url', current_url());
                return redirect()->to('admin');
            }
            return $request;
        }

        // ---------------------------
        // 3) Role-based restriction
        // Example:
        // AdminFilter:superadmin
        // AdminFilter:admin,superadmin
        // AdminFilter:editor,admin
        // ---------------------------
        if ($arguments) {
            $admin = CiAdmin::admin();
            $role = $admin['role'] ?? null;

            if (!in_array($role, $arguments)) {
                return redirect()
                    ->to('admin/home')
                    ->with('error', 'You are not allowed to access this page.');
            }
        }

        return $request;
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
