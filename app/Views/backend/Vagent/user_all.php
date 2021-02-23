<?php $this->extend('layouts/tem_bs5/main'); ?>
<?php $this->section('content'); ?>
<style>
  .table-hover tbody tr:hover td {
    background-color:skyblue;
  }
</style>
<h1 class="h3 mb-3"><?= lang('Backend_Fmember.' . 'Member List'); ?></h1>
<section class="row">
  <div class="col-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-6 col-sm-1">
            <select name="Filter" id="Filter" onchange="FilterChange(this.value);" class="form-control col-1">
              <option><?= lang('Backend_Fmember.' . 'Select'); ?></option>
              <!-- 0 เปิด -->
              <option value="0"><?= lang('Backend_Fmember.' . 'Active'); ?></option>
              <!-- 1 ปิด -->
              <option value="1"><?= lang('Backend_Fmember.' . 'Close'); ?></option>

              <option value="2"><?= lang('Backend_Fmember.' . 'All'); ?></option>
              <!--  2 ทั้งหมด -->

            </select>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table id="tblistmember" class="table table-bordered table-striped table-hover">
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
            <?php $i = 0;
            foreach (json_decode($userall) as $key => $row) {
              foreach ($row as $value) {
                $i++;
            ?>
                <tr class="text-center">
                  <td class=""><?= $i; ?></td>
                  <td>
                    <a href='javascript:void(0);' onclick="Myget_under(<?= $value->agent_id ?>)"><?= $value->agent_name; ?></a>
                  </td>
                  <td>
                    <button type="button" class="btn  btn_editD" id="" data-edit="<?= htmlspecialchars(json_encode($value, JSON_UNESCAPED_UNICODE), ENT_COMPAT); ?>">
                      <i class="fas fa-file-signature" style="color:#4e0a07;"></i>
                    </button>
                  <td><?php if ($value->agent_status == 0) {
                        echo "<span style ='color:blue;'>เปิด</span>";
                      } else {
                        echo '<span style="color:red;">ปิด</span>';
                      } ?></td>
                  <td><?php if ($value->agent_suspend == 0) {
                        echo "<span style ='color:blue;'>ไม่ระงับ</span>";
                      } else {
                        echo '<span style="color:red;">ระงับ</span>';
                      } ?></td>
                  <td><?= $value->agent_myname ?></td>
                  <td><?= $value->agent_mysername ?></td>
                  <td><?php if ($value->agent_tel_mobile != '') {
                        echo $value->agent_tel_mobile;
                      } else {
                        echo "-";
                      } ?></td>
                  <td>
                    <?php
                    if ($value->status_line != null) { // 1เปิด 0 ปิด
                      if (json_decode($value->status_line)->status_line->A == 1) {
                        echo "<i class='fa fa-check' aria-hidden='true' style='color:green;'></i>";
                      } else {
                        echo "<i class='fa fa-times' style='color:red;' aria-hidden='true' title='No data'></i>";
                      }
                    } else {
                      echo "<i class='fa fa-times' style='color:red' title='No data'></i>";
                    }
                    ?>
                  </td>
                  <td>
                    <?php
                    if ($value->status_line != null) {
                      if (json_decode($value->status_line)->status_line->B == 1) { // 1เปิด 0 ปิด
                        echo "<i class='fa fa-check' aria-hidden='true' style='color:green;'></i>";
                      } else {
                        echo "<i class='fa fa-times' style='color:red;' aria-hidden='true' title='No data'></i>";
                      }
                    } else {
                      echo "<i class='fa fa-times' style='color:red' title='No data'></i>";
                    }
                    ?>
                  </td>
                  <td>
                    <?php
                    if ($value->status_line != null) {
                      if (json_decode($value->status_line)->status_line->C == 1) { // 1เปิด 0 ปิด
                        echo "<i class='fa fa-check' aria-hidden='true' style='color:green;'></i>";
                      } else {
                        echo "<i class='fa fa-times' style='color:red;' aria-hidden='true' title='No data'></i>";
                      }
                    } else {
                      echo "<i class='fa fa-times' style='color:red' title='No data'></i>";
                    }
                    ?>
                  </td>
                  <td>
                    <button type="button" class="btn  " data-bs-toggle="modal" data-bs-target="#sizedModalLg" onclick="edit_lottery('<?= $value->agent_id ?>');">
                      <i class="fas fa-file-signature" style="color:#4e0a07;"></i>
                    </button>

                  </td>
                  <td></td>
                </tr>
            <?php }
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>


<form id="myf" method="post" action="<?= base_url('en/backend/Fagent/user_all') ?>">
  <input id="myid" name="id" hidden />
</form>



<!-- model -->
<div class="modal modal-colored fade" id="edit_userall" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= lang('Backend_Fmember.' . 'Edit'); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body m-3">
        <form id="usdata">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td colspan="4">รหัสผ่าน</td>
              </tr>

              <tr class="text-left">
                <td colspan="3">
                  <input type="password" name="edit_password" id="editpassword" class="form-control">
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
                  <input type="text" name="edit_last" id="editlastname" class="form-control">
                </td>

              </tr>


              <tr class="text-left">
                <td>เบอร์โทร</td>
                <td colspan="4">
                  <input type="text" name="edit_phone" id="editphone" class="form-control">
                </td>
              </tr>

              <tr class="text-left">
                <td>สถานะ</td>
                <td colspan="3">
                  <input type="radio" name="edit_status" id="editstatus_on" value="0"> เปิด
                  <input type="radio" name="edit_status" id="editstatus_off" value="1"> ปิด
                </td>
              </tr>

              <tr class="text-left">
                <td>ระงับ</td>
                <td colspan="3">
                  <input type="radio" name="edit_st_su" id="st_su_on" value="0"> ไม่ระงับ
                  <input type="radio" name="edit_st_su" id="st_su_off" value="1"> ระงับ
                </td>
              </tr>


              <tr class="text-left">
                <td>Lottery </td>
                <td colspan="3">
                  <input type="checkbox" name="edit_lineA" id="editlineA" value="1"> A
                  <input type="checkbox" name="edit_lineB" id="editlineB" value="1"> B
                  <input type="checkbox" name="edit_lineC" id="editlineC" value="1"> C

                  <input type="hidden" name="u_id" id="h_id">
                </td>
              </tr>



            </thead>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-light" onclick="updateUs();">Update changes</button>
      </div>
    </div>
  </div>
</div>


<!-- MODAL LOTTO -->

<div class="modal fade" id="sizedModalLg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title "><b>ตั้งค่าหวยอื่นๆ</b></h5>
        <button type="button" class="btn-close bg-white " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body m-3">
        <!-- <h5 class="text-danger">USERNAME: 1</h5> -->
        <form action="">
          <div class="table-responsive">
            <table id="tblistmember" class="table table-bordered table-striped table-hover">
              <thead style="font-size:18px;">
                <tr class="text-center">
                  <th rowspan="2" width="8px;"><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                  <th rowspan="2"><?= lang('Backend_Fmember.' . 'Typelottery'); ?></th>
                  <th colspan="3"><b>line</b></th>
                  <th rowspan="2"><?= lang('Backend_Fmember.' . 'Edit'); ?></th>

                </tr>
                <tr class="text-center">
                  <th> A </th>
                  <th> B </th>
                  <th> C </th>

                </tr>
              </thead>

              <tbody class="bg-white">

                <tr>
                  <td>2</td>
                  <td>หวยฮานอย</td>
                  <td class="text-center"><input type="checkbox" value="1"></td>
                  <td class="text-center"><input type="checkbox" value="1"></td>
                  <td class="text-center"><input type="checkbox" value="1"></td>
                  <td class="text-center"><i class="fas fa-file-signature"></i></td>
                </tr>
              </tbody>
              <!-- <tfoot>
             <tr style="background-color:#ffffcc;">
               <td colspan="6" class="text-center">
                 <button type="submit" class="btn-sm">แก้ไขทั้งหมด</button>
               </td>
             </tr>
           </tfoot> -->

            </table>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $(function() {
    $('.btn_editD').on('click', function() {
      $('#edit_userall').modal('show');

      $('#h_id').val((($(this).data('edit').agent_id)));

      $('#editname').val((($(this).data('edit').agent_myname)));
      $('#editlastname').val((($(this).data('edit').agent_mysername)));


      if ((($(this).data('edit').agent_tel_mobile)) != null) {
        $('#editphone').val((($(this).data('edit').agent_tel_mobile)));
      } else {

      }

      if ((($(this).data('edit').agent_status)) == 0) { //0 เปิด
        $('#editstatus_on').attr("checked", "checked");
      } else {
        $('#editstatus_off').attr("checked", "checked");;
      }

      if ((($(this).data('edit').agent_suspend)) == 0) { // 0 เปิด
        $('#st_su_on').attr("checked", "checked");
      } else {
        $('#st_su_off').attr("checked", "checked");;
      }

      // var num_3under = (JSON.parse($(thisdata).data('edit').status_line)).status_line.A;
      if ((JSON.parse($(this).data('edit').status_line)).status_line.A == 1) {
        // $('#editlineA').attr( "checked" );
        $('#editlineA').prop("checked", 1);
      } else {
        $('#editlineA').prop("checked", 0);
      }

      if ((JSON.parse($(this).data('edit').status_line)).status_line.B == 1) {
        $('#editlineB').prop("checked", 1);
      } else {
        $('#editlineB').prop("checked", 0);
      }

      if ((JSON.parse($(this).data('edit').status_line)).status_line.C == 1) {
        $('#editlineC').prop("checked", 1);
      } else {
        $('#editlineC').prop("checked", 0);
      }
    });
  });


  function Myget_under(id) {
    console.log(id);
    $('#myid').val(id);
    $('#myf').submit();
  }

  function FilterChange(type) {
    if (type != '') {
      $.ajax({
          method: "POST",
          url: "<?= base_url('en/backend/Fagent/select_type') ?>",
          data: {
            type: type
          },
          dataType: 'json',
        })
        .done(function(res) {
          if (res.code == 200) { //เงือนทีื1 ถ้า code 200 แสดงว่ามีข้อมูลให้ทำการ loop ออกมา
            if (res.data.length >= 1) {

              $('#tb_status').html('');
              let i = 1;
              let content = '';
              let response = JSON.parse(JSON.stringify(res.data));

              $.each(response, function(index, row) {
                content += '<tr class="text-center">';
                content += '<td>' + i + '</td>';
                content += '<td> <a href="">' + row['agent_name'] + '</a></td>';
                content += '<td>' + '<button type="button" class="btn  btn_editD" id="dd" onclick="Selectedit(' + row['agent_id'] + ',' + row['agent_status'] + ');"><i class="fas fa-file-signature"style="color:#4e0a07;"></button></td>';
                if (row['agent_status'] == 0) {
                  content += '<td><span style ="color:blue;">เปิด</span></td>';
                } else {
                  content += '<td><span style="color:red;">ปิด</span></td>';
                }

                if (row['agent_suspend'] == 0) {
                  content += '<td><span style ="color:blue;">ไม่ระงับ</span></td>';
                } else {
                  content += '<td><span style="color:red;">ระงับ</span></td>';
                }

                content += '<td>' + row['agent_myname'] + '</td>';
                content += '<td>' + row['agent_mysername'] + '</td>';
                content += '<td>' + row['agent_tel_mobile'] + '</td>';

                if (JSON.parse(row.status_line).status_line.A == 1) {
                  content += '<td>' + '<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>' + '</td>';
                } else {
                  content += '<td>' + '<i class="fa fa-times" aria-hidden="true" style="color:red;"></i>' + '</td>';
                }

                if (JSON.parse(row.status_line).status_line.B == 1) {
                  content += '<td>' + '<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>' + '</td>';
                } else {
                  content += '<td>' + '<i class="fa fa-times" aria-hidden="true" style="color:red;"></i>' + '</td>';
                }

                if (JSON.parse(row.status_line).status_line.C == 1) {
                  content += '<td>' + '<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>' + '</td>';
                } else {
                  content += '<td>' + '<i class="fa fa-times" aria-hidden="true" style="color:red;"></i>' + '</td>';
                }

                // content += '<td>' + '<button type="button" class="btn "><i class="fas fa-file-signature"style="color:#4e0a07;"></button>' + '</td>';
                content += '<td>' + '<button type="button" class="btn " id="ss" onclick="edit_lottery(' + row['agent_id'] + ');"><i class="fas fa-file-signature"style="color:#4e0a07;"></button></td>';

                content += '<td>' + '' + '</td>';
                content += '</tr>';
                i++;

              });
              $('#tb_status').html(content);


            } else {

              alert('ไม่พบข้อมูล');
            }

          } else { //กรณีที่ไม่มีข้อมูล ให้ alert ออกมา
            alert('ไม่พบข้อมูล');
          }


        });

    } else {
      alert('Type Error');
    }
  }



  function Selectedit(id, status) {
    $.ajax({
        method: "POST",
        url: "<?= base_url('en/backend/Fagent/select_agent') ?>",
        data: {
          id: id,
          status: status
        },
        dataType: 'json',
      })
      .done(function(res) {
        if (res.code == 200) {

          let agent_id = JSON.parse(res.data).agent[0].agent_id;
          $('#edit_userall').modal('show');

          $('#h_id').val(agent_id);


          $('#editname').val(JSON.parse(res.data).agent[0].agent_myname);
          $('#editlastname').val(JSON.parse(res.data).agent[0].agent_mysername);

          if (JSON.parse(res.data).agent[0].agent_tel_mobile != null) {
            $('#editphone').val(JSON.parse(res.data).agent[0].agent_tel_mobile);
          } else {}


          if (JSON.parse(res.data).agent[0].agent_status == 0) { //0 เปิด
            $('#editstatus_on').attr("checked", "checked");
          } else {
            $('#editstatus_off').attr("checked", "checked");;
          }


          if (JSON.parse(res.data).agent[0].agent_suspend == 0) { // 0 เปิด
            $('#st_su_on').attr("checked", "checked");
          } else {
            $('#st_su_off').attr("checked", "checked");;
          }
          let a = JSON.parse(res.data).agent[0].status_line;
          let line_a = JSON.parse(a).status_line.A;
          let line_b = JSON.parse(a).status_line.B;
          let line_c = JSON.parse(a).status_line.C;


          if (line_a == 1) {
            // $('#editlineA').attr( "checked" );
            $('#editlineA').prop("checked", 1);
          } else {
            $('#editlineA').prop("checked", 0);
          }

          if (line_b == 1) {
            $('#editlineB').prop("checked", 1);
          } else {
            $('#editlineB').prop("checked", 0);
          }

          if (line_c == 1) {
            $('#editlineC').prop("checked", 1);
          } else {
            $('#editlineC').prop("checked", 0);
          }

        } else {
          alert('ไม่พบข้อมูลที่ส่งมา');
        }
      })
  }

  function edit_lottery(id) {
    $.ajax({
        method: "POST",
        url: "<?= base_url('en/backend/Fagent/setting_lottery') ?>",
        data: {
          id: id,
        },
        dataType: 'json',
      })
      .done(function(res) {

      });

  }

  function updateUs() {
    $.ajax({
        method: "POST",
        url: "<?= base_url('en/backend/Fagent/update_us') ?>",
        data: $('#usdata').serialize(),
        dataType: 'json',
      })
      .done(function(res) {
        console.log(res);
        if (res.code == 200) {
          //หลังบันทึกข้อมูลสำเร็จให้ โหลดหน้าใหม่ 
          swal('', res.msg, 'success').then((result) => {
            setTimeout(function() {
              window.location.href = "<?php base_url('') ?>";
            }, 300);
          })
          // $('#edit_userall').modal('hide');
        } else {
          // alert(res.msg);
          swal('', res.msg, 'error');
          $('#edit_userall').modal('hide');
        }
      });
  }
</script>



<?php $this->endSection(); ?>