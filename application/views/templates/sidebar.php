<?php
$tim = $this->db->get_where('user_role', ['role_id' => $user['role_id']])->row_array();
$keys = "J35u5!5Gr8G0d";
$encrypter = encrypt_data($user['user_id'], $keys);
?>
<nav class="navbar-default navbar-static-side " role="navigation">
    <div class="sidebar-collapse">
        <a class="close-canvas-menu"><i class="fa fa-times"></i></a> <!-- 230417 ~ full page -->
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="" src="<?= base_url('assets') ?>/images/system/logof.png" width="68%" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"><?= $tim['role'] ?></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="<?= base_url('dashboard/editProfil/') . $encrypter ?>"><i class="fa fa-user-circle"></i> <?= $user['user_name'] ?></a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa fa-envelope-square"></i> <?= $user['email'] ?></a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item ubahPassword" data-id="<?= $user['user_id'] ?>" href="#">Change Password</a>
                    </ul>
                </div>
                <div class="logo-element">
                    POS
                </div>
            </li>
            <hr class="hr-line-solid divider">
            <!-- query menu -->
            <?php
            $roleID = $this->session->userdata('role_id');
            $queryMenu = "SELECT `tb_menus`.`menu_id`, `tb_menus`.`title`, `tb_menus`.`menu_level`, `tb_menus`.`url`, `tb_menus`.`icon`, `tb_menus`.`parent_id`
                FROM `tb_menus` 
                JOIN `user_access_menu` ON `tb_menus`.`menu_id` = `user_access_menu`.`menu_id`
            WHERE `user_access_menu`.`role_id` = $roleID AND `tb_menus`.`is_active` = '1' AND `tb_menus`.`menu_level` = 'main_menu' OR `tb_menus`.`menu_level` = 'header' 
            ORDER BY `tb_menus`.`menu_order` ASC";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>
            <!-- Looping data Menu -->
            <?php foreach ($menu as $m) { ?>
                <!-- submenu -->
                <?php if ($m['menu_level'] == 'main_menu') : ?>
                    <?php if ($title == $m['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a href="<?= base_url($m['url']) ?>">
                            <i class="<?= $m['icon'] ?>"></i>
                            <span class="nav-label"><?= $m['title'] ?></span>
                        </a>
                        </li>
                    <?php elseif ($m['menu_level'] == 'header') : ?>
                        <?php $dimana = $this->uri->segment(1); ?>
                        <?php if ( strtoupper($dimana ) == strtoupper($m['title'])) : ?>
                            <li class="active">
                            <?php else : ?>
                            <li>
                            <?php endif; ?>
                            <a href="<?= base_url($m['url']) ?>"><i class="<?= $m['icon'] ?>"></i> <span class="nav-label"><?= $m['title'] ?></span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <?php
                                $parentID   = $m['menu_id'];
                                $querySubmenu = "SELECT * FROM `tb_menus` WHERE `parent_id` = '$parentID' AND `menu_level` = 'sub_menu_lv1' ORDER BY `menu_order` ASC";
                                $subMenu = $this->db->query($querySubmenu)->result_array();

                                foreach ($subMenu as $sm) :
                                ?>
                                    <?php if ($title == $sm['title']) : ?>
                                        <li class="active">
                                        <?php else : ?>
                                        <li>
                                        <?php endif; ?>
                                        <a href="<?= base_url($sm['url']) ?>"><?= $sm['title'] ?></a>
                                        </li>
                                    <?php endforeach; ?>
                            </ul>
                            </li>
                        <?php endif; ?>
                    <?php } ?>
        </ul>

    </div>
</nav>