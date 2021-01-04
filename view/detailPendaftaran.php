<style>
    figure:hover{
    transform: scale(2.4);
    }

    body{
        background-color:white;
    }
    .column {
        width: 48%;
        float: left;
    }

    .column1 {
        width: 48%;
        float: right;
    }

</style>

<ul class="nav" style="margin-top:7%; margin-left:2%; background-color:white;">
    <li class="nav-item">
        <a class="nav-link w3-text-theme" href="homeAdmin" style="height: 100%;">Post Trip</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link text-center w3-text-theme" href="#" style="border-bottom: 4px solid #6699cc; height: 100%;">Lengkapi Pendaftaran</a>
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
        <a class="" href="lengkapDaftar" style="text-decoration:none;  ">Lengkapi Pendaftaran</a>
        <i class="fa fa-angle-double-right" style=""></i>  
        <a class="" href="#" style="text-decoration:none; color:#6699cc"><b>Detail Lengkapi Pendaftaran</b></a>
    </p>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="margin: auto; padding: 50px; height: 700px;">
            <form action="verifikasiPendaftaran" method="POST">
                <h3><b>Persetujuan Pendaftaran</b></h3><br> 
                <div class="column">
                    <?php
                    foreach($result as $key=>$value){
                    echo"<input type='hidden' name='id' value='".$value->IDuser."'>";
                    echo"<label for=''><b>Foto KTP</b></label> <br>";
                    echo"<figure><img src='image/".$value->gambarktp."'width=250px height=150px></figure><br>";
                    echo"<label for=''><b>Swafoto</b></label> <br>";
                    echo"<figure><img src='image/".$value->swafoto."'width=250px height=150px></figure>";
                    echo "</div>
                <div class='column1'>    
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
                    echo"<input type='radio' id='verified' name='verified' onclick='check(this.value)' value='verified'>Verified<br>
                    <input type='radio' id='unverifie' name='verified' onclick='check(this.value)' value='unverified'>Unverified
                    <br> <br>
                    <label for='note'>Note</label> <br>
                    <textarea name='deskripsi' id='deskripsi' cols='50' rows='5'></textarea>
                    <br><br>
                    <input type='submit' class='w3-btn w3-right w3-theme' style='width:100%;' value='Submit'>  ";
                    }
                    ?>
                </div>
            </form>    
        </div>
    </div>
</fieldset>

<script>
    function check(browser) {
        if(browser == 'verified'){
            document.getElementById("deskripsi").placeholder='Kelengkapan profil anda sudah berhasil';
        }
        else{
            document.getElementById("deskripsi").placeholder='Kelengkapan profil anda gagal';
        }
}
</script>