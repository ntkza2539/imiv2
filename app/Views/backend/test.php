<?php $this->extend('layouts/tem_bs5/main'); ?>
<?php $this->section('content'); ?>
<div id="app">
<add-user></add-user>
</div>

<script src="<?php echo base_url('/vue/app.js')?>" type="module"></script>
<script>

   // $(function() { // ฟังก์ชั่นเริ่มต้น (ready/ทำงานทันที) มีได้แค่ 1 ตัวแต่ละหน้า
   
   //     // ===================== สร้าง ดาต้าเทเบิล  กำหนดตัวแปรเพื่อเพิ่มลบข้อมูลได้ ===========
   //     var dt_mytable = $('#mytable').DataTable({
   //       "searching": false,
   //         lengthMenu: [
   //             [10, 25, 50, -1],
   //             [10, 25, 50, "All"]
   //         ],
   //     });
   
   //     // ===================== ADD data ===========
   //     $('#F_add').submit(function(e) {
   //         e.preventDefault();
   //         $.ajax({
   //             method: "POST",
   //             url: "<?= base_url('en/backend/adddata') ?>",
   //             data: {
   //                 name: $('#username').val(),
   //                 email: $('#email').val(),
   //                 password: $('#password').val()
   //             },
   //             dataType: 'json',
   //             success: function(res) {
   //                 if (res.status) {
   //                     $('#F_add').trigger("reset");
   //                     var rowNode = dt_mytable.row.add([
   //                         res.data.test_name,
   //                         res.data.test_email,
   //                         res.data.test_password,
   //                         `<a href="javascript:void(0);" ><i class="fa fa-edit"></i></a> |
   //                             <a href="javascript:void(0);" ><i class="fa fa-trash-o"></i></a>`
   //                     ]).draw().node();
   //                     $(rowNode).attr({
   //                         'align': 'center',
   //                         'id': 'tr' + res.data.test_id,
   //                         'data-datalist': JSON.stringify(res.data)
   //                     });
   //                     $("#statusSuccessAdd").removeAttr("hidden");
   //                     setTimeout(() => {
   //                         $("#statusSuccessAdd").attr("hidden", "");
   //                     }, 3000);
   //                 } else {
   //                     // error
   //                     $("#statusErrorAdd").removeAttr("hidden");
   //                     setTimeout(() => {
   //                         $("#statusErrorAdd").attr("hidden", "");
   //                     }, 3000);
   //                 }
   
   //             }
   //         });
   //     });
   //     // ===================== delete ===========
   //     $('#mytable').on('click', '.fa-trash', function() {
   //         var tr = $(this).parents('tr');
   //         if (confirm("ยืนยันการลบ")) {
   //             $.ajax({
   //                 method: "DELETE",
   //                 url: "<?= base_url('en/backend/del/test') ?>/test_id/" + tr.data('datalist').test_id,
   //                 dataType: 'json',
   //                 success: function(res) {
   //                     if (res.status) {
   //                         dt_mytable.row(tr).remove().draw();
   //                         $("#statusDelete").removeAttr("hidden");
   //                         setTimeout(() => {
   //                             $("#statusDelete").attr("hidden", "");
   //                         }, 3000);
   //                     } else {
   //                         $("#statusDeleteerror").removeAttr("hidden");
   //                         setTimeout(() => {
   //                             $("#statusDeleteerror").attr("hidden", "");
   //                         }, 3000);
   //                     }
   //                 }
   //             });
   //         }
   
   //     });
   //     // ===================== show edit =============
   //     $('#mytable').on('click', '.fa-edit', function() {
   //         var tr = $(this).parents('tr');
   //         $('#no').val(tr.data('no'));
   //         $('#sentId').val(tr.data('datalist').test_id);
   //         $('#usernameE').val(tr.data('datalist').test_name);
   //         $('#emailE').val(tr.data('datalist').test_email);
   //         $('#passwordE').val(tr.data('datalist').test_password);
   
   
   //     });
   //     // ===================== sent edit =============
   //     $('#F_edit').submit(function(e) {
   //         e.preventDefault();
   //         $.ajax({
   //             type: "POST",
   //             dataType: "json",
   //             url: "<?= base_url('en/backend/editdata') ?>",
   //             data: $(this).serializeArray(),
   //             success: function(res) {
   //                 if (res.status) {
   //                     dt_mytable.row($('#tr' + res.data.test_id)).data([
   //                         $('#no').val(),
   //                         res.data.test_name,
   //                         res.data.test_email,
   //                         res.data.test_password,
   //                         `<a href="javascript:void(0);" ><i class="fa fa-edit"></i></a> |
   //                             <a href="javascript:void(0);" ><i class="fa fa-trash"></i></a>`
   //                     ]).draw();
   //                     $('#F_edit').trigger("reset");
   //                 } else {
   
   //                 }
   
   //             }
   //         });
   //     });
   
   //     // == END Ready ==
   // });
</script>
<?php $this->endSection(); ?>