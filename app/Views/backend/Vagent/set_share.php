<?php $this->extend('layouts/tem_backend/main'); ?>
<?php $this->section('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= lang('Backend_Fmember.' . 'Share Percentage'); ?></h1>
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
          <div class="card-header">
            <h3 class="card-title">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <select name="Filter" id="Filter" onchange="FilterChange(this);" class="form-control">
                      <option value="1"><?= lang('Backend_Fmember.' . 'Active'); ?></option>
                      <option value="0"><?= lang('Backend_Fmember.' . 'Close'); ?></option>
                      <option value="2"><?= lang('Backend_Fmember.' . 'All'); ?></option>
                    </select>
                  </div>
                </div>
              </div>
            </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-primary card-tabs">
                  <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="thai-lotto-tab" data-toggle="pill" href="#thai-lotto" role="tab" aria-controls="thai-lotto" aria-selected="false"><?= lang('Backend_Fmember.' . 'Lottery'); ?></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="thai-share-lotto-tab" data-toggle="pill" href="#thai-share-lotto" role="tab" aria-controls="thai-share" aria-selected="false"><?= lang('Backend_Fmember.' . 'Thai Lottery'); ?></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="hanoi-lotto-tab" data-toggle="pill" href="#hanoi-lotto" role="tab" aria-controls="hanoi-lotto" aria-selected="false"><?= lang('Backend_Fmember.' . 'Hanoi Lottery'); ?></a>
                      </li>
                    </ul>
                  </div>
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
                                <th><?= lang('Backend_Fmember.' . 'Name'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Edit'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Status'); ?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <td>1</td>
                              <td>name</td>
                              <td>user</td>
                              <td><i class="fas fa-edit"></i></td>
                              <td>status</td>
                            </tbody>
                          </table>
                          <!-- E รัฐบาล -->
                        </div>
                      </div>
                      <div class="tab-pane fade" id="thai-share-lotto" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                        <div class="overlay-wrapper">
                          <!-- <div class="overlay dark"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                            <div class="text-bold pt-2">Loading...</div>
                          </div> -->
                          <!-- S หุ้นไทย -->
                          <table id="tblDataList" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Name'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Edit'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Status'); ?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <td>1</td>
                              <td>name</td>
                              <td>user</td>
                              <td><i class="fas fa-edit"></i></td>
                              <td>status</td>
                            </tbody>
                          </table>
                          <!-- E หุ้นไทย -->
                        </div>
                      </div>
                      <div class="tab-pane fade" id="hanoi-lotto" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                        <div class="overlay-wrapper">
                          <!-- <div class="overlay dark"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    <div class="text-bold pt-2">Loading...</div>
                  </div> -->
                          <!-- S ฮานอย -->
                          <table id="tblDataList2" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Name'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Edit'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Status'); ?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <td>1</td>
                              <td>name</td>
                              <td>user</td>
                              <td><i class="fas fa-edit"></i></td>
                              <td>status</td>
                            </tbody>
                          </table>
                          <!-- E ฮานอย -->
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
<script>


</script>


<?php $this->endSection(); ?>