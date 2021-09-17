<?php
include("../inc/koneksi.php");
include("../inc/function.php");

$tgl_in=f_simpan_tgl($_REQUEST['start']);
$tgl_out=f_simpan_tgl($_REQUEST['end']);

$sql=$db->query("SELECT a.*,b.id_tipe FROM tb_reservasi a LEFT JOIN tb_kamar b ON a.id_kamar=b.id_kamar WHERE a.tgl_in>='".$tgl_in."' AND a.tgl_out<='".$tgl_out."'");

class Event {}
$events = array();


while($row=$sql->fetch_assoc()){
	
	$lama=lama_inap(f_simpan_tgl($row['tgl_in']),f_simpan_tgl($row['tgl_out']));
	$total_tagihan=$row['harga']*$lama;
	
	$e=new Event();
	$e->id=$row['no_reservasi'];
	$e->text=$row['nama_tamu'];
	$e->harga=format_uang($row['harga']);
	$e->lama=$lama." Hari";
	$e->status=$row['status'];
	$e->start=$row['tgl_in']." 12:00:00";
	$e->end=$row['tgl_out']." 12:00:00";
	$e->id_tipe_kamar=$row['id_tipe'];
	$e->resource=$row['id_kamar'];
	$e->bubbleHtml="Status: ".tampil_status($row['status'])."<br/>Nama: ".$row['nama_tamu']."<br/>Check In : ".tampil_tgl($row['tgl_in'])."<br/>Check Out : ".tampil_tgl($row['tgl_out'])."<br/>Harga : ".format_uang($row['harga'])."<br/>Lama : ".$lama." Hari <br/>Total tagihan : ".format_uang($total_tagihan);
	$events[]=$e;

}
header('Content-Type: application/json');
echo json_encode($events);
?>