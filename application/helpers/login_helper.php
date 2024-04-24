<?php
defined('BASEPATH') or exit('No direct script access allowed');

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata('role_id');
        $main_menu = $ci->uri->segment(1);
        $sub_menu   = $ci->uri->segment(2);

        $ci->db->select('*')
            ->from('tb_menus')
            ->where('title', $main_menu)
            ->or_where('title', $sub_menu);
        $queryMenu = $ci->db->get()->row_array();

        if ($queryMenu) {
            $menu_id = $queryMenu['menu_id'];

            $userAccess = $ci->db->get_where('user_access_menu', [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]);
    
            if ($userAccess->num_rows() < 1) {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth/blocked');
        }

    }
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
