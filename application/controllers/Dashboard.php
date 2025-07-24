<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            // Redirect to login if the user is not logged in
            redirect('auth/login');
            exit;
        }

        $allowed_roles = ['admin', 'staf']; // Define allowed roles

        if (!in_array($_SESSION['role'], $allowed_roles)) {
            // Prevent unauthorized users from accessing the admin panel
            redirect('welcome'); // Redirect to the user dashboard or home page
            exit;
        }

        $this->load->model('M_buku');
        $this->load->model('M_Rental');
    }

    public function index()
    {

        $user_id = $this->session->userdata('user_id');
        $this->load->model('User_model'); // Ensure you load your User model
        $user = $this->User_model->get_user_by_id($user_id);

        $data = [
            'user_role' => $user->role, // Assuming 'role' is the column storing user roles
            'pending_rentals' => $this->M_Rental->count_pending_rentals() // Example, modify as needed
        ];


        $rental['pending_rentals'] = $this->M_Rental->count_pending_rentals();
        $data['admin_name'] = $this->session->userdata('name'); // Adjust based on your session key
        $data['total_fisik_books'] = $this->M_buku->countBooksByType('fisik');
        $data['total_ebook_books'] = $this->M_buku->countBooksByType('E-book');
        $data['total_users'] = $this->M_Rental->countUsers();
        $data['pending_transactions'] = $this->M_Rental->countPendingTransactions();
        $this->load->view('assets/sidebar', $rental); // Adjust view file as needed
        $this->load->view('backend/dash', $data);
    }
}
