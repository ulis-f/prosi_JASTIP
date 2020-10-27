<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
body{
    background-color:white;
}

#itemOffer{
    overflow-y: scroll;
    height :475px;    
}   

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: white;
}

</style>  

<div class="w3-container w3-content" style="max-width:1400px;margin-top:5%;">    
    <div class="w3-row">
        <!-- Left Column -->
        <div class="w3-col m3">
        <!-- Profile -->  
            <div class="w3-card w3-round w3-white" style="height:550px;">
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
                                <form class="form-horizontal" action="updateProfile" method="POST" enctype="multipart/form-data">
                                    <fieldset class="fieldset">
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


    <fieldset class="" style="margin-left:5%; border: #6699cc 1px solid; height:550px;">
        <ul class="nav" style="width:100%;border-bottom:1px solid #6699cc">   
            <li class="nav-item" style="">
                <a class="nav-link text-center w3-text-theme" href="profileUser" style="height: 100%;">Trip Aktif</a>
            </li>
            <li class="nav-item w3-text-theme">
                <a class="nav-link text-center w3-text-theme" href="profileUserWantedItem" style="height: 100%;">Wanted Item</a>
            </li>
            <li class="nav-item w3-text-theme">
                <a class="nav-link text-center w3-text-theme" href="#" style="height: 100%;border-bottom: 4px solid #6699cc;">Item Offer</a>
            </li>
        </ul> 

        <div class="w3-row-padding">  
            <div class="w3-col m12">
            <h4></h4>
                <?php
                echo"<div id='itemOffer'>";
                    echo"<table class='table table-striped'> 
                        <tr>
                            <th style='width:5px;'>No</th>
                            <th>Nama Barang</th>
                            <th>Detail</th>
                        </tr>";
                        $i=1;
                        foreach($result as $key => $value){
                            echo"<tr>";
                            echo"<form method='GET' action='detailOfferItemProfile'>";
                            echo"<input type='hidden' name='id' value=".$value->idUser.">";  
                            echo"<input type='hidden' name='namaBarang' value='".$value->namaBarang."'>";  
                            echo "<td>".$i."</td> ";
                            echo " <td>".$value->namaBarang."</td>";
                            echo " <td class='text-center'><input class='btn btn-primary btn-sm' style='font-size:15px' type='submit' value='Detail'></td>
                                </tr>";
                            echo"</form>";
                            $i++;
                        }
                        echo"</table>";   
                echo"</div>";
                ?>
            </div>
            </div>
        </div>
        </fieldset>
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