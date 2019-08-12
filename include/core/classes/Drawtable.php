<?php 
class Drawtable extends Generate {
	private $tbl;	
	/* Master */
	public function drawing($jenis, $id_tabel, $sitemap, array $param=null){
		$bc = 
    "
      <ul class='breadcrumb'>
        <li><a href='../main/home.avx'>Home</a></li>
        <li>".$sitemap."</li>
      </ul>
		";
    
		switch ($jenis) 
    {
			case "hrd_pak"	:
				$tbl =  $bc . "
				<table id='".$id_tabel."' class='table t_konter animated fadeIn table-striped table-condensed table-mod nowrap' 
					dtTblPakl='../data/pak.avx' act='../modal/pak.avx'>
					<thead>
						<tr>   	
							<th width=5%>#</th>
							<th width=10%>NO SURAT</th>
							<th width=10%>TGL SURAT</th>
							<th width=20%>NAMA</th>
							<th width=15%>NIK</th>
							<th width=15%>JABATAN AKHIR</th>
							<th width=10%>TGL MASUK</th>
							<th width=10%>TGL KELUAR</th>
							<th width=5%>KET</th>
						</tr>
					</thead>
				</table>				
				";
			break;	

			case "konter"	:
			case "mkonter":
				$tbl =  $bc . "
				<table id='".$id_tabel."' class='table t_konter animated fadeIn table-striped table-condensed table-mod nowrap' 
					dtTblCtr='../data/konter.avx' act='../modal/konter.avx'>
					<thead>
						<tr>   	
							<th width=5%>#</th>
							<th width=10%>KODE</th>
							<th width=30%>NAMA KONTER</th>
							<th width=35%>ALAMAT</th>
							<th width=15%>KOTA</th>
							<th width=5%>STATUS</th>
						</tr>
					</thead>					
					<tfoot>
						<tr>   	
							<th width=5% row-span='2'>AKTIF</th>
							<th width=10%></th>
							<th width=30%></th>
							<th width=35%>TIDAK</th>
							<th width=15%></th>
							<th width=5%></th>
						</tr>						
						<tr>   	
							<th width=5% row-span='2'>TOTAL AKTIF</th>
							<th width=10%></th>
							<th width=30%></th>
							<th width=35%>TOTAL TIDAK</th>
							<th width=15%></th>
							<th width=5%></th>
						</tr>
					</tfoot>
				</table>				
				";
			break;					
      
      case "toko"	:
      case "mtoko":
				$tbl =  $bc . "
				<table id='".$id_tabel."' class='table t_toko animated fadeIn table-striped table-condensed table-mod nowrap'
					dtTblRtl='../data/toko.avx' act='../modal/toko.avx'>
					<thead>
						<tr>   	
							<th width=5%>#</th>
							<th width=10%>KODE</th>
							<th width=30%>NAMA TOKO</th>
							<th width=40%>ALAMAT</th>
							<th width=10%>KOTA</th>
							<th width=5%>SINGLE AKSI</th>
						</tr>
					</thead>
				</table>
				";
			break;	    
			
      case "rekrut":
				$tbl =  $bc . "
				<table id='".$id_tabel."' class='table t_rekrut animated fadeIn table-striped table-condensed table-mod nowrap'
					dtTblRekrut='../data/rekrut.avx'>
					<thead>
						<tr>   	
							<th width=5%>#</th>
							<th width=10%>KODE</th>
							<th width=30%>NAMA KONTER</th>
							<th width=40%>ALAMAT</th>
							<th width=15%>KOTA</th>
						</tr>
					</thead>
				</table>
				";
			break;	
      
      case "spg":
				$tbl =  $bc . "
				<table id='".$id_tabel."' class='table t_spg animated fadeIn table-striped table-condensed table-mod nowrap'
					dtTblSpg='../data/spg.avx' act='../modal/spg.avx'>
					<thead>
						<tr>   	
							<th width=5%>#</th>
							<th width=5%>URI ID</th>
							<th width=10%>Nomor Surat</th>
							<th width=10%>Nama Konter</th>
							<th width=5%>Tgl Surat</th>
							<th width=10%>Nama</th>
							<th width=10%>TTL</th>
							<th width=10%>Alamat</th>
							<th width=5%>Status</th>
							<th width=5%>Jenis</th>
							<th width=10%>No HP</th>
							<th width=5%>No BCA</th>
							<th width=5%>a/n</th>
							<th width=5%>Tgl Tugas</th>
						</tr>
					</thead>
				</table>
				";
			break;	
      
      case "masspg":
				$tbl =  $bc . "
				<table id='".$id_tabel."' class='table t_maskonter animated fadeIn table-striped table-condensed table-mod nowrap'
					dtTblSpg='../data/masspg.avx' act='../modal/spg.avx'>
					<thead>
						<tr>   	
							<th width=5%>#</th>
							<th width=15%>Nama Konter</th>
							<th width=10%>Nama SPG</th>
							<th width=5%>Kat</th>							
							<th width=5%>Sts</th>							
							<th width=5%>Tgl Kerja</th>							
							<th width=5%>Tgl Keluar</th>							
							<th width=10%>TTL</th>
							<th width=10%>Alamat</th>
							<th width=10%>No HP</th>
							<th width=5%>No BCA</th>
							<th width=5%>a/n</th>
							<th width=10%>Surat Tugas</th>
						</tr>
					</thead>
				</table>
				<div id='th_masspg' th_masspg='".$param[1]."'></div>
				<div id='bl_masspg' bl_masspg='".$param[0]."'></div>
				";
			break;	
      
      case "master-spg-not-exist":
				$tbl =  $bc . "
				<div class='jumbotron text-center'>
					<div class='container'>
						<i class='fa fa-paper-plane fa-4x'></i>							
						<i class='fa fa-asterisk fa-4x'></i>							
						<i class='fa fa-cog fa-4x'></i>							
						<i class='fa fa-times fa-4x'></i>	
					</div>
					<h4 class='xyz'>Master Belum tersedia.<br>Silahkan proses terlebih dahulu</h4>							
					<div class='form-group'>
						<h3>Bulan ".$this->bulan_indo(date('m')).", ".date('Y')."</h3>
					</div>				
					<div class='form-group'>
						<button class='btn btn-lg btn-danger' id='buat_master_spg'>PROSES</button>
					</div>
				</div>
				";
			break;			
      
      case "master-spg-pilih":
				$tbl =  $bc . "	
				<div style='width:100%; overflow:auto'>
				<div id='progress_bar' class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width:0%' >
				<span>0 %</span>
				</div>
				</div>
				<div class='container-large'>				
					<div class='row'>					
						<div class='col-md-3 col-md-offset-5'>
						<h4 class='text-center'>Pilih Periode.</h4>							
							<div class=''>
							<form action='../master/masspg_read.avx' method='post'>
								<div class='form-group'>
									<label for='bln_master_spg'>Bulan</label>
									<select name='bln_master_spg' id='bln_master_spg' style='width:100%'>
										<option value='".date('m')."'>".strtoupper($this->bulan_indo(date('m')))."</option>
										<option disabled>--ubah--</option>
									";
										$w = count($this->sel_opt_bulan());
										for($i=0;$i<$w;$i++):
										$tbl .= $this->sel_opt_bulan()[$i];
										endfor;
										$tbl .= "
									</select>
									<label for='thn_master_spg'>Tahun</label>
									<select name='thn_master_spg' id='thn_master_spg' style='width:100%'>
										<option value='".date('Y')."'>".date('Y')."</option>
										<option disabled>--ubah--</option>
									";
										$x = count($this->sel_opt_tahun());
										for($i=0;$i<$x;$i++):
										$tbl .= $this->sel_opt_tahun()[$i];
										endfor;
										$tbl .= "
									</select>
								</div>							
								<div class='form-group'>					
									<button class='btn btn-block btn-danger' id='cari_master_spg'>CARI DATA</button>
								</div>
								</form>								
							</div>	
						</div>
					</div>	
				</div>				
				";
			break;			
		
      case "retur":
				$tbl =  $bc . "
				<table id='".$id_tabel."' class='table t_retur animated fadeIn table-striped table-condensed table-mod nowrap'
					dtTblRtr='../data/retur.avx' act='../modal/retur.avx'>
					<thead>
						<tr>   	
							<th width=5%>#</th>
							<th width=5%>URI ID</th>
							<th width=15%>Nomor Surat</th>
							<th width=25%>Nama Konter</th>
							<th width=10%>Tgl Surat</th>
							<th width=20%>Ekspedisi</th>
							<th width=20%>Kontak</th>
						</tr>
					</thead>
				</table>
				";
			break;	    
      
      case "tat":
				$tbl =  $bc . "
				<table id='".$id_tabel."' class='table t_tat animated fadeIn table-striped table-condensed table-mod nowrap'
					dtTblTat='../data/tat.avx' act='../modal/tat.avx'>
					<thead>
						<tr>   	
							<th width=5%>#</th>
							<th width=5%>URI ID</th>
							<th width=10%>Nomor Surat</th>
							<th width=10%>Tgl Surat</th>
							<th width=15%>Dari</th>
							<th width=15%>Ke</th>
							<th width=20%>Ekspedisi</th>
							<th width=20%>Kontak</th>
						</tr>
					</thead>
				</table>
				";
			break;	
      
      case "root_master":
				$tbl =  $bc . "
				<h1 class='page-header'>MASTER
        <span class='sub-header'> Setting di sini</span></h1>
				<div class='col-md-4'>        
					<div class='form-group'>
						<button type='button' data-toggle='modal' data-target='#myModal' class='btn btn-primary btn-block btn-lg' id='identitas_data' act='../modal/master.avx'>ID Kirim Amplop</button>
						</div>
					<div class='form-group'>
						<button type='button' class='btn btn-success btn-block btn-lg' id='text_surat'>Text Surat</button>
					</div>
				</div>
				<div class='col-md-8' id='hidden_start' style='max-height:60vh;overflow-y:scroll'>
					<table id='".$id_tabel."' class='table t_tat table-striped table-condensed' style='width:100%!important;'
						dtTblMaster='../data/master.avx' act='../modal/master.avx'>
						<thead>
							<tr>   	
								<th width=5%>#</th>
								<th width=15%>Jenis</th>
								<th width=25%>Header</th>
								<th width=25%>Body</th>
								<th width=25%>Footer</th>
								<th width=5%>Aksi</th>
							</tr>
						</thead>
					</table>
				</div>
				";
			break;	
		}
		return $tbl;
	}	
}
