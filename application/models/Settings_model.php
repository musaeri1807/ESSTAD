<?php

class Settings_model extends CI_Model
{
	function __consturct()
	{
		parent::__construct();
	}
	public function GetSettingsValue()
	{
		$settings = $this->db->dbprefix('settings');
		$sql = "SELECT * FROM $settings";
		$query = $this->db->query($sql);
		$result = $query->row();
		return $result;
	}
	public function SettingsUpdate($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('settings', $data);
	}
	// Fungsi untuk mengambil nilai konfigurasi berdasarkan key
	public function get_config_value($key)
	{
		$this->db->where('key', $key);
		$query = $this->db->get('maintenance');
		if ($query->num_rows() > 0) {
			return $query->row();
		} else {
			return NULL; // Jika tidak ditemukan
		}
	}
	
}
