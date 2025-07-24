<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Notif'); // Load model di sini
		$this->load->model('M_Catalog'); // Memuat model untuk data buku
	}

	public function index()
	{
		$this->load->helper('url');

		$data['random_books'] = $this->M_Catalog->get_random_books(4); // Fetch 4 random books

		$data['genres'] = $this->db->order_by('name', 'ASC')->limit(5)->get('genres')->result(); // Fetch only 5 categories



		$this->load->view('home', $data);
	}
}
