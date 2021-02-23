<?php $this->extend('layouts/tem_backend/main'); ?>
<?php $this->section('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= lang('Backend_Fmember.' . 'Set Time'); ?></h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">

          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary card-tabs">
                  <div class="card-body">
                    <div class="tab-content" id="custom-tabs-five-tabContent">
                      <div class="tab-pane fade show active" id="thai-lotto" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                        <div class="overlay-wrapper">
                          <!-- S รัฐบาล -->
                          <table id="tbcredit" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Type'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Edit'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Date / Time'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Status'); ?></th>
                          
                              </tr>
                            </thead>
                            <tbody>
                              <td>1</td>
                              <td>name</td>
                              <td>user</td>
                              <td><i style="cursor:pointer;" class="fas fa-edit"></i> | <i style="cursor:pointer;" class="fas fa-trash-alt"></i></td>
                              <td>day / time</td>
                              <td>status</td>
                            </tbody>
                          </table>
                          <!-- E รัฐบาล -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


  </div>

  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>


</script>


<?php $this->endSection(); ?>