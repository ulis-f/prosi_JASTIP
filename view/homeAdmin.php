<!--<div class="menuAdmin">
    <ul style="background-color: white; color:black ; margin-top:6%" >
        <li><a class="active" href="#">Post Trip</a></li>
        <li><a href="#">Live Chat</a></li>
        <li><a href="#">Form Barang</a></li>
        <li><a href="#">Pembayaran</a></li>
        <li><a href="#">Mengirim Uang</a></li>  
    </ul>  
</div>-->

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
                            echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn w3-theme-d2' value='Detail'></p>";
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
                            echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn w3-theme-d2' value='Detail'></p>";
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
                            echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn w3-theme-d2' value='Detail'></p>";
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


