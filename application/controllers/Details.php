<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Details extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Notif'); // Load model di sini
        $this->load->model('M_Details'); // Load the model for book details
    }

    public function index()
    {
        $this->load->helper('url');

        // Get the book_id from the URL query string
        $book_id = $this->input->get('book_id', TRUE); // Ensure it's properly retrieved

        // Debugging: Check if book_id is received
        if (!$book_id) {
            die("Error: No book_id found in URL.");
        }

        // Fetch book details from the model
        $this->load->model('M_Details');
        $data['book'] = $this->M_Details->get_book_by_id($book_id);

        // Debugging: Check if book data is retrieved
        if (empty($data['book'])) {
            die("Error: Book not found in the database.");
        }

        // Load the view with the book details
        $this->load->view('details', $data);
    }
}
