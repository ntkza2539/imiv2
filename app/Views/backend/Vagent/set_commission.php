<?php $this->extend('layouts/tem_bs5/main'); ?>
<?php $this->section('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= lang('Backend_Fmember.' . 'Commistion'); ?></h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-2">
              <select name="type_lotto" id="type_lotto" onchange="change_type(this.value)" class="form-control col-2">
                <option value="1"><?= lang('Backend_Fmember.' . 'Thai Lottery'); ?></option>
                <option value="2"><?= lang('Backend_Fmember.' . 'Hanoi Lottery'); ?></option>
              </select>
            </div>
            <div class="col-2">
              <select name="F_line" id="F_line" onchange="change_line(this.value)" class="form-control col-2">
                <option value="A">Line A</option>
                <option value="B">Line B</option>
                <option value="C">Line C</option>
              </select>
            </div>
            <div class="col-2">
              <select name="Filter" id="Filter" onchange="FilterChange(this);" class="form-control col-2">
                <option value="1"><?= lang('Backend_Fmember.' . 'Active'); ?></option>
                <option value="0"><?= lang('Backend_Fmember.' . 'Close'); ?></option>
                <option value="2"><?= lang('Backend_Fmember.' . 'All'); ?></option>
              </select>
            </div>
          </div>
        </div>
        <!-- หวยไทย -->
        <div class="card-body" id="Lotto_Thai">
          <table id="tbLotto_thai" class="table table-bordered table-striped">
            <thead>
              <tr align="center">
                <th><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Name'); ?></th>
                <th><i class="fas fa-edit" style="cursor:pointer;" onclick="Lotto_Thai_modal_all()"></th>
                <th>3 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>3 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                <th>3 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                <th>2 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>2 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                <th>2 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                <th>1 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>1 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Ones'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Tens'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Hundreds'); ?></th>
                <th>4 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>4 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                <th>5 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Status'); ?></th>
              </tr>
            </thead>
            <tbody id="line_a">
              <?php $i = 1;
              foreach ($agent as $ag) { ?>
                <?php foreach ($ag as $a) { ?>
                  <tr align="center">
                    <td><?= $i; ?></td>
                    <td><?= $a->agent_name ?></td>
                    <td><?= $a->agent_myname ?></td>
                    <td><i class="fas fa-edit" style="cursor:pointer;" data-edit="<?= htmlspecialchars(json_encode($a, JSON_UNESCAPED_UNICODE), ENT_COMPAT); ?>" onclick="Lotto_Thai_modal('A',this)"></i></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_3upper','A')"><?= (json_decode($a->num_3upper)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_3under','A')"><?= (json_decode($a->num_3under)->commission->A) ?> %</a> </td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_3toad','A')"><?= (json_decode($a->num_3toad)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_2upper','A')"><?= (json_decode($a->num_2upper)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_2under','A')"><?= (json_decode($a->num_2under)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_2toad','A')"><?= (json_decode($a->num_2toad)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_1upper','A')"><?= (json_decode($a->num_1upper)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_1under','A')"><?= (json_decode($a->num_1under)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_ones','A')"><?= (json_decode($a->num_ones)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_tens','A')"><?= (json_decode($a->num_tens)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_hundreds','A')"><?= (json_decode($a->num_hundreds)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_4upper','A')"><?= (json_decode($a->num_4upper)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_4toad','A')"><?= (json_decode($a->num_4toad)->commission->A) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_5toad','A')"><?= (json_decode($a->num_5toad)->commission->A) ?> %</a></td>
                    <td><?= ($a->agent_status == 0) ? '<i style="color:green;" class="fas fa-check"></i>' : '<i style="color:red;" class="fas fa-times"></i>' ?></td>
                  </tr>
                <?php
                  $i++;
                } ?>
              <?php
              } ?>
            </tbody>
            <tbody id="line_b">
              <?php $j = 1;
              foreach ($agent as $ag) { ?>
                <?php foreach ($ag as $a) { ?>
                  <tr align="center">
                    <td><?= $j; ?></td>
                    <td><?= $a->agent_name ?></td>
                    <td><?= $a->agent_myname ?></td>
                    <td><i class="fas fa-edit" style="cursor:pointer;" data-edit="<?= htmlspecialchars(json_encode($a, JSON_UNESCAPED_UNICODE), ENT_COMPAT); ?>" onclick="Lotto_Thai_modal('B',this)"></i></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_3upper','B')"><?= (json_decode($a->num_3upper)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_3under','B')"><?= (json_decode($a->num_3under)->commission->B) ?> %</a> </td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_3toad','B')"><?= (json_decode($a->num_3toad)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_2upper','B')"><?= (json_decode($a->num_2upper)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_2under','B')"><?= (json_decode($a->num_2under)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_2toad','B')"><?= (json_decode($a->num_2toad)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_1upper','B')"><?= (json_decode($a->num_1upper)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_1under','B')"><?= (json_decode($a->num_1under)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_ones','B')"><?= (json_decode($a->num_ones)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_tens','B')"><?= (json_decode($a->num_tens)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_hundreds','B')"><?= (json_decode($a->num_hundreds)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_4upper','B')"><?= (json_decode($a->num_4upper)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_4toad','B')"><?= (json_decode($a->num_4toad)->commission->B) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_5toad','B')"><?= (json_decode($a->num_5toad)->commission->B) ?> %</a></td>
                    <td><?= ($a->agent_status == 0) ? '<i style="color:green;" class="fas fa-check"></i>' : '<i style="color:red;" class="fas fa-times"></i>' ?></td>
                  </tr>
                <?php
                  $j++;
                } ?>
              <?php
              } ?>
            </tbody>
            <tbody id="line_c">
              <?php $k = 1;
              foreach ($agent as $ag) { ?>
                <?php foreach ($ag as $a) { ?>
                  <tr align="center">
                    <td><?= $k; ?></td>
                    <td><?= $a->agent_name ?></td>
                    <td><?= $a->agent_myname ?></td>
                    <td><i class="fas fa-edit" style="cursor:pointer;" data-edit="<?= htmlspecialchars(json_encode($a, JSON_UNESCAPED_UNICODE), ENT_COMPAT); ?>" onclick="Lotto_Thai_modal('C',this)"></i></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_3upper','C')"><?= (json_decode($a->num_3upper)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_3under','C')"><?= (json_decode($a->num_3under)->commission->C) ?> %</a> </td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_3toad','C')"><?= (json_decode($a->num_3toad)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_2upper','C')"><?= (json_decode($a->num_2upper)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_2under','C')"><?= (json_decode($a->num_2under)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_2toad','C')"><?= (json_decode($a->num_2toad)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_1upper','C')"><?= (json_decode($a->num_1upper)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_1under','C')"><?= (json_decode($a->num_1under)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_ones','C')"><?= (json_decode($a->num_ones)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_tens','C')"><?= (json_decode($a->num_tens)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_hundreds','C')"><?= (json_decode($a->num_hundreds)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_4upper','C')"><?= (json_decode($a->num_4upper)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_4toad','C')"><?= (json_decode($a->num_4toad)->commission->C) ?> %</a></td>
                    <td><a style="cursor:pointer;" onclick="edit_com_single('<?php echo $a->agent_id ?>','num_5toad','C')"><?= (json_decode($a->num_5toad)->commission->C) ?> %</a></td>
                    <td><?= ($a->agent_status == 0) ? '<i style="color:green;" class="fas fa-check"></i>' : '<i style="color:red;" class="fas fa-times"></i>' ?></td>
                  </tr>
                <?php
                  $k++;
                } ?>
              <?php
              } ?>
            </tbody>
          </table>
        </div>

        <!-- หวยฮานอย -->
        <div class="card-body" id="Lotto_Hanoi">
          <table id="tbLotto_Hanoi" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Name'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Edit'); ?></th>
                <th>3 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>3 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                <th>2 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>2 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                <th>2 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                <th>1 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>1 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Status'); ?></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.container-fluid -->
