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
	
  case 'spg_edit':	
  $dtf    = $generates->read_fetch($tabel='t_spg',$field='id_surat',$kd=$parameter);

		$dt =  "
			<div class='form-horizontal'>		
      
				<div class='form-group'>
					<label class='control-label col-sm-3' for='no_surat'>Nomor Surat</label>
					<div class='col-sm-9'>
						<input type='text'  value='" . strtoupper($dtf['no_surat']) . "' class='form-control' disabled>
						<input type='hidden' name='no_surat' id='no_surat' value='" . $parameter . "' class='form-control' required>
					</div>
        </div>     

				<div class='form-group'>
					<label class='control-label col-sm-3' for='tgl_surat'>Tanggal Surat</label>
					<div class='col-sm-9'>
						<input type='text' name='tgl_surat' id='tgl_surat' value='" . date("dd-mm-YYYY",strtotime($dtf['tgl_surat'])). "' class='form-control' required>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='tgl_tugas'>Tanggal Tugas</label>
					<div class='col-sm-9'>
						<input type='text' name='tgl_tugas' id='tgl_tugas' value='" . date("dd-mm-YYYY",strtotime($dtf['tgl_tugas'])). "' class='form-control' required>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nama'>Nama SPG</label>
					<div class='col-sm-9'>
						<input type='text' name='nama' id='nama' value='" . strtoupper($dtf['nm_spg']) . "' class='form-control' required>
					</div>
        </div>  
         
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat'>Alamat</label>
					<div class='col-sm-9'>
						<textarea id='alamat' class='form-control' required>" . strtoupper($dtf['alamat_spg']) . "</textarea>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='ttl'>Tempat dan Tgl Lahir</label>
					<div class='col-sm-9'>
						<input type='text' name='ttl' id='ttl' value='" . strtoupper($dtf['ttl']) . "' placeholder='Misal: Bandung, 12 Juni 2018' class='form-control' required>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nohp'>No. HP</label>
					<div class='col-sm-9'>
						<input type='text' name='nohp' id='nohp' value='" . $dtf['no_hp'] . "' placeholder='Misal: 0878-2526-8558' class='form-control'>
					</div>
        </div> 
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='norek'>No. Rek</label>
					<div class='col-sm-9'>
						<input type='text' name='norek' id='norek' value='" . $dtf['rek_bca'] . "' placeholder='Misal: 777-0968-121' class='form-control'>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='bca_an'>Atas Nama</label>
					<div class='col-sm-9'>
						<input type='text' name='bca_an' id='bca_an' value='" . strtoupper($dtf['bca_an']) . "' class='form-control'>
					</div>
        </div> 
        
        <div class='form-group'>
					<label class='control-label col-sm-3' for='kd_konter'>Toko</label>
					<div class='col-sm-9'>
						<select name='kd_konter' id='kd_konter' class='form-control' style='width:100%'>";
							$nmc = $generates->read_fetch($tabel='t_konter','kd_konter',$dtf['kd_konter']);
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
        
				<div class='modal-footer'>
					<button type='submit' name='create' id='next_spg_edit' modact='../modact/masspg.avx'  class='btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";	
    echo $dt;
    echo "
      <script>
        $('select').select2({}); 
        $('#tgl_surat, #tgl_tugas').datetimepicker({
					// viewMode:'years',
					format:'DD-MM-YYYY'
				});
      </script>
    ";
	break;
	
  case 'spg_baru':	
  $roman    = $generates->numberToRoman(date('m'));
  $nosrt    = $generates->query($q='SELECT MAX(id_surat) AS maxim FROM t_spg');
  $no_srt   = $nosrt->fetchAll();
  $no_baru  = $no_srt[0]['maxim'] + 1;
  $no_barus = strlen($no_baru);
  $kd_baru  = str_repeat("0",7- $no_barus).$no_baru;	
  $no_surat = $kd_baru . "/MSO-DIV/SPS/" . $roman . "/" . date("Y"); 
		$dt =  "
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
						<input type='text' name='tgl_surat' id='tgl_surat' class='form-control' required>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='tgl_tugas'>Tanggal Tugas</label>
					<div class='col-sm-9'>
						<input type='text' name='tgl_tugas' id='tgl_tugas'class='form-control' required>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nama'>Nama SPG</label>
					<div class='col-sm-9'>
						<input type='text' name='nama' id='nama' class='form-control' required>
					</div>
        </div>  
         
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat'>Alamat</label>
					<div class='col-sm-9'>
						<textarea id='alamat' class='form-control' required></textarea>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='ttl'>Tempat dan Tgl Lahir</label>
					<div class='col-sm-9'>
						<input type='text' name='ttl' id='ttl' placeholder='Misal: Bandung, 12 Juni 2018' class='form-control' required>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nohp'>No. HP</label>
					<div class='col-sm-9'>
						<input type='text' name='nohp' id='nohp' placeholder='Misal: 0878-2526-8558' class='form-control'>
					</div>
        </div> 
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='norek'>No. Rek</label>
					<div class='col-sm-9'>
						<input type='text' name='norek' id='norek' placeholder='Misal: 777-0968-121' class='form-control'>
					</div>
        </div>
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='bca_an'>Atas Nama</label>
					<div class='col-sm-9'>
						<input type='text' name='bca_an' id='bca_an' class='form-control'>
					</div>
        </div> 
        
        <div class='form-group'>
					<label class='control-label col-sm-3' for='kd_konter'>Toko</label>
					<div class='col-sm-9'>
						<select name='kd_konter' id='kd_konter' class='form-control' style='width:100%'>
              <option selected>--pilih--</option>";
							$no = 1;
							foreach($generates->read_all($tabel='t_konter')as $XC):
							$dt .= "<option value='".$XC['kd_konter']."'>".$no.'. ['.strtoupper($XC['kd_konter']).'] '.$XC['nama_konter']."</option>";
							$no++;
							endforeach;
              $dt .= "
						</select>
					</div>
				</div>
        
				<div class='modal-footer'>
					<button type='submit' name='create' id='next_spg_baru' modact='../modact/masspg.avx'  class='btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";	
    echo $dt;
    echo "
      <script>
        $('select').select2({}); 
        $('#tgl_surat, #tgl_tugas').datetimepicker({
					// viewMode:'years',
					format:'DD-MM-YYYY'
				});
      </script>
    ";
	break;	
}

/**
* End of file v_mod_masspg_modal_ajax.php
* Location: ../mod_masspg/v_mod_masspg_modal_ajax.php
*/