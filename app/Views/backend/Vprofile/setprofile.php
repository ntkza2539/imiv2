<?php $this->extend('layouts/tem_bs5/main'); ?>
<?php $this->section('content'); ?>

<h1 class="h3 mb-3">Settings</h1>
<div class="row">
    <div class="col-md-3 col-xl-2">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Profile Settings</h5>
            </div>

            <div class="list-group list-group-flush" role="tablist">
                <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab">
                    Account
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-9 col-xl-10">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="account" role="tabpanel">
                <form id="update_profile">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Public info</h5>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="inputUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $user->agent_username; ?>" placeholder="Username" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputUsername" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                        <small class="text-danger">*หมายเหตุถ้าไม่ต้องการเปลี่ยนรหัสผ่านให้ปล่อยว่าง</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <img alt="Chris Wood" src="<?= base_url('public/asset/bootstrap5/dist/img/avatars/avatar.jpg') ?>" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Private info</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="inputFirstName" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="inputFirstName" name="inputFirstName" placeholder="First name" value="<?= $user->agent_myname ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="inputLastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Last name" value="<?= $user->agent_mysername ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputLastEmail" name="inputLastEmail" placeholder="Email" value="<?= $user->agent_email ?>">
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="inputEmail4" class="form-label">Mobile</label>
                                    <input type="email" class="form-control" id="inputMobile" name="inputMobile" placeholder="mobile" value="<?= $user->agent_tel_mobile ?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="inputCity" class="form-label">birth day</label>
                                    <input type="text" class="form-control" id="inputbirth" name="inputbirth" value="<?= $user->agent_dateofbirth ?>">
                                </div>
                            </div>
                            <button type="button" id="upprofile" class="btn btn-primary" onclick="update();">Update changes</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function update() {
        $.ajax({
                method: "POST",
                url: "<?= base_url('backend/Fprofile/profile/update_profile') ?>",
                data: $('#update_profile').serialize(),
                dataType: 'json',
            })
            .done(function(res) {
                if (res.code == 200) {
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
</script>

<?php $this->endSection(); ?>