</section>


<!-- Lotto_Thai_modal -->
<div class="modal fade" id="edit_Lotto_thaiModal" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Commission</h4>
      </div>
      <div class="modal-body">
        <form id="form_edit">
          <table class="table table-bordered table-striped">
            <thead>
              <tr align="center">
                <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
                <th>3 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>3 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                <th>3 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                <th>2 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>2 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                <th>2 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                <th>1 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>1 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Ones'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Tens'); ?></th>
                <th><?= lang('Backend_Fmember.' . 'Hundreds'); ?></th>
                <th>4 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                <th>4 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                <th>5 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
              </tr>
            </thead>
            <tbody id="body_Lotto_Thai_editModal">
            </tbody>
          </table>
        </form>
      </div>
      <div class="modal-footer" id="footer_btn">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_Lotto_thaiModal_all" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Commission All</h4>
      </div>

      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr align="center">
              <th>3 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
              <th>3 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
              <th>3 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
              <th>2 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
              <th>2 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
              <th>2 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
              <th>1 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
              <th>1 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
              <th><?= lang('Backend_Fmember.' . 'Ones'); ?></th>
              <th><?= lang('Backend_Fmember.' . 'Tens'); ?></th>
              <th><?= lang('Backend_Fmember.' . 'Hundreds'); ?></th>
              <th>4 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
              <th>4 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
              <th>5 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
            </tr>
          </thead>
          <tbody id="body_Lotto_Thai_editModal_all">
          </tbody>
        </table>
      </div>
      <div class="modal-footer" id="footer_btn_all">
      </div>

    </div>
  </div>
