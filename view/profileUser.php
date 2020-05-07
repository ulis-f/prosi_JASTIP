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
                <p class="w3-center"><img src="../view/image/user.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                <hr>
                <p><i class="fa fa-user fa-fw w3-margin-right w3-text-theme"></i><?= $_SESSION['nama']?></p>
                <p><i class="fa fa-phone fa-fw w3-margin-right w3-text-theme"></i> <?= $_SESSION['nohp']?></p>
                <p><i class="fa fa-envelope fa-fw w3-margin-right w3-text-theme"></i><?= $_SESSION['email']?></p>
                <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?= $_SESSION['alamat']?></p>    
            </div>      
        </div>
        <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
        <div class="w3-row-padding">  
            <div class="w3-col m12">
            <h4 style="margin:auto; margin-left: 10%;">Pejalanan yang Masih Aktif</h4>
                <?php
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
                ?>
            </div>
            </div>
        </div>
    </div>
    
<!-- End Page Container -->
</div>

