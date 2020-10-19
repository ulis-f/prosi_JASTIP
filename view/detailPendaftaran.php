<style>
    figure:hover{
    transform: scale(2.4);
    }

    body{
        background-color:white;
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
        <a class="nav-link" href="#" style="height: 100%;">Mengirim Uang</a>
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
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 1200px; margin-top: 5%;">
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
                    echo"<input type='radio' id='verified' name='verified' onclick='check(this.value)' value='verified'>Verified<br>
                    <input type='radio' id='unverifie' name='verified' onclick='check(this.value)' value='unverified'>Unverified
                    <br> <br>
                    <label for='note'>Note</label> <br>
                    <textarea name='deskripsi' id='deskripsi' cols='30' rows='5'></textarea>
                    <br><br><br><br><br>
                    <input type='submit' class='w3-btn w3-right w3-theme' value='Submit'>  ";
                    }
                    ?>
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