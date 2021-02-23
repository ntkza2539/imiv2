<?php
$this->session = \Config\Services::session();
$leng = service('request')->getLocale();
$this->db = \Config\Database::connect();
$segment = explode('/', uri_string());

$groupmenu = $this->session->session_admin['groupmenu'];

$mymenu = $this->session->session_admin['menu'];

// print_r($groupmenu);
$newmenu = $groupmenu;
$submenu = [];
$i = 0;
foreach ($groupmenu as $key => $value) {
	$newmenu[$i]['list'] = [];
	$newmenu[$i]['sub'] = [];
	$ch_key = [];
	foreach ($mymenu as $k => $val) {

		if ($value['menu_group'] == $val['menu_group'])
			if ($val['parent_menu'] == 0) {
				if ($val['menu_link'] != '') {
					// array_push($newmenu[$i]['list'], $val);
				}
			} else {
				$parent = $this->db->table('tb_menu')->select('menu_name,menu_icon')
					->where('menu_id', $val['parent_menu'])
					->get()->getResultArray();

				if (!in_array($parent[0]['menu_name'], $ch_key)) {
					array_push($ch_key, $parent[0]['menu_name']);
					$submenu[$parent[0]['menu_name']]['icon'] = [];
					$submenu[$parent[0]['menu_name']]['listsub'] = [];
					array_push($submenu[$parent[0]['menu_name']]['icon'], $parent[0]['menu_icon']);
					array_push($submenu[$parent[0]['menu_name']]['listsub'], $val);
				} else {
					array_push($submenu[$parent[0]['menu_name']]['listsub'], $val);
				}
				$newmenu[$i]['sub'] = $submenu;
			}
	}
	$i++;
}



// echo "<pre>";
// print_r($newmenu);

// die;
?>
<style>
.sidebar-dropdown .sidebar-link {
    padding: .55rem 1.5rem .55rem 1.7rem;
    font-weight: 400;
    color: #adb5bd;
}
</style>
<nav id="sidebar" class="sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="#">
		<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            width="20px" height="20px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
            <path d="M19.4,4.1l-9-4C10.1,0,9.9,0,9.6,0.1l-9,4C0.2,4.2,0,4.6,0,5s0.2,0.8,0.6,0.9l9,4C9.7,10,9.9,10,10,10s0.3,0,0.4-0.1l9-4
              C19.8,5.8,20,5.4,20,5S19.8,4.2,19.4,4.1z"/>
            <path d="M10,15c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,15,10.1,15,10,15z"/>
            <path d="M10,20c-0.1,0-0.3,0-0.4-0.1l-9-4c-0.5-0.2-0.7-0.8-0.5-1.3c0.2-0.5,0.8-0.7,1.3-0.5l8.6,3.8l8.6-3.8c0.5-0.2,1.1,0,1.3,0.5
              c0.2,0.5,0,1.1-0.5,1.3l-9,4C10.3,20,10.1,20,10,20z"/>
          </svg>
 			<span class="align-middle me-3">Lotto</span>
		</a>


		<ul class="sidebar-nav" style="font-size:14px;">
			<?php foreach ($newmenu as $value) { ?>
				<!-- Group -->
				<li class="sidebar-header">
					<?= $value['menu_group'] ?>
				</li>

				<!-- List Menu -->

				<?php foreach ($value['list'] as $val) {
					$ch = explode('/', $val['menu_link']); ?>
					<li class="sidebar-item ">
						<a href="<?= base_url($leng . '/' . $val['menu_link']) ?>" data-bs-toggle="collapse"  class="sidebar-link <?= (end($segment) == end($ch)) ? 'active' : '' ?>" >
             		 <i class=" align-middle <?= $val['menu_icon'] ?>" ></i> <span class="align-middle"><?= lang('Backend_Menu.' . $val['menu_name']); ?></span>
						</a>
					</li>
				<?php }  ?>


				<!-- Sub Menu -->
				<?php $i=0; foreach ($value['sub'] as $k => $val) { ?>
					<li class="sidebar-item ac" >
						<a href="#" data-bs-target="#m<?=$i?>" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle" data-feather="<?= $val['icon'][0] ?>"></i>
							 <span class="align-middle"><?= lang('Backend_Menu.' . $k); ?></span>
						</a>
						<ul id="m<?=$i?>" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
						<?php foreach ($val['listsub'] as $v) { $ch = explode('/',$v['menu_link']); ?>
							<li style="font-size:13.12px;" class="sidebar-item <?= (end($segment) == end($ch)) ? 'active' : '' ?>">
								<a class="sidebar-link" href="<?= base_url($leng . '/' . $v['menu_link']) ?>" >
								<i class="align-middle" data-feather="<?= $val['icon'][0] ?>"></i>
								<span class="align-middle"><?= lang('Backend_Menu.' . $v['menu_name']); ?></span>
							    </a>
						    </li>
							<?php } ?>
						</ul>
					</li>

				<?php $i++;}  ?>
			<?php }  ?>
		</ul>
	</div>
</nav>

<script>
	window.onload = function(e){ 
	var ac=document.querySelector('.sidebar-item .active').parentNode;
		ac.classList.add("show");
		ac.parentNode.setAttribute('aria-expanded','true');
		ac.parentNode.classList.add("active");
}

	
</script>

