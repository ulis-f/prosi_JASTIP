<style>
    figure:hover{
        transform: scale(2.4); 
    }

    body{
        background-color:white;
    }
</style>

<ul class="nav" style="margin-top:7%; background-color:white; margin-left:2%;">
    <li class="nav-item w3-text-theme w3-text-theme">
        <a class="nav-link w3-text-theme" href="homeAdmin" style="height: 100%;">Post Trip</a>
    </li>
    <li class="nav-item w3-text-theme w3-text-theme">
        <a class="nav-link w3-text-theme" href="lengkapDaftar" style="height: 100%;">Lengkapi Pendaftaran</a>
    </li>
    <li class="nav-item w3-text-theme w3-text-theme">
        <a class="nav-link text-center " href="persetujuanBarang"  style="height: 100%;">Form Barang</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link text-center" href="#" style="height: 100%; border-bottom: 4px solid #6699cc;">Pembayaran</a>  
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%;">Mengirim Uang</a>
    </li>
</ul>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">
    <p class="" style="width:100%;border-bottom:1px solid #6699cc"> 
        Sekarang anda berada di halaman :
        <a class="" href="#" style="text-decoration:none;"><b>Pembayaran</b></a>
        <i class="fa fa-angle-double-right" style=""></i>  
        <a class="" href="#" style="text-decoration:none color:#6699cc; ">Detail Pembayaran</a>
    </p>
    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 900px; margin-top: 5%;">
                <h2></h2> 
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td><label for="namaBarang">Nama Barang</label></td>
                            <td>:</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='namaBarang' value='".$value->namaBarang."'>";
                                echo "<td>".$value->namaBarang."</td>";
                            }
                            ?>
                        </tr>
                        
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td>:</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='email' value='".$value->email."'>";
                                echo "<td>".$value->email."</td>";
                            }
                            ?>
                        </tr>
                        
                        <tr>
                            <td><label for="totalHarga">Total Harga</label></td>  
                            <td>:</td>
                            <td>Rp....</td>
                        </tr>
                            
                        <tr>
                            <td><label for="namaTraveller">Nama Traveller</label></td> 
                            <td>:</td>
                            <td>nama di sini</td>
                        </tr>
                        
                        <tr>
                            <td><label for="rekeningTraveller">Rekening Traveller</label></td>
                            <td>:</td>
                            <td>no rek di sini</td>
                        </tr>  
                    </table>
            </form>    
        </div>
    </div>
</fieldset>