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

$parameter		= strtolower($_POST['postAvxId']);
$jenis_aksi		= strtolower($_POST['jenis_aksi']);

switch($jenis_aksi)
{
	default:exit("No direct script access allowed");break;
	
	case 'identitas_data':	
		$dt = $generates->read_all('t_identitas');
		if(!empty($dt)):
		foreach($dt as $dts):
			$nm 	= strtoupper(strip_tags(addslashes(trim($dts['nama'])))); 
			$alm 	= strtoupper(strip_tags(addslashes(trim($dts['alamat']))));
			$kt 	= strtoupper(strip_tags(addslashes(trim($dts['kota']))));
			$tlp 	= strtoupper(strip_tags(addslashes(trim($dts['notelp']))));
			endforeach;
		else:
			$nm = $alm = $kt = $tlp = "";
		endif;
		echo "
			<div class='form-horizontal'>	
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nm_id'>Nama *</label>
					<div class='col-sm-9'>
						<input type='text' name='nm_id' id='nm_id' value='" . $nm . "' class='form-control' required />
						<input type='hidden' name='nm_id_old' id='nm_id_old' value='" . $nm . "' class='form-control' />
					</div>
        </div>
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alm_id'>Alamat *</label>
					<div class='col-sm-9'>
						<input type='text' name='alm_id' id='alm_id'  value='" . $alm . "' class='form-control' required />
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='kota_id'>Kota *</label>
					<div class='col-sm-9'>
						<input type='text' name='kota_id' id='kota_id'  value='" . $kt . "' class='form-control' required />
					</div>
        </div>				
				<div class='form-group'>
					<label class='control-label col-sm-3' for='telp_id'>No.Telp </label>
					<div class='col-sm-9'>
						<input type='text' name='telp_id' id='telp_id'  value='" . $tlp . "' class='form-control'/>
					</div>
        </div>
        
				<div class='modal-footer'>
					<button type='submit' name='create' id='next_identitas_data' modact='../modact/master.avx' class='btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";
	break;
		
	case 'konter_baru':	
		echo "
			<div class='form-horizontal'>	
      
				<div class='form-group'>
					<label class='control-label col-sm-3' for='kd_konter'>Kode Konter*</label>
					<div class='col-sm-9'>
						<input type='text' name='kd_konter' id='kd_konter' class='form-control' required>
					</div>
        </div>      
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nm_konter'>Nama Konter*</label>
					<div class='col-sm-9'>
						<input type='text' name='nm_konter' id='nm_konter' class='form-control' required>
					</div>
        </div>
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat1'>Alamat Part 1*</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat1' id='alamat1' class='form-control' required>
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat2'>Alamat Part 2</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat2' id='alamat2' class='form-control' required>
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat3'>Alamat Part 3</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat3' id='alamat3' class='form-control' required>
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='kota'>Kota </label>
					<div class='col-sm-9'>
						<input type='text' name='kota' id='kota' class='form-control' required>
					</div>
        </div>
        
				<div class='modal-footer'>
					<button type='submit' name='create' id='next_konter_baru' modact='../modact/konter.avx' class='btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";
	break;
		
	case 'konter_edit':	
		$que    = $generates->read_all_param('t_konter','kd_konter',$parameter);
		echo "
			<div class='form-horizontal'>	
      
				<div class='form-group'>
					<label class='control-label col-sm-3' for='kd_konter'>Kode Konter*</label>
					<div class='col-sm-9'>
						<input type='text' name='x' id='x' class='form-control' value='".strtoupper($que[0]['kd_konter'])."' disabled/>
						<input type='hidden' name='kd_konter' id='kd_konter' class='form-control' value='".$que[0]['kd_konter']."'/>
					</div>
        </div>      
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nm_konter'>Nama Konter*</label>
					<div class='col-sm-9'>
						<input type='text' name='nm_konter' id='nm_konter' class='form-control' value='". strtoupper($que[0]['nama_konter']) ."' required>
					</div>
        </div>
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat1'>Alamat Part 1*</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat1' id='alamat1' class='form-control' value='". strtoupper($que[0]['alamat_1']) ."' required>
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat2'>Alamat Part 2</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat2' id='alamat2' class='form-control'  value='". strtoupper($que[0]['alamat_2']) ."' />
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat3'>Alamat Part 3</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat3' id='alamat3' class='form-control'  value='". strtoupper($que[0]['alamat_3']) ."'  />
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='kota'>Kota</label>
					<div class='col-sm-9'>
						<input type='text' name='kota' id='kota' class='form-control' value='". strtoupper($que[0]['Kota']) ."' />
					</div>
        </div>				
				<div class='form-group'>
					<label class='control-label col-sm-3' for='sts_ctr'>Status</label>
					<div class='col-sm-9'>
						<select name='sts_ctr' id='sts_ctr' class='form-control'>
							<option value='". $que[0]['status'] ."' >". strtoupper($que[0]['status'] == 1 ? "AKTIF":"TIDAK") ."</option>
							<option disabled>--ubah--</option>
							<option value='1'>Aktif</option>
							<option value='0'>Tidak</option>
						</select>					
					</div>
        </div>
        
				<div class='modal-footer'>
					<button type='submit' name='edit' id='next_konter_edit' modact='../modact/konter.avx' class='btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";
	break;
		
	case 'toko_baru':	
		echo "
			<div class='form-horizontal'>		      
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='kd_toko'>Kode Toko*</label>
					<div class='col-sm-9'>
						<input type='text' name='kd_toko' id='kd_toko' class='form-control' required>
					</div>
        </div>      
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nm_toko'>Nama Toko*</label>
					<div class='col-sm-9'>
						<input type='text' name='nm_toko' id='nm_toko' class='form-control' required>
					</div>
        </div>
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat1'>Alamat Part 1*</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat1' id='alamat1' class='form-control' required>
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat2'>Alamat Part 2</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat2' id='alamat2' class='form-control' required>
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat3'>Alamat Part 3</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat3' id='alamat3' class='form-control' required>
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='kota'>Kota </label>
					<div class='col-sm-9'>
						<input type='text' name='kota' id='kota' class='form-control' required>
					</div>
        </div>
        
				<div class='modal-footer'>
					<button type='submit' name='create' id='next_toko_baru' modact='../modact/toko.avx' class='btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";
	break;
	
	case 'toko_edit':	
		$que    = $generates->read_all_param('t_toko','kd_toko',$parameter);
		echo "
			<div class='form-horizontal'>		      
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='kd_toko'>Kode Toko*</label>
					<div class='col-sm-9'>
						<input type='text' name='x' id='x' class='form-control'  value='".strtoupper($que[0]['kd_toko'])."' disabled>
						<input type='hidden' name='kd_toko' id='kd_toko' class='form-control'  value='".strtoupper($que[0]['kd_toko'])."' />
					</div>
        </div>      
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='nm_toko'>Nama Toko*</label>
					<div class='col-sm-9'>
						<input type='text' name='nm_toko' id='nm_toko' class='form-control' value='".strtoupper($que[0]['nama_toko'])."'  required>
					</div>
        </div>
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat1'>Alamat Part 1*</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat1' id='alamat1' class='form-control' value='".strtoupper($que[0]['alamat_1'])."'/>
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat2'>Alamat Part 2</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat2' id='alamat2' class='form-control' value='".strtoupper($que[0]['alamat_2'])."' />
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='alamat3'>Alamat Part 3</label>
					<div class='col-sm-9'>
						<input type='text' name='alamat3' id='alamat3' class='form-control' value='".strtoupper($que[0]['alamat_3'])."' />
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='kota'>Kota </label>
					<div class='col-sm-9'>
						<input type='text' name='kota' id='kota' class='form-control' value='".strtoupper($que[0]['Kota'])."'  />
					</div>
        </div>
        
				<div class='modal-footer'>
					<button type='submit' name='edit' id='next_toko_edit' modact='../modact/toko.avx' class='btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";
	break;
	
	case 'edit_text_surat':	
		$que    = $generates->read_all_param('t_teks','jenis',$parameter);
		echo "
			<div class='form-horizontal'>		      
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='jenis_teks'>Jenis Teks</label>
					<div class='col-sm-9'>
						<input type='text' name='x' id='x' class='form-control'  value='".strtoupper($que[0]['jenis'])."' disabled>
						<input type='hidden' name='jenis_teks' id='jenis_teks' class='form-control'  value='".strtoupper($que[0]['jenis'])."' />
					</div>
        </div>      
        
				<div class='form-group'>
					<label class='control-label col-sm-3' for='header_teks'>Header</label>
					<div class='col-sm-9'>
						<textarea  rows='8' cols='50' name='header_teks' id='header_teks' class='form-control' required>" .($que[0]['header'])."</textarea>
					</div>
        </div>
				<div class='form-group'>
					<label class='control-label col-sm-3' for='body_teks'>Body</label>
					<div class='col-sm-9'>
						<textarea rows='8' cols='50' name='body_teks' id='body_teks' class='form-control' required>" .($que[0]['body'])."</textarea>
					</div>
        </div>   
				<div class='form-group'>
					<label class='control-label col-sm-3' for='footer_teks'>Footer</label>
					<div class='col-sm-9'>
						<textarea rows='8' cols='50' name='footer_teks' id='footer_teks' class='form-control' required>" .($que[0]['footer'])."</textarea>
					</div>
        </div>   
				<div class='modal-footer'>
					<button type='button' name='edit' id='next_edit_txt_surat' modact='../modact/master.avx'  class='next_edit_txt_surat btn btn-primary'>Save</button>
					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>			
			</div>
		";
	break;
}

/**
* End of file v_mod_master_modal_ajax.php
* Location: ../mod_master/v_mod_master_modal_ajax.php
*/