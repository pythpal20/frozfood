<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    protected $additionaljs;
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('Staylogin');
        $this->staylogin->check_and_extend_session();

        $this->additionaljs = array();
    }

    public function menu()
    {

        $this->form_validation->set_rules('namaMenu', 'Title', 'trim|required');
        $this->form_validation->set_rules('level', 'Menu Level', 'trim|required');
        $this->form_validation->set_rules('url', 'Menu URL', 'trim|required');
        $this->form_validation->set_rules('order', 'Menu Order', 'trim|required');

        if ($this->form_validation->run() ==  FALSE) {
            # code...
            $data['title']  = "Menu Management";
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $this->db->order_by('menu_order', 'asc');
            $data['menux']      = $this->db->get('tb_menus');
            $data['headmenu']   = $this->db->get_where('tb_menus', ['menu_level' => 'header']);
            $data['ikon']       = $this->db->get('tb_icon');

            $add['additionalJs'] = 'assets/js/custome-menu.js';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/headbar', $data);
            $this->load->view('administrator/menu', $data);
            $this->load->view('templates/footer', $add);
        } else {
            # code...
            $namaMenu   = $this->input->post('namaMenu');
            $level      = $this->input->post('level');
            $parentid   = $this->input->post('parentid');
            $url        = $this->input->post('url');
            $icon       = $this->input->post('icon');
            $order      = $this->input->post('order');

            if ($level == 'sub_menu_lv1') {
                $destinationUrl = explode("/", $url)[1];

                $data = [
                    'parent_id' => $parentid,
                    'title'     => $namaMenu,
                    'url'       => $url,
                    'destinationUrl'    => $destinationUrl,
                    'menu_level'    => $level,
                    'createdby'     => $this->session->userdata('nama_lengkap'),
                    'createdtime'   => time(),
                    'menu_order'    => $order
                ];
            } else {
                $data = [
                    'title'     => $namaMenu,
                    'url'       => $url,
                    'icon'      => $icon,
                    'menu_level'    => $level,
                    'createdby'     => $this->session->userdata('nama_lengkap'),
                    'createdtime'   => time(),
                    'menu_order'    => $order
                ];
            }

            if ($this->db->insert('tb_menus', $data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
                redirect('administrator/menu');
            }
        }
    }

    private function menuName($id)
    {
        $nm = $this->db->get_where('tb_menus',['menu_id' => $id])->row_array();
        return $nm['title'];
    }

    public function tableView()
    {
        $output = '';
        $this->db->order_by('menu_order', 'asc');
        $this->db->order_by('menu_level', 'asc');
        $menu   = $this->db->get('tb_menus');

        $output .= '<table class="table table-bordered table-striped-columns nestbl" id="nestbl" data-show-search-clear-button="true">
            <thead>
                <tr>
                    <th data-sortable="true">No.</th>
                    <th data-sortable="true">Menu Name</th>
                    <th data-sortable="true">Menu Level</th>
                    <th data-sortable="true">Menu Parent</th>
                    <th data-sortable="true">URL</th>
                    <th data-sortable="true">Icon</th>
                    <th data-sortable="true">Order</th>
                    <th>Act.</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($menu->result() as $key => $row) {
            $no = $key + 1;
            // Jika parent id nya 0
            $parent = $row->parent_id ? $this->menuName($row->parent_id) : '<i>(None)</i>';
            $output .='<tr>
            <td>'. $no++ .'</td>';
            if($row->menu_level == 'sub_menu_lv1') { 
                $output .='<td class="text-right">'.$row->title .'</td>';
            } else {
                $output .='<td class="table-info text-black">'.$row->title .'</td>';
            }
                $output .= '<td>'.$row->menu_level .'</td>
                <td>'. $parent . '</td>
                <td>'. $row->url . '</td>
                <td class="text-center"><i class="' . $row->icon  . '"></i></td>
                <td>'. $row->menu_order . '</td>
                <td class="text-center"><button class="btn btn-success btn-xs btnEdit" data-id="' . $row->menu_id . '" data-order="' . $row->menu_order . '"><i class="fa fa-edit"></i></button></td>
            </tr>';
        }
        $output .= '</tbody>
        </table>';

        echo $output;
    }

    public function listView()
    {
        $output = '';
        $this->db->order_by('menu_order', 'asc');
        $menu   = $this->db->get('tb_menus');

        $output .='<div class="dd" id="nestable">
                        <ol class="dd-list">';
                            foreach ($menu->result() as $me) {
                                if ($me->menu_level == 'main_menu') {
                                    $output .='<li class="dd-item animated bounceInRight" data-id="' . $me->menu_id . '">
                                        <div class="dd-handle bg-primary">' . $me->menu_order . ' - ' . $me->title . '</div>
                                    </li>';
                                } elseif ($me->menu_level == 'header') {
                                    $level2 = "SELECT * FROM `tb_menus` WHERE `parent_id` = '$me->menu_id' AND `menu_level` = 'sub_menu_lv1' ORDER BY `menu_order`";
                                    $sublv = $this->db->query($level2)->result_array();
                                    $output .='<li class="dd-item animated bounceInRight" data-id="' . $me->menu_id . '">
                                        <div class="dd-handle bg-info">' . $me->menu_order . ' - ' . $me->title . '</div>
                                        <ol class="dd-list">';
                                            foreach ($sublv as $sl) {
                                                $output .='<li class="dd-item animated bounceInRight" data-id="' . $sl['menu_id'] . '">
                                                    <div class="dd-handle">'. $sl['menu_order'] . ' - ' . $sl['title'] .'</div>
                                                </li>';
                                            }
                                        $output .='</ol>
                                    </li>';
                                        }
                                    }
                        $output .='</ol>
                    </div>';
        echo $output;
    }

    public function updateNestable()
    {
        $menu_data = $this->input->post('menu_data');

        $menu_data_array = json_decode($menu_data, true);

        $this->recursive_save_menu_order($menu_data_array);

        header('Content-Type: application/json');
        echo json_encode(array('status' => 'success'));
        // echo $this->recursive_save_menu_order($menu_data_array);
    }

    private function recursive_save_menu_order($menu_data_array, $parent_id = 0)
    {
        // $data = array();
        $menu_order = 0;
        $submenu_order = 0;
        foreach ($menu_data_array as $key => $menu_item) {
            // Update urutan menu
            $menu_id = $menu_item['id'];
            $menu = $this->db->get_where("tb_menus", ["menu_id" => $menu_id])->result();
            $menu_type  = $menu[0]->menu_level;
            $par_id     = $menu[0]->parent_id;
            // $data[] = array($menu_item['']);

            $data = [];
            $data[$key] = $menu_item;
            if ($par_id == 'null') {
                $menu_order++;
                $order = $menu_order;
                if ($menu_type == 'header') {
                    $type = 'header';
                    // $this->db->set('parent_id', $menu_item['id']);
                    $this->db->set('menu_order', $order);
                    $this->db->set('menu_level', $type);
                    $this->db->where('menu_id', $menu_id);
                    $this->db->update('tb_menus');
                } else if ($menu_type == 'main_menu') {
                    $type = 'main_menu';
                    // $this->db->set('parent_id', $menu_item['id']);
                    $this->db->set('menu_order', $order);
                    $this->db->set('menu_level', $type);
                    $this->db->where('menu_id', $menu_id);
                    $this->db->update('tb_menus');
                } else {
                    $type = 'sub_menu_lv1';
                    $this->db->set('parent_id', $menu_item['id']);
                    $this->db->set('menu_order', $order);
                    $this->db->set('menu_level', $type);
                    $this->db->where('menu_id', $menu_id);
                    $this->db->update('tb_menus');
                }
            } else {
                $submenu_order++;
                $order = $submenu_order;
                if ($menu_type == 'header') {
                    $type = 'header';
                    // $this->db->set('parent_id', $menu_item['id']);
                    $this->db->set('menu_order', $order);
                    $this->db->set('menu_level', $type);
                    $this->db->where('menu_id', $menu_id);
                    $this->db->update('tb_menus');
                } elseif ($menu_type == 'main_menu') {
                    $type = 'main_menu';
                    // $this->db->set('parent_id', $menu_item['id']);
                    $this->db->set('menu_order', $order);
                    $this->db->set('menu_level', $type);
                    $this->db->where('menu_id', $menu_id);
                    $this->db->update('tb_menus');
                } else {
                    $type = 'sub_menu_lv1';
                    $this->db->set('parent_id', $menu_item['id']);
                    $this->db->set('menu_order', $order);
                    $this->db->set('menu_level', $type);
                    $this->db->where('menu_id', $menu_id);
                    $this->db->update('tb_menus');
                }
            }

            // $sql = "Update tb_menus SET parent_id =" . $menu_item['id'] . ", menu_order=" . $order . ", menu_level='" . $type . "' WHERE menu_id=" . $menu_id;
            // $this->db->query($sql);


            // // Jika menu item memiliki sub-menu, panggil rekursif untuk menyimpan sub-menu
            // if (!empty($menu_item['children'])) {
            //     $this->recursive_save_menu_order($menu_item['children'], $menu_id);
            // }
        }
        // return json_encode($data);
    }

    public function user_menu()
    {
        $this->load->model("m_menu");
        $menus = $this->m_menu->selectMenu();
        $data = array();
        $no = 1;

        foreach ($menus->result() as $mn) {
            $data[] = array(
                'no'    => $no++,
                'id'    => $mn->id,
                'menu'  => $mn->menu
            );
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function user_submenu()
    {
        $this->load->model("m_menu");
        $submenu = $this->m_menu->selectsubMenu();
        $data = array();
        $no = 1;

        foreach ($submenu->result() as $sm) {
            $data[] = array(
                'no'        => $no++,
                'title'     => $sm->title,
                'menu'      => $sm->menu,
                'url'       => $sm->url,
                'icon'      => $sm->icon,
                'active'    => $sm->is_active,
                'id'        => $sm->id
            );
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function disableSubMenu()
    {
        $id = $this->input->post('id');
        $action = $this->input->post('act');

        if ($action == 'disable') {
            $data = array('is_active' => '0');
            $pesan = 'Submenu has been disabled';
        } elseif ($action == 'enable') {
            $data = array('is_active' => '1');
            $pesan = 'Submenu has been enabled';
        }

        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);

        $response = array(
            'status'    => 'success',
            'message'   => $pesan
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function role()
    {
        $data['title']  = 'User Role';
        $data['user']   = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menux']  = $this->db->get('tb_menus')->result_array();

        $add['additionalJs'] = 'assets/js/custome-role.js';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/headbar', $data);
        $this->load->view('administrator/user_roles', $data);
        $this->load->view('templates/footer', $add);
    }

    public function getRoles()
    {
        $this->load->model("menu_model");
        $role = $this->menu_model->selectRole();
        $data = array();
        $no = 1;

        foreach ($role->result() as $r) {
            $data[] = array(
                'no'    => $no++,
                'id'    => $r->role_id,
                'role'  => $r->role,
                'ket'   => $r->keterangan
            );
        }
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function simpanRole()
    {

        $data = [
            'role' => $this->input->post('nrole'),
            'keterangan' => $this->input->post('nketerangan')
        ];

        $result = $this->db->get_where('user_role', $data);

        if ($result->num_rows() > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Roles ini sudah ada!</div>');
        } else {
            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role baru ditambahkan!</div>');
        }
    }

    public function editRole()
    {
        // var_dump($this->input->post());
        $id     = $this->input->post('xid');
        $nama   = $this->input->post('xrole');
        $ket    = $this->input->post('xketerangan');

        $data = [
            'role'          => htmlspecialchars($nama),
            'keterangan'    => htmlspecialchars($ket)
        ];

        $this->db->where('role_id', $id);
        $this->db->update('user_role', $data);
    }

    public function setAccess($encryptedData)
    {
        $key = "G@ruda7577";
        $id = decryptData($encryptedData, $key);

        $data['title'] = 'User Role';
        $data['user'] = $this->db->get_where('tb_user', ['TXT_EMAIL' => $this->session->userdata('email')])->row_array();
        $data['rar'] = $this->db->get_where('role_access_rights', ['id' => $this->session->userdata('rar_id')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['role_id' => $id])->row_array();

        $this->db->where('id !=', 2);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['jumlah'] = count($data['menu']);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/headbar', $data);
        $this->load->view('administrator/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
    public function simpanMenu()
    {
        $data = [
            'menu' => $this->input->post('namaMenu')
        ];
        $sippan = $this->db->insert('user_menu', $data);

        if ($sippan) {
            $this->load->helper('file');
            $nama_file = "application/controllers/" . $this->input->post('namaMenu') . ".php";

            $isi_file = "<?php
            defined('BASEPATH') or exit('No direct script access allowed');
            
            class " . $this->input->post('namaMenu') . " extends CI_Controller
            {
                public function __construct()
                {
                    parent::__construct();
                    is_logged_in();
                }
            }";
            write_file($nama_file, $isi_file);
        }
    }

    public function simpansubMenu()
    {
        $data = [
            'menu_id'   => $this->input->post('menu_root'),
            'title'     => $this->input->post('title'),
            'url'       => $this->input->post('urls'),
            'icon'      => $this->input->post('icon'),
            'is_active' => $this->input->post('isactive'),
            'created_date'  => time(),
            'created_by'    => $this->input->post('nuser')
        ];
        $this->db->insert('user_sub_menu', $data);
    }

    public function hapusMenu()
    {
        $id = $this->input->post('id');

        $this->db->where('id', $id);
        $this->db->delete('user_menu');

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu sudah dihapus!</div>');
    }
}
