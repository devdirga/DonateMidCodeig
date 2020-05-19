<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DonateModel extends CI_Model
{
    public function get()
    {
        return $this->db->get('donate');
    }

    public function get_by_slug($slug)
    {
        return $this->db->get_where('donate', array('slug' => $slug))->row();
    }

    public function insert($title, $slug, $description, $imageurl)
    {
        $data = array(
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'imageurl' => $imageurl
        );
        $this->db->insert('donate', $data);
    }

    public function update($id, $title, $slug, $description, $amount, $donatorCount)
    {
        $data = array(
            'title' => $title,
            'slug' => $slug,
            'amount' => $amount,
            'donatorcount' => $donatorCount,
            'description' => $description
        );

        $this->db->where('id', $id);
        $this->db->update('doante', $data);
    }

    public function delete($id)
    {
        $this->db->delete('donate', array('id' => $id));
    }
}