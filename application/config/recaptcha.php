<?php
defined('BASEPATH') or exit('No direct script access allowed');

// To use reCAPTCHA, you need to sign up for an API key pair for your site.
// link: http://www.google.com/recaptcha/admin
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    # code...
    $config['recaptcha_site_key'] = '6LfJec4ZAAAAAPYZt2c-p6gu37D6weYdI8Kw1LqA';
    $config['recaptcha_secret_key'] = '6LfJec4ZAAAAACG1-fmobe88erF72OdXbAFN71jj';
    // reCAPTCHA supported 40+ languages listed here:
    // https://developers.google.com/recaptcha/docs/language
    $config['recaptcha_lang'] = 'en';
} else {
    # code...
    $config['recaptcha_site_key'] = '6LdCXhcbAAAAAKhaHQouGGvtU6u4fJUSx8dpQUGv';
    $config['recaptcha_secret_key'] = '6LdCXhcbAAAAABj_ExKExLI_0h_1uz7tSCYdDHM-';
    // reCAPTCHA supported 40+ languages listed here:
    // https://developers.google.com/recaptcha/docs/language
    $config['recaptcha_lang'] = 'en';
}


/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */
