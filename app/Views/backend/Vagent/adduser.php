<?php $this->extend('layouts/tem_bs5/main'); ?>
<?php $this->section('content'); ?>

<h1 class="h3 mb-3"><?= lang('Backend_Fmember.' . 'Add Member'); ?></h1>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form row</h5>
                <h6 class="card-subtitle text-muted">Bootstrap column layout.</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="inputEmail4"><?= lang('Backend_Fmember.' . 'Level'); ?></label>
                            <select name="level" id="level" class="form-control" onchange="select_show_under(this.value);$('#idname').html('')">
                                <option selected=""><?= lang('Backend_Fmember.' . 'Select'); ?></option>
                                <?php
                                // ag1=5 ag2=6 ag3=7 agent_type
                                switch ($agent_type) {
                                    case '0':  // pro 
                                ?>
                                        <option value="1">Web</option>
                                        <option value="2">Suerper Senior</option>
                                        <option value="3">Senior</option>
                                        <option value="4">Master</option>
                                        <option value="5">Agent1</option>
                                        <option value="6">Agent2</option>
                                        <option value="7">Agent3</option>
                                        <option value="8">Member</option>
                                    <?php break;
                                    case '1':  // WEB 
                                    ?>
                                        <option value="2">Suerper Senior</option>
                                        <option value="3">Senior</option>
                                        <option value="4">Master</option>
                                        <option value="5">Agent1</option>
                                        <option value="6">Agent2</option>
                                        <option value="7">Agent3</option>
                                        <option value="8">Member</option>
                                    <?php break;
                                    case '2': // Suerper Senior 
                                    ?>
                                        <option value="3">Senior</option>
                                        <option value="4">Master</option>
                                        <option value="5">Agent1</option>
                                        <option value="6">Agent2</option>
                                        <option value="7">Agent3</option>
                                        <option value="8">Member</option>

                                    <?php break;
                                    case '3':  // Senior 
                                    ?>
                                        <option value="4">Master</option>
                                        <option value="5">Agent1</option>
                                        <option value="6">Agent2</option>
                                        <option value="7">Agent3</option>
                                        <option value="8">Member</option>
                                    <?php break;
                                    case '4':  // master 
                                    ?>
                                        <option value="5">Agent1</option>
                                        <option value="6">Agent2</option>
                                        <option value="7">Agent3</option>
                                        <option value="8">Member</option>
                                    <?php break;

                                    case '5':  //Agent1
                                    ?>
                                        <option value="6">Agent2</option>
                                        <option value="7">Agent3</option>
                                        <option value="8">Member</option>
                                    <?php break;
                                    case '6': // Agent2
                                    ?>
                                        <option value="7">Agent3</option>
                                        <option value="8">Member</option>
                                    <?php break;

                                    case '7': //Agent3 
                                    ?>
                                        <option value="8">Member</option>
                                    <?php break;

                                    default: ?>

                                <?php break;
                                }
                                ?>

                            </select>
                        </div>
                        <!-- ภายใต้ -->
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="inputPassword4"><?= lang('Backend_Fmember.' . 'Underneath'); ?></label>
                            <select name="under" id="under" class="form-control" onchange="
                                        getcombyid(this.value);
                                        showname($('#level').val());
                                        ">
                            </select>
                        </div>
                        <!-- ID name -->
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="">ID name</label>
                            <div class="input-group mb-2 mr-sm-2" id="idname">
                                    <!--  -->

							</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-2">
                            <label class="form-label" for="">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputState">ชื่อ-สกุล</label>
                            <input type="text" class="form-control" id="">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="" 
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="">Validate pass</label>
                            <p>......</p>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-2">
                            <label class="form-label" for=""> เบอร์โทร </label>
                            <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{10}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="">Email</label>
                            <input type="email" class="form-control" id="">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for=""> ว/ด/ป เกิด </label>
                            <input type="date" class="form-control" id="">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for=""></label>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-2">
                            <label class="form-label" for=""> เครดิต </label>
                            <input class="form-control" type="" id="" name="">
                        </div>
                        <div class="mb-3 col-md-2">
                            <label class="form-label" for=""> เครดิตสูงสุด </label>
                            <input type="email" class="form-control" id="">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label" for="">  </label>
                            
                        </div>
                      
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ============ divcom ============= -->
    <div class="col-12 col-lg-12" id="divcom" hidden>
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist" id="menuTab">
               
            </ul>
            <div class="tab-content" id="Tabcontent">

            </div>
        </div>
    </div>
</div>

