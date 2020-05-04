<div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 650px; background-color: #ebebeb; ">
            <form action="#" method="POST">
                <h2>Post Trip</h2>
                    <br>
                    <?php
                    foreach($result as $key=>$value){
                    echo"<img src='image/trip/".$value->fotoTiket."'>";
                    echo"<table>";
                    echo"<tr>";
                    echo"<td>Tujuan</td>";
                    echo"<td></td>";
                    echo"<td>Asal</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<td>".$value->kotaAwal."</td>";
                    echo"<td><i class='fa fa-angle-double-right' style='font-size:24px'></i></td>";
                    echo"<td>".$value->kotaTujuan."</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<td>".$value->waktuAwal."</td>";  
                    echo"<td></td>";
                    echo"<td>".$value->waktuAkhir."</td>";
                    echo"</tr>";
                    echo"</table>";
                    echo"<br>";
                    echo"<input type='radio' id='verified' name='verified' value='verified'>Verified<br>";
                    echo"<input type='radio' id='unverified' name='unverified' value='unverified'>Unverified";
                    echo"<br> <br>";
                    echo"<label for='note'>Note</label> <br>";
                    echo"<textarea name='' id='' cols='30' rows='5'></textarea>";
                    echo"<br><br><br><br><br>";
                    echo"<div class='w3-btn w3-right' style='background-color:#b74449; color: white;'>Submit</div>";
                    }
                    ?>
            </form>
        </div>
    </div>