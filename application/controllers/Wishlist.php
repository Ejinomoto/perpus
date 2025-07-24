<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wishlist extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Wishlist');
        $this->load->library('session');
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login'); // Redirect to login if not logged in
        }
    }

    public function index()
    {
        $data['wishlist'] = $this->M_Wishlist->get_wishlist($this->session->userdata('user_id'));
        $this->load->view('user', $data);
    }

    public function add($book_id)
    {
        if ($this->M_Wishlist->add_to_wishlist($this->session->userdata('user_id'), $book_id)) {
            $this->session->set_flashdata('success', 'Book added to wishlist!');
        } else {
            $this->session->set_flashdata('error', 'Book is already in your wishlist.');
        }
        redirect('user');
    }

    public function remove($book_id)
    {
        $this->M_Wishlist->remove_from_wishlist($this->session->userdata('user_id'), $book_id);
        $this->session->set_flashdata('success', 'Book removed from wishlist.');
        redirect('user');
    }
}
