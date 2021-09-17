<?php
$mysqli = new mysqli('localhost','ezqualof_adminfollower','3zqu4l0++','ezqualof_follower');
// Se valida conexion
if ($mysqli->connect_error) {
    die("Connection failed: "
        . $mysqli->connect_error);
}
?>