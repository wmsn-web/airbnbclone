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
        // Handle "Remember Me" functionality if user is not already logged in
        if (!$session->has('admindata') && isset($_COOKIE['remember_token'])) {
            $adminModel = new AdminModel();
            $adminInfo = $adminModel->where('remember_token', $_COOKIE['remember_token'])->first();

            // ⚠️ Optional: Match hashed token instead of plain text for security
            if ($adminInfo && hash_equals($adminInfo['remember_token'], $_COOKIE['remember_token'])) {
                CiAdmin::setCiAdmin($adminInfo);
            }
        }


        if (!isset($arguments[0])) {
            // No condition to enforce, allow access
            return $request;
        }
        if ($arguments[0] === 'auth' && $isLoggedIn) {
            return redirect()->to(route_to('admin.home'));
        }
        if ($arguments[0] === 'admin' && !$isLoggedIn) {
            // Authenticated-only routes (e.g., dashboard)
            // optional: go back after login
            $session->set('redirect_url', current_url());
            return redirect()->to(route_to('admin.login'));
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
