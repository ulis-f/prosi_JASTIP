<style>
    figure:hover{
    transform: scale(2.4);
}
</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 1200px; margin-top: 15%;">
            <form action="verifikasiPendaftaran" method="POST">
                <h2>Persetujuan Pendaftaran</h2> 
                    <br> 
                    <?php
                    foreach($result as $key=>$value){
                    echo"<input type='hidden' name='id' value='".$value->IDuser."'>";
                    echo"<label for=''><b>Foto KTP</b></label> <br>";
                    echo"<figure><img src='image/trip/".$value->gambarktp."'width=250px height=150px></figure><br>";
                    echo"<label for=''><b>Swafoto</b></label> <br>";
                    echo"<figure><img src='image/trip/".$value->swafoto."'width=250px height=150px></figure>";
                    echo "<br>
                    <label for=''><b> NIK</b></label>
                    <br>";
                    echo "$value->noktp"; 
                    echo "<br><br>
                    <label for=''><b>Nama Bank</b></label>
                    <br>";
                    echo"$value->namabank";
                    echo"<br><br>
                    <label for=''><b>No. Rekening</b></label>
                    <br>";
                    echo"$value->norek";
                    echo"<br><br>";
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