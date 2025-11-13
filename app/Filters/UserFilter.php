<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Libraries\CiUser;

class UserFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $isLoggedIn = CiUser::check();
        if ($arguments && isset($arguments[0])) {
            if ($arguments[0] === 'user') {
                // Auth mode: user must be logged in
                if (!$isLoggedIn) {
                    // Save intended URL for redirect after login
                    $session->set('redirect_url', current_url());
                    return redirect()->to(route_to('user.login'))->with('fail', 'Please logged in first!');
                }
            }
            if ($arguments[0] === 'guest') {
                // Guest mode: user must NOT be logged in
                if ($isLoggedIn) {
                    return redirect()->to(route_to('home'));
                }
            }
        }
        // Allow the request to continue
        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after
    }
}
