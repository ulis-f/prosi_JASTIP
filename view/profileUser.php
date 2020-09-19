<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
    <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
        <!-- Profile -->  
            <div class="w3-card w3-round w3-white">
                <div class="w3-container">
                <h4 class="w3-center">Profile Saya</h4>
                <p class="w3-center">
                <?php
                foreach($foto as $key => $value){    
                    if($value->gambarProfile!=null){
                        echo "<img src='../view/image/".$value->gambarProfile."' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                    }
                    else{
                        echo "<img src='../view/image/user.png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                    }
                }   
                ?>
                <hr>
                <?php  
                    foreach($resultA as $key=>$value){
                        echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-user fa-fw w3-margin-right w3-text-theme'></i>".$value->username."</p>";
                        echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-phone fa-fw w3-margin-right w3-text-theme'></i>".$value->noHp."</p>";
                        echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-envelope fa-fw w3-margin-right w3-text-theme'></i>".$value->email."</p>";
                        echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i>".$value->alamat."</p>";
                        }
                ?>
                <hr>
                <div class="w3-center">
                    <button class="btn btn-danger btn-sm" style="margin-bottom:5%; padding:3%;" onclick="btnUpdateProfile()">Edit Profile</button>
                </div>
            </div>      
        </div>  
        <!-- End Left Column -->    
    </div>

    <div id="updateProfile" class="modal">
        <div id="profile" class="modal-content animate">
            <div class="imgcontainer">
                <span onclick="btnCloseUpdateProfile()" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container"> 
                <div class="view-account">
                    <section class="module">
                        <div class="module-inner">
                            <div class="content-panel">
                                <form class="form-horizontal" action="updateProfile" method="POST">
                                    <fieldset class="fieldset">
                                        <p class="w3-center">
                                        <?php
                                        if($foto==null){
                                            echo "<img src='../view/image/user.png' class='w3-circle imageProfile' style='height:70px;width:70px' alt='Avatar'></p>";
                                        }
                                        else{
                                            echo "<img src='../view/image/".$foto."' class='w3-circle imageProfile' style='height:70px;width:70px' alt='Avatar'></p>";
                                        }
                                        
                                        ?>
                                        <br>
                                        <h6>Update Foto Profile</h6>
                                        <br>
                                        <input type='file' name="updateFoto" id="updateFoto" accept="image/*">                                      

                                        <hr>
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-3 col-xs-12 control-label">Nama User</label>
                                            <div class="col-md-10 col-sm-9 col-xs-12">
                                            <?php
                                                echo "<input type='text' class='form-control' value='".$value->username."' name='updateNama' required>";
                                            ?>
                                            </div>
                                        </div>
                    
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-3 col-xs-12 control-label">No. Telepon</label>
                                            <div class="col-md-10 col-sm-9 col-xs-12">
                                            <?php
                                                echo "<input type='text' class='form-control' value='".$value->noHp."' name='updateTelepon' required>";
                                            ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                            <div class="col-md-10 col-sm-9 col-xs-12">
                                            <?php
                                                echo "<input type='text' class='form-control' value='".$value->email."' name='updateEmail' required>";
                                            ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-3 col-xs-12 control-label">Alamat</label>
                                            <div class="col-md-10 col-sm-9 col-xs-12">
                                            <?php
                                                echo "<input type='text' class='form-control' value='".$value->alamat."' name='updateAlamat' required>";
                                            ?>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr>
                                    <div class="w3-center">
                                        <button class="btn btn-primary btn-sm" type="submit" style="margin-bottom:2%; padding:1%;">Update Profile</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
        <div class="w3-row-padding">  
            <div class="w3-col m12">
            <h4 style="margin:auto; margin-left: 10%;">Pejalanan yang Masih Aktif</h4>
                <?php
                    if($result==null){
                        echo"<div class='w3-card w3-round w3-white' style='width:80%; margin: auto; padding:20px; margin-top:5%;'>";
                            echo"Anda belum memiliki trip";  
                        echo"</div>";
                    }
                    else{
                        foreach($result as $key=>$value){
                        echo"<div class='w3-card w3-round w3-white' style='width:80%; margin: auto; margin-top:5%;'>";
                            echo"<div class='w3-container w3-padding'>";
                            echo"<table>";
                                echo"</tr>";  
                                echo"<tr>";
                                    echo"<td>".$value->kotaAwal."</td>";
                                    echo"<td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:24px'></i></td>";
                                    echo"<td>".$value->kotaTujuan."</td>";

                                echo"</tr>";
                                echo"<tr>";
                                    echo"<td>".$value->waktuAwal."</td>";  
                                    echo"<td>".$value->waktuAkhir."</td>";     
                                echo"</tr>";
                            echo"</table>";
                            echo"</div>";
                        echo"</div>";
                        }  
                    }
                ?>
            </div>
            </div>
        </div>
    </div>
</div>


<script>

    // Get the modal
    var modal = document.getElementById('updateProfile');
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    } 

    function btnUpdateProfile(){
        document.getElementById('updateProfile').style.display='block';
    }
    function btnCloseUpdateProfile(){
        document.getElementById('updateProfile').style.display='none';
    }

</script>


<style>
    #profile{
        width: 60%;
    }

    .imageProfile{
        float: left;
    }


</style>