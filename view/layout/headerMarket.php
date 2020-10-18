<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="http://localhost:80/prosi_JASTIP/view/layout/style/style.css">

    <title><?php $title ?></title>

    <style>
        .fa {
        padding: 20px;
        font-size: 20px;
        text-align: center;
        border-radius: 50%;
        position: center;
        }

        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
        background: #3B5998;
        color: white;
        }

        .fa-twitter {
        background: #55ACEE;
        color: white;
        }

        .fa-google {
        background: #dd4b39;
        color: white;
        }

        .fa-linkedin {
        background: #007bb5;
        color: white;
        }
        

        .fa-instagram {
        background: #125688;
        color: white;
        }

        #myDropdown-down{
            width:40%:
        }

        #notifikasi{
            overflow-y: scroll;
            height : 300px;
        }

    </style>
</head>
<header class="w3-top w3-theme">
    <div class="w3-bar-left w3-left">
        <a class="navbar-brand" href="index"><h1 style="size:10%;"><b>titipaja</b></h1></a>
    </div>
    <?php
        require_once "controller/services/mysqlDB.php";
        require_once "controller/services/view.php";
        require_once "model/user.php";
        require_once "model/notifikasi.php";
        

        $db = new MySQLDB("localhost","root","","titipaja");  
        $query_idUser = "SELECT idUser FROM `user` WHERE `namaUser` LIKE '$nama'";
        $query_idUser_result = $db->executeSelectQuery($query_idUser);  
        if($nama != null){
            $nama = $_SESSION['nama'];
            $idUser = $query_idUser_result[0]['idUser'];
            $query = "SELECT * FROM notifikasi WHERE idUser = '$idUser' AND statusView=0 ";
            $query_result = $db->executeSelectQuery($query);
            $result1=[];
            foreach($query_result as $key=>$value){
                $result1[]= new notifikasi(null,null,$value['namaNotifikasi'],$value['deskripsi'],null,$value['dateTime']);
            }	
            
            $query2 = "SELECT * FROM notifikasi WHERE idUser = '$idUser' ";
            $query_result2 = $db->executeSelectQuery($query2);
            $result2=[];
            foreach($query_result2 as $key=>$value){
                $result2[]= new notifikasi(null,null,$value['namaNotifikasi'],$value['deskripsi'],null,$value['dateTime']);
            }

            $query3 = "SELECT * FROM notifikasi WHERE idUser = '$idUser' AND statusView=1 ";
            $query_result3 = $db->executeSelectQuery($query3);
            $result3=[];
            foreach($query_result3 as $key=>$value){
                $result3[]= new notifikasi(null,null,$value['namaNotifikasi'],$value['deskripsi'],null,$value['dateTime']);
            }

            $query5 = "SELECT COUNT(statusView) FROM notifikasi WHERE idUser = '$idUser' AND statusView=0 ";
            $query_result5 = $db->executeSelectQuery($query5);
            $countNotifikasi = $query_result5[0]['COUNT(statusView)'];

            $query6 = "SELECT COUNT(statusView) FROM notifikasi WHERE idUser = '$idUser'";
            $query_result6 = $db->executeSelectQuery($query6);
            $countAll = $query_result6[0]['COUNT(statusView)'];

            if(isset($_POST['updateStatus'])){
    
            }
            else{
                include "updateStatusView.php";
            }
        }

        
        
    ?>
    <div class="w3-bar-right w3-right">   
            <div class="dropdown">
                
                <i class="fa fa-bell" onclick="myFunction()" style="font-size:24px"></i> 
                <div id="myDropdown-down" class="dropdown-content" style="width:500px; padding:7px; border-radius:3%;background-color:white;">  
                <?php
                        if($nama != null){
                            echo"<h6 style='color:#f75939;padding-left:10px;'>Notifikasi-notifikasi Anda</h6>";
                            if($result2!=null){
                                $i=1;
                                    if($result1!=null){
                                        foreach($result1 as $key => $value){
                                            echo"<div style='color:black; 
                                            padding:10px; background-color:#feeae6; border-bottom:2px solid white;'>";
                                            echo"<h7>$value->namaNotifikasi</h7><br/>";
                                            echo"<div style='font-size:10px;'>$value->dateTime</div>"; 
                                            echo"<small>$value->deskripsi</small>";
                                            echo"</div>";
                                            $i++;
                                            if($i==$countAll+1 && $i<6){
                                                echo"<div class='w3-right'>
                                                <input type='submit' class='w3-btn w3-text-theme' id='updateStatus' value='Tandai Telah Dibaca ($countNotifikasi)' 
                                                style='font-size:12px; width:200px; name='updateStatus'>
                                                </div>";  
                                            }
                                            if($i==6){
                                            
                                                echo"<fieldset class='w3-theme' Style='border-radius:10px;'>";
                                                echo"<div class='w3-left'>";
                                                // echo"<a href='' style='font-size:12px; width:200px;'>Tampilkan Semua Notifikasi</a>";
                                                // echo"</div>";
                                                echo"<div class='w3-container w3-left'>
                                                    <input type='submit' value='Lihat Semua Notifikasi' class='w3-btn' onclick="."document.getElementById('allNotifikasi').style.display='block'"." style='font-size:12px; width:200px;'>
                                                    <div id='allNotifikasi' class='w3-modal'>
                                                        <div class='w3-modal-content' style='width:40%; height:auto; margin-left: auto; margin-right: auto; padding-top:3%; border-radius:3%;'>
                                                            <div class='w3-container'>
                                                            <span onclick="."document.getElementById('allNotifikasi').style.display='none'"." class='w3-button w3-display-topright'>&times;</span> "; 
                                                            echo"<h3 style='color:#f75939;'>Notifikasi-notifikasi Anda</h3>";
                                                            echo"<div id='notifikasi'>";
                                                            foreach($result1 as $key => $value){
                                                                echo"<div style='color:black; 
                                                                padding:10px; background-color:#feeae6; border-bottom:2px solid white;'>";
                                                                echo"<h7>$value->namaNotifikasi</h7><br/>";
                                                                echo"<div style='font-size:10px;'>$value->dateTime</div>"; 
                                                                echo"<small>$value->deskripsi</small>";
                                                                echo"</div>";
                                                            }
                                                            
                                                            foreach($result3 as $key => $value){
                                                                echo"<div style='color:black; 
                                                                padding:10px; background-color:white; border-bottom:2px solid #ddd;'>";
                                                                echo"<h7>$value->namaNotifikasi</h7><br/>";
                                                                echo"<div style='font-size:10px;'>$value->dateTime</div>"; 
                                                                echo"<small>$value->deskripsi</small>";
                                                                echo"</div>";
                                                            } 
                                                                
                                                        echo"</div>
                                                        </div>
                                                    </div>   
                                                </div>";
                                                echo"</div>";
                                                
                                                echo"<div class='w3-right'>";
                                                // echo"<a href='' style='font-size:12px; width:150px;'>Tandai Telah Dibaca</a>";
                                                // echo"</div>";
                                                echo"<input type='submit' class='w3-btn' id='updateStatus' value='Tandai Telah Dibaca ($countNotifikasi)' 
                                                style='font-size:12px; width:200px; name='updateStatus'>";  

                                                // echo"<form method='POST' action='C:\xampp\htdocs\prosi_JASTIP\view\layout\updateStatusView.php'>
                                                //     <input type='submit' class='w3-btn' value='Tandai Telah Dibaca ($countNotifikasi)' style='font-size:12px; width:200px; name='updateStatus'>
                                                // </form>";
                                                echo"</fieldset>";

                                                break;
                                            }
                                        }
                                    }
                                    if($result3!=null){
                                        foreach($result3 as $key => $value){
                                            echo"<div style='color:black; 
                                            padding:10px; background-color:white; border-bottom:2px solid #ddd;'>";
                                            echo"<h7>$value->namaNotifikasi</h7><br/>";
                                            echo"<div style='font-size:10px;'>$value->dateTime</div>"; 
                                            echo"<small>$value->deskripsi</small>";
                                            echo"</div>";
                                            $i++;
                                            if($i==$countAll+1 && $i<6){
                                                echo"<div class='w3-right'>
                                                <input type='submit' class='w3-btn w3-text-theme' id='updateStatus' value='Tandai Telah Dibaca ($countNotifikasi)' 
                                                style='font-size:12px; width:200px; name='updateStatus'>
                                                </div>";  
                                            }
                                            if($i==6){
                                            
                                                echo"<fieldset class='w3-theme' Style='border-radius:10px;'>";
                                                echo"<div class='w3-left'>";
                                                // echo"<a href='' style='font-size:12px; width:200px;'>Tampilkan Semua Notifikasi</a>";
                                                // echo"</div>";
                                                echo"<div class='w3-container w3-left'>
                                                    <input type='submit' value='Lihat Semua Notifikasi' class='w3-btn' onclick="."document.getElementById('allNotifikasi').style.display='block'"." style='font-size:12px; width:200px;'>
                                                    <div id='allNotifikasi' class='w3-modal'>
                                                        <div class='w3-modal-content' style='width:40%; height:auto; margin-left: auto; margin-right: auto; padding-top:3%; border-radius:3%;'>
                                                            <div class='w3-container'>
                                                            <span onclick="."document.getElementById('allNotifikasi').style.display='none'"." class='w3-button w3-display-topright'>&times;</span> "; 
                                                            echo"<h3 style='color:#f75939;'>Notifikasi-notifikasi Anda</h3>";
                                                            echo"<div id='notifikasi'>";
                                                            foreach($result1 as $key => $value){
                                                                echo"<div style='color:black; 
                                                                padding:10px; background-color:#feeae6; border-bottom:2px solid white;'>";
                                                                echo"<h7>$value->namaNotifikasi</h7><br/>";
                                                                echo"<div style='font-size:10px;'>$value->dateTime</div>"; 
                                                                echo"<small>$value->deskripsi</small>";
                                                                echo"</div>";
                                                            }
                                                            
                                                            foreach($result3 as $key => $value){
                                                                echo"<div style='color:black; 
                                                                padding:10px; background-color:white; border-bottom:2px solid #ddd;'>";
                                                                echo"<h7>$value->namaNotifikasi</h7><br/>";
                                                                echo"<div style='font-size:10px;'>$value->dateTime</div>"; 
                                                                echo"<small>$value->deskripsi</small>";
                                                                echo"</div>";
                                                            } 
                                                            echo"</div>"; 
                                                        echo"</div>
                                                        </div>
                                                    </div> 
                                                </div>";
                                                echo"</div>";
                                                
                                                echo"<div class='w3-right'>";
                                                // echo"<a href='' style='font-size:12px; width:150px;'>Tandai Telah Dibaca</a>";
                                                // echo"</div>";
                                                echo"<input type='submit' class='w3-btn' id='updateStatus' value='Tandai Telah Dibaca ($countNotifikasi)' 
                                                style='font-size:12px; width:200px; name='updateStatus'>";  

                                                // echo"<form method='POST' action='C:\xampp\htdocs\prosi_JASTIP\view\layout\updateStatusView.php'>
                                                // <input type='submit' class='w3-btn' id='updateStatus' value='Tandai Telah Dibaca ($countNotifikasi)' 
                                                // style='font-size:12px; width:200px; name='updateStatus'>    
                                                // </form>";
                                                echo"</fieldset>";

                                                

                                                break;
                                            }   
                                        }
                                    }
                            }
                            else{
                                echo"<div style='color:black; border-left: 5px solid; border-left-color:#febaad; padding:10px; background-color:#feeae6'>";
                                echo"<br>";
                                echo"<h5>Anda tidak memiliki notifikasi</h5>"; 
                                echo"<br>";
                                echo"</div>";
                            }
                        }
                ?>  
            </div>
        </div>
                
            <h4 id="loginButton" class="w3-bar-item w3-display-inline  w3-btn" onclick="market()">Market</h4>
            <h4 id="loginButton" class="w3-bar-item w3-display-inline  w3-btn">Tracking</h4>
            <?php
                if($nama==null){   
                    echo '
                    <button id="loginButton" class="dropbtn  w3-theme" onclick="btnLogin()" style="padding:21px;"><h4>Daftar / Masuk</h4></button>
                        <div id="login" class="modal">
                            <div class="modal-content animate" >
                                <div class="imgcontainer">
                                    <span onclick="btnLoginClose()" class="close" title="Close Modal">&times;</span>
                                </div>';
                                
                                    
                                        if ($auth ==0) {
                                            echo '<div class="text-center mb-2">
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            <strong>Login Gagal!</strong>';
                                            
                                        }
                                    
                                
                                echo '<form action="loginKlik" method="POST">
                                <div class="container w3-text-theme"> 
                                    <label for="email"><b>Email</b></label>
                                    <input type="text" placeholder="" name="email">
                                    <br>
                                    <label for="password"><b>Password</b></label>
                                    <br>
                                    <input type="password" placeholder="" name="password">
                                    <br>
                                    <br>
                                    <br>
                                    <input type="submit" class="w3-btn w3-theme-d2" value="login"><br><br>
                                    </div>    
                                    </form>
                                    <p class="w3-text-theme"><b>Belum mempunyai akun?</b><a href="register">Register</a></p>   
                            </div>
                        </div>
                        ';
                }
                else{
                    echo '
                    <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn  w3-theme">'.$nama.'
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div id="myDropdown" class="dropdown-content"> 
                        <a href="profileUser"><i class="fa fa-user w3-text-theme" style="font-size:15px"></i>Profile</a>
                        <a href="lengkapPendaftaran"><i class="fa fa-edit w3-text-theme" style="font-size:15px"></i>Lengkapi Pendaftaran</a>
                        <a href="logout"><i class="fa fa-sign-out w3-text-theme" style="font-size:15px"></i>Keluar</a>
                    </div>
                </div>
                    ';
                }
                
                    
                
            ?>

            </header>
    </div>	
<script>

    // Get the modal
    var modal = document.getElementById('login');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    } 

    function btnLogin(){
        document.getElementById('login').style.display='block';
    }
    function btnLoginClose(){
        document.getElementById('login').style.display='none';
    }
    function market(){
        location.href="market";
    }


    function myFunction() {
        document.getElementById("myDropdown-down").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
                }
            }
        }
    }

    function updateStatusView() {
        document.getElementById("demo").innerHTML = "Hello World";
    }

    

</script>


                                
        
