<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    // Load the registration view
    public function register()
    {
        $this->load->view('auth/register');
    }

    // Handle registration form submission
    public function register_action()
    {
        // Check if the username already exists
        $username_exists = $this->User_model->check_username_exists($this->input->post('username'));
        if ($username_exists) {
            $this->session->set_flashdata('error', 'Username already exists. Please choose a different username.');
            redirect('auth/register');
            return; // Stop further execution
        }

        // Check if the email already exists
        $email_exists = $this->User_model->check_email_exists($this->input->post('email'));
        if ($email_exists) {
            $this->session->set_flashdata('error', 'Email already exists. Please use a different email.');
            redirect('auth/register');
            return; // Stop further execution
        }

        // Check how many users exist in the database
        $user_count = $this->User_model->count_all_users();
        $role = 'user'; // Default role

        // Assign roles based on user count
        if ($user_count == 0) {
            $role = 'admin'; // First user becomes admin
        } else {
            // Check if an admin already exists
            $admin_exists = $this->User_model->check_role_exists('admin');
            if (!$admin_exists) {
                $role = 'admin'; // Assign admin role if no admin exists
            } else {
                // Check if a receptionist already exists
                $receptionist_exists = $this->User_model->check_role_exists('staf');
                if (!$receptionist_exists) {
                    $role = 'staf'; // Assign receptionist if no receptionist exists
                }
            }
        }

        // Prepare user data
        $data = [
            'username' => $this->input->post('username'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'alamat' => $this->input->post('alamat'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT), // Secure password hashing
            'email' => $this->input->post('email'),
            'role' => $role // Set role based on logic
        ];

        // Insert the new user data into the database
        $this->User_model->register($data);

        // Set a success message
        $this->session->set_flashdata('success', 'Registration successful! Please login.');

        // Redirect to login after successful registration
        redirect('auth/login');
    }


    // Load the login view
    public function login()
    {
        $this->load->view('auth/login');
    }

    // Handle login form submission
    public function login_action()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); // Plain text password from the form

        // Fetch the user record from the database by username
        $user = $this->User_model->get_user_by_username($username);

        // Debug: Check if the user was found
        if (!$user) {
            log_message('error', 'User not found: ' . $username);
            $this->session->set_flashdata('error', 'Username or Password is Incorrect');
            redirect('auth/login');
        }

        // Debug: Check if the password is correct
        if (!password_verify($password, $user->password)) {
            log_message('error', 'Password verification failed for user: ' . $username);
            $this->session->set_flashdata('error', 'Username or Password is Incorrect');
            redirect('auth/login');
        }

        // Set session data if login is successful
        $user_data = array(
            'user_id' => $user->user_id,
            'username' => $user->username,
            'role' => $user->role,
            'nama_lengkap' => $user->nama_lengkap,
            'alamat' => $user->alamat,
            'email' => $user->email
        );

        $this->session->set_userdata($user_data);

        // Debug: Check if session is set
        if ($this->session->userdata('user_id')) {
            log_message('debug', 'User session set: ' . $this->session->userdata('user_id'));
        } else {
            log_message('error', 'User session not set!');
        }

        // Check user role and redirect accordingly
        if ($user->role == 'admin') {
            redirect('dashboard');
        } elseif ($user->role == 'staf') {
            redirect('dashboard');
        } else {
            // Default redirect or handle unknown roles
            redirect('welcome');
        }
    }



    // Log out the user and clear session data
    public function logout()
    {
        $user_data = $this->session->all_userdata();
        foreach ($user_data as $key => $value) {
            if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
