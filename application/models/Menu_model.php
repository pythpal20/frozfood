<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function update_menu($menu_id, $data)
    {
        $this->db->where('menu_id', $menu_id);
        $this->db->update('tb_menus', $data);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function selectRole()
    {
        $this->db->SELECT('*');
        $this->db->FROM('user_role');
        $this->db->ORDER_BY('role_id', 'DESC');
        $query = $this->db->get();

        return $query;
    }
}
