<?php
class M_Wishlist extends CI_Model
{
    public function add_to_wishlist($user_id, $book_id)
    {
        // Check if the book is already in the wishlist
        $this->db->where(['user_id' => $user_id, 'book_id' => $book_id]);
        $query = $this->db->get('wishlist');

        if ($query->num_rows() == 0) {
            $data = [
                'user_id' => $user_id,
                'book_id' => $book_id
            ];
            return $this->db->insert('wishlist', $data);
        }
        return false; // Book is already in the wishlist
    }

    public function remove_from_wishlist($user_id, $book_id)
    {
        $this->db->where(['user_id' => $user_id, 'book_id' => $book_id]);
        return $this->db->delete('wishlist');
    }

    public function get_wishlist($user_id)
    {
        $this->db->select('books.*');
        $this->db->from('wishlist');
        $this->db->join('books', 'wishlist.book_id = books.book_id');
        $this->db->where('wishlist.user_id', $user_id);
        return $this->db->get()->result();
    }
}
