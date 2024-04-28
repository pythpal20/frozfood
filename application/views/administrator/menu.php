<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?= $title ?></h2>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-6" id="vDefault">
            <?= $this->session->flashdata('message'); ?>
            <div class="ibox animated fadeInRight">
                <div class="ibox-title">
                    <h5>User menu</h5>
                    <div class="ibox-tools">
                        <button class="btn btn-xs btn-info viewTable" id="buttonChangeView"><i class="fa fa-table"></i> View</button>
                        <button class="btn btn-xs btn-success addMenu" data-toggle="tooltip" rel="tooltip" title="Tambah user menu"><i class="fa fa-plus"></i> Menu</button>
                    </div>
                </div>
                <div class="ibox-content animated bounceInDown" id="nest">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            <?php foreach ($menux->result() as $me) : ?>
                                <?php if ($me->menu_level == 'main_menu') : ?>
                                    <li class="dd-item animated bounceInRight" data-id="<?= $me->menu_id; ?>">
                                        <div class="dd-handle bg-primary"><?= $me->menu_order . " - " . $me->title; ?> </div>
                                    </li>
                                <?php elseif ($me->menu_level == 'header') : ?>
                                    <?php
                                    $level2 = "SELECT * FROM `tb_menus` WHERE `parent_id` = '$me->menu_id' AND `menu_level` = 'sub_menu_lv1' ORDER BY `menu_order`";
                                    $sublv = $this->db->query($level2)->result_array();

                                    // foreach($sublv AS $sl) :
                                    ?>
                                    <li class="dd-item animated bounceInRight" data-id="<?= $me->menu_id; ?>">
                                        <div class="dd-handle bg-info"><?= $me->menu_order . " - " . $me->title; ?> </div>
                                        <ol class="dd-list">
                                            <?php foreach ($sublv as $sl) : ?>
                                                <li class="dd-item animated bounceInRight" data-id="<?= $sl['menu_id'] ?>">
                                                    <div class="dd-handle"><?= $sl['menu_order'] ?> - <?= $sl['title'] ?> </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
                <div class="ibox-footer">
                    <small><sup class="text-danger">*</sup> Perubahan urutan menu lewat drag n' drop hanya antara main-header, sub-menu belum termasuk</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal window -->
<div class="modal inmodal animated fadeInRight" id="newMenu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('administrator/menu') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaMenu">Title</label>
                        <input type="text" class="form-control" name="namaMenu" id="namaMenu" placeholder="Fill in the menu name" value="<?= set_value('namaMenu') ?>">
                        <?= form_error('namaMenu', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="level">Menu Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="">~ Choose ~</option>
                            <option value="main_menu">Main Menu</option>
                            <option value="header">Header</option>
                            <option value="sub_menu_lv1">Sub-menu</option>
                        </select>
                        <?= form_error('level', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group d-none" id="parid">
                        <label for="parentid">Parent Menu</label>
                        <select name="parentid" id="parentid" class="form-control">
                            <option value="">~ Choose ~</option>
                            <?php foreach ($headmenu->result() as $hm) : ?>
                                <option value="<?= $hm->menu_id ?>"><?= $hm->title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" name="url" id="url" class="form-control" placeholder="Fill with url . ." value="<?= set_value('url') ?>">
                        <?= form_error('url', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group" id="dicon">
                        <label for="icon">Icon</label>
                        <select name="icon" id="icon" class="form-control chosen-icon">
                            <option value="">~ Choose ~</option>
                            <?php foreach ($ikon->result() as $ik) : ?>
                                <option value="<?= $ik->icon; ?>"><i class="<?= $ik->icon ?>"></i> <?= $ik->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-grpup">
                        <label for="order">Menu Order</label>
                        <input type="number" name="order" id="order" min="1" class="form-control" value="<?= set_value('order') ?>">
                        <?= form_error('order', '<small class="text-danger">', '</small>') ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script async>
    let changeOrder = "<?= base_url('administrator/updateNestable') ?>";
    let viewTable = "<?= base_url('administrator/tableView'); ?>";
    let viewList = "<?= base_url('administrator/listView'); ?>";
</script>