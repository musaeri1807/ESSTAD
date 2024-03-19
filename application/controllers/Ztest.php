<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ztest extends CI_Controller
{
    public function recaptcha()
    {
        // load from spark tool
        // $this->load->spark('recaptcha-library/1.0.1');
        // load from CI library
        $this->load->library('recaptcha');

        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
                echo "<br>";
                echo "You got it!";
                var_dump($response);
            } else {
                echo " Belum diklik Bro";
            }
        }

        // view
        var_dump($this->recaptcha->getWidget());
        echo "<br>";
        var_dump($this->recaptcha->getScriptTag());
        $data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag(),
        );
        $this->load->view('recaptcha8', $data);
    }
}
