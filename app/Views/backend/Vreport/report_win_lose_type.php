<?php $this->extend('layouts/tem_backend/main'); ?>
<?php $this->section('content'); ?>

<section class="content-header">
     
 </section>

  <!-- Main content -->
<section class="content mt-2">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                 <p class="text-danger">report_win_lose_type</p>
                 <hr>
                <pre>
                  <?php 
                  print_r($test);
                  foreach ($test as $key => $value) {
                   echo json_decode($value->num_3upper)->minPerbet ;
                  }
                    
                  
                    
                  ?>
                  </pre>



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

<script>


</script>


<?php $this->endSection(); ?>

