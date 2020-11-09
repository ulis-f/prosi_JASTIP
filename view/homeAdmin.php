
<style>
    body{
        background-color:white;
    }
    
</style>

<ul class="nav" style="margin-top:7%; margin-left:2%; background-color:white;">
    <li class="nav-item">
        <a class="nav-link w3-text-theme" href="#" style="border-bottom: 4px solid #6699cc; height: 100%;">Post Trip</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link text-center w3-text-theme" href="lengkapDaftar" style="height: 100%;">Lengkapi Pendaftaran</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="persetujuanBarang"  style="height: 100%;">Form Barang</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%;">Pembayaran</a>  
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%;">Mengirim Uang</a>
    </li>
</ul>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">
    <p class="" style="width:100%;border-bottom:1px solid #6699cc"> 
        Sekarang anda berada di halaman :
        <a class="" href="#" style="text-decoration:none; color:#6699cc"><b>Post Trip</b></a>
        <i class="fa fa-angle-double-right" style=""></i>
        <a class="" href="#" style="text-decoration:none">Detail Trip</a>
    </p>
<div class="w3-container">  
    <div id="postTrip" class="tabs w3-container"> 
        <div class="" >
            <?php    
                $i=1;
                foreach($result as $key=>$value){
                    echo"<div style='margin-top:5%;'>";
                    echo"<div style='margin-left:7.5%; margin-right:7.5%; width: 85%;margin-bottom:5%;' class=''>";
                    if($i==1){
                        echo"<div class='w3-card-4 w3-white' style='width:30%; float: left;margin-right: 5%; height:70%;'>";
                        echo"<div class=''>";
                            echo"<form method='GET' action='persetujuan'>";
                                echo"<input type='hidden' name='id' value='".$value->idtrip."'>";      
                                echo"<p align='center' style='padding-top:10px;'><label for=".$value->namaUser.">".$value->namaUser."</label></p>";
                                echo"<img src='image/trip/".$value->fotoTiket."'width=100% height=150px>";
                                echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn w3-theme' value='Detail'></p>";
                            echo"</form>";
                        echo"</div>";
                        echo "</div>";  
                    }

                    elseif($i==2){
                        echo"<div class='w3-card-4 w3-white' style='width:30%; float:left; height:70%;margin-bottom:5%;'>";
                        echo"<div class=''>";
                            echo"<form method='GET' action='persetujuan'>";
                                echo"<input type='hidden' name='id' value='".$value->idtrip."'>";      
                                echo"<p align='center' style='padding-top:10px;'><label for=".$value->namaUser.">".$value->namaUser."</label></p>";
                                echo"<img src='image/trip/".$value->fotoTiket."'width=100% height=150px>";
                                echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn w3-theme' value='Detail'></p>";
                            echo"</form>";
                        echo"</div>";
                        echo "</div>";
                    }

                    else{
                        echo"<div class='w3-card-4 w3-white' style='width:30%; float: right;margin-left: 5%; height:70%;margin-bottom:5%;'>";
                        echo"<div class=''>";
                            echo"<form method='GET' action='persetujuan'>";
                                echo"<input type='hidden' name='id' value='".$value->idtrip."'>";      
                                echo"<p align='center' style='padding-top:10px;'><label for=".$value->namaUser.">".$value->namaUser."</label></p>";
                                echo"<img src='image/trip/".$value->fotoTiket."'width=100% height=150px>";
                                echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn w3-theme' value='Detail'></p>";
                            echo"</form>";
                        echo"</div>";
                        echo "</div>";
                    }
                    echo"</div>";
                    echo"</div>";
                    $i++;
                    if($i>3){  
                        echo"<br/>";
                        $i=1;
                    }
                }
            ?>  
        </div>
    </div>
</div>
</fieldset>