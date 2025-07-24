<?php
class M_Genre extends CI_Model
{
    public function getAll()
    {
        // Retrieve only rooms that are not marked as deleted
        return $this->db->get('genres');
    }

    public function deleteBook($genre_id)
    {
        $this->db->where('genre_id', $genre_id);
        return $this->db->delete('genres');
    }

    // Add this method to get a room by its ID (excluding deleted rooms)
    public function get_by_id($genre_id)
    {
        $this->db->where('genre_id', $genre_id);
        return $this->db->get('genres')->row();
    }

    public function update_genre($genre_id, $genre_name)
    {
        $data = [
            'name' => $genre_name
        ];

        $this->db->where('genre_id', $genre_id);
        return $this->db->update('genres', $data);
    }
}
