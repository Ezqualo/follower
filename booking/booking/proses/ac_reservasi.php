<?php
include("../inc/koneksi.php");
include("../inc/function.php");

$action = $_REQUEST['action'];
$response=array();
switch($action){
	case "load_harga":
		$harga=0;
		if(!empty($_POST['id_kamar'])){
			$sql=$db->query("SELECT b.harga FROM tb_kamar a INNER JOIN tb_tipe b ON a.id_tipe=b.id_tipe AND a.id_kamar='".$_POST['id_kamar']."' LIMIT 1");
			if($sql->num_rows>0){
				$r=$sql->fetch_assoc();
				$harga=$r['harga'];
			}
			
			$lama=lama_inap(f_simpan_tgl($_POST['tgl_in']),f_simpan_tgl($_POST['tgl_out']));
			
			$response=array(
				"success"=>true,
				"harga"=>format_uang($harga),
				"lama"=>$lama." Hari"
			);
			
		}
		
		
		
	break;
	
	case "simpan":
		$tgl_in=f_simpan_tgl($_POST['tgl_in']); // f_simpan_tgl() ada di function.php
		$tgl_out=f_simpan_tgl($_POST['tgl_out']);
		$harga=format_decimal($_POST['harga']);// format_decimal() ada di function.php
		
		$tgl_sekarang=date('Y-m-d h:i');
		
		/* status */
		// 0 = reservasi
		// 1 = checkin
		// 2 = checkout
		$q="UPDATE tb_reservasi SET nama_tamu='".$_POST['nama']."' WHERE no_reservasi='".$_POST['id']."'";
		if(empty($_POST['id'])){
			$q="INSERT INTO tb_reservasi(tgl_in,tgl_out,id_kamar,harga,nama_tamu,tgl_reservasi,status)values('".$tgl_in."','".$tgl_out."','".$_POST['id_kamar']."','".$harga."','".strtoupper($_POST['nama'])."','".$tgl_sekarang."','0')";
		}
		
		$sql=$db->query($q);
		if($sql){
			$response=array(
				"success"=>true,
			);
		}
	break;
	
	case "ubah":
		$tgl_in=f_simpan_tgl($_REQUEST['newStart']); // f_simpan_tgl() ada di function.php
		$tgl_out=f_simpan_tgl($_REQUEST['newEnd']);
		
		$sql=$db->query("UPDATE tb_reservasi SET tgl_in='".$tgl_in."',tgl_out='".$tgl_out."' WHERE no_reservasi='".$_REQUEST['id']."'");
		if($sql){
			$response=array(
				"success"=>true
			);	
		}
		
	break;
	
	case "hapus":
		$sql=$db->query("DELETE FROM tb_reservasi WHERE no_reservasi='".$_REQUEST['id']."'");
		if($sql){
			$response=array(
				"success"=>true
			);	
		}
	break;
	
	case "pindah":
		$tgl_in=f_simpan_tgl($_REQUEST['newStart']); // f_simpan_tgl() ada di function.php
		$tgl_out=f_simpan_tgl($_REQUEST['newEnd']);
		$sql=$db->query("UPDATE tb_reservasi SET tgl_in='".$tgl_in."',tgl_out='".$tgl_out."',id_kamar='".$_REQUEST['newResource']."' WHERE no_reservasi='".$_REQUEST['id']."'");
		if($sql){
			$response=array(
				"success"=>true
			);	
		}
	break;
	
	case "checkin":
		$sql=$db->query("UPDATE tb_reservasi SET status='1' WHERE no_reservasi='".$_POST['id']."'");
		if($sql){
			$response=array(
				"success"=>true
			);	
		}
	break;
	
	case "checkout":
		$sql=$db->query("UPDATE tb_reservasi SET status='2' WHERE no_reservasi='".$_POST['id']."'");
		if($sql){
			$response=array(
				"success"=>true
			);	
		}
	break;
}
echo json_encode($response);

?>