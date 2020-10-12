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
            $query = "SELECT * FROM notifikasi WHERE idUser = '$idUser'";
            $query_result = $db->executeSelectQuery($query);
            $result1=[];
            foreach($query_result as $key=>$value){
                $result1[]= new notifikasi(null,null,$value['namaNotifikasi'],$value['deskripsi'],null,$value['dateTime']);
            }	  
        }

        
        
    ?>
    <div class="w3-bar-right w3-right">   
            <div class="dropdown">
                <i class="fa fa-bell" style="font-size:24px"></i> 
                <div id="myDropdown" class="dropdown-content" style="width:10%;">  
                <?php
                    foreach($result1 as $key => $value){
                        echo"<div style='color:black; border-left: 5px solid; border-left-color:#febaad; padding:10px; background-color:#feeae6'>";
                        echo"<br>";
                        echo"<strong>$value->namaNotifikasi</strong><br/>";
                        echo"<small><em>$value->deskripsi</em></small>";
                        echo"<br>";
                        echo"<small><em>$value->dateTime</em></small>";       
                        echo"</div>";
                        echo"<br>";

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

</script>


