<div class="box box-primary">
  <div class="box-header with-border">
    <div class="box-title">tambah data user</div>
  </div>
  <div class="box-body">
    <form action="<?php echo base_url() ?>index.php/Welcome/update_user" method="POST">
      <?php foreach ($GETid_data_user as $tampilkan) { ?>
        <input type="hidden" name="id_user" value="<?php echo $tampilkan->id_user ?>">
      <input type="text" name="nama_lengkap" class="form-control input-lg" placeholder="nama lengkap" value="<?php echo $tampilkan->nama_lengkap ?>"><br>
      <input type="text" name="username" class="form-control input-lg" placeholder="username" value="<?php echo $tampilkan->username ?>"><br>
      <input type="text" name="password" class="form-control input-lg" placeholder="password" value="<?php echo $tampilkan->password ?>"><br>
      <button class="btn btn-primary btn-lg" type="submit">tambah data asset</button><br>
      <?php 
      } ?>
    </form>
  </div>
</div>