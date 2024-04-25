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
<script>
    $(document).ready(function() {
        $(".addMenu").click(function() {
            $("#newMenu").modal('show');
            $(".chosen-icon").chosen();

            $("#level").on('change', function() {
                var mlv = $(this).val();
                var title = $("#namaMenu").val();
                if (mlv == 'sub_menu_lv1') {
                    $("#parid").removeClass('d-none');
                    $("#dicon").addClass('d-none');
                    $("#icon").val("");
                } else {
                    $("#parid").addClass('d-none');
                    $("#dicon").removeClass('d-none');
                    $('#parentid').val("");

                    if (checkForSpace(title)) {
                        $("#newMenu").modal('hide');
                        Swal.fire({
                            title: 'Nama menu salah',
                            text: 'Tidak boleh mengandung <spasi> untuk Header dan Main Menu',
                            icon: 'warning',
                            showCancelButton: false
                        }).then((namaMenu) => {
                            if (namaMenu.isConfirmed) {
                                $("#namaMenu").val("");
                                $("#newMenu").modal('show');
                            }
                        })
                    }
                }
            });
        });

        function updateOutput(e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('administrator/updateNestable') ?>", // Ganti dengan URL ke controller Anda yang akan menangani penyimpanan perubahan urutan menu
                    data: {
                        menu_data: window.JSON.stringify(list.nestable('serialize'))
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'success') {
                            // Handle jika penyimpanan berhasil
                            console.log('Perubahan urutan menu disimpan.');
                        } else {
                            // Handle jika terjadi kesalahan saat penyimpanan
                            console.log('Gagal menyimpan perubahan urutan menu.');
                        }
                    },
                    error: function() {
                        // Handle jika terjadi kesalahan pada saat melakukan request AJAX
                        console.log('Terjadi kesalahan saat melakukan request AJAX.');
                    }
                });
            } else {
                // Jika browser tidak mendukung JSON
                console.log('Browser tidak mendukung JSON.');
            }
        }
        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1
        }).on('change', updateOutput);

        $('#nestable-menu').on('click', function(e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });
    });

    function checkForSpace(str) {
        return str.indexOf(' ') !== -1;
    }
</script>