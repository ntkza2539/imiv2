<?php
$this->session = \Config\Services::session();
$leng = service('request')->getLocale();
$this->db = \Config\Database::connect();
$segment = explode('/', uri_string());

$groupmenu =$this->session->session_admin['groupmenu'];

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
            if ($val['parent_menu'] == 0 ) {
                if($val['menu_link'] != ''){
                array_push($newmenu[$i]['list'], $val);
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
<!-- Sidebar-->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-image: linear-gradient(45deg, #03a9f4d1, #607D8B,#0fb7d291);">
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('public/asset/backend/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->get('session_admin')['agent_name'] ?></a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="font-size:15px;">



                <?php  foreach ($newmenu as $value) { ?>
                    <!-- Group -->
                    <li class="nav-header"><?= $value['menu_group'] ?></li>

                    <!-- List Menu -->
                    <?php foreach ($value['list'] as $val) { $ch = explode('/',$val['menu_link']); ?>
                   
                        <li class="nav-item ">
                            <a href="<?= base_url($leng . '/' . $val['menu_link']) ?>" class="nav-link <?=(end($segment)==end($ch))?'active':''?>">
                                <i class="nav-icon fas <?= $val['menu_icon'] ?>" style="font-size:13.12px;"></i>
                                <p>
                                    <?= lang('Backend_Menu.' . $val['menu_name']); ?>
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                    <?php }  ?>

                    <!-- Sub Menu -->
                    <?php /*print_r($value['sub']);*/ foreach ($value['sub'] as $k => $val) { ?>
                   
                        <li class="nav-item ">
                        <!-- menu-open -->
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas <?= $val['icon'][0] ?>"></i>
                                <p>
                                    <?= lang('Backend_Menu.' . $k); ?>
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview" style="font-size:13.12px;">
                                <?php foreach ($val['listsub'] as $v) { $ch = explode('/',$v['menu_link']); ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url($leng . '/' . $v['menu_link']) ?>" class="nav-link <?=(end($segment)==end($ch))?'active':''?>">
                                            <i class="fas <?= $v['menu_icon'] ?> nav-icon"></i>
                                            <p><?= lang('Backend_Menu.' . $v['menu_name']); ?></p>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>
                    <?php }  ?>

                <?php } ?>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Sidebar-->
<script>
    $(window).on('load', function() {
      var ac =  document.querySelector('.active');
    $(ac).parents('li').addClass( "menu-open" );
    });

</script>