<?php
include_once "../bd/conect_db.php";
// Se registran los datos para ser enviado a la DB
$message = $_POST['message'];
$outgoing = $_POST['outgoing_id'];
$incoming = $_POST['incoming_id'];
$proyecto = $_POST['name_project'];
$pieza = $_POST['name_pieza'];

$sql = "INSERT INTO messages ( incoming_msg_id, outgoing_msg_id, msg, proyecto, pieza) VALUES ('$incoming', '$outgoing', '$message', '$proyecto', '$pieza')";
if (!$mysqli->query($sql)){
    echo "Fallo";
} else {
    echo "";
}
?>
