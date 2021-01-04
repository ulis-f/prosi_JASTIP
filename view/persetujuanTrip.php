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
        <a class="nav-link" href="pengirimanUang" style="height: 100%;">Pengiriman Uang</a>
    </li>
</ul>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">
    <p class="" style="width:100%;border-bottom:1px solid #6699cc"> 
        Sekarang anda berada di halaman :
        <a class="" href="homeAdmin" style="text-decoration:none; ">Post Trip</a>
        <i class="fa fa-angle-double-right" style=""></i>
        <a class="" href="#" style="text-decoration:none; color:#6699cc"><b>Detail Trip</b> </a>
    </p>

    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 1000px; background-color: #ebebeb; ">
            <form action="verifikasi" method="POST">
                <h3><b>Post Trip</b></h3>
                    <br> 
                    <?php
                    foreach($result as $key=>$value){
                    echo "<input type='hidden' name='id' value='".$value->idtrip."'>";
                    echo"<img src='image/trip/".$value->fotoTiket."'width=560px height=300px>";
                    echo"<br>";
                    echo"<br>"; 
                    echo"<table>";
                    echo"<tr>";
                    echo"<td><b>Asal</b></td>";
                    echo"<td></td>";
                    echo"<td><b>Tujuan</b></td>";
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
                    echo"<input type='radio' id='verified' name='verified' onclick='check(this.value)' value='verified'>Verified<br>";
                    echo"<input type='radio' id='unverified' name='verified' onclick='check(this.value)' value='unverified'>Unverified";
                    echo"<br> <br>";
                    echo"<label for='note'>Note</label> <br>";
                    echo"<textarea name='deskripsi' id='deskripsi' cols='30' rows='5'></textarea>";
                    echo"<br><br><br><br><br>";
                    echo"<input type='submit' class='w3-btn w3-right w3-theme'>";
                    }
                    ?>
            </form>
        </div>
    </div>
</fieldset>

<script>
    function check(browser) {
        if(browser == 'verified'){
            document.getElementById("deskripsi").placeholder='Trip anda sudah diverifikasi';
        }
        else{
            document.getElementById("deskripsi").placeholder='Trip anda gagal untuk diverifikasi';
        }
}
</script>