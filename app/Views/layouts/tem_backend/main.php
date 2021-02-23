<!doctype html>
<html class="no-js" lang="en">
<?php echo $this->include('layouts/tem_backend/head'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php echo $this->include('layouts/tem_backend/nav'); ?>
    <?php echo $this->include('layouts/tem_backend/sidebar'); ?>
    <div class="content-wrapper">
      <?php $this->renderSection('content'); ?>
    </div>
    <?php echo $this->include('layouts/tem_backend/footer'); ?>
  </div>
</body>

</html>