<?php
class M_buku extends CI_Model
{
    public function insert_book($data)
    {
        $this->db->insert('books', $data);
        return $this->db->insert_id();
    }

    public function countBooksByType($type)
    {
        $this->db->where('type', $type);
        return $this->db->count_all_results('books'); // Change 'buku' to your actual table name
    }

    public function insert_book_genre($book_id, $genre_id)
    {
        $data = [
            'book_id' => $book_id,
            'genre_id' => $genre_id
        ];
        $this->db->insert('book_genres', $data);
    }

    public function insert_book_description($book_id, $description)
    {
        $data = [
            'book_id' => $book_id,
            'description' => $description
        ];
        $this->db->insert('book_descriptions', $data);
    }

    public function getAll()
    {
        $this->db->select('
            books.*, 
            GROUP_CONCAT(DISTINCT genres.name ORDER BY genres.name SEPARATOR ", ") AS genre_names, 
            GROUP_CONCAT(DISTINCT genres.genre_id ORDER BY genres.genre_id SEPARATOR ",") AS genre_ids,
            MAX(book_descriptions.description) AS description
        ');
        $this->db->from('books');
        $this->db->join('book_genres', 'books.book_id = book_genres.book_id', 'left');
        $this->db->join('genres', 'book_genres.genre_id = genres.genre_id', 'left');
        $this->db->join('book_descriptions', 'books.book_id = book_descriptions.book_id', 'left');
        $this->db->group_by('books.book_id');

        return $this->db->get();
    }

    public function get_by_id($book_id)
    {
        $this->db->where('book_id', $book_id);
        return $this->db->get('books')->row();
    }


    public function get_books_by_genre($genre_id)
    {
        $this->db->select('books.*');
        $this->db->from('books');
        $this->db->join('book_genres', 'books.book_id = book_genres.book_id');
        $this->db->where('book_genres.genre_id', $genre_id);
        return $this->db->get()->result();
    }

    public function get_all_books()
    {
        return $this->db->get('books')->result();
    }


    public function get_user_by_role($role)
    {
        $this->db->where('role', $role);
        $query = $this->db->get('users'); // 'users' is your table name
        return $query->row(); // Return the first result as an object
    }

    public function deleteBook($book_id)
    {
        $this->db->where('book_id', $book_id);
        return $this->db->delete('books');
    }
}
