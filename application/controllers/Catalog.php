<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Notif'); // Load model di sini    
        $this->load->model('M_Catalog'); // Memuat model untuk data buku
    }

    public function index()
    {
        $this->load->library('pagination');
        $this->load->model('M_Catalog');

        $genre = $this->input->get('genre'); // Get genre from URL
        $page = is_numeric($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config['base_url'] = base_url('catalog') . (!empty($genre) ? '?genre=' . urlencode($genre) : '');
        $config['total_rows'] = !empty($genre) ? $this->M_Catalog->count_books_by_genre($genre) : $this->M_Catalog->count_books();
        $config['per_page'] = 8;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'per_page'; // Makes sure pagination works with query strings
        $config['reuse_query_string'] = TRUE; // Keeps `genre` in pagination links

        // Pagination Styling (Optional)
        $config['full_tag_open'] = '<ul class="custom-pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="is-active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        // Fetch books based on selected genre
        if (!empty($genre)) {
            $books = $this->M_Catalog->get_books_by_genre($genre, $config['per_page'], $page);
        } else {
            $books = $this->M_Catalog->get_books($config['per_page'], $page);
        }

        $data['books'] = $books;
        $data['genres'] = $this->M_Catalog->get_genres();
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('shop', $data);
    }
}
