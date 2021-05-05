<div>
	<h2>klik disini untuk menambahkan data</h2><br>
	<a href="<?php echo base_url() ?>index.php/Welcome/tambah_data_investor"><button class="btn btn-primary btn-lg">tambah data</button></a><br>     
</div></br>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">DATA INVESTOR</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body no-padding">
		<table class="table table-condensed">
			<tr>
				<th>id investor</th>
				<th>nama</th>
				<th>alamat</th>
				<th>keterangan</th>
				
			</tr>
			<?php 
			foreach ($tabelinvestor as $tampilkan ) {
				# code...
			
              echo "<tr>";
              	echo "<td>$tampilkan->id_investor</td>";
              	echo "<td>$tampilkan->nama</td>";
              	echo "<td>$tampilkan->alamat</td>";
              	echo "<td>$tampilkan->keterangan</td>";
              	echo "<td><a href='edit_data_investor/$tampilkan->id_investor'><button class='btn btn-primary btn-xs'>edit</button></a><button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->id_investor)'>hapus</button/></td>";
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
              <form action="<?php echo base_url() ?>index.php/welcome/hapusDataInvestor" method="POST" id="fromhapus">
              	<input type="hidden" name="id_investor" value="">

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
				url:"<?php echo base_url('index.php/Welcome/getIdInvestor') ?>/"+id,
				type:"GET",
				dataType:"JSON",
				success: function(data){
					$('[name="id_investor"]').val(data.id_investor);
					$('#modal-warning').modal('show');
				}
			})
		}
	</script>