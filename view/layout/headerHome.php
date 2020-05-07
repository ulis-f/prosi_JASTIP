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
        <h1 style="size:10%;"><b>titipaja</b></h1>
    </div>
    <div class="w3-bar-right w3-right">  
            <h4 class="w3-bar-item w3-display-inline w3-btn" >
            <h4 id="loginButton" class="w3-bar-item w3-display-inline  w3-btn">Market</h4>
            <h4 id="loginButton" class="w3-bar-item w3-display-inline  w3-btn">Tracking</h4>
            <?php
                if($nama==null){   
                    echo '
                        <h3 id="loginButton" class="w3-bar-item w3-display-inline  w3-btn" onclick="btnLogin()" >Daftar / Masuk</h3>
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
                        <a href="profileUser"><i class="fa fa-user" style="font-size:15px"></i>Profile</a>
                        <a href="lengkapPendaftaran"><i class="fa fa-edit" style="font-size:15px"></i>Lengkapi Pendaftaran</a>
                        <a href="logout"><i class="fa fa-sign-out" style="font-size:15px"></i>Keluar</a>
                    </div>
                </div>
                    ';
                }
                
                    
                
            ?>

            </header>
    </div>	
    <script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
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

</script>