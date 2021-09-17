<?php
$mysqli = mysqli_connect('localhost','ezqualof_adminfollower','3zqu4l0++','ezqualof_follower');

$outgoing = $_POST['outgoing_id'];
$incoming = $_POST['incoming_id'];
$proyecto = $_POST['name_project'];
$pieza = $_POST['name_pieza'];
$output = "";
/*if ($pieza == ""){
    $sql = "SELECT * FROM messages WHERE (outgoing_msg_id = '$outgoing' AND incoming_msg_id = '$incoming' AND proyecto = '$proyecto') OR 
        (outgoing_msg_id = '$incoming' AND incoming_msg_id = '$outgoing' AND proyecto = '$proyecto') ORDER BY msg_id";

    $query = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($query) > 0){
        while ($row = mysqli_fetch_assoc($query)){
            if ($row['outgoing_msg_id'] === $outgoing){
                $output .= '<div class="chat outgoing">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                        </div>';
            } else{
                $output .= '<div class="chat incoming">
                        <img src="../chat/userpics/user1.jpg" alt="">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                        </div>';
            }
        }
        echo $output;
    }
}else{*/
    $sql = "SELECT * FROM messages WHERE (outgoing_msg_id = '$outgoing' AND incoming_msg_id = '$incoming' AND proyecto = '$proyecto' AND pieza = '$pieza') OR 
            (outgoing_msg_id = '$incoming' AND incoming_msg_id = '$outgoing' AND proyecto = '$proyecto' AND pieza = '$pieza') ORDER BY msg_id";

    $query = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($query) > 0){
        while ($row = mysqli_fetch_assoc($query)){
            if ($row['outgoing_msg_id'] === $outgoing){
                $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>
                            </div>
                            </div>';
            } else{
                $output .= '<div class="chat incoming">
                            <img src="../chat/userpics/user3.jpg" alt="">
                            <div class="details">
                                <p>'. $row['msg'] .'</p>
                            </div>
                            </div>';
            }
        }
        echo $output;
    }
//}
?>
