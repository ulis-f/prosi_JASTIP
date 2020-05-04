<div class="menuAdmin">
    <ul style="background-color: #b74449;" >
        <li><a class="active" href="#">Post Trip</a></li>
        <li><a href="#">Live Chat</a></li>
        <li><a href="#">Form Barang</a></li>
        <li><a href="#">Pembayaran</a></li>
        <li><a href="#">Mengirim Uang</a></li>
    </ul>
</div>

<div class="w3-container">  
        <div id="postTrip" class="tabs w3-container"> 
            <div class="" style="width: 80%; margin-top: 5%;" >
                <?php
                    foreach($result as $key=>$value){
                        echo "<div class='w3-card-4 w3-white' style='width:30%; height:30%; padding: 15px;'>";
                        echo"<div class=''>";
                        echo"<form method='GET' action='persetujuan'>";
                        echo"<input type='hidden' name='id' value='".$value->idtrip."'>";
                        echo"<input type='submit' value='Detail'>";
                        echo"</form>";
                        echo"<label for=".$value->namaUser.">".$value->namaUser."</label>";
                        echo"</div>";
                        echo"<img src='image/trip/".$value->fotoTiket."'width=100px height=70px>";
                        
                        echo "</div>";
                    }

                    
                ?>
			</div>
        </div>
</div>


<table style="margin-top: 5%; width:100%;" >
    
        <div class="w3-container">  
            <div id="postTrip" class="tabs w3-container"> 
                <div class="" >
                <?php
                   
                    
                    $i=1;
                    echo"<tr>";
                    foreach($result as $key=>$value){
                    echo"<div style='margin-bottom:100px;'>";
                        echo"<td>";
                        if($i==1){
                            echo"<div class='w3-card-4 w3-white' style='width:60%; height:300px ; margin-bottom:10%; margin-left:50%;'>";
                            echo"<div class=''>";
                            echo"<form method='GET' action='persetujuan'>";
                            echo"<input type='hidden' name='id' value='".$value->idtrip."'>";      
                            echo"<p align='center' style='padding-bottom:0px; padding-top:10px;'><label for=".$value->namaUser.">".$value->namaUser."</label></p>";
                            echo"</div>";
                            echo"<img src='image/trip/".$value->fotoTiket."'width=100% height=150px>";
                            echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn' style='background-color:#b74449; color: white;' value='Detail'></p>";
                            echo"</form>";
                            echo "</div>";
                        }
                        elseif($i==2){
                            echo"<div class='w3-card-4 w3-white' style='width:60%; height:300px; margin-bottom:10%; margin-left:25%;'>";
                            echo"<div class=''>";
                            echo"<form method='GET' action='persetujuan'>";  
                            echo"<input type='hidden' name='id' value='".$value->idtrip."'>";      
                            echo"<p align='center' style='padding-bottom:0px; padding-top:10px;'><label for=".$value->namaUser.">".$value->namaUser."</label></p>";
                            echo"</div>";
                            echo"<img src='image/trip/".$value->fotoTiket."'width=100% height=150px>";
                            echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn' style='background-color:#b74449; color: white;' value='Detail'></p>";
                            echo"</form>";
                            echo "</div>";
                        }
                        else{
                            echo"<div class='w3-card-4 w3-white' style='width:60%; height:300px ; margin-bottom:10%; margin-right:50%;'>";
                            echo"<div class=''>";
                            echo"<form method='GET' action='persetujuan'>";
                            echo"<input type='hidden' name='id' value='".$value->idtrip."'>";      
                            echo"<p align='center' style='padding-bottom:0px; padding-top:10px;'><label for=".$value->namaUser.">".$value->namaUser."</label></p>";
                            echo"</div>";
                            echo"<img src='image/trip/".$value->fotoTiket."'width=100% height=150px>";
                            echo"<p align='center' style='padding:25px;'><input type='submit' class='w3-btn' style='background-color:#b74449; color: white;' value='Detail'></p>";
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


