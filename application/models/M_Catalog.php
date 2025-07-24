<?php

class M_Catalog extends CI_Model
{
    public function get_books($limit, $start)
    {
        $this->db->select('
            books.book_id, 
            books.title, 
            books.author, 
            books.gambar, 
            books.type,
            GROUP_CONCAT(genres.name SEPARATOR ", ") as genre_names
        ');
        $this->db->from('books');
        $this->db->join('book_genres', 'books.book_id = book_genres.book_id', 'left');
        $this->db->join('genres', 'book_genres.genre_id = genres.genre_id', 'left');
        $this->db->group_by('books.book_id');
        $this->db->limit($limit, $start > 0 ? $start : 0); // Ensure offset is valid
        return $this->db->get()->result_array();
    }

    public function count_books_by_genre($genre)
    {
        $this->db->from('books');
        $this->db->join('book_genres', 'books.book_id = book_genres.book_id', 'left');
        $this->db->join('genres', 'book_genres.genre_id = genres.genre_id', 'left');
        $this->db->where("genres.name", $genre);
        return $this->db->count_all_results();
    }

    public function get_random_books($limit = 4)
    {
        $this->db->select('
        books.book_id, 
        books.title, 
        books.author, 
        books.gambar, 
        books.type,
        GROUP_CONCAT(genres.name SEPARATOR ", ") as genre_names
    ');
        $this->db->from('books');
        $this->db->join('book_genres', 'books.book_id = book_genres.book_id', 'left');
        $this->db->join('genres', 'book_genres.genre_id = genres.genre_id', 'left');
        $this->db->group_by('books.book_id');
        $this->db->order_by('RAND()'); // Randomize results
        $this->db->limit($limit); // Get only 4 random books

        return $this->db->get()->result_array();
    }



    public function get_books_by_genre($genre, $limit, $start)
    {
        $this->db->select('
            books.book_id, 
            books.title, 
            books.author, 
            books.gambar, 
            books.type,
            GROUP_CONCAT(genres.name SEPARATOR ", ") as genre_names
        ');
        $this->db->from('books');
        $this->db->join('book_genres', 'books.book_id = book_genres.book_id', 'left');
        $this->db->join('genres', 'book_genres.genre_id = genres.genre_id', 'left');
        $this->db->where('genres.name', $genre);
        $this->db->group_by('books.book_id');
        $this->db->limit($limit, $start);

        return $this->db->get()->result_array();
    }


    public function get_genres()
    {
        return $this->db->get('genres')->result_array();
    }

    public function count_books()
    {
        return $this->db->count_all('books'); // Total book count for pagination
    }
}
