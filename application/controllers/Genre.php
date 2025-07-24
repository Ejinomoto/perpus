<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Genre extends CI_Controller
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

        // Load the M_kamar model globally for all functions in this controller
        $this->load->model('M_Genre');
        $this->load->model('M_Rental');
    }

    public function edit($genre_id = null)
    {
        if ($genre_id) {
            // Fetch the genre data for editing
            $data['genre'] = $this->M_Genre->get_by_id($genre_id);

            // Load the edit view with the genre data
            $this->load->view('genre', $data);
        } else {
            // Handle form submission for editing
            if (isset($_POST['submit'])) {
                $genre_id = $this->input->post('genre_id');
                $genre_name = $this->input->post('genre_name');

                // Update the genre in the database
                $this->M_Genre->update_genre($genre_id, $genre_name);

                // Set a success message
                $this->session->set_flashdata('success', 'Genre updated successfully!');

                // Redirect back to the genres list
                redirect('genre');
            }
        }
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
        $data['title'] = 'Data Category';
        $data['row'] = $this->M_Genre->getAll()->result();
        $rental['pending_rentals'] = $this->M_Rental->count_pending_rentals();
        $this->load->view('assets/sidebar', $rental); // Adjust view file as needed
        $this->load->view('backend/genre', $data);
    }






    public function tambah()
    {
        if (isset($_POST['submit'])) {
            $this->load->library('upload');
            $this->upload->initialize($this->set_upload());
            $data = array();

            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $fileData = $this->upload->data();
                $data['gambar'] = $fileData['file_name'];
            }

            $data['name'] = $this->input->post('name');



            $this->db->insert('genres', $data);
            redirect('genre');
        } else {
            $data['title'] = 'Data fasilitas';

            $this->load->view('backend/genre', $data);
        }
    }




    private function set_upload()
    {
        $config = array();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '10000';
        $config['file_name'] = 'fasilitas-' . substr(md5(rand()), 0, 10);
        return $config;
    }


    public function del($genre_id)
    {
        // Load the M_Buku model
        $this->load->model('M_genre');

        // Call the delete method in the model
        if ($this->M_genre->deleteBook($genre_id)) {
            $this->session->set_flashdata('success', 'Book deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete the book.');
        }

        // Redirect back to the admin dashboard
        redirect('genre');
    }
}
