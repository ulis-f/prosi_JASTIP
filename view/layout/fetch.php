<?php
//fetch.php;
if(isset($_POST["view"]))
{
    include("connect.php");
    if($_POST["view"] != '')
    {
    $update_query = "UPDATE notifikasi SET statusView=1 WHERE statusView=0";
    mysqli_query($connect, $update_query);
    }
    $nama = $_SESSION['nama'];
    $query_idUser = "SELECT * FROM `user` WHERE `namaUser` LIKE '$nama'";
    $query_idUser_result = $this->db->executeSelectQuery($query_idUser);  

    $idUser = $query_idUser_result[0]['idUser'];

    $query = "SELECT * FROM notifikasi WHERE idUser = '$idUser'";
    $query_result = $this->db->executeSelectQuery($query);
    $result=[];
    foreach($query_result as $key=>$value){
        $result[]= new notifikasi(null,null,$value['namaNotifikasi'],$value['deskripsi'],null,$value['dateTime']);
    }
    $output = '';
    
    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_array($result))
    {
    $output .= '
    <li>
        <a href="#">
        <strong>'.$row["namaNotifikasi"].'</strong><br />
        <small><em>'.$row["deskripsi"].'</em></small>
        </a>
    </li>
    <li class="divider"></li>
    ';
    }
    }
    else
    {
    $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }
    
    $query_1 = "SELECT * FROM notifikasi WHERE statusView=0";
    $result_1 = mysqli_query($connect, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
    'notification'   => $output,
    'unseen_notification' => $count
    );
    echo json_encode($data);
    }
?>