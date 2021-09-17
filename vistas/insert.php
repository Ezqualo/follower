<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "pruebas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$type2 = $_POST['type'];
$userNo2 = $_POST['userNo'];
$name2 = $_POST['name'];
$level2 = $_POST['level'];
$phoneNo2 = $_POST['phoneNo'];
$location2 = $_POST['location'];
$email2 = $_POST['email'];
$password2 = $_POST['password'];
$gardavetting2 = $_POST['gardavetting'];
$linkedin2 = $_POST['linkedin'];

// STORE PDF FILE IN FOLDER
if(isset($_FILES['file']['name']))
{
    $cpath="resume/";
    $file_parts = pathinfo($_FILES["file"]["name"]);
    $file_path = 'resume'.time().'.'.$file_parts['extension'];
    move_uploaded_file($_FILES["file"]["tmp_name"], $cpath.$file_path);
    $cv2 = $file_path;
}

$sql = "INSERT INTO users (type, userNo, name, level, phoneNo, 
location, email, password, cv, gardavetting, linkedin) VALUES('$type2', '$userNo2', '$name2', '$level2','$phoneNo2','$location2','$email2','$password2','$cv2','$gardav etting2','$linkedin2');";

if($sql){
    echo '0';
}

mysqli_query($conn, $sql);

?>