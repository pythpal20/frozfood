<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><?= $title ?></h2>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-4">
            <?= $this->session->flashdata('message'); ?>
            <div class="ibox">
                <div class="ibox-title">
                    <h5>User menu</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="toolbar">
                        <button class="btn btn-secondary tambah_a" data-toggle="tooltip" rel="tooltip" title="Tambah user menu"><i class="fa fa-plus"></i> Menu</button>
                    </div>
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            <?php foreach ($menux->result() as $me) : ?>
                                <?php if ($me->menu_level == 'main_menu') : ?>
                                    <li class="dd-item" data-id="<?= $me->menu_id; ?>">
                                        <div class="dd-handle"><?= $me->menu_order . " - " . $me->title; ?></div>
                                    </li>
                                <?php elseif($me->menu_level == 'header'): ?>
                                <li class="dd-item" data-id="<?= $me->menu_id; ?>">
                                    <div class="dd-handle"><?= $me->menu_order . " - " . $me->title; ?></div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="3">
                                            <div class="dd-handle">3
                                                - Adipiscing
                                                elit</div>
                                        </li>
                                        <li class="dd-item" data-id="4">
                                            <div class="dd-handle">4
                                                - Nonummy nibh</div>
                                        </li>
                                    </ol>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <li class="dd-item" data-id="2">
                                <div class="dd-handle">2 - Dolor
                                    sit</div>
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="3">
                                        <div class="dd-handle">3
                                            - Adipiscing
                                            elit</div>
                                    </li>
                                    <li class="dd-item" data-id="4">
                                        <div class="dd-handle">4
                                            - Nonummy nibh</div>
                                    </li>
                                </ol>
                            </li>
                            <li class="dd-item" data-id="5">
                                <div class="dd-handle">5 -
                                    Consectetuer</div>
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="6">
                                        <div class="dd-handle">6
                                            - Aliquam erat</div>
                                    </li>
                                    <li class="dd-item" data-id="7">
                                        <div class="dd-handle">7
                                            - Veniam quis</div>
                                    </li>
                                </ol>
                            </li>
                            <li class="dd-item" data-id="8">
                                <div class="dd-handle">8 -
                                    Tation ullamcorper</div>
                            </li>
                            <li class="dd-item" data-id="9">
                                <div class="dd-handle">9 - Ea
                                    commodo</div>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
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