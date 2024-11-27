<?php

class Region_model extends CI_Model
{
	function __consturct()
	{
		parent::__construct();
	}

	public function get_provinsi()
	{
		return $this->db->get('region_provinsi')->result();
	}

	public function get_kabupaten($provinsi_id)
	{
		return $this->db->get_where('region_kabupaten', ['provinsi_id' => $provinsi_id])->result();
	}

	public function get_kecamatan($kabupaten_id)
	{
		return $this->db->get_where('wilayah_kecamatan', ['kabupaten_id' => $kabupaten_id])->result();
	}

	public function get_desa($kecamatan_id)
	{
		return $this->db->get_where('wilayah_desa', ['kecamatan_id' => $kecamatan_id])->result();
	}
	public function get_rw()
	{

		return $this->db->get('region_rw')->result();
	}
	public function get_rt()
	{
		return $this->db->get('region_rt')->result();
	}
}
