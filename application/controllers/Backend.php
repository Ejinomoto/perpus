<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backend extends CI_Controller
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
        $this->load->library('upload');
        $this->load->model('M_buku');
        $this->load->model('M_Rental');
    }

    public function index()
    {
        $rental['pending_rentals'] = $this->M_Rental->count_pending_rentals();
        $this->load->view('assets/sidebar', $rental); // Adjust view file as needed

        $user_id = $this->session->userdata('user_id');
        $this->load->model('User_model'); // Ensure you load your User model
        $user = $this->User_model->get_user_by_id($user_id);

        $data = [
            'user_role' => $user->role, // Assuming 'role' is the column storing user roles
            'pending_rentals' => $this->M_Rental->count_pending_rentals() // Example, modify as needed
        ];
        $data['genres'] = $this->db->get('genres')->result_array();
        $data['row'] = $this->M_buku->getAll()->result();
        $this->load->view('backend/dashboard-admin', $data);
    }



    public function tambah()
    {
        if (isset($_POST['submit'])) {
            $this->load->library('upload');
            $data = array();

            // Upload 'gambar'
            $configGambar = array(
                'upload_path'   => './assets/uploads/covers/',
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 5000,
                'encrypt_name'  => TRUE,
            );
            $this->upload->initialize($configGambar);

            if (!$this->upload->do_upload('gambar')) {
                echo "Image upload error: " . $this->upload->display_errors();
                return;
            } else {
                $fileDataGambar = $this->upload->data();
                $data['gambar'] = $fileDataGambar['file_name'];
            }

            // Upload 'file_path'
            $configFile = array(
                'upload_path'   => './assets/uploads/file_path/',
                'allowed_types' => 'pdf|doc|docx|txt',
                'max_size'      => 40000,
                'encrypt_name'  => TRUE,
            );
            $this->upload->initialize($configFile);

            if (!$this->upload->do_upload('file_path')) {
                echo "File upload error: " . $this->upload->display_errors();
                return;
            } else {
                $fileDataFile = $this->upload->data();
                $data['file_path'] = $fileDataFile['file_name'];
            }

            // Other form data
            $data['title'] = $this->input->post('title');
            $data['author'] = $this->input->post('author');
            $data['publisher'] = $this->input->post('publisher');
            $data['published_date'] = $this->input->post('published_date');

            // Handle type (convert array to string)
            $type = $this->input->post('type');
            if (is_array($type)) {
                $data['type'] = implode(', ', $type);
            } else {
                $data['type'] = $type; // If not an array, assign directly
            }


            $data['isbn'] = $this->input->post('isbn');

            // Insert into `books` table
            $this->db->insert('books', $data);
            $bookId = $this->db->insert_id(); // Get the inserted book's ID

            // Handle genres
            $genres = $this->input->post('genres'); // Get selected genres (array)
            if (!empty($genres)) {
                foreach ($genres as $genreId) {
                    $this->M_buku->insert_book_genre($bookId, $genreId);
                }
            }


            // Handle description
            $description = $this->input->post('description'); // Single textarea input
            if (!empty($description)) {
                $this->M_buku->insert_book_description($bookId, $description);
            }

            // Set success flashdata
            $this->session->set_flashdata('success', 'Book has been added successfully!');

            // Redirect to the backend page
            redirect('backend');
        } else {
            // Load the form for adding a new book
            $data['title'] = 'Tambah Buku';
            $data['genres'] = $this->db->get('genres')->result_array();
            $this->load->view('backend/dashboard-admin', $data);
        }
    }

    public function edit_user()
    {
        if ($this->input->post()) {
            $user_id = $this->input->post('user_id');
            $data = [
                'username' => $this->input->post('username'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role')
            ];

            // Update user data in the database
            $this->db->where('user_id', $user_id);
            $this->db->update('users', $data);

            // Redirect back to the admin user list
            redirect('userlist');
        }
    }

    public function edit()
    {
        $this->load->library('upload');

        if ($this->input->post()) {
            $book_id = $this->input->post('book_id');
            $data = [
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'publisher' => $this->input->post('publisher'),
                'published_date' => $this->input->post('published_date'), // Fixed
                'type' => !empty($this->input->post('type')) ? implode(',', $this->input->post('type')) : null, // Fixed
                'isbn' => $this->input->post('isbn'),
            ];

            // Handle Gambar Upload
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path'] = './assets/uploads/covers/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 5120; // 5MB
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $data['gambar'] = $this->upload->data('file_name');
                }
            }

            // Handle File Path Upload
            if (!empty($_FILES['file_path']['name'])) {
                $config['upload_path'] = './assets/uploads/file_path/';
                $config['allowed_types'] = 'pdf|docx|txt';
                $config['max_size'] = 40000; // 20MB
                $this->upload->initialize($config); // Re-initialize
                if ($this->upload->do_upload('file_path')) {
                    $data['file_path'] = $this->upload->data('file_name');
                }
            }

            // Update tabel books
            $this->db->where('book_id', $book_id);
            $this->db->update('books', $data);

            // Update Genres
            $genres = $this->input->post('genres');
            if (!empty($genres)) {
                // Delete existing genres for this book
                $this->db->where('book_id', $book_id);
                $this->db->delete('book_genres');

                // Insert the new genres
                foreach ($genres as $genre_id) {
                    $this->db->insert('book_genres', [
                        'book_id' => $book_id,
                        'genre_id' => $genre_id
                    ]);
                }
            }

            // Update or Insert Description into book_descriptions
            $description = $this->input->post('description');
            $this->db->where('book_id', $book_id);
            $query = $this->db->get('book_descriptions');

            if ($query->num_rows() > 0) {
                // Update if exists
                $this->db->where('book_id', $book_id);
                $this->db->update('book_descriptions', ['description' => $description]);
            } else {
                // Insert if not exists
                $this->db->insert('book_descriptions', [
                    'book_id' => $book_id,
                    'description' => $description
                ]);
            }

            redirect('backend');
        }
    }


    public function pending_rentals()
    {
        $data['rentals'] = $this->M_Rental->get_pending_requests();
        $this->load->view('backend/rentals', $data);
    }

    public function approve($transaction_id)
    {
        $this->M_Rental->approve_rental($transaction_id);
        redirect('rental');
    }




    public function reject($transaction_id)
    {
        $this->M_Rental->reject_rental($transaction_id);
        redirect('rental');
    }

    public function del($book_id)
    {
        // Load the M_Buku model
        $this->load->model('M_buku');

        // Call the delete method in the model
        if ($this->M_buku->deleteBook($book_id)) {
            $this->session->set_flashdata('success', 'Book deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to delete the book.');
        }

        // Redirect back to the admin dashboard
        redirect('backend');
    }
}
