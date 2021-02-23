<!doctype html>
<html lang="en">
<?php echo $this->include('layouts/tem_bs5/head'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
  <div class="wrapper">
    <?php echo $this->include('layouts/tem_bs5/sidebar'); ?>

    <div class="main">

      <?php echo $this->include('layouts/tem_bs5/nav'); ?>
      <main class="content">
        <div class="container-fluid p-0">
          <?php $this->renderSection('content'); ?>
        </div>
      </main>
      <?php echo $this->include('layouts/tem_bs5/footer'); ?>

    </div>
  </div>
  <script src="<?= base_url('public/asset/bootstrap5/dist/js/app.js')?>"></script>
  
</body>

</html>