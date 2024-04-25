<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?= $title ?></h2>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <div class="ibox">
                <div class="ibox-title">
                    <h5>User menu</h5>
                    <div class="ibox-tools">
                        <button class="btn btn-xs btn-secondary addMenu" data-toggle="tooltip" rel="tooltip" title="Tambah user menu"><i class="fa fa-plus"></i> Menu</button>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            <?php foreach ($menux->result() as $me) : ?>
                                <?php if ($me->menu_level == 'main_menu') : ?>
                                    <li class="dd-item" data-id="<?= $me->menu_id; ?>">
                                        <div class="dd-handle"><?= $me->menu_order . " - " . $me->title; ?> <span class="label float-right ml-1 edit" data-menuid="<?= $me->menu_id ?>"><i class="fa fa-pencil"></i></span> <span class="label float-right hapus" data-menuid="<?= $me->menu_id ?>"><i class="fa fa-minus"></i></span></div>
                                    </li>
                                <?php elseif ($me->menu_level == 'header') : ?>
                                    <?php
                                    $level2 = "SELECT * FROM `tb_menus` WHERE `parent_id` = '$me->menu_id' AND `menu_level` = 'sub_menu_lv1' ORDER BY `menu_order`";
                                    $sublv = $this->db->query($level2)->result_array();

                                    // foreach($sublv AS $sl) :
                                    ?>
                                    <li class="dd-item" data-id="<?= $me->menu_id; ?>">
                                        <div class="dd-handle"><?= $me->menu_order . " - " . $me->title; ?> <span class="label float-right ml-1 edit" data-menuid="<?= $me->menu_id ?>"><i class="fa fa-pencil"></i></span> <span class="label float-right hapus" data-menuid="<?= $me->menu_id ?>"><i class="fa fa-minus"></i></span></div>
                                        <ol class="dd-list">
                                            <?php foreach ($sublv as $sl) : ?>
                                                <li class="dd-item" data-id="<?= $sl['menu_id'] ?>">
                                                    <div class="dd-handle"><?= $sl['menu_order'] ?> - <?= $sl['title'] ?> <span class="label float-right ml-1 edit" data-menuid="<?= $sl['menu_id'] ?>"><i class="fa fa-pencil"></i></span> <span class="label float-right hapus" data-menuid="<?= $sl['menu_id'] ?>"><i class="fa fa-minus"></i></span></div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Sub menu</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="toolbar2">
                        <button class="btn btn-secondary tambah_b" data-toggle="tooltip" rel="tooltip" title="Tambah user menu"><i class="fa fa-plus"></i> Sub Menu</button>
                    </div>
                    <table id="table_b" class="table table-hover" data-show-toggle="true" data-show-pagination-switch="true" data-page-size="5" data-show-columns="true" data-mobile-responsive="true" data-advanced-search="true" data-id-table="advancedTable" data-check-on-init="true" data-advanced-search="true" data-id-table="advancedTable" data-show-columns-toggle-all="true"></table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal window -->
<div class="modal inmodal fadeIn" id="newMenu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuLabel">Add Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormMenu">
                    <div class="form-group">
                        <label for="namaMenu">Title</label>
                        <input type="text" class="form-control" name="namaMenu" id="namaMenu" placeholder="Fill in the menu name">
                    </div>
                    <div class="form-group">
                        <label for="level">Menu Level</label>
                        <select name="level" id="level" class="form-control">
                            <option value="">~ Choose ~</option>
                            <option value="main_menu">Main Menu</option>
                            <option value="header">Header</option>
                            <option value="sub_menu_lv1">Sub-menu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="parentid">Parent Menu</label>
                        <select name="parentid" id="parentid" class="form-control">
                            <option value="">~ Choose ~</option>
                            <?php foreach($headmenu->result() as $hm) : ?>
                            <option value="<?= $hm->menu_id ?>"><?= $hm->title; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary sippan" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".addMenu").click(function() {
            $("#newMenu").modal('show');
        });
    });
</script>