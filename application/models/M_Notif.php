<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Notif extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Simpan notifikasi baru
    public function add_notification($user_id, $message, $book_title)
    {
        $data = [
            'user_id' => $user_id,
            'message' => $message,
            'book_title' => $book_title,
            'is_read' => 0, // 0 = Belum dibaca
        ];
        return $this->db->insert('notifications', $data);
    }

    public function clear_notification($notif_id)
    {
        return $this->db->where('id', $notif_id)->delete('notifications');
    }



    // Ambil notifikasi berdasarkan user_id
    public function get_notifications($user_id)
    {
        return $this->db->where('user_id', $user_id)
            ->order_by('created_at', 'DESC')
            ->get('notifications')
            ->result();
    }

    // Tandai notifikasi sebagai telah dibaca
    public function mark_as_read($notif_id)
    {
        return $this->db->where('id', $notif_id)
            ->update('notifications', ['is_read' => 1]);
    }
}
