<?php
class User_model extends CI_Model
{

    // Register new user
    public function register($data)
    {
        $this->db->insert('users', $data);
    }

    public function get_user_by_username($username)
    {
        $this->db->select('user_id, username, nama_lengkap, alamat, email, password, role'); // Include password and role
        $this->db->from('users');
        $this->db->where('username', $username);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_user_by_id($user_id)
    {
        return $this->db->get_where('users', ['user_id' => $user_id])->row();
    }

    // Count the total number of users in the database
    public function count_all_users()
    {
        return $this->db->count_all('users');
    }

    // Check if a specific role exists in the users table
    public function check_role_exists($role)
    {
        $query = $this->db->get_where('users', ['role' => $role]);
        return $query->num_rows() > 0; // Return true if the role exists
    }

    // application/models/User_model.php

    public function check_username_exists($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->num_rows() > 0; // Returns TRUE if username exists
    }

    public function check_email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->num_rows() > 0; // Returns TRUE if email exists
    }

    public function getAll()
    {
        // Retrieve only rooms that are not marked as deleted
        return $this->db->get('users');
    }
}
