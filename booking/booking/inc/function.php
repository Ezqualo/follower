<?php
error_reporting(0);//jangan tampilkan pesan error

function combo_tipe($kode,$db){
	echo "<option value='' selected></option>";
	$query=$db->query("SELECT id_tipe,tipe FROM tb_tipe ORDER BY id_tipe ASC");
	while ($row = $query->fetch_row()) {
		if ($kode == "")
			echo "<option value='$row[0]'> " . ucwords($row[1]) . " </option>";
		else
			echo "<option value='$row[0]'" . selected($row[0], $kode) . "> " . ucwords($row[1]) . " </option>";
	}
}

function f_simpan_tgl($waktu){
	$respon="";
	if(!empty($waktu)){
		$respon=date('Y-m-d',strtotime($waktu));
	}
	return $respon;	
}

function tampil_tgl($waktu){
	$respon="";
	if(!empty($waktu)){
		$respon=date('d M Y',strtotime($waktu));
	}
	return $respon;	
}

function lama_inap($tgl_in,$tgl_out){
	$respon="";
	if(!empty($tgl_in) && !empty($tgl_out)){
		$selisih = ((abs(strtotime ($tgl_out) - strtotime ($tgl_in)))/(60*60*24));
			$respon=$selisih;
			if($respon==0){
				$respon=1;	
			}	
	}
	return $respon;
}

function format_uang($angka){
$respon=0;
if(!empty($angka)){
	if($angka!=0){
		$hasil = number_format($angka, 0, "", ".");
		$respon=$hasil;
	}
}
return $respon;
}

function format_decimal($uang){
	$respon=0;
	if(!empty($uang)){
		if(strpos($uang,'.')!==false){
			//ada
			$uang=str_replace('.','',$uang);	
		}
		if(strpos($uang,',')!==false){
			$uang=str_replace(',','',$uang);
		}
		if(strpos($uang,' ')!==false){
			$uang=preg_replace('/\s+/', '', $uang);	
		}
		
		$respon=$uang;
		
	}
	
	return $respon;	
}

function tampil_status($kd){
	$respon="";
		switch($kd){
			case "0":
				$respon="Reservasi";
			break;
			
			case "1":
				$respon="Checkin";
			break;
			
			case "2":
				$respon="Checkout";
			break;	
		}
	return $respon;	
}


?>