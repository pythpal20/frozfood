<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?= $title ?></h2>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Management Roles Of User</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="toolbar">
                        <button class="btn btn-secondary tambah" data-toggle="tooltip" rel="tooltip" title="Tambah Roles"><i class="fa fa-plus"></i> Role</button>
                    </div>
                    <table id="tb_role" class="table table-hover" data-show-toggle="true" data-show-pagination-switch="true" data-show-columns="true" data-mobile-responsive="true" data-check-on-init="true" data-advanced-search="true" data-id-table="advancedTable" data-show-columns-toggle-all="true"></table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" data-backdrop="static" data-keyboard="false" id="newRole" tabindex="-1" aria-labelledby="newRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleLabel">Add User Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormRole">
                    <div class="form-group">
                        <label for="nrole">Nama Role</label>
                        <input type="text" class="form-control" name="nrole" id="nrole" placeholder="Isi nama role">
                    </div>
                    <div class="form-group">
                        <label for="nketerangan">Keterangan</label>
                        <input type="text" class="form-control" name="nketerangan" id="nketerangan" placeholder="Isi Keterangan">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary sippan">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    let tabelRole = "<?= base_url('administrator/getRoles') ?>";
    let addRole = "<?= base_url("administrator/simpanRole"); ?>";
    let alertSuccess = "<?= $this->session->flashdata('message'); ?>";
</script>