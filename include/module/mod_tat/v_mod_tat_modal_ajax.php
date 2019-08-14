<?php require_once("../../core/init.php");

/**
* Sanin10 Framework Ver.1.0
*
* GENERAL DESCRIPTION: Sanin10 (read: Saninten) Framework
* dibuat untuk memudahkan author dalam mengelola content sebuah website.
* Dilengkapi dengan banyak plugin open-source yang siap untuk digunakan.
* 
* SUB DESCRIPTION:
* 
* @category   PHP Framework
* @package    Sanin10 Framework
* @author     Diana Sena Kurnia <senna.9942@gmail.com>
* @copyright  2017  By Senna Application Software
* @license    GNU-GPL
* @version    1.0
* @link       http://sennasoft.com
*/

$parameter		= $_POST['postAvxId'];
$jenis_aksi		= $_POST['jenis_aksi'];

switch($jenis_aksi)
{
	default:exit("No direct script access allowed");break;
	
	case 'tat_baru':	
  $roman    = $generates->numberToRoman(date('m'));
  $nosrt    = $generates->query($q='SELECT MAX(id_surat) AS maxim FROM t_tat');
  $no_srt   = $nosrt->fetchAll();
  $no_baru  = $no_srt[0]['maxim'] + 1;
  $no_barus = strlen($no_baru);
  $kd_baru = str_repeat("0",7 - $no_barus).$no_baru;	
  $no_surat = $kd_baru . "/MSO-DIV/TAT/" . $roman . "/" . date("Y"); 
		echo "
			<div class='form-horizontal'>		
      
				<div class='form-group'>
					<label class='control-label col-sm-3' for='no_surat'>Tanggal Surat</label>
					<div class='col-sm-9'>
						<input type='text'  value='" . $no_surat . "' class='form-control' disabled>
						<input type='hidden' name='no_surat' id='no_surat' value='" . $no_surat . "' class='form-control' required>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='tgl_surat'>Tanggal Surat</label>
					<div class='col-sm-9'>
						<input type='text' name='tgl_surat' id='tgl_surat' value='dd-mm-yy' class='form-control' required>
					</div>
        </div>
        
        <div class='form-group'>
					<label class='control-label col-sm-3' for='dari_toko'>Dari Konter</label>
					<div class='col-sm-9'>
						<select name='dari_toko' id='dari_toko' class='form-control' style='width:100%'>
              <option selected disabled>--pilih--</option>";
							$no = 1;
							foreach($generates->read_all($tabel='t_konter')as $XC):
							echo "<option value='".$XC['kd_konter']."'>".$no.'. ['.strtoupper($XC['kd_konter'].'] '.$XC['nama_konter'])."</option>";
							$no++;
							endforeach;
              echo "
						</select>
					</div>
				</div>    
        
        <div class='form-group'>
					<label class='control-label col-sm-3' for='ke_toko'>Ke Konter </label>
					<div class='col-sm-9'>
						<select name='ke_toko' id='ke_toko' class='form-control' style='width:100%'>
              <option selected disabled>--pilih--</option>";
							$no = 1;
							foreach($generates->read_all($tabel='t_konter')as $XC):
							echo "<option value='".$XC['kd_konter']."'>".$no.'. ['.strtoupper($XC['kd_konter'].'] '.$XC['nama_konter'])."</option>";
							$no++;
							endforeach;
              echo "
						</select>
					</div>
				</div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='ekspedisi'>Ekspedisi</label>
					<div class='col-sm-9'>
						<select name='ekspedisi' id='ekspedisi' class='form-control' style='width:100%'>
              <option value='____________'>--pilih--</option>
              <option value='wahana'>WAHANA</option>
              <option value='unitrans'>UNITRANS</option>
              <option value='tam cargo'>TAM CARGO</option>
              <option value='anugrah abadi'>ANUGRAH ABADI</option>
              <option value='adex'>ADEX</option>
              <option value='____________'>OTHER</option>
            </select>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nama'>Kontak</label>
					<div class='col-sm-9'>
						<input type='text' name='nama' id='nama' class='form-control' required>
					</div>
        </div>  

				<div class='form-group'>
					<label class='control-label col-sm-3' for='nohp'>No. HP Kontak</label>
					<div class='col-sm-9'>
						<input type='text' name='nohp' id='nohp' placeholder='Misal: 0878-2526-8558' class='form-control'  value=''>
					</div>
        </div> 
        
        
				<div class='modal-footer'>
					<button type='submit' name='create' id='next_tat_baru'  modact='../modact/tat.avx' class='btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";	
    
    echo 
    "
      <script>
        $('select').select2({}); 
        $('#tgl_surat').datetimepicker({
					// viewMode:'years',
					format:'DD-MM-YYYY'
				});
      </script>
    ";
	break;

	case 'tat_edit':	
  $nosrt    = $generates->query($q="SELECT * FROM t_tat WHERE id_surat = '$parameter' ");
  $no_srt   = $nosrt->fetchAll();
		$dt = "
			<div class='form-horizontal'>		
      
				<div class='form-group'>
					<label class='control-label col-sm-3' for='no_surat'>Tanggal Surat</label>
					<div class='col-sm-9'>
						<input type='text'  value='" . strtoupper($no_srt[0]['no_surat'])  . "' class='form-control' disabled>
						<input type='hidden' name='no_surat' id='no_surat' value='" . $no_srt[0]['no_surat']  . "' class='form-control' required>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='tgl_surat'>Tanggal Surat</label>
					<div class='col-sm-9'>
						<input type='text' name='tgl_surat' id='tgl_surat' value='". date('d-m-Y', strtotime($no_srt[0]['tgl_surat'])) ."' class='form-control' required>
					</div>
        </div>
        
        <div class='form-group'>
					<label class='control-label col-sm-3' for='dari_toko'>Dari Konter</label>
					<div class='col-sm-9'>
						<select name='dari_toko' id='dari_toko' class='form-control' style='width:100%'>";
							$nmc = $generates->read_fetch($tabel='t_konter','kd_konter',$no_srt[0]['kd_konter']);
							$dt .= "<option value='" . $nmc['kd_konter'] . "' selected> [" . strtoupper($nmc['kd_konter'])."] " .$nmc['nama_konter']. "</option>";
              $dt .= "<option disabled>--ubah--</option>";
							$no = 1;
							foreach($generates->read_all($tabel='t_konter')as $XC):
							$dt .= "<option value='".$XC['kd_konter']."'>".$no.'. ['.strtoupper($XC['kd_konter'].'] '.$XC['nama_konter']) ."</option>";
							$no++;
							endforeach;
              $dt .= "
						</select>
					</div>
				</div>    
        
        <div class='form-group'>
					<label class='control-label col-sm-3' for='ke_toko'>Ke Konter </label>
					<div class='col-sm-9'>
						<select name='ke_toko' id='ke_toko' class='form-control' style='width:100%'>";
							$nmc = $generates->read_fetch($tabel='t_konter','kd_konter',$no_srt[0]['kd_tujuan']);
							$dt .= "<option value='" . $nmc['kd_konter'] . "' selected> [" . strtoupper($nmc['kd_konter'])."] " .$nmc['nama_konter']. "</option>";
              $dt .= "<option disabled>--ubah--</option>";
							$no = 1;
							foreach($generates->read_all($tabel='t_konter')as $XC):
							$dt .= "<option value='".$XC['kd_konter']."'>".$no.'. ['.strtoupper($XC['kd_konter'].'] '.$XC['nama_konter']) ."</option>";
							$no++;
							endforeach;
              $dt .= "
						</select>
					</div>
				</div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='ekspedisi'>Ekspedisi</label>
					<div class='col-sm-9'>
						<select name='ekspedisi' id='ekspedisi' class='form-control' style='width:100%'>
              <option value='".$no_srt[0]['ekspedisi']."'>".strtoupper($no_srt[0]['ekspedisi'] == '____________' ? "OTHER" : $no_srt[0]['ekspedisi'])."</option>
              <option value='____________'>--ubah--</option>
              <option value='wahana'>WAHANA</option>
              <option value='unitrans'>UNITRANS</option>
              <option value='tam cargo'>TAM CARGO</option>
              <option value='anugrah abadi'>ANUGRAH ABADI</option>
              <option value='adex'>ADEX</option>
              <option value='____________'>OTHER</option>
            </select>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nama'>Kontak</label>
					<div class='col-sm-9'>
						<input type='text' name='nama' id='nama' class='form-control' value='".strtoupper($no_srt[0]['nm_kontak'])."'>
					</div>
        </div>  

				<div class='form-group'>
					<label class='control-label col-sm-3' for='nohp'>No. HP Kontak</label>
					<div class='col-sm-9'>
						<input type='text' name='nohp' id='nohp' placeholder='Misal: 0878-2526-8558' class='form-control'  value='".strtoupper($no_srt[0]['no_hp'])."'>
					</div>
        </div> 
        
        
				<div class='modal-footer'>
					<button type='submit' name='create' id='next_tat_edit'  modact='../modact/tat.avx' class='btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";	
    echo $dt;
    echo 
    "
      <script>
        $('select').select2({}); 
        $('#tgl_surat').datetimepicker({
					// viewMode:'years',
					format:'DD-MM-YYYY'
				});
      </script>
    ";
	break;
	
}

/**
* End of file v_mod_tat_modal_ajax.php
* Location: ../mod_tat/v_mod_tat_modal_ajax.php
*/