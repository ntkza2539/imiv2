<?php $leng = service('request')->getLocale();
$url = substr(uri_string(), 3);
?>
<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle">
		<i class="hamburger align-self-center"></i>
	</a>
	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
			<li class="nav-item ">
			<div class="language-select dropdown" id="language-select">
				<a class="nav-link dropdown-toggle" href="#" id="languageDropdown" data-bs-toggle="dropdown">
					<i class="flag-icon flag-icon-<?php echo ($leng=='en')?'gb':$leng;?>"></i>&nbsp;&nbsp;<?=strtoupper($leng);?>
				</a>

				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
					
					<a class="dropdown-item" onclick="location.href='<?= base_url('th/' . $url); ?>'">
						<!-- <img src="<?= base_url('public/asset/bootstrap5/dist/img/flags/th.png') ?>" alt="English" width="20" class="align-middle me-1" /> -->
						<span class="flag-icon flag-icon-th" ></span>&nbsp;&nbsp;  <?= lang('Lang.th'); ?>
						
					</a>


					<a class="dropdown-item" onclick="location.href='<?= base_url('en/' . $url); ?>'">
						<!-- <img src="<?= base_url('public/asset/bootstrap5/dist/img/flags/us.png') ?>" alt="English" width="20" class="align-middle me-1" />
						<span class="align-middle">English</span> -->
						<span class="flag-icon flag-icon-gb" ></span>&nbsp;&nbsp;  <?= lang('Lang.en'); ?>
					</a>


					<a class="dropdown-item" onclick="location.href='<?= base_url('cn/' . $url); ?>'">
						<span class="flag-icon flag-icon-cn" ></span>&nbsp;&nbsp;  <?= lang('Lang.cn'); ?>
					</a>


				</div>
			</div>
			</li>
			

			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
					<i class="align-middle" data-feather="settings"></i>
				</a>

				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
					<img src="<?= base_url('public/asset/bootstrap5/dist/img/avatars/avatar.jpg') ?>" class="avatar img-fluid rounded-circle me-1" alt="<?= $this->session->get('session_admin')['agent_myname'] ?>" /> <span class="text-dark"><?= $this->session->get('session_admin')['agent_myname'] ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="<?= base_url('backend/Fprofile/profile')?>"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= base_url('backend/Auth/logout');?>"><i class="fas fa-power-off" style="color:red;"></i> Logout</a>
				</div>
			</li>
		</ul>
	</div>
</nav>