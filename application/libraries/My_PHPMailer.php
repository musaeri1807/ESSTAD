<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require APPPATH . 'libraries/PHPMailer/src/Exception.php';
// require APPPATH . 'libraries/PHPMailer/src/PHPMailer.php';
// require APPPATH . 'libraries/PHPMailer/src/SMTP.php';
require FCPATH . 'vendor/autoload.php';

class My_PHPMailer
{

    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function sendMail($to, $subject, $body)
    {
        try {
            //Server settings
            $this->mail->isSMTP();
            $this->mail->Host       = 'mx.mailspace.id'; // Ganti dengan SMTP server Anda
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = 'no_reply@miga.co.id'; // Ganti dengan email Anda
            $this->mail->Password   = 'P@ssw0rdmiga.2022#'; // Ganti dengan password email Anda
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Gunakan TLS atau SSL
            $this->mail->Port       = 465; // Port untuk TLS

            //Recipients
            $this->mail->setFrom('no_reply@miga.co.id', 'no_reply'); // Ganti dengan email pengirim
            $this->mail->addAddress($to); // Add a recipient

            //Content
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function sendMailWithAttachment($to, $subject, $body, $attachment)
    {
        try {
            // Pengaturan SMTP
            $this->mail->isSMTP();
            $this->mail->Host       = 'haruman.iixcp.rumahweb.net'; // Ganti dengan SMTP server Anda
            $this->mail->SMTPAuth   = true;
            $this->mail->Username   = 'noreplay@musaeri.my.id'; // Ganti dengan email Anda
            $this->mail->Password   = 'Pr8ja99z?K8%'; // Ganti dengan password email Anda
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Gunakan TLS atau SSL
            $this->mail->Port       = 587; // Port untuk TLS

            // Penerima
            $this->mail->setFrom('noreplay@musaeri.my.id', 'Admin'); // Ganti dengan email pengirim
            $this->mail->addAddress($to); // Email penerima

            // Lampiran
            $this->mail->addAttachment($attachment); // Lampirkan file slip gaji

            // Konten email
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;

            // Kirim email
            $this->mail->send();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}
