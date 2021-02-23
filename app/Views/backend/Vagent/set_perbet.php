<?php $this->extend('layouts/tem_backend/main'); ?>
<?php $this->section('content'); ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= lang('Backend_Fmember.' . 'Max/Min Pay'); ?></h1>
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
              <!-- <i class="fas fa-edit"></i> -->
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <select name="slBettingType" id="slBettingType" onchange="FilterChange(this);" class="form-control">
                      <option value="1"><?= lang('Backend_Fmember.' . 'Minimum per bet'); ?></option>
                      <option value="2"><?= lang('Backend_Fmember.' . 'Maximum per bet'); ?></option>
                      <option value="3"><?= lang('Backend_Fmember.' . 'Maximum per number'); ?></option>
                      <option value="4"><?= lang('Backend_Fmember.' . 'Pay rate'); ?></option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
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
                          <table id="" class="table table-bordered table-striped">
                            <thead>
                              <tr>
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
                                <th>4 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                                <th>5 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                              </tr>
                              <tr>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                              </tr>
                              <tr>
                                <td colspan="14">
                                  <input type="button" name="btnUpdate" id="btnUpdate" value="<?= lang('Backend_Fmember.' . 'Save'); ?>" onclick="">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <table id="tbcredit" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Name'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Edit'); ?></th>
                                <th>
                                  <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox">
                                    </div>
                                  </div>
                                </th>
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
                                <th>4 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                                <th>5 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Status'); ?></th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                          <!-- E รัฐบาล -->
                        </div>
                      </div>
                      <div class="tab-pane fade" id="thai-share-lotto" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                        <div class="overlay-wrapper">
                          <!-- <div class="overlay dark"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                            <div class="text-bold pt-2">Loading...</div>
                          </div> -->
                          <table id="" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>3 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                                <th>3 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                                <th>2 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                                <th>2 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                                <th>2 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                                <th>1 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                                <th>1 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                              </tr>
                              <tr>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 20,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 20,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 20,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 20,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 300,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 300,000</td>
                              </tr>
                              <tr>
                                <td colspan="14">
                                  <input type="button" name="btnUpdate" id="btnUpdate" value="แก้ไขข้อมููล" onclick="">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- S หุ้นไทย -->
                          <table id="tblDataList" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th><?= lang('Backend_Fmember.' . 'No.'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'User'); ?></th>
                                <th><?= lang('Backend_Fmember.' . 'Name'); ?></th>

                                <th>
                                  <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox">

                                    </div>

                                  </div>
                                </th>
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
                            <tbody></tbody>
                          </table>
                          <!-- E หุ้นไทย -->
                        </div>
                      </div>
                      <div class="tab-pane fade" id="hanoi-lotto" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                        <div class="overlay-wrapper">
                          <!-- <div class="overlay dark"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    <div class="text-bold pt-2">Loading...</div>
                  </div> -->
                          <table id="" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>3 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                                <th>3 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                                <th>2 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                                <th>2 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                                <th>2 <?= lang('Backend_Fmember.' . 'Toad'); ?></th>
                                <th>1 <?= lang('Backend_Fmember.' . 'Upper'); ?></th>
                                <th>1 <?= lang('Backend_Fmember.' . 'Under'); ?></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                                <td><input class="form-control" /></td>
                              </tr>
                              <tr>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 10,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 20,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 20,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 20,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 20,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 300,000</td>
                                <td><?= lang('Backend_Fmember.' . 'Min'); ?> : 5 <br> <?= lang('Backend_Fmember.' . 'Max'); ?> : 300,000</td>

                              </tr>
                              <tr>
                                <td colspan="14">
                                  <input type="button" name="btnUpdate" id="btnUpdate" value="แก้ไขข้อมููล" onclick="">
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <!-- S ฮานอย -->
                          <table id="tblDataList2" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>ชื่อ</th>
                                <th>
                                  <div class="form-group">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox">
                                    </div>
                                  </div>
                                </th>
                                <th>แก้ไข</th>
                                <th>3 ตัวบน</th>
                                <th>3 ตัวโต๊ด</th>
                                <th>2 ตัวบน</th>
                                <th>2 ตัวล่าง</th>
                                <th>2 ตัวโต๊ด</th>
                                <th>1 ตัวบน</th>
                                <th>1 ตัวล่าง</th>
                                <th>สถานะ</th>
                              </tr>
                            </thead>
                            <tbody></tbody>
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
<!-- /.content -->

<script>


</script>


<?php $this->endSection(); ?>