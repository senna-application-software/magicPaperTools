<?php if (!defined('AVX')) exit('No direct script access allowed');?>

<div class='container animated fadeIn maincontainer' newTitle='<?php echo $data['title'].$data['version'];?>'>
  <h1 class='page-header'><a href='../hrd/pak_read.avx'></a><i class='fa fa-envelope'></i> <?php echo $data['title'];?> <small class='sub-heading'> <?php echo $data['version'];?> </small></h1>
	<a href='../print/konter_read.avx'>
		<div class="col-md-4 boxmen">			
			<div class='xyz' id='xyz6'>
				<p class='xyz-icon' id='icon4'><i class="fa fa-envelope fa-fw fa-1x"></i></p>
				<p class='xyz-text'>Amplop Konter</p>	
			</div>
			<div class='info_konten'>	
				<div class='konten text-center'>
					<h3 class='text-center'>CTR</h3>
					<h5>Cetak Amplop Konter untuk kiriman barang</h5>
					<i class="fa fa-envelope-o fa-fw fa-5x"></i>
				</div>
			</div>	
		</div>	
	</a>	
	<a href='../print/toko_read.avx'>
		<div class="col-md-4 boxmen">			
			<div class='xyz' id='xyz1'>
				<p class='xyz-icon' id='icon1'><i class="fa fa-envelope fa-fw fa-1x"></i></p>
				<p class='xyz-text'>Amplop Toko Retail</p>	
			</div>			
			<div class='info_konten'>	
				<div class='konten text-center'>
					<h3 class='text-center'>RTL</h3>
					<h5>Cetak Amplop toko (retail)</h5>
					<i class="fa fa-envelope-o fa-fw fa-5x"></i>
				</div>
			</div>
		</div>	
	</a>	
	<div class="col-md-4 multibox">
		<a href='../print/rekrut_read.avx'>
			<div class="col-md-6 boxmen">			
				<div class='xyz' id='xyz3'>
					<p class='xyz-icon' id='icon3'><i class="fa fa-file-o fa-fw fa-1x"></i></p>
					<p class='xyz-text'>Surat Rekrut</p>
				</div>
				<div class='info_konten'>	
					<div class='konten text-center'>
						<h3 class='text-center'>NEW SPG</h3>
						<h5>Surat Permintaan agar dicarikan SPG Baru (SPG Pengganti) ke Pihak Konter</h5>
						<i class="fa fa-user fa-fw fa-5x"></i>				
					</div>
				</div>			
			</div>	
		</a>
		<div class="col-md-6 boxmen">			
			<div class="framming_place">LOADING...<BR>YOUTUBE STREAMING!</div>	
		</div>	
	</div>	

	<a href='../print/spg_read.avx'>
		<div class="col-md-4 boxmen">			
			<div class='xyz' id='xyz7'>
				<p class='xyz-icon' id='icon8'><i class="fa fa-file-o fa-fw fa-1x"></i></p>
				<p class='xyz-text'>Surat Tugas SPG </p>
			</div>		
			<div class='info_konten'>	
				<div class='konten text-center'>
					<h3 class='text-center'>PENEMPATAN SPG</h3>
					<h5>Surat Tugas untuk SPG Pengganti/Baru.<br>Yang Gak aktif harap diedit statusnya (untuk keperluan master SPG bulan berikutnya)</h5>
					<i class="fa fa-file-o fa-fw fa-5x"></i>
				</div>
			</div>	
		</div>	
	</a>  
  <div class="col-md-4 multibox">
		<a href='../print/retur_read.avx'>
			<div class="col-md-6 boxmen">			
				<div class='xyz' id='xyz2'>						
					<p class='xyz-icon' id='icon0'><i class="fa fa-car fa-fw fa-1x"></i></p>
					<p class='xyz-text'>SJ Retur</p>
					<h5 class='page-header'><i class='fa fa-info-circle fa-fw fa-lg text-default'></i><small style='color:#fff'>Retur Ke Kantor</small></h5>			
				</div>
				<div class='info_konten'>	
					<div class='konten text-center'>
						<h3 class='text-center'>RETUR BRG</h3>
						<h5>Dari Konter ke DC</h5>
						<i class="fa fa-car fa-fw fa-5x"></i>
					</div>
				</div>
			</div>	
		</a>		
		<a href='../print/tat_read.avx'>		
			<div class="col-md-6 boxmen">			
				<div class='xyz' id='xyz6'>
					<p class='xyz-icon' id='icon4'><i class="fa fa-exchange fa-fw fa-1x"></i></p>
					<p class='xyz-text'>SJ TAT</p>
					<h5 class='page-header'><i class='fa fa-info-circle fa-fw fa-lg text-default'></i><small style='color:#fff'>Transfer Antar Toko</small></h5>			
				</div>
				<div class='info_konten'>	
					<div class='konten text-center'>
						<h3 class='text-center'>TAT</h3>						
						<h5>Transfer barang antar konter/toko (TAT)</h5>
						<i class="fa fa-exchange fa-fw fa-5x"></i>
					</div>
				</div>
			</div>	
		</a>		
	</div>		
  <div class="col-md-4 multibox">		
		<a href='../master/master_read.avx'>	
			<div class="col-md-6 boxmen">			
				<div class='xyz' id='xyz2'>						
					<div class='xyz' id='xyz5'>
						<p class='xyz-icon' id='icon5'><i class="fa fa-cogs fa-fw fa-1x"></i></p>
						<p class='xyz-text'>File Master</p>		
					</div>
				</div>
				<div class='info_konten'>	
					<div class='konten text-center'>
						<h3 class='text-center'>MASTER</h3>						
						<h5>Edit File Master</h5>
						<i class="fa fa-cogs fa-fw fa-5x"></i>
					</div>
				</div>
			</div>	
		</a>	
		<a href='../master/masspg_pilih.avx'>		
			<div class="col-md-6 boxmen">			
				<div class='xyz' id='xyz4'>											
					<p class='xyz-icon' id='icon4'><i class="fa fa-download fa-fw fa-1x"></i></p>
					<p class='xyz-text'>Master<br><br>SPG <br><br><?php echo date("M/y"); ?></p>
					<h5><i class='fa fa-circle fa-fw fa-lg text-danger'></i><small style='color:#fff'>Download</small></h5>							
				</div>
				<div class='info_konten'>	
					<div class='konten text-center'>
						<h3 class='text-center'>DOWNLOAD</h3>					
						<h5>Master SPG<br><?php echo date("F - Y"); ?></h5>
						<i class="fa fa-download fa-fw fa-5x"></i>
					</div>
				</div>
			</div>	
		</a>
	</div>	
</div>	

<?php

/**
* End of file home.php
* Location: ./module/mod_dashboard/home.php
*/
?>
