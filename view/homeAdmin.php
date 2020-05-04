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
            <div class="" style="width: 80%; margin-left: 10%; margin-top: 5%;" >
                <?php
                    foreach($result as $key=>$value){
                        echo "<div class='w3-card-4 w3-white' style='width:67%; padding: 15px;'>";
                        echo"<div class=''>";
                        echo"<form method='GET' action='persetujuan'>";
                        echo"<input type='hidden' name='id' value='".$value->idtrip."'>";
                        echo"<input type='submit' value='Detail'>";
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

<div class="w3-container">  
        <div id="postTrip" class="tabs w3-container"> 
            <div class="" style="width: 80%; margin-left: 10%; margin-right: 10%; margin-top: 5%;" >
		    <table>
                    <tr>
                        <th>Name</th>
                        <th>Gambar KTP</th>
                        <th>Swafoto</th>
                        <th>Nama Bank</th>
                        <th>No Rek</th>
                        <th>No KTP</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $conn = mysqli_connect("localhost","root","","titipaja");
                        if ($conn-> connect_error){
                            die("connection failed:" . $conn-> connect_error);
                        }

                        $sql = "SELECT idUser, namaUser, gambarKTP, swafoto, namaBank, norek, noKTP from user WHERE isTraveller LIKE 'pending'";
                        $result = $conn-> query($sql);

                        if($result-> num_rows > 0){
                            while($row = $result-> fetch_assoc()){
                                echo "<tr><td>" . $row["namaUser"] ."</td><td>" . $row["gambarKTP"] . "</td><td>" . $row["swafoto"] ."</td><td>" . $row["namaBank"] ."</td><td>" . $row["norek"] ."</td><td>" . $row["noKTP"] ."</td><td> <button type='button' value='".$row["idUser"] ."'>Decline</button><button type='button'>Confirm</button></td></tr>";
                            }
                            echo "</table>";
                        }else{
                            echo "0 result";
                        }

                        $conn-> close();
                    ?>
                </table>
	    </div>
        </div>
</div>
