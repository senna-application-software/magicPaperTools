<?php 
class Generate {
	private $db;
	public function __construct($database)
	{ $this->db = $database; }	
	
  function numberToRoman($num){ 
  // Make sure that we only use the integer portion of the value 
    $n 				= intval($num); 
    $result 	= '';   
  // Declare a lookup array that we will use to traverse the number: 
    $lookup 	= array(
			'M' 	=> 1000,
			'CM' 	=> 900, 
			'D' 	=> 500, 
			'CD' 	=> 400, 
			'C' 	=> 100,
			'XC' 	=> 90, 
			'L' 	=> 50, 
			'XL' 	=> 40,
			'X' 	=> 10, 
			'IX' 	=> 9,
			'V' 	=> 5,
			'IV' 	=> 4,
			'I' 	=> 1
		); 
    foreach ($lookup as $roman => $value)  
    { 
      // Determine the number of matches 
      $matches = intval($n / $value); 
      // Store that many characters 
      $result .= str_repeat($roman, $matches); 
      // Substract that from the number 
      $n = $n % $value; 
    } 
    // The Roman numeral should be built, return it 
    return $result; 
	} 
	function tgl_indo($tanggal){
		$bulan = array (
			1 =>  'Januari',
						'Februari',
						'Maret',
						'April',
						'Mei',
						'Juni',
						'Juli',
						'Agustus',
						'September',
						'Oktober',
						'November',
						'Desember'
		);
		$pecahkan = explode(' ', $tanggal);
		
		// variabel pecahkan 0 = d
		// variabel pecahkan 1 = f
		// variabel pecahkan 2 = y
	 
		return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
	}	
	function bulan_indo($bl){
		$bulan = array (
			1 =>  'Januari',
						'Februari',
						'Maret',
						'April',
						'Mei',
						'Juni',
						'Juli',
						'Agustus',
						'September',
						'Oktober',
						'November',
						'Desember'
		);
		return $bulan[ (int)$bl ];
	}
	function sel_opt_tahun(){
	$opt = array("<option value='2019'>2019</option>",
	"<option value='2020'>2020</option>",
	"<option value='2021'>2021</option>",
	"<option value='2022'>2022</option>",
	"<option value='2023'>2023</option>");
	
	return $opt;
}
	function sel_opt_bulan(){
	$bulan = array (
		"<option value='1'>JANUARI</option>",
		"<option value='2'>FEBRUARI</option>",
		"<option value='3'>MARET</option>",
		"<option value='4'>APRIL</option>",
		"<option value='5'>MEI</option>",
		"<option value='6'>JUNI</option>",
		"<option value='7'>JULI</option>",
		"<option value='8'>AGUSTUS</option>",
		"<option value='9'>SEPTEMBER</option>",
		"<option value='10'>OKTOBER</option>",
		"<option value='11'>NOPEMBER</option>",
		"<option value='12'>DESEMBER</option>"
	);
	return $bulan;
}
	public function tableExists($tableName) {
		$query = $this->db->prepare("SELECT 1 FROM $tableName LIMIT 1");	
		try
		{	
			$query->execute();			
		} catch (PDOException $e){
			//die($e->getMessage());
			return false;
		}
		return true;
	}		
	public function create_table($table,$kd){	
	$query = $this->db->prepare("CREATE TABLE $table($kd) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		try
		{	
			$query->execute();
			} catch (PDOException $e){
			//die($e->getMessage());
			return false;
		}
		return true;
	}	
	public function kd_exists($field,$tabel,$kd){	
	$query = $this->db->prepare("SELECT COUNT($field) FROM $tabel WHERE $field = ?");
		$query->bindValue(1, $kd);
		try
		{	$query->execute();
			$rows = $query->fetchColumn();
			if($rows > 0){
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e){
			die($e->getMessage());
		}
	}
	public function query($q){
		$query = $this->db->prepare($q);
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query;
	}
	public function read_all($tabel){	
		$query = $this->db->prepare("SELECT * FROM $tabel");
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}
	public function read_master_spg(){	
		$query = $this->db->prepare("SELECT 
		t_spg.id_surat,
		t_spg.no_surat,
		t_spg.tgl_surat,
		t_spg.tgl_tugas,
		t_spg.nm_spg,
		t_spg.ttl,
		t_spg.alamat_spg,
		t_spg.no_hp,
		t_konter.kd_konter,
		t_konter.nama_konter		
		FROM t_spg 		
		LEFT JOIN t_konter ON t_konter.kd_konter = t_spg.kd_konter
		");
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}		
	public function read_all_param($tabel,$field,$kd){	
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $field = ?");
		$query->bindValue(1, $kd);
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}		
	public function cek_spg_keluar($bln,$thn){	
		$query = $this->db->prepare("SELECT * FROM t_spg WHERE MONTH(tgl_tugas) = ? AND YEAR(tgl_tugas) = ?");
		$query->bindValue(1, $bln);
		$query->bindValue(2, $thn);
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}		
	public function read_two_param($tabel,$field1,$kd1,$field2,$kd2){	
		$query = $this->db->prepare("SELECT * FROM $tabel WHERE $field1 = ? AND $field2 = ?");
		$query->bindValue(1, $kd1);
		$query->bindValue(2, $kd2);
		try
		{
			$query->execute();
		}
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
		return $query->fetchAll();
	}	
	public function read_fetch($tabel,$field,$kd){	
	$query = $this->db->prepare("SELECT * FROM $tabel WHERE $field = ?");
		$query->bindValue(1, $kd);
		try{
			$query->execute();			
		} catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetch();
	} 
	public function delete_kd($tabel,$field,$kd){
		$sql="DELETE FROM $tabel WHERE $field = ?";
		$query = $this->db->prepare($sql);
		$query->bindValue(1, $kd);
		try
		{
			$query->execute();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}	
  public function create_spg($no_surat,	$tgl_surat,	$tgl_tugas,	$kd_konter,	$nm_spg,	$ttl,	$alamat_spg,	$no_hp,	$rek_bca,	$bca_an,$jenis,$status){
	 	$query 	= $this->db->prepare("INSERT INTO	t_spg (no_surat,	tgl_surat,	tgl_tugas,	kd_konter,	nm_spg,	ttl,	alamat_spg,	no_hp,	rek_bca,	bca_an,jenis, status, tgl_keluar)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $no_surat);
    $query->bindValue(2, $tgl_surat);
    $query->bindValue(3, $tgl_tugas);
    $query->bindValue(4, $kd_konter);
    $query->bindValue(5, $nm_spg);
    $query->bindValue(6, $ttl);
    $query->bindValue(7, $alamat_spg);
    $query->bindValue(8, $no_hp);
    $query->bindValue(9, $rek_bca);
    $query->bindValue(10, $bca_an);
    $query->bindValue(11, $jenis);
    $query->bindValue(12, $status);
    $query->bindValue(13, '');
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	    
	public function create_paklaring($no_surat,	$tgl_surat,	$nama,	$nik,	$jabatan,	$tgl_masuk,	$tgl_keluar,	$keterangan){
	 	$query 	= $this->db->prepare("INSERT INTO	paklaring (no_surat,	tgl_surat,	nama,	nik,	jabatan,	tgl_masuk,	tgl_keluar,	keterangan)VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $no_surat);
    $query->bindValue(2, $tgl_surat);
    $query->bindValue(3, $nama);
    $query->bindValue(4, $nik);
    $query->bindValue(5, $jabatan);
    $query->bindValue(6, $tgl_masuk);
    $query->bindValue(7, $tgl_keluar);
    $query->bindValue(8, $keterangan);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	  
	public function create_master_spg($tabel, $tahun,$bulan, $kd_konter,	$no_surat,$kat){
	 	$query 	= $this->db->prepare("INSERT INTO	$tabel (id, tahun,	bulan,	kd_konter,	no_surat,	kat)VALUES(?, ?, ?, ?, ?, ?)");
	 	$query->bindValue(1, '');
    $query->bindValue(2, $tahun);
    $query->bindValue(3, $bulan);
    $query->bindValue(4, $kd_konter);
    $query->bindValue(5, $no_surat);
    $query->bindValue(6, $kat);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	
  public function create_retur($no_surat,	$tgl_tugas,	$kd_konter,	$nm_spg,	$no_hp,	$ekspedisi){
	 	$query 	= $this->db->prepare("INSERT INTO	t_retur (no_surat,	tgl_surat,	kd_konter,	nm_kontak, no_hp,	ekspedisi)VALUES(?, ?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $no_surat);
    $query->bindValue(2, $tgl_tugas);
    $query->bindValue(3, $kd_konter);
    $query->bindValue(4, $nm_spg);
    $query->bindValue(5, $no_hp);
    $query->bindValue(6, $ekspedisi);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	  
  public function create_tat($no_surat,	$tgl_tugas,	$dari_toko,	$ke_toko,	$nm_spg,	$no_hp,	$ekspedisi){
	 	$query 	= $this->db->prepare("INSERT INTO	t_tat(no_surat,	tgl_surat,	kd_konter,	kd_tujuan,	nm_kontak, no_hp,	ekspedisi)VALUES(?, ?, ?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $no_surat);
    $query->bindValue(2, $tgl_tugas);
    $query->bindValue(3, $dari_toko);
    $query->bindValue(4, $ke_toko);
    $query->bindValue(5, $nm_spg);
    $query->bindValue(6, $no_hp);
    $query->bindValue(7, $ekspedisi);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	  
  public function create_konter($kd_konter,$nm_konter,$alamat1,$alamat2,$alamat3,$kota){
	 	$query 	= $this->db->prepare("INSERT INTO	t_konter (kd_konter,	nama_konter,	alamat_1,	alamat_2, alamat_3,	kota)VALUES(?, ?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $kd_konter);
    $query->bindValue(2, $nm_konter);
    $query->bindValue(3, $alamat1);
    $query->bindValue(4, $alamat2);
    $query->bindValue(5, $alamat3);
    $query->bindValue(6, $kota);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	
  public function create_toko($kd_toko,$nm_toko,$alamat1,$alamat2,$alamat3,$kota){
	 	$query 	= $this->db->prepare("INSERT INTO	t_toko (kd_toko,	nama_toko,	alamat_1,	alamat_2, alamat_3,	kota)VALUES(?, ?, ?, ?, ?, ?)");
	 	$query->bindValue(1, $kd_toko);
    $query->bindValue(2, $nm_toko);
    $query->bindValue(3, $alamat1);
    $query->bindValue(4, $alamat2);
    $query->bindValue(5, $alamat3);
    $query->bindValue(6, $kota);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}  
	public function create_id($nm_id,$alm_id,$kota_id,$telp_id){
	 	$query 	= $this->db->prepare("INSERT INTO	t_identitas (nama,	alamat,	kota, notelp)VALUES(?, ?, ?, ?)");
	 	$query->bindValue(1, $nm_id);
    $query->bindValue(2, $alm_id);
    $query->bindValue(3, $kota_id);
    $query->bindValue(4, $telp_id);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	public function update_konter($kd_konter,$nm_konter,$alamat1,$alamat2,$alamat3,$kota,$sts_ctr){
	 	$query 	= $this->db->prepare("UPDATE t_konter SET nama_konter =?,	alamat_1 = ?,	alamat_2 =?, alamat_3 =?,	kota = ?, status = ? WHERE kd_konter = ?");
    $query->bindValue(1, $nm_konter);
    $query->bindValue(2, $alamat1);
    $query->bindValue(3, $alamat2);
    $query->bindValue(4, $alamat3);
    $query->bindValue(5, $kota);
		$query->bindValue(6, $sts_ctr);
		$query->bindValue(7, $kd_konter);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}		
	public function update_tat($no_surat,	$tgl_tugas,	$dari_toko,	$ke_toko,	$nm_spg,	$no_hp,	$ekspedisi){
	 	$query 	= $this->db->prepare("UPDATE t_tat SET tgl_surat =?,	kd_konter = ?,	kd_tujuan =?, nm_kontak =?,	no_hp = ? ,	ekspedisi = ? WHERE no_surat = ?");
    $query->bindValue(1, $tgl_tugas);
    $query->bindValue(2, $dari_toko);
    $query->bindValue(3, $ke_toko);
    $query->bindValue(4, $nm_spg);
    $query->bindValue(5, $no_hp);
		$query->bindValue(6, $ekspedisi);
		$query->bindValue(7, $no_surat);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}		
	public function update_retur($no_surat,	$tgl_surat,	$kd_konter,	$nm_spg,	$no_hp,	$ekspedisi){
	 	$query 	= $this->db->prepare("UPDATE t_retur SET tgl_surat =?,	kd_konter = ?,	nm_kontak =?,	no_hp = ? ,	ekspedisi = ? WHERE no_surat = ?");
    $query->bindValue(1, $tgl_surat);
    $query->bindValue(2, $kd_konter);
    $query->bindValue(3, $nm_spg);
    $query->bindValue(4, $no_hp);
    $query->bindValue(5, $ekspedisi);
		$query->bindValue(6, $no_surat);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}		
  public function update_spg($tgl_surat,	$tgl_tugas,	$kd_konter,	$nm_spg,	$ttl,	$alamat_spg,	$no_hp,	$rek_bca,	$bca_an,$jenis,$status,$tgl_keluar, $id_surat){
	 	$query 	= $this->db->prepare("UPDATE t_spg SET tgl_surat = ?,	tgl_tugas = ?,	kd_konter = ?,	nm_spg = ?,	ttl = ?,	alamat_spg = ?,	no_hp = ?,	rek_bca = ?,	bca_an = ?, jenis = ?, status = ?, tgl_keluar = ? WHERE id_surat = ?");
    $query->bindValue(1, $tgl_surat);
    $query->bindValue(2, $tgl_tugas);
    $query->bindValue(3, $kd_konter);
    $query->bindValue(4, $nm_spg);
    $query->bindValue(5, $ttl);
    $query->bindValue(6, $alamat_spg);
    $query->bindValue(7, $no_hp);
    $query->bindValue(8, $rek_bca);
    $query->bindValue(9, $bca_an);
    $query->bindValue(10, $jenis);
    $query->bindValue(11, $status);
    $query->bindValue(12, $id_surat);
    $query->bindValue(13, $tgl_keluar);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}	
	public function update_toko($kd_toko,$nm_toko,$alamat1,$alamat2,$alamat3,$kota){
	 	$query 	= $this->db->prepare("UPDATE t_toko SET nama_toko =?,	alamat_1 = ?,	alamat_2 =?, alamat_3 =?,	kota = ? WHERE kd_toko = ?");
    $query->bindValue(1, $nm_toko);
    $query->bindValue(2, $alamat1);
    $query->bindValue(3, $alamat2);
    $query->bindValue(4, $alamat3);
    $query->bindValue(5, $kota);
		$query->bindValue(6, $kd_toko);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}		
	public function update_id($nm_id,$alm_id,$kota_id,$telp_id){
	 	$query 	= $this->db->prepare("UPDATE t_identitas SET nama =?,	alamat = ?,	kota = ?, notelp = ?");
    $query->bindValue(1, $nm_id);
    $query->bindValue(2, $alm_id);
    $query->bindValue(3, $kota_id);
    $query->bindValue(4, $telp_id);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}		
	public function update_teks($jenis,$header,$body,$footer){
	 	$query 	= $this->db->prepare("UPDATE t_teks SET header =?,	body = ?,	footer = ? WHERE jenis = ?");
    $query->bindValue(1, $header);
    $query->bindValue(2, $body);
    $query->bindValue(3, $footer);
    $query->bindValue(4, $jenis);
	 	try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}		
}
