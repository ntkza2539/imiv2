<?php $this->extend('layouts/tem_backend/main'); ?>
<?php $this->section('content'); ?>



<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= lang('Backend_table_menu.' . 'Menu Table'); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"><?= lang('Backend_table_menu.' . 'Home'); ?></a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                        <span class="btn btn-success col fileinput-button" data-toggle="modal" data-target="#addmenuModal">
                            <i class="fas fa-plus"></i>
                            <span><?= lang('Backend_table_menu.' . 'ADD MENU'); ?></span>
                        </span>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="mytable" class="table table-bordered table-hover">
                            <thead>
                                <tr align="center">
                                    <th><?= lang('Backend_table_menu.' . 'NameMenu'); ?></th>
                                    <th><?= lang('Backend_table_menu.' . 'IconMenu'); ?></th>
                                    <th><?= lang('Backend_table_menu.' . 'LinkMenu'); ?></th>
                                    <th><?= lang('Backend_table_menu.' . 'GroupMenu'); ?></th>
                                    <th><?= lang('Backend_table_menu.' . 'Header'); ?></th>
                                    <th><?= lang('Backend_table_menu.' . 'Action'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (json_decode($listmenu) as $k_listmenu => $v_listmenu) { ?>
                                    <tr>
                                        <td><?= lang('Backend_table_menu.' . $v_listmenu->menu_name); ?></td>
                                        <td><i class="fas <?= $v_listmenu->menu_icon ?>"></i> <?= $v_listmenu->menu_icon ?> </td>
                                        <td><?= ($v_listmenu->menu_link == '') ? 'หัวข้อใหญ่' : $v_listmenu->menu_link ?></td>
                                        <td align="center"><?= $v_listmenu->menu_group ?></td>
                                        <td align="center"><?= ($v_listmenu->parent_menu != 0) ? $v_listmenu->hname : '-' ?></td>
                                        <td align="center"><i style="cursor:pointer;" data-edit="<?= htmlspecialchars(json_encode($v_listmenu, JSON_UNESCAPED_UNICODE), ENT_COMPAT); ?>" class="fas fa-edit"></i> |
                                            <i style="cursor:pointer;" data-del="<?= htmlspecialchars(json_encode($v_listmenu, JSON_UNESCAPED_UNICODE), ENT_COMPAT); ?>" class="fas fa-trash-alt"></i>
                                        </td>
                                    </tr>

                                <?php  } ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- modal add menu -->
<div class="modal fade" id="addmenuModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('Backend_table_menu.' . 'ADD MENU'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="F_add" action="<?= base_url('backend/Fmenu/menu/add_menu') ?>" method="POST">
                    <div class="row col-12">
                        <div class="input-group col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'Group'); ?></span>
                            </div>
                            <input type="text" list="list_gruop" name="group_menu" id="group_menu" class="form-control" required>
                            <?php $data_menu_group = [];
                            foreach (json_decode($listmenu) as $k_listmenu => $v_listmenu) {
                                if (!in_array($v_listmenu->menu_group, $data_menu_group)) {
                                    array_push($data_menu_group, $v_listmenu->menu_group);
                                }
                            } ?>
                            <datalist id="list_gruop">
                                <?php
                                foreach ($data_menu_group as $dt) { ?>
                                    <option value="<?= lang('Backend_table_menu.' . $dt); ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                    </div>
                    <br>
                    <div class="row col-12">
                        <div class="input-group col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'Type Menu'); ?></span>
                            </div>
                            <select class="form-control" id="type_menu" name="type_menu" onchange="javascript: 
                            if(this.value == 1){ $('#head_menu').attr('readonly',true); 
                                $('#sub_menu').attr('readonly',true); $('#list_menu').attr('readonly',false); $('#icon_menu_sub').attr('readonly',true);}
                            else if(this.value == 0){ $('#head_menu').attr('readonly',true);  $('#sub_menu').attr('readonly',true); $('#list_menu').attr('readonly',true); $('#icon_menu_sub').attr('readonly',true);}
                            else{ $('#head_menu').attr('readonly',false);  $('#sub_menu').attr('readonly',false); $('#list_menu').attr('readonly',true); $('#icon_menu_sub').attr('readonly',false);}">
                                <option value="0"></option>
                                <option value="1"><?= lang('Backend_table_menu.' . 'List Menu'); ?></option>
                                <option value="2"><?= lang('Backend_table_menu.' . 'Head and Sub Menu'); ?></option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row col-12">
                        <div class="input-group col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'ListMenu'); ?></span>
                            </div>
                            <input type="text" id="list_menu" name="list_menu" class="form-control" readonly>
                        </div>
                    </div>
                    <br>
                    <div class=" row col-12">
                        <div class="input-group col-7">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'HeadMenu'); ?></span>
                            </div>
                            <input type="text" id="head_menu" name="head_menu" list="list_headmenu" class="form-control" readonly onchange="check_name(this.value)">
                            <?php $data_menu_link = [];
                            foreach (json_decode($listmenu) as $k_listmenu => $v_listmenu) {
                                if ($v_listmenu->menu_link == '') {
                                    array_push($data_menu_link, $v_listmenu->menu_name);
                                }
                            } ?>
                            <datalist id="list_headmenu">
                                <?php
                                foreach ($data_menu_link as $data) { ?>
                                    <option value="<?= lang('Backend_table_menu.' . $data); ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <div class="input-group col-5">
                            <input type="text" id="sub_menu" name="sub_menu" class="form-control" placeholder="<?= lang('Backend_table_menu.' . 'Sub Menu'); ?>" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row col-12">
                        <div class="input-group col-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'Icon'); ?></span>
                            </div>
                            <input type="text" id="icon_menu" name="icon_menu" class="form-control" placeholder="icon awesome" required>
                        </div>

                        <div class="input-group col-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'Icon'); ?></span>
                            </div>
                            <input type="text" id="icon_menu_sub" name="icon_menu_sub" class="form-control" placeholder="icon awesome">
                        </div>
                    </div>
                    <br>
                    <div class="row col-12">
                        <div class="input-group col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'Link'); ?></span>
                            </div>
                            <input type="text" id="link_menu" name="link_menu" class="form-control" placeholder="backend/Fmenu/index" required>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= lang('Backend_table_menu.' . 'Cancel'); ?></button>
                        <button type="submit" class="btn btn-primary"><?= lang('Backend_table_menu.' . 'Save'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal edit menu -->
<div class="modal fade" id="editmenuModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('Backend_table_menu.' . 'EDIT MENU'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="F_edit">
                    <input type="hidden" name="id_menu" id="id_menu" class="form-control" readonly>
                    <div class="row col-12">
                        <div class="input-group col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'Group'); ?></span>
                            </div>
                            <input type="text" list="list_gruop" name="group_menu_edit" id="group_menu_edit" class="form-control" required>
                            <?php $data_menu_group = [];
                            foreach (json_decode($listmenu) as $k_listmenu => $v_listmenu) {
                                if (!in_array($v_listmenu->menu_group, $data_menu_group)) {
                                    array_push($data_menu_group, $v_listmenu->menu_group);
                                }
                            } ?>
                            <datalist id="list_gruop">
                                <?php
                                foreach ($data_menu_group as $dt) { ?>
                                    <option value="<?= lang('Backend_table_menu.' . $dt); ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                    </div>
                    <br>
                    <div class="row col-12">
                        <div class="input-group col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'ListMenu'); ?></span>
                            </div>
                            <input type="text" id="list_menu_edit" name="list_menu_edit" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class=" row col-12">
                        <div class="input-group col-7">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'HeadMenu'); ?></span>
                            </div>
                            <input type="text" id="head_menu_edit" name="head_menu_edit" list="list_headmenu" class="form-control" onchange="check_name(this.value)">
                            <?php $data_menu_link = [];
                            foreach (json_decode($listmenu) as $k_listmenu => $v_listmenu) {
                                if ($v_listmenu->menu_link == '') {
                                    array_push($data_menu_link, $v_listmenu->menu_name);
                                }
                            } ?>
                            <datalist id="list_headmenu">
                                <?php
                                foreach ($data_menu_link as $data) { ?>
                                    <option value="<?= lang('Backend_table_menu.' . $data); ?>">
                                    <?php } ?>
                            </datalist>
                        </div>
                        <div class="input-group col-5">
                            <input type="text" id="sub_menu_edit" name="sub_menu_edit" class="form-control" placeholder="<?= lang('Backend_table_menu.' . 'Sub Menu'); ?>">
                        </div>
                    </div>
                    <br>
                    <div class="row col-12">
                        <div class="input-group col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'Icon'); ?></span>
                            </div>
                            <input type="text" id="icon_menu_edit" name="icon_menu_edit" class="form-control" placeholder="icon awesome" required>
                        </div>

                    </div>
                    <br>
                    <div class="row col-12">
                        <div class="input-group col-12">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><?= lang('Backend_table_menu.' . 'Link'); ?></span>
                            </div>
                            <input type="text" id="link_menu_edit" name="link_menu_edit" class="form-control">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= lang('Backend_table_menu.' . 'Cancel'); ?></button>
                        <button type="submit" class="btn btn-primary"><?= lang('Backend_table_menu.' . 'Save'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(function() { // ฟังก์ชั่นเริ่มต้น (ready/ทำงานทันที) มีได้แค่ 1 ตัวแต่ละหน้า

        // ===================== สร้าง ดาต้าเทเบิล  กำหนดตัวแปรเพื่อเพิ่มลบข้อมูลได้ ===========
        var dt_mytable = $('#mytable').DataTable({
            lengthMenu: [
                [20, 30, 40, -1],
                [20, 30, 40, "All"]
            ],
            // "lengthChange": false,
            "searching": false
        });


        /* -------------------------------------------- delete menu ----------------------------------------------------------- */
        $('#mytable').on('click', '.fa-trash-alt', function() {
            var id = $(this).data('del').menu_id
            swal({
                    title: "ยืนยันการลบเมนูหรือไม่ ?",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "DELETE",
                            url: "<?= base_url('en/backend/del/tb_menu/menu_id') ?>" + '/' + id,
                            dataType: 'json',
                            success: function(res) {
                                if (res.status) {
                                    swal('', 'ลบเมนูสำเร็จ', "success").then((value) => {
                                        setTimeout(function() {
                                            window.location.href = "<?php base_url('backend/Fmenu/index') ?>";
                                        }, 500);
                                    });
                                } else {
                                    swal('', 'ไม่สามารถลบเมนูได้', "error")
                                }
                            }
                        });
                    }
                });
        });
        /* -------------------------------------------- end delete menu ----------------------------------------------------------- */


        /* -------------------------------------------- edit menu ----------------------------------------------------------- */
        $('#mytable').on('click', '.fa-edit', function() {
            $('#editmenuModal').modal();
            if ($(this).data('edit').menu_link == '') {
                $('#id_menu').val($(this).data('edit').menu_id);
                $('#group_menu_edit').val($(this).data('edit').menu_group).attr('readonly', false);
                $('#head_menu_edit').val($(this).data('edit').menu_name).attr('readonly', false);
                $('#icon_menu_edit').val($(this).data('edit').menu_icon).attr('readonly', false);
                $('#list_menu_edit').val('').attr('readonly', true);
                $('#sub_menu_edit').val('').attr('readonly', true);
                $('#link_menu_edit').val('').attr('readonly', true);
            } else {
                if ($(this).data('edit').parent_menu == 0) {
                    $('#id_menu').val($(this).data('edit').menu_id);
                    $('#list_menu_edit').val($(this).data('edit').menu_name).attr('readonly', false);
                    $('#link_menu_edit').val($(this).data('edit').menu_link).attr('readonly', false);
                    $('#group_menu_edit').val($(this).data('edit').menu_group).attr('readonly', false);
                    $('#head_menu_edit').val($(this).data('edit').menu_name).attr('readonly', false);
                    $('#icon_menu_edit').val($(this).data('edit').menu_icon).attr('readonly', false);
                    $('#head_menu_edit').val('').attr('readonly', true);
                    $('#sub_menu_edit').val('').attr('readonly', true);

                } else {
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('backend/Fmenu/menu/get_name') ?>",
                        data: {
                            parent_id: $(this).data('edit').parent_menu
                        },
                        dataType: 'json',
                    }).done(function(res) {
                        $('#head_menu_edit').val(res.data).attr('readonly', false);
                    });
                    $('#id_menu').val($(this).data('edit').menu_id);
                    $('#list_menu_edit').val('').attr('readonly', true);
                    $('#link_menu_edit').val($(this).data('edit').menu_link).attr('readonly', false);
                    $('#group_menu_edit').val($(this).data('edit').menu_group).attr('readonly', false);
                    $('#icon_menu_edit').val($(this).data('edit').menu_icon).attr('readonly', false);
                    $('#sub_menu_edit').val($(this).data('edit').menu_name).attr('readonly', false);
                }
            }
        });
        $('#F_edit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?= base_url('backend/Fmenu/menu/edit_menu') ?>",
                data: $(this).serializeArray(),
                success: function(res) {
                    console.log(res);
                    if (res.code == 1) {
                        swal('', res.msg, "success").then((value) => {
                            setTimeout(function() {
                                window.location.href = "<?php base_url('backend/Fmenu/index') ?>";
                            }, 500);
                        });
                    } else {
                        swal('', res.msg, "error")
                    }
                }
            });
        });
    });

    /* --------------------------------------------end  edit menu ----------------------------------------------------------- */

    function check_name(name_headMenu) {
        $.ajax({
            method: "POST",
            url: "<?= base_url('backend/Fmenu/menu/check_name') ?>",
            data: {
                name_headMenu: name_headMenu
            },
            dataType: 'json',
        }).done(function(res) {
            if (res == 1) {
                $("#icon_menu_sub").attr("readonly", true);
            } else {
                $("#icon_menu_sub").attr("readonly", false);
            }
        });
    }
</script>


<?php $this->endSection(); ?>