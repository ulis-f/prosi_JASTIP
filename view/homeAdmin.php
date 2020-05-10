<ul class="nav nav-tabs justify-content-center" style="margin-top:6%; background-color:white;">
    <li class="nav-item">
        <a class="nav-link w3-text-theme" href="#" style="background-color:#f9f9f9; height: 100%;">Post Trip</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link text-center w3-text-theme" href="lengkapDaftar" style="height: 100%;">Lengkapi Pendaftaran</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#"  style="height: 100%;">Form Barang</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%;">Pembayaran</a>  
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%;">Mengirim Uang</a>
    </li>
</ul>

<table style="width:100%;" >
    
        <div class="w3-container">  
            <div id="postTrip" class="tabs w3-container"> 
                <div class="" >
                <?php    
                    $i=1;
                    echo"<tr>";
                    foreach($result as $key=>$value){
                    echo"<div style='margin-top:5%;'>";
                        echo"<td>";
                        if($i==1){
                            echo"<div class='w3-card-4 w3-white' style='width:60%; height:70% ; margin-bottom:10%; margin-left:50%;'>";
                            echo"<div class=''>";
                            echo"<form method='GET' action='persetujuan'>";
                            echo"<input type='hidden' name='id' value='".$value->idtrip."'>";      
                            echo"<p align='center' style='padding-top:10px;'><label for=".$value->namaUser.">".$value->namaUser."</label></p>";
                            echo"</div>";
                            echo"<img src='image/trip/".$value->fotoTiket."'width=100% height=150px>";
                            echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn w3-theme' value='Detail'></p>";
                            echo"</form>";
                            echo "</div>";
                        }
                        elseif($i==2){
                            echo"<div class='w3-card-4 w3-white' style='width:60%; height:70%; margin-bottom:10%; margin-left:25%;'>";
                            echo"<div class=''>";
                            echo"<form method='GET' action='persetujuan'>";  
                            echo"<input type='hidden' name='id' value='".$value->idtrip."'>";      
                            echo"<p align='center' style='padding-top:10px;'><label for=".$value->namaUser.">".$value->namaUser."</label></p>";
                            echo"</div>";
                            echo"<img src='image/trip/".$value->fotoTiket."'width=100% height=150px>";
                            echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn w3-theme' value='Detail'></p>";
                            echo"</form>";
                            echo "</div>";
                        }
                        else{
                            echo"<div class='w3-card-4 w3-white' style='width:60%; height: 70% ; margin-bottom:10%; margin-right:50%;'>";
                            echo"<div class=''>";
                            echo"<form method='GET' action='persetujuan'>";
                            echo"<input type='hidden' name='id' value='".$value->idtrip."'>";      
                            echo"<p align='center' style='padding-top:10px;'><label for=".$value->namaUser.">".$value->namaUser."</label></p>";
                            echo"</div>";
                            echo"<img src='image/trip/".$value->fotoTiket."'width=100% height=150px>";
                            echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn w3-theme' value='Detail'></p>";
                            echo"</form>";
                            echo "</div>";
                        }
                       
                    echo"</div>";  
                        
                        echo "</td>";
                        $i++;

                        if($i>3){
                            echo"</tr>";
                            echo"<br>";
                            $i=1;
                        }
                    }
                         
                        
                ?>    
        
      
</table>


