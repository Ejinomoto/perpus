<?php
class M_GoogleBooks extends CI_Model
{
    public function searchBooks($query)
    {
        // API key and URL
        $apiKey = '///'; // Replace with your API key
        $apiUrl = 'https://www.googleapis.com/books/v1/volumes?q=' . urlencode($query) . '&key=' . $apiKey;

        // Fetch data from Google Books API
        $response = file_get_contents($apiUrl);
        return json_decode($response, true);
    }

    public function insertBook($bookData, $genres)
    {
        // Remove 'description' from the book data since it goes into a separate table
        $description = $bookData['description'];
        unset($bookData['description']);

        // Insert book into `books` table
        $this->db->insert('books', $bookData);
        $bookId = $this->db->insert_id();

        // Insert description into `book_description` table
        if (!empty($description)) {
            $this->db->insert('book_descriptions', [
                'book_id' => $bookId,
                'description' => $description,
            ]);
        }

        // Handle genres
        if (!empty($genres)) {
            $genresArray = explode(', ', $genres); // Split genres into an array
            foreach ($genresArray as $genre) {
                // Check if the genre exists, or insert it
                $this->db->select('genre_id');
                $this->db->where('name', $genre);
                $existingGenre = $this->db->get('genres')->row();

                if ($existingGenre) {
                    $genreId = $existingGenre->genre_id;
                } else {
                    $this->db->insert('genres', ['name' => $genre]);
                    $genreId = $this->db->insert_id();
                }

                // Link the book to the genre
                $this->db->insert('book_genres', [
                    'book_id' => $bookId,
                    'genre_id' => $genreId,
                ]);
            }
        }

        return $bookId;
    }


    public function addDescription($bookId, $description)
    {
        $data = [
            'book_id' => $bookId,
            'description' => $description,
        ];
        return $this->db->insert('book_descriptions', $data);
    }

    public function getDescriptionByBookId($bookId)
    {
        $this->db->select('description');
        $this->db->from('book_descriptions');
        $this->db->where('book_id', $bookId);
        return $this->db->get()->row()->description ?? null;
    }

    public function updateDescription($bookId, $description)
    {
        $this->db->where('book_id', $bookId);
        return $this->db->update('book_descriptions', ['description' => $description]);
    }
}
