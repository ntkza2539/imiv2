<?php $leng = service('request')->getLocale();
      $url = substr(uri_string(), 3);
 ?>
<style>
.dropdown-item {
    display: block;
    width: 100%;
    padding: .25rem 1rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
    cursor: pointer;
}
.navbar-expand .navbar-nav .nav-link {
    padding-right: 1rem;
    padding-left: 0rem;
}
[class*=sidebar-dark] .user-panel {
    border-bottom: 1px solid #4dbcd4;
}

</style>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
      <li class="nav-item">
         <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="padding-left: 1rem;"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item">
         <a class="nav-link" data-widget="fullscreen" href="#" role="button">
         <i class="fas fa-expand-arrows-alt"></i>
         </a>
      </li> -->
      
   </ul>
   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <li class="nav-item">
         <div class="language-select dropdown" id="language-select">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
            <i class="flag-icon flag-icon-<?php echo ($leng=='en')?'gb':$leng;?>"></i>&nbsp;&nbsp;<?=strtoupper($leng);?>
            </a>
            <div class="dropdown-menu  dropdown-menu-sm dropdown-menu-right" aria-labelledby="language">
               <div class="dropdown-item"onclick="location.href='<?= base_url('th/'.$url);?>'">
                  <span class="flag-icon flag-icon-th" ></span>&nbsp;&nbsp;  <?= lang('Lang.th'); ?>
               </div>
               <div class="dropdown-item"onclick="location.href='<?= base_url('en/'.$url);?>'">
                  <!-- <i class="flag-icon flag-icon-gb" onclick="location.href=''"></i> -->
                  <span class="flag-icon flag-icon-gb" ></span>&nbsp;&nbsp;  <?= lang('Lang.en'); ?>
               </div>
               <div class="dropdown-item" onclick="location.href='<?= base_url('cn/'.$url);?>'">
                  <span class="flag-icon flag-icon-cn" ></span>&nbsp;&nbsp;  <?= lang('Lang.cn'); ?>
               </div>
            </div>
         </div>
      </li>
      <li class="nav-item">
         <a class="nav-link"  href="<?= base_url('backend/Auth/logout');?>" ><i class="fas fa-power-off" style="color:red;"></i></a>
      </li>
   </ul>

</nav>