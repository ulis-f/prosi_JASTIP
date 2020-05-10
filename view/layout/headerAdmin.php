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
    <link rel="stylesheet" href="http://localhost:80/prosi_JASTIP/view/layout/style/styleAdmin.css">       
    <title>Home Admin</title>

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
<header>
    <div class="w3-top w3-theme" style="background-color:white;">
        <div class="w3-bar-left w3-left">
            <h1><b>titipaja</b></h1>
        </div>
        <div class="w3-bar-right w3-right">
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn w3-theme">Nama admin
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="#"><i class="fa fa-user" style="font-size:15px"></i>Profile</a>
                        <a href="#"><i class="fa fa-sign-out" style="font-size:15px"></i>Keluar</a>
                    </div>
                </div>
        </div>	
    </div>     
</header>
<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }


    var modal = document.getElementById('persetujuan');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";    
        }
    }
</script>


