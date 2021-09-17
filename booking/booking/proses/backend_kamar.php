<?php
include("../inc/koneksi.php");
$result=array();
$q="SELECT * FROM tb_kamar";
if(!empty($_REQUEST['tipe'])){
	$q="SELECT * FROM tb_kamar WHERE id_tipe='".$_REQUEST['tipe']."'";
}
$sql=$db->query($q);
while($r=$sql->fetch_assoc()){
 $result[]=array(
 		"id"=>$r['id_kamar'],
		"name"=>$r['kamar']
	);
}

header('Content-Type: application/json');
echo json_encode($result);
?>