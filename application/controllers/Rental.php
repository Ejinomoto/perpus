<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rental extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Rental');
        $this->load->helper('url');
    }

    public function index()
    {
        // Ensure the user is logged in
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


        $user_id = $this->session->userdata('user_id');
        $this->load->model('User_model'); // Ensure you load your User model
        $user = $this->User_model->get_user_by_id($user_id);

        $data = [
            'user_role' => $user->role, // Assuming 'role' is the column storing user roles
            'pending_rentals' => $this->M_Rental->count_pending_rentals() // Example, modify as needed
        ];
        $data['title'] = 'Data Category';
        $data['rentals'] = $this->M_Rental->get_pending_requests(); // Remove ->result()
        $this->load->view('backend/rentals-pending', $data);
    }

    public function read($transaction_id)
    {
        $this->load->model('M_Rental');

        // Fetch transaction details
        $rental = $this->M_Rental->get_rental_by_id($transaction_id);

        // Check if the rental exists and belongs to the logged-in user
        if (!$rental || $rental['user_id'] != $this->session->userdata('user_id')) {
            show_error("Unauthorized access.", 403);
            return;
        }

        // Ensure the book is still rented and not expired
        if ($rental['status'] !== 'dipinjam' || strtotime($rental['return_date']) < time()) {
            show_error("Your rental period has ended.", 403);
            return;
        }

        // Check if the eBook file exists
        if (empty($rental['ebook_file'])) {
            show_error("Ebook file not found.", 404);
            return;
        }

        // Securely generate the URL for the PDF
        $data['ebook_url'] = base_url('assets/uploads/file_path/' . htmlspecialchars($rental['ebook_file']));
        $data['title'] =  htmlspecialchars($rental['book_name']);

        $this->load->view('read_book', $data);
    }


    public function status()
    {
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

        $user_id = $this->session->userdata('user_id');
        $this->load->model('User_model');
        $user = $this->User_model->get_user_by_id($user_id);

        $data = [
            'user_role' => $user->role, // Assuming 'role' is the column storing user roles
            'pending_rentals' => $this->M_Rental->count_pending_rentals() // Example, modify as needed
        ];

        $data = [
            'user_role' => $user->role,
            'total_rentals' => $this->M_Rental->count_all_rentals() // Count all rentals except pending
        ];

        $data['title'] = 'All Rentals';
        $data['rentals'] = $this->M_Rental->get_non_pending_rentals(); // Fetch rentals excluding 'pending'

        $this->load->view('backend/rentals-status', $data);
    }

    public function request_rent()
    { {
            $book_id = $this->input->post('book_id');
            $user_id = $this->input->post('user_id');
            $tipe_buku = $this->input->post('tipe_buku'); // Get the book type from the form
            $days = 7; // Set days to 7 by default

            if (!$book_id || !$user_id || !$tipe_buku) {
                die("❌ Incomplete form submission. Please check all fields.");
            }

            // Calculate return_date (borrow_date + days)
            $borrow_date = date('Y-m-d H:i:s'); // Current timestamp
            $return_date = date('Y-m-d H:i:s', strtotime("+$days days"));

            // Insert into transactions
            $data = [
                'book_id' => $book_id,
                'user_id' => $user_id,
                'tipe_buku' => $tipe_buku, // Include the book type
                'borrow_date' => $borrow_date,
                'return_date' => $return_date,
                'status' => 'dipinjam', // Default status
                'approval_status' => 'pending' // Default approval status
            ];

            $this->db->insert('transactions', $data);

            if ($this->db->affected_rows() > 0) {
                echo "✅ Rent request submitted successfully!";
            } else {
                echo "❌ Failed to submit rent request.";
            }
        }
    }

    public function get_pending_rentals_count()
    {
        $this->load->model('Rental_model');
        $pending_count = $this->Rental_model->count_pending_rentals();
        echo json_encode(['pending_rentals' => $pending_count]);
    }
}
