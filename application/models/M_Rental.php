<?php

class M_Rental extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Notif'); // Load model notifikasi
    }

    public function insert_rental($data)
    {
        return $this->db->insert('transactions', $data);
    }

    public function get_pending_requests()
    {
        $this->db->select('
            transactions.transaction_id,
            transactions.user_id,
            transactions.book_id,
            transactions.tipe_buku,
            transactions.return_date,
            transactions.approval_status,
            users.nama_lengkap,
            books.title AS book_name,
            books.author,
            books.gambar AS book_image
        ');
        $this->db->from('transactions');
        $this->db->join('users', 'transactions.user_id = users.user_id', 'left');
        $this->db->join('books', 'transactions.book_id = books.book_id', 'left');
        $this->db->where('transactions.approval_status', 'pending');

        return $this->db->get()->result_array();
    }

    public function count_pending_rentals()
    {
        $this->db->where('approval_status', 'pending');
        return $this->db->count_all_results('transactions'); // Make sure the table name is correct
    }

    public function countUsers()
    {
        return $this->db->count_all('users'); // Change 'users' to your actual user table name
    }

    public function countPendingTransactions()
    {
        $this->db->where('approval_status', 'pending'); // Assuming 'status' column holds values like 'pending', 'approved'
        return $this->db->count_all_results('transactions'); // Change 'transactions' to your actual table name
    }

    public function get_active_rentals($user_id, $current_date)
    {
        $this->db->select('
        transactions.transaction_id,
        transactions.return_date,
        transactions.tipe_buku,
        books.gambar,
        books.title AS book_name,
        books.file_path AS ebook_file,
        books.author
    ');
        $this->db->from('transactions');
        $this->db->join('books', 'transactions.book_id = books.book_id', 'left');
        $this->db->where('transactions.user_id', $user_id);
        $this->db->where('transactions.approval_status', 'approved');
        $this->db->where('transactions.return_date >=', $current_date); // Active rentals

        return $this->db->get()->result_array();
    }

    public function get_non_pending_rentals()
    {
        $this->db->select('
            transactions.transaction_id,
            transactions.user_id,
            transactions.book_id,
            transactions.return_date,
            transactions.approval_status,
            users.nama_lengkap,
            books.title AS book_name,
            books.author,
            books.gambar AS book_image
        ');
        $this->db->from('transactions');
        $this->db->join('users', 'transactions.user_id = users.user_id', 'left');
        $this->db->join('books', 'transactions.book_id = books.book_id', 'left');
        $this->db->where('transactions.approval_status !=', 'pending'); // Exclude pending rentals

        return $this->db->get()->result_array();
    }


    public function count_all_rentals()
    {
        $this->db->where('approval_status !=', 'pending');
        return $this->db->count_all_results('transactions');
    }


    public function get_expired_rentals($user_id, $current_date)
    {
        $this->db->select('
            transactions.transaction_id,
            transactions.borrow_date,
            transactions.return_date,
            books.gambar,
            books.title AS book_name,
            books.type AS book_type, 
            books.file_path AS ebook_file,
            books.author
        ');
        $this->db->from('transactions');
        $this->db->join('books', 'transactions.book_id = books.book_id', 'left');
        $this->db->where('transactions.user_id', $user_id);
        $this->db->where('transactions.approval_status', 'approved');
        $this->db->where('transactions.return_date <', $current_date); // Expired rentals

        return $this->db->get()->result_array();
    }
    public function get_user_rentals($user_id)
    {
        $this->db->select('
            transactions.transaction_id,
            transactions.return_date,
            books.gambar,
            books.title AS book_name,
            books.type AS book_type, 
            books.file_path AS ebook_file,
            books.author
        ');
        $this->db->from('transactions');
        $this->db->join('books', 'transactions.book_id = books.book_id', 'left');
        $this->db->where('transactions.user_id', $user_id);
        $this->db->where('transactions.approval_status', 'approved'); // Only show approved rentals

        return $this->db->get()->result_array();
    }

    public function get_pending_rentals($user_id)
    {
        $this->db->select('
        transactions.transaction_id,
        transactions.book_id,
        transactions.return_date,
        transactions.approval_status,
        books.title as book_name,
        books.author,
        books.type as book_type,
        books.gambar
    ');
        $this->db->from('transactions');
        $this->db->join('books', 'transactions.book_id = books.book_id', 'left');
        $this->db->where('transactions.user_id', $user_id);
        $this->db->where('transactions.approval_status', 'pending');
        return $this->db->get()->result_array();
    }

    public function get_rental_by_id($transaction_id)
    {
        $this->db->select('
            transactions.*, 
            books.file_path AS ebook_file, 
            books.title AS book_name
        ');
        $this->db->from('transactions');
        $this->db->join('books', 'transactions.book_id = books.book_id', 'left');
        $this->db->where('transactions.transaction_id', $transaction_id);

        return $this->db->get()->row_array();
    }

    public function get_user_wishlist($user_id)
    {
        $this->db->select('wishlist.*, books.title, books.gambar, books.author');
        $this->db->from('wishlist');
        $this->db->join('books', 'wishlist.book_id = books.book_id');
        $this->db->where('wishlist.user_id', $user_id);
        return $this->db->get()->result();
    }

    public function approve_rental($transaction_id)
    {
        // Update transaksi menjadi 'approved'
        $this->db->where('transaction_id', $transaction_id)->update('transactions', ['approval_status' => 'approved']);

        // Ambil detail transaksi
        $transaction = $this->db->where('transaction_id', $transaction_id)->get('transactions')->row();

        if (!$transaction) {
            return false; // Jika transaksi tidak ditemukan
        }

        return true;
    }

    public function reject_rental($transaction_id)
    {
        return $this->db->where('transaction_id', $transaction_id)->update('transactions', ['approval_status' => 'rejected']);
    }
}