</div>



<!-- Lotto_Hanoi_modal -->
<div class="modal fade" id="edit_Lotto_HanoiModal" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Commission</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr align="center">
              <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
              <th>3 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
              <th>3 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
              <th>2 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
              <th>2 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
              <th>2 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
              <th>1 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
              <th>1 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
              <th><?= lang('Backend_Fmember.' . 'Status'); ?></th>
            </tr>
          </thead>
          <tbody id="body_editModal">
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function() {
    $('#Lotto_Hanoi').hide();
    $('#line_a').show();
    $('#line_b').hide();
    $('#line_c').hide();
    $('#tbLotto_thai').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#tbLotto_Hanoi').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  function change_line(line) {
    console.log(line);
    if (line == 'A') {
      $('#line_a').show();
      $('#line_b').hide();
      $('#line_c').hide();
    } else if (line == 'B') {
      $('#line_a').hide();
      $('#line_b').show();
      $('#line_c').hide();
    } else {
      $('#line_a').hide();
      $('#line_b').hide();
      $('#line_c').show();
    }
  }

  function change_type(type) {
    console.log(type);
    if (type == 1) {
      $('#Lotto_Thai').show();
      $('#Lotto_Hanoi').hide();
    } else if (type == 2) {
      $('#Lotto_Thai').hide();
      $('#Lotto_Hanoi').show();
    }
  }

  function Lotto_Thai_modal(line, thisdata) {
    $('#edit_Lotto_thaiModal').modal('show')
    if (line == 'A') {
      var num_3upper = (JSON.parse($(thisdata).data('edit').num_3upper)).commission.A;
      var num_3under = (JSON.parse($(thisdata).data('edit').num_3under)).commission.A;
      var num_3toad = (JSON.parse($(thisdata).data('edit').num_3toad)).commission.A;
      var num_2upper = (JSON.parse($(thisdata).data('edit').num_2upper)).commission.A;
      var num_2under = (JSON.parse($(thisdata).data('edit').num_2under)).commission.A;
      var num_2toad = (JSON.parse($(thisdata).data('edit').num_2toad)).commission.A;
      var num_1upper = (JSON.parse($(thisdata).data('edit').num_1upper)).commission.A;
      var num_1under = (JSON.parse($(thisdata).data('edit').num_1under)).commission.A;
      var num_ones = (JSON.parse($(thisdata).data('edit').num_ones)).commission.A;
      var num_tens = (JSON.parse($(thisdata).data('edit').num_tens)).commission.A;
      var num_hundreds = (JSON.parse($(thisdata).data('edit').num_hundreds)).commission.A;
      var num_4upper = (JSON.parse($(thisdata).data('edit').num_4upper)).commission.A;
      var num_4toad = (JSON.parse($(thisdata).data('edit').num_4toad)).commission.A;
      var num_5toad = (JSON.parse($(thisdata).data('edit').num_5toad)).commission.A;
    } else if (line == 'B') {
      var num_3upper = (JSON.parse($(thisdata).data('edit').num_3upper)).commission.B;
      var num_3under = (JSON.parse($(thisdata).data('edit').num_3under)).commission.B;
      var num_3toad = (JSON.parse($(thisdata).data('edit').num_3toad)).commission.B;
      var num_2upper = (JSON.parse($(thisdata).data('edit').num_2upper)).commission.B;
      var num_2under = (JSON.parse($(thisdata).data('edit').num_2under)).commission.B;
      var num_2toad = (JSON.parse($(thisdata).data('edit').num_2toad)).commission.B;
      var num_1upper = (JSON.parse($(thisdata).data('edit').num_1upper)).commission.B;
      var num_1under = (JSON.parse($(thisdata).data('edit').num_1under)).commission.B;
      var num_ones = (JSON.parse($(thisdata).data('edit').num_ones)).commission.B;
      var num_tens = (JSON.parse($(thisdata).data('edit').num_tens)).commission.B;
      var num_hundreds = (JSON.parse($(thisdata).data('edit').num_hundreds)).commission.B;
      var num_4upper = (JSON.parse($(thisdata).data('edit').num_4upper)).commission.B;
      var num_4toad = (JSON.parse($(thisdata).data('edit').num_4toad)).commission.B;
      var num_5toad = (JSON.parse($(thisdata).data('edit').num_5toad)).commission.B;
    } else {
      var num_3upper = (JSON.parse($(thisdata).data('edit').num_3upper)).commission.C;
      var num_3under = (JSON.parse($(thisdata).data('edit').num_3under)).commission.C;
      var num_3toad = (JSON.parse($(thisdata).data('edit').num_3toad)).commission.C;
      var num_2upper = (JSON.parse($(thisdata).data('edit').num_2upper)).commission.C;
      var num_2under = (JSON.parse($(thisdata).data('edit').num_2under)).commission.C;
      var num_2toad = (JSON.parse($(thisdata).data('edit').num_2toad)).commission.C;
      var num_1upper = (JSON.parse($(thisdata).data('edit').num_1upper)).commission.C;
      var num_1under = (JSON.parse($(thisdata).data('edit').num_1under)).commission.C;
      var num_ones = (JSON.parse($(thisdata).data('edit').num_ones)).commission.C;
      var num_tens = (JSON.parse($(thisdata).data('edit').num_tens)).commission.C;
      var num_hundreds = (JSON.parse($(thisdata).data('edit').num_hundreds)).commission.C;
      var num_4upper = (JSON.parse($(thisdata).data('edit').num_4upper)).commission.C;
      var num_4toad = (JSON.parse($(thisdata).data('edit').num_4toad)).commission.C;
      var num_5toad = (JSON.parse($(thisdata).data('edit').num_5toad)).commission.C;
    }

    var content = '';
    var content2 = '';
    content += '<tr align="center">'
    content += '<td>' + $(thisdata).data('edit').agent_name + '</td>'
    content += '<td><input size="3" name="num_3upper"class="form-control" type="text" value="' + num_3upper + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_3under" class="form-control" type="text" value="' + num_3under + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_3toad" class="form-control" type="text" value="' + num_3toad + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_2upper" class="form-control" type="text" value="' + num_2upper + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_2under" class="form-control" type="text" value="' + num_2under + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_2toad" class="form-control" type="text" value="' + num_2toad + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_1upper" class="form-control" type="text" value="' + num_1upper + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_1under" class="form-control" type="text" value="' + num_1under + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_ones" class="form-control" type="text" value="' + num_ones + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_tens" class="form-control" type="text" value="' + num_tens + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_hundreds" class="form-control" type="text" value="' + num_hundreds + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_4upper" class="form-control" type="text" value="' + num_4upper + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_4toad" class="form-control" type="text" value="' + num_4toad + '" onkeypress="return onlyNumberKey(event)"></td>'
    content += '<td><input size="3" name="num_5toad" class="form-control" type="text" value="' + num_5toad + '" onkeypress="return onlyNumberKey(event)"></td>';
    content += '</tr>';
    $('#body_Lotto_Thai_editModal').html(content);

    content2 += '<button type="button" class="btn btn-default" onclick="javascript:$(\'#edit_Lotto_thaiModal \').modal(\'toggle\')">Close</button>';
    content2 += '<button type="button" class="btn btn-default" onclick="edit_com(\'' + $(thisdata).data('edit').agent_id + '\',\'' + line + '\')">Save</button>';
    $('#footer_btn').html(content2);
  }

  function edit_com(ag_id, line) {
    var data_edit = $('#form_edit').serializeArray();
    $.ajax({
      url: '<?php echo base_url('en/backend/Fagent/edit_commission_multiple'); ?>',
      type: 'POST',
      dataType: 'json',
      data: {
        data_edit: data_edit,
        line: line,
        ag_id: ag_id
      }
    }).done(function(res) {
      if (res.code == 1) {
        swal('', res.msg, 'success').then((result) => {
          setTimeout(function() {
            window.location.href = "<?php base_url('') ?>";
          }, 300);
        })
      } else {
        swal('', res.msg, 'error')
      }
    });
  }

  function edit_com_single(ag_id, field_edit, line) {
    swal("Write something that you want to change:", {
      content: {
        element: "input",
        attributes: {
          type: "number"
        },
      },
    }).then((value) => {
      if (value != null) {
        $.ajax({
          url: '<?php echo base_url('en/backend/Fagent/edit_commission_single'); ?>',
          type: 'POST',
          dataType: 'json',
          data: {
            line: line,
            name: field_edit,
            ag_id: ag_id,
            value: value,
          }
        }).done(function(res) {
          if (res.code == 1) {
            swal('', res.msg, 'success').then((result) => {
              setTimeout(function() {
                window.location.href = "<?php base_url('') ?>";
              }, 300);
            })
          } else {
            swal('', res.msg, 'error')
          }
        });
      }
    });
  }

  function Lotto_Thai_modal_all() {
    $('#edit_Lotto_thaiModal_all').modal('show')
    var content = '';
    var content2 = '';
    content += ' <form id="form_edit_all">'
    content += '<tr align="center">'
    content += '<td><input size="3" name="num_3upper"class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_3under" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_3toad" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_2upper" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_2under" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_2toad" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_1upper" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_1under" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_ones" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_tens" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_hundreds" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_4upper" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_4toad" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>'
    content += '<td><input size="3" name="num_5toad" class="form-control" type="text" onkeypress="return onlyNumberKey(event)" require></td>';
    content += '</tr>';
    $('#body_Lotto_Thai_editModal_all').html(content);

    content2 += '<button type="button" class="btn btn-default" onclick="javascript:$(\'#edit_Lotto_thaiModal_all \').modal(\'toggle\')">Close</button>';
    content2 += '<button type="button" class="btn btn-default" onclick="edit_all()">Save</button>';
    content2 += '</form>';

    $('#footer_btn_all').html(content2);
  }

  function edit_all() {
    var line = $('#F_line').val();
    var data_edit = $('#form_edit_all').serializeArray();
    $.ajax({
      url: '<?php echo base_url('en/backend/Fagent/edit_commission_all'); ?>',
      type: 'POST',
      dataType: 'json',
      data: {
        data_edit: data_edit,
        line: line,
      }
    }).done(function(res) {
      console.log(res);
    });
  }

  function onlyNumberKey(evt) {
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
      return false;
    return true;
  }
</script>


<?php $this->endSection(); ?>