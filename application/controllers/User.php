<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     // Load the model here, so it's available in all methods
    //     $this->load->model('Booking_model');
    // }


    public function index()
    {
        $this->load->model('M_Rental');

        // Get the logged-in user's ID
        $user_id = $this->session->userdata('user_id');
        $current_date = date('Y-m-d'); // Get today's date

        $data['pending_rentals'] = $this->M_Rental->get_pending_rentals($user_id);

        // Fetch active rentals (not expired)
        $data['current_rentals'] = $this->M_Rental->get_active_rentals($user_id, $current_date);

        // Fetch expired rentals (rental history)
        $data['expired_rentals'] = $this->M_Rental->get_expired_rentals($user_id, $current_date);

        // Fetch user wishlist
        $data['wishlist'] = $this->M_Rental->get_user_wishlist($user_id);

        // Load the 'user' view with all rental and wishlist data
        $this->load->view('user', $data);
    }




    public function activity_timeline()
    {
        // This method is not really needed anymore since 'index()' is handling it
        $this->index();
    }

    public function read_book($transaction_id)
    {
        // Load the model
        $this->load->model('M_buku');

        // Get book details from transaction
        $book = $this->M_buku->get_book_by_transaction($transaction_id);

        // Check if book exists
        if (!$book) {
            show_404(); // Show error page if book not found
        }

        // Load the view and pass book data
        $data['title'] = 'Read Book - ' . $book['title'];
        $data['book'] = $book;
        $this->load->view('read_book', $data);
    }
}