<script src="<?=base_url('public/my_js/script_agent/table_cf_thai.js')?>" ></script>
<script>
    $(function() {
        //   console.log(555);
    });

    function register() {
        $.ajax({
                method: "POST",
                url: "<?= base_url('en/backend/Fagent/register') ?>",
                data: $('#user_data').serialize(),
                dataType: 'json',
            })
            .done(function(res) {
                if (res.code == 200) {
                    alert(res.msg);
                    //หลังบันทึกข้อมูลสำเร็จให้ reset form  
                    $("#user_data").trigger("reset");
                } else {
                    alert(res.msg);
                }
            });
    }

    function select_show_under(type) {
        $('#divcom').attr('hidden', true);
        $('#Tabcontent').html('');
        $('#menuTab').html('');
        $.ajax({
            method: "POST",
            url: "<?= base_url('en/backend/Fagent/get_under_list') ?>",
            data: {
                type: type
            },
            dataType: 'json',
        }).done(function(res) {
            // console.log(res);
            // แสดงข้อมูลใน under
            var opt = "<option  disabled selected>-</option>";
            $.each(res, function(key, val) {
                opt += "<option value='" + val["agent_id"] + "'>" + val["agent_name"] + "</option>"
            });
            $('#under').html(opt);

        });

        if (type == 1) { //web แสดงสามช่อง
            $('#userName1').removeClass('collapse');
            $('#userName2').removeClass('collapse');
            $('#userName3').removeClass('collapse');
            $('.hid').show()
        } else if (type == 4) { // type 4 master  2 ช่อง
            $('#userName1').removeClass('collapse');
            $('#userName2').removeClass('collapse');
            $('#userName3').addClass('collapse');
            $('.hid').show()

        } else if (type == 5 || type == 6 || type == 7) { // type   5 agnet 1 6 agent2 7 agent 3  /2 ช่อง
            $('#userName1').removeClass('collapse');
            $('#userName2').removeClass('collapse');
            $('#userName3').addClass('collapse');
            $('.hid').show()

        } else if (type == 8) { //member  3 ช่อง
            $('#userName1').removeClass('collapse');
            $('#userName2').removeClass('collapse');
            $('#userName3').removeClass('collapse');
            $('.hid').hide()
        } else { // type 2 senior type 3 supper senior
            $('#userName1').removeClass('collapse');
            $('#userName2').addClass('collapse');
            $('#userName3').addClass('collapse');
            $('.hid').show()
        }

    }

    function getcombyid(user_id) {
        $('#divcom').attr('hidden', true);
        $('#Tabcontent').html('');
        $('#menuTab').html('');
        $.ajax({
            method: "POST",
            url: "<?= base_url('en/backend/Fagent/get_com_ByuserId') ?>",
            data: {
                user_id: user_id,
                id_lotto: 0 //0 lotto thai - 1 .....
            },
            dataType: 'json',
        }).done(function(res) {
            var data = JSON.parse(res);
            if (data.length > 0) {
                $('#divcom').removeAttr('hidden');
                // console.log(data);
                $.each(data, function(index, value) {
                    // console.log(value);
                    var level = $('#level').val();
                    switch (value.tb_cf) {
                        case "tb_cf_thai":
                            $('#menuTab').append(`<li class="nav-item"><a class="nav-link active" href="#` + value.tb_cf + `" data-bs-toggle="tab" role="tab" aria-selected="true">หวยไทย</a></li>`);
                            txt= txt_cf_thia(value.list,level);
                                $('#Tabcontent').append(txt);
                            break;

                        default:
                            break;
                    }

                });

            }else{
                $('#divcom').attr('hidden', true);
                $('#Tabcontent').html('');
                $('#menuTab').html('');
            }

        });
    }
    function showname(level){
        $('#idname').html('');
        var opA_Z = '';
        var op0_9 = '';
        for (var i = 65; i <= 90; i++) {
            opA_Z +='<option>' + String.fromCharCode(i) + '</option>';
            }
            for (var i = 0; i <= 9; i++) {
            opA_Z +='<option>' + i + '</option>';
            }
        var txt = `<div class="mb-3 col-md-3">
                      <div class="input-group-text" id="prefixname">`+$('#under option:selected').text()+`</div>
                  </div>`;       
         // 1  Web
        // 2  Suerper Senior
        // 3  Senior
        // 4  Master
        // 5  Agent1
        // 6  Agent2
        // 7  Agent3
        // 8  Member
       switch (level) {
           case "1":
            txt += `<div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`                            
                        </select>
                     </div>`;
               break;
           case "2":
            txt += `<div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`                            
                        </select>
                     </div>`;
               break;
           case "3":
            txt += `<div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`                            
                        </select>
                     </div>`;
               break;
           case "4":
            txt += `<div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`                           
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`                            
                        </select>
                     </div>`;
               break;
           case "5":
            txt += `<div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`                            
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`                            
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                           `+op0_9+opA_Z+`                            
                        </select>
                     </div>`;
               break;
           case "6":
            txt += `<div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`                            
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`                            
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`
                        </select>
                     </div>`;
               break;
           case "7":
            txt += `<div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                             `+op0_9+opA_Z+`                           
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`
                        </select>
                     </div>`;
               break;
           case "8":
            txt += `<div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`
                        </select>
                     </div>
                     <div class="mb-3 col-md-2">
                        <select  class="form-control selectIdname">
                            `+op0_9+opA_Z+`
                        </select>
                     </div>`;
               break;
  
       }

        $('#idname').append(txt);
    }
</script>


<?php $this->endSection(); ?>
