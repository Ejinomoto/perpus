<?php

class M_Details extends CI_Model
{
    public function get_book_by_id($book_id)
    {
        $this->db->select('
            books.book_id,
            books.title,
            books.publisher,
            books.published_date,
            books.type,
            books.author,
            books.gambar,
            book_descriptions.description,
            GROUP_CONCAT(genres.name SEPARATOR ", ") as genre_names
        ');
        $this->db->from('books');
        $this->db->join('book_descriptions', 'books.book_id = book_descriptions.book_id', 'left');
        $this->db->join('book_genres', 'books.book_id = book_genres.book_id', 'left');
        $this->db->join('genres', 'book_genres.genre_id = genres.genre_id', 'left');
        $this->db->where('books.book_id', $book_id);
        $this->db->group_by('books.book_id, books.title, books.publisher, books.type, books.author, books.gambar, book_descriptions.description'); // Add non-aggregated columns here

        return $this->db->get()->row_array();
    }
}
