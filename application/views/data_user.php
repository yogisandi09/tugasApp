<div>
	<h2>klik disini untuk menambahkan data</h2><br>
	<a href="<?php echo base_url() ?>index.php/Welcome/tambah_data_user"><button class="btn btn-primary btn-lg">tambah data</button></a><br>
</div><br>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">DATA USER</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body no-padding">
		<table class="table table-condensed">
			<tr>
				<th>id user</th>
				<th>nama</th>
				<th>aksi</th>
			</tr>
			<?php 
			foreach ($tabeluser as $tampilkan ) {
				# code...
			
              echo "<tr>";
              	echo "<td>$tampilkan->id_user</td>";
              	echo "<td>$tampilkan->nama_lengkap</td>";
              	echo "<td><a href='edit_data_user/$tampilkan->id_user'><button class='btn btn-primary btn-xs'>edit</button></a><button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->id_user)'>hapus</button/></td>";
              echo "</tr>";
          }
			 ?>
		</table>
	</div>	
	<div class="modal modal-warning fade" id="modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Warning Modal</h4>
              </div>
              <form action="<?php echo base_url() ?>index.php/welcome/hapusDataUser" method="POST" id="fromhapus">
              	<input type="hidden" name="id_user" value="">

              <div class="modal-body">
                <p>Apakah anda ingin menghapus data ini</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline">Save changes</button>
              </div>
          </form>
            </div>
          </div>
        </div>
	<script type="text/javascript">
		function hapus(id) {
			$('#fromhapus')[0].reset();
			$.ajax({
				url:"<?php echo base_url('index.php/welcome/getIdUser') ?>/"+id,
				type:"GET",
				dataType:"JSON",
				success: function(data){
					$('[name="id_user"]').val(data.id_user);
					$('#modal-warning').modal('show');
				}
			})
		}
	</script>