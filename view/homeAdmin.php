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
            <div class="" style="width: 80%; margin-left: 10%; margin-right: 10%; margin-top: 5%;" >
                <?php
                    foreach($result as $key=>$value){
                        echo "<div class='w3-card-4 w3-white' style='width:30%; float: left;margin-right: 5%; padding: 15px;'>";
                        echo"<div class=''>";
                        echo"<form method='GET' action='persetujuan'>";
                        echo"<input type='hidden' name='nama' value='".$value->namaUser."'>";
                        echo"</form>";
                        echo"<label for=".$value->namaUser.">".$value->namaUser."</label>";
                        echo"</div>";
                        echo"<img src='image/trip/".$value->fotoTiket."'>";
                        echo "</div>";
                    }
                ?>
			</div>
        </div>
</div>