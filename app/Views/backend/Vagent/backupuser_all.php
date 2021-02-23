<?php $this->extend('layouts/tem_backend/main'); ?>
<?php $this->section('content'); ?>


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1><?= lang('Backend_Fmember.' . 'Member List'); ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right" style="font-size:14px;">
              <li class="breadcrumb-item"><a href="<?= base_url('en/backend/Fagent/user_all')?>"><?= lang('Backend_Fmember.' . 'Member List'); ?></a></li>
              <li class="breadcrumb-item "></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</section>


<section class="content mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <select name="Filter" id="Filter" onchange="FilterChange(this.value);" class="form-control col-1">
                            <option value="0"><?= lang('Backend_Fmember.' . 'Active'); ?></option> <!-- 0 เปิด -->
                            <option value="1"><?= lang('Backend_Fmember.' . 'Close'); ?></option> <!-- 1 ปิด -->
                            <option value="2"><?= lang('Backend_Fmember.' . 'All'); ?></option> <!--  2 ทั้งหมด -->
                        </select>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="tblistmember" class="table table-bordered table-striped">
                            <thead style="font-size:18px;">
                                <tr class="text-center">
                                    <th rowspan="2"><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                                    <th rowspan="2"><?= lang('Backend_Fmember.' . 'User'); ?></th>
                                    <th rowspan="2"><?= lang('Backend_Fmember.' . 'Edit'); ?></th>
                                    <th rowspan="2"><?= lang('Backend_Fmember.' . 'Status'); ?></th>
                                    <th rowspan="2"><?= lang('Backend_Fmember.' . 'Suspend'); ?></th>
                                    <th rowspan="2"><?= lang('Backend_Fmember.' . 'Name'); ?></th>
                                    <th rowspan="2"><?= lang('Backend_Fmember.' . 'Surename'); ?></th>
                                    <th rowspan="2"><?= lang('Backend_Fmember.' . 'Tel.'); ?></th>
                                    <th colspan="3"><b><?= lang('Backend_Fmember.' . 'Lottery'); ?></b></th>
                                    <th rowspan="2"><?= lang('Backend_Fmember.' . 'Setting Lottery'); ?></th>
                                    <th colspan="3"><?= lang('Backend_Fmember.' . 'Status'); ?></th>
                                </tr>

                                <tr class="text-center">
                                    <th> A </th>
                                    <th> B </th>
                                    <th> C </th>
                                    <th></th>
                                </tr>
                                
                                

                            </thead>
                            <tbody id="tb_status" style="font-size:16px;">
                                <?php $i=0; 
                                    foreach(json_decode($userall) as $key =>  $row){ 
                                        foreach($row as $value){   
                                            $i++ ; 
                                            // echo '<pre>';
                                            // print_r(json_decode($value->status_line)->status_line->A);
                                         
                                ?>
                                <tr class="text-center">
                                    <td class=""><?= $i; ?></td>
                                    <td>
                                     
                                           <a href='javascript:void(0);' onclick="Myget_under(<?= $value->agent_id?>)" ><?= $value->agent_name; ?></a></td>
                                  
                                    <td>
                                      <button class="btn btn-secondary btn-sm btn-default btn_editD" id=""   data-edit="<?= htmlspecialchars(json_encode($value, JSON_UNESCAPED_UNICODE), ENT_COMPAT); ?>" >
                                                        <i class="fas fa-pen-square nav-icon"></i>
                                      </button>
                                    <td><?php if($value->agent_status == 0){ echo "<span style ='color:blue;'>เปิด</span>";}else{ echo '<span style="color:red;">ปิด</span>';}?></td>
                                    <td><?php if($value->agent_suspend == 0){ echo "<span style ='color:blue;'>ไม่ระงับ</span>";}else{ echo '<span style="color:red;">ระงับ</span>';}?></td>
                                    <td><?= $value->agent_myname?></td>
                                    <td><?= $value->agent_mysername?></td>
                                    <td><?php if($value->agent_tel_mobile !=''){echo  $value->agent_tel_mobile; }else{ echo "-"; }?></td>                                
                                    <td>

                                        <?php 
                                          
                                            if($value->status_line !=null){  // 1เปิด 0 ปิด
                                                if(json_decode($value->status_line)->status_line->A == 1){
                                                  echo "<i class='fa fa-check' aria-hidden='true' style='color:green;'></i>";
                                                }else{
                                                    echo "<i class='fa fa-times' style='color:red;' aria-hidden='true' title='No data'></i>";
                                                  }
                                            }else{
                                                  echo "<i class='fa fa-times' style='color:red' title='No data'></i>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($value->status_line !=null){
                                                if(json_decode($value->status_line)->status_line->B == 1){  // 1เปิด 0 ปิด
                                                  echo "<i class='fa fa-check' aria-hidden='true' style='color:green;'></i>";
                                                }else{
                                                  echo "<i class='fa fa-times' style='color:red;' aria-hidden='true' title='No data'></i>";
                                                }
                                            }else{
                                                echo "<i class='fa fa-times' style='color:red' title='No data'></i>";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if($value->status_line !=null){
                                                if(json_decode($value->status_line)->status_line->C == 1){  // 1เปิด 0 ปิด
                                                  echo "<i class='fa fa-check' aria-hidden='true' style='color:green;'></i>";
                                                }else{
                                                    echo "<i class='fa fa-times' style='color:red;' aria-hidden='true' title='No data'></i>";
                                                  }
                                             }else{
                                                  echo "<i class='fa fa-times' style='color:red' title='No data'></i>";
                                             }
                                        ?>
                                    </td>
                                    <td><button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal1"><i class="fas fa-plus" style="color:white"></i></button></td>
                                    <td></td>
                                </tr>
                                <?php } }?>
                            </tbody>

                        </table>
                    </div>
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
<form id="myf" method="post" action="<?= base_url('en/backend/Fagent/user_all')?>">
<input id="myid" name="id" hidden/>
</form>
<!-- model edit  -->
<div class="modal fade" id="edit_userall" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= lang('Backend_Fmember.' . 'Edit'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="usdata">
          <table class="table table-bordered" >
              <thead>
                  <tr>
                  <td colspan="4">รหัสผ่าน</td>
                  </tr>
                  
                  <tr class="text-left">
                    <td  colspan="3">
                      <input type="password" name="edit_password"  id="editpassword" class="form-control"> 
                    </td>
                  </tr>      

                  <tr>
                  <td colspan="4">ชื่อ-นามสกุล</td>
                  </tr>
                  <tr class="text-left">
                    <td>
                      <input type="text" name="edit_name" id="editname" class="form-control"> 
                    </td>
                    <td>
                      <input type="text" name="edit_last" id="editlastname"  class="form-control"> 
                    </td>

                  </tr>         
                

                  <tr class="text-left">
                    <td >เบอร์โทร</td>
                    <td  colspan="4">
                      <input type="text" name="edit_phone" id="editphone"  class="form-control"> 
                    </td>
                  </tr>         

                  <tr class="text-left">
                    <td>สถานะ</td>
                    <td  colspan="3">
                      <input type="radio" name="edit_status"  id="editstatus_on" value="0"> เปิด
                      <input type="radio" name="edit_status"   id="editstatus_off" value="1"> ปิด
                    </td>
                  </tr>            

                  <tr class="text-left">
                    <td>ระงับ</td>
                    <td  colspan="3">
                      <input type="radio" name="edit_st_su" id="st_su_on" value="0"> ไม่ระงับ
                      <input type="radio" name="edit_st_su" id="st_su_off" value="1"> ระงับ
                    </td>
                  </tr>      


                  <tr class="text-left">
                    <td>Lottery	</td>
                    <td  colspan="3">
                      <input type="checkbox"  name="edit_lineA" id="editlineA" value="1"> A
                      <input type="checkbox"  name="edit_lineB" id="editlineB" value="1"> B
                      <input type="checkbox"  name="edit_lineC" id="editlineC" value="1"> C
                    
                      <input type="hidden" name="u_id" id="h_id">
                    </td>
                  </tr>      



              </thead>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateUs();">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- model setting Lottery -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #564e56c2;color:white;">
        <h5 class="modal-title" id="exampleModalLabel"><?= lang('Backend_Fmember.' . 'Setting Lottery'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<script>
    $(function() {
        $('#tblistmember').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });


        // function edit
        $('.btn_editD').on('click',function(){
           $('#edit_userall').modal();

            $('#h_id').val((($(this).data('edit').agent_id)));

            $('#editname').val((($(this).data('edit').agent_myname)));
            $('#editlastname').val((($(this).data('edit').agent_mysername)));
           

            if((($(this).data('edit').agent_tel_mobile)) != null){
              $('#editphone').val((($(this).data('edit').agent_tel_mobile)));
            }else{
               
            }

            if((($(this).data('edit').agent_status)) == 0){ //0 เปิด
                $('#editstatus_on').attr("checked", "checked");
            }else{
                $('#editstatus_off').attr("checked", "checked");;
            }

            if((($(this).data('edit').agent_suspend)) == 0){ // 0 เปิด
                $('#st_su_on').attr("checked", "checked");
            }else{
                $('#st_su_off').attr("checked", "checked");;
            }

            // var num_3under = (JSON.parse($(thisdata).data('edit').status_line)).status_line.A;
            if((JSON.parse($(this).data('edit').status_line)).status_line.A == 1){
              // $('#editlineA').attr( "checked" );
              $('#editlineA').prop("checked", 1);
            }else{
              $('#editlineA').prop("checked", 0);
            }

            if((JSON.parse($(this).data('edit').status_line)).status_line.B == 1){
              $('#editlineB').prop("checked", 1);
            }else{
              $('#editlineB').prop("checked", 0);
            }

            if((JSON.parse($(this).data('edit').status_line)).status_line.C == 1){
              $('#editlineC').prop("checked", 1);
            }else{
              $('#editlineC').prop("checked", 0);
            }
        });
      

    });
    function Myget_under(id){
            $('#myid').val(id);
            $('#myf').submit();
    }

    function updateUs(){
        $.ajax({
                method: "POST",
                url: "<?= base_url('en/backend/Fagent/update_us') ?>",
                data: $('#usdata').serialize(),
                dataType: 'json',
            })
            .done(function(res) {
               console.log(res);
                if (res.code == 200) {
                    alert(res.msg);
                    //หลังบันทึกข้อมูลสำเร็จให้ reset form  
                    $('#edit_userall').modal('hide');
                } else {
                    alert(res.msg);
                    $('#edit_userall').modal('hide');
                }
            });
    }

    function FilterChange(type) {
      console.log(type);

    }
</script>

<?php $this->endSection(); ?>