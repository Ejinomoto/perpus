<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserList extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_id'])) {
            // Redirect to login if the user is not logged in
            redirect('auth/login');
            exit;
        }

        if ($_SESSION['role'] !== 'admin') {
            // Prevent non-admins from accessing the admin panel
            redirect('backend'); // Redirect to the user dashboard or home page
            exit;
        }
        $this->load->model('User_model'); // Memuat model untuk data buku
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

        $this->load->helper('url');
        $rental['pending_rentals'] = $this->M_Rental->count_pending_rentals();
        $this->load->view('assets/sidebar', $rental); // Adjust view file as needed
        $data['row'] = $this->User_model->getAll()->result();
        $this->load->view('backend/users', $data);
    }
}
