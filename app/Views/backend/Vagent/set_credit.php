<?php $this->extend('layouts/tem_backend/main'); ?>
<?php $this->section('content');$this->session = \Config\Services::session(); $leng = service('request')->getLocale();?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= lang('Backend_Fmember.' . 'Increase/Decrease Credit'); ?> </h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content mt-2">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">


        <div class="card">
          <div class="card-header">
            <select name="Filter" id="Filter" onchange="FilterChange(this);" class="form-control col-1">
              <option value="1"><?= lang('Backend_Fmember.' . 'Active'); ?></option>
              <option value="0"><?= lang('Backend_Fmember.' . 'Close'); ?></option>
              <option value="2"><?= lang('Backend_Fmember.' . 'All'); ?></option>
            </select>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tbcredit" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                  <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
                  <th><?= lang('Backend_Fmember.' . 'Name'); ?></th>
                  <th><?= lang('Backend_Fmember.' . 'Surename'); ?></th>
                  <th><?= lang('Backend_Fmember.' . 'Edit'); ?></th>
                  <th><?= lang('Backend_Fmember.' . 'Balance'); ?></th>
                  <th><?= lang('Backend_Fmember.' . 'Credit'); ?></th>
                  <th><?= lang('Backend_Fmember.' . 'Last login'); ?></th>
                  <th><?= lang('Backend_Fmember.' . 'Status'); ?></th>
                </tr>
              </thead>
              <tbody>
              <?php $i=0; 
                                    foreach(json_decode($userall) as $key =>  $row){ 
                                        foreach($row as $value){
                                          $i++ ;
                                ?>
                                <tr class="text-center">
                                    <td class="text-left"><?= $i; ?></td>
                                    <td><a href='javascript:void(0);' onclick="Myget_under(<?= $value->agent_id?>)" ><?= $value->agent_name; ?></a></td>
                                    <td><?= $value->agent_myname; ?></td>
                                    <td><?= $value->agent_mysername; ?></td>
                                    <td><a href="#"><i class="fas fa-pen-square nav-icon" style="color:red;"></i></a></td>
                                    <td><?= $value->agent_credit; ?></td>
                                    <td><?= $value->agent_credit_max; ?></td>
                                    <td><?= $value->agent_last_login; ?></td>
                                    <td><?php if($value->agent_status == 0){ echo "<span style ='color:blue;'>เปิด</span>";}else{ echo '<span class="color:red;">ปิด</span>';}?></td>
                                    
                                </tr>
                                <?php } }?>

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
<form id="myf" method="post" action="<?= base_url($leng.'/backend/Fagent/set_credit')?>">
<input id="myid" name="id" hidden/>
</form>
<script>
  $(function() {
    $('#tbcredit').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  function Myget_under(id){
        console.log(id);
            $('#myid').val(id);
            $('#myf').submit();
    }
</script>


<?php $this->endSection(); ?>