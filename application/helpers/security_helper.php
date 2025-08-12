<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('disable_controller')) {
    /**
     * Menonaktifkan akses ke controller
     *
     * @param string $type '404' atau 'redirect'
     * @param string $redirect_url URL tujuan jika redirect
     */
    function disable_controller($type = '404', $redirect_url = 'login')
    {
        $CI = &get_instance();

        if ($type === '404') {
            show_404();
        } elseif ($type === 'redirect') {
            redirect($redirect_url);
        } else {
            show_error('Controller ini dinonaktifkan untuk sementara.', 403);
        }
        exit; // Pastikan eksekusi berhenti
    }
}
