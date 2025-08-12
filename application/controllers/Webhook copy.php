<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Webhook extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Kalau mau simpan log ke database, bisa load model di sini
		// $this->load->model('Webhook_model');
	}

	public function fonnte()
	{
		header('Content-Type: application/json; charset=utf-8');

		// Ambil data JSON dari Fonnte
		$json = file_get_contents('php://input');
		$data = json_decode($json, true);

		// Simpan log request (optional, untuk debugging)
		file_put_contents(APPPATH . 'logs/webhook_fonnte.log', date('Y-m-d H:i:s') . " - " . $json . PHP_EOL, FILE_APPEND);

		// Ambil variabel dari request
		$sender  = isset($data['sender']) ? $data['sender'] : '';
		$message = isset($data['message']) ? strtolower(trim($data['message'])) : '';

		// Tentukan balasan berdasarkan keyword
		switch ($message) {
			case 'test':
				$reply = [
					"message" => "working great!"
				];
				break;

			case 'image':
				$reply = [
					"message" => "image message",
					"url"     => "https://filesamples.com/samples/image/jpg/sample_640%C3%97426.jpg",
				];
				break;

			case 'audio':
				$reply = [
					"message"  => "audio message",
					"url"      => "https://filesamples.com/samples/audio/mp3/sample3.mp3",
					"filename" => "music",
				];
				break;

			case 'video':
				$reply = [
					"message" => "video message",
					"url"     => "https://filesamples.com/samples/video/mp4/sample_640x360.mp4",
				];
				break;

			case 'file':
				$reply = [
					"message"  => "file message",
					"url"      => "https://filesamples.com/samples/document/docx/sample3.docx",
					"filename" => "document",
				];
				break;

			default:
				$reply = [
					"message" => "Sorry, I don't understand. Please use one of the following keywords:\n\nTest\nAudio\nVideo\nImage\nFile"
				];
				break;
		}

		// Kirim balasan ke pengirim
		$this->sendFonnte($sender, $reply);
	}

	private function sendFonnte($target, $data)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.fonnte.com/send",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => array_merge(['target' => $target], $data),
			CURLOPT_HTTPHEADER => array(
				"Authorization: " . KEY_API_WA // Pakai API key
			),
		));

		$response = curl_exec($curl);
		curl_close($curl);

		// Simpan log balasan (optional)
		file_put_contents(APPPATH . 'logs/webhook_fonnte_response.log', date('Y-m-d H:i:s') . " - " . $response . PHP_EOL, FILE_APPEND);

		return $response;
	}
}
