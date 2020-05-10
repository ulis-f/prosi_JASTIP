    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 1100px; background-color: #ebebeb; ">
            <form action="verifikasiPendaftaran" method="POST">
                <h2>Persetujuan Pendaftaran</h2>
                    <br>
                    <?php
                    foreach($result as $key=>$value){
                    echo"<input type='hidden' name='id' value='".$value->IDuser."'>";
                    echo"<img src='image/trip/".$value->gambarktp."'width=560px height=300px>";
                    echo"<img src='image/trip/".$value->swafoto."'width=560px height=300px>";
                    echo "<br>
                    <label for=''><b> NIK</b></label>
                    <br>";
                    echo "$value->noktp";
                    echo "<br>
                    <label for=''><b>Nama Bank</b></label>
                    <br>";
                    echo"$value->namabank";
                    echo"<br>
                    <label for=''><b>No. Rekening</b></label>
                    <br>";
                    echo"$value->norek";
                    echo"<br>";
                    echo"<input type='radio' id='verified' name='verified' value='verified'>Verified<br>
                    <input type='radio' id='unverifie' name='verified' value='unverified'>Unverified
                    <br> <br>
                    <label for='note'>Note</label> <br>
                    <textarea name='' id='' cols='30' rows='5'></textarea>
                    <br><br><br><br><br>
                    <input type='submit' class='w3-btn w3-right w3-theme' value='Submit'>  ";
                    }
                    ?>
            </form>    
        </div>
    </div>