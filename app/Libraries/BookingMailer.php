<?php

namespace App\Libraries;

class BookingMailer
{
    public static function sendSuccess($to, $pnr)
    {
        $email = service('email');

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

        $email->initialize($config);

        $data = [
            'pnr'  => $pnr,
            'link' => base_url('download-invoice/' . $pnr)
        ];

        $message = view('fronts/email-templates/EmailSuccessBooking', $data);

        $email->setFrom($config['fromEmail'], $config['fromName']);
        $email->setTo($to);
        $email->setSubject('Booking Confirmed');
        $email->setMessage($message);

        if (!$email->send()) {
            log_message('error', 'Booking email failed: ' . print_r($email->printDebugger(), true));
        }
    }
}
