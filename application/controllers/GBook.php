<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gbook extends CI_Controller
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

        $this->load->model('M_GoogleBooks');
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
        $this->load->view('assets/sidebar', $rental); // Adjust view file as needed
        $this->load->view('backend/dashboard-gbook', $data);
    }

    public function search()
    {
        $user_id = $this->session->userdata('user_id');
        $this->load->model('User_model'); // Ensure you load your User model
        $user = $this->User_model->get_user_by_id($user_id);

        $data = [
            'user_role' => $user->role, // Assuming 'role' is the column storing user roles
            'pending_rentals' => $this->M_Rental->count_pending_rentals() // Example, modify as needed
        ];
        $this->load->model('M_GoogleBooks');

        // Get search query from input
        $query = $this->input->post('query');
        if (!$query) {
            $this->session->set_flashdata('error', 'Please enter a search query.');
            redirect('googlebooks');
        }

        // Fetch books from Google Books API
        $books = $this->M_GoogleBooks->searchBooks($query);

        // Pass data to the view
        $data['books'] = $books['items'] ?? [];
        $this->load->view('backend/dashboard-gbook', $data);
    }

    public function addBook()
    {
        $this->load->model('M_GoogleBooks');

        // Get book data from the form
        $bookData = [
            'title' => $this->input->post('title'),
            'author' => $this->input->post('author'),
            'isbn' => $this->input->post('isbn'),
            'gambar' => $this->input->post('gambar'),
            'type' => 'Fisik',
            'description' => $this->input->post('description'), // Add description
            'publisher' => $this->input->post('publisher'), // Add publisher
            'published_date' => $this->input->post('published_date'), // Add published date
        ];

        $genres = $this->input->post('genres');

        // Insert the book into the database
        $bookId = $this->M_GoogleBooks->insertBook($bookData, $genres);

        if ($bookId) {
            $this->session->set_flashdata('success', 'Book added successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to add book.');
        }

        redirect('Gbook');
    }
}
