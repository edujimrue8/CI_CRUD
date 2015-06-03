<?php

class Users_model extends CI_Model 
{
    /* 
    * Get User or Users
    *
    * @param - $id_user (int)
    */
    public function get($id)
    {
        $this->db->where('id_user', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    /* 
    * Get All Users
    *
    * @param - $order_by(string)
    * @param - $sort(string)
    * @param - $limit(int)
    * @param - $offset(int)
    *
    */
    public function get_all($order_by = null, $sort = 'DESC', $limit = null, $start = 0) 
    {
        $this->db->select('*');
        $this->db->from('users');
        if($limit != null){
            $this->db->limit($limit, $start);
        }
        if($order_by != null){
            $this->db->order_by($order_by, $sort);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    /* 
    * Get Num Rows
    *
    * @param - $id_user (int)
    */
    public function get_count()
    {
        $this->db->select('id_user');
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    /* 
    * Insert User
    *
    * @param - $id_user (int)
    */
    public function insert($data)
    {
        $insert = $this->db->insert('users', $data);
        return $insert;
    }

    /* 
    * Update User
    *
    * @param - $id_user (int)
    */
    public function update($id, $data)
    {
        $this->db->where('id_user', $id);
        $update = $this->db->update('users', $data);
        return $update;
    }

    /* 
    * Deleted User
    *
    * @param - $id_user (int)
    */
    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('users');
    }

    /* 
    * Disable User
    *
    * @param - $id_user (int)
    */
    public function enable($id) 
    {
        $this->db->set('active', 1);
        $this->db->where('id_user', $id);
        $this->db->update('users');
    }

    /* 
    * Enable User
    *
    * @param - $id_user (int)
    */
    public function disable($id) 
    {
        $this->db->set('active', 0);
        $this->db->where('id_user', $id);
        $this->db->update('users');
    }
}
