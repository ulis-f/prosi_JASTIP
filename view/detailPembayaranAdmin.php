<style>
    figure:hover{
        transform: scale(2.4); 
    }

    figure{
        margin: 0px;
	    float: left;
        height: 130px;    
    }

    body{
        background-color:white;
    }

    /* Create two equal columns that sits next to each other */
    .column {
        width: 40%;
        float :left;
    }

    .column1 {
        width : 60%;
        float : right;
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
            <a class="" href="#" style="text-decoration:none ; color:#6699cc; ">Detail Pembayaran</a>
        </p>
        <div class="container">
            <div class="w3-card-4 w3-white" style=" margin: auto; padding: 50px; height: 1100px; margin-top: 5%;">
                <form action="persetujuanPembayaran" method="POST">
                    <h3><b>Detail Pembayaran</b></h3> <br>
                        <div class="column1">
                            <table style="width:100%;border-collapse: collapse;">
                                <tr>
                                <?php
                                foreach($trip as $key=>$value){
                                    echo"<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                                    echo"<td style='float:left;border-collapse: collapse;'>".$value->kotaAwal."</td>";
                                    echo"<td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:20px'></i></td>";  
                                    echo"<td style='float:right;'>".$value->kotaTujuan."</td>";
                                }
                                ?>
                                </tr>
                                <tr>
                                <?php
                                foreach($trip as $key=>$value){
                                   echo "<td><b>".$value->waktuAwal."</b></td>";
                                   echo "<td style='float:right;'><b>".$value->waktuAkhir."</b></td>";
                                        
                                }
                                ?>
                                </tr>
                            </table>
                            <br>
                            <div>
                                <div style="width: 40%; float: left; height: 150px;">
                                <?php
                                foreach($hasil as $key=>$value){
                                    echo"<figure><img src='image/market/".$value->gambarBarang."'width=100% height=100%;></figure><br>"; 
                                }
                                ?>
                                </div>
        
                                <div style="width: 60%; float: right; padding-left: 10%; height: 150px;">
                                <?php
                                foreach($hasil as $key=>$value){
                                        echo"<input type='hidden' name='namaBarang' value='$value->namaBarang'>";
                                        echo "<h4>".$value->namaBarang."</h4>";     
                                    }
                                    ?>
                                <?php
                                foreach($hasil as $key=>$value){
                                        echo"<input type='hidden' name='deskripsi' value='$value->deskripsiBarang'>";
                                        echo "<p>".$value->deskripsiBarang."</p>";     
                                    }
                                    ?>
                                    <p class="" style="width:100%;border-bottom:2px solid #dddddd"></p>
                                </div>
                            </div>
        
                            <br> <br>
                            <table class="table1">
                                <tr>
                                    <td>Harga Barang</td>
                                    <td>Rp</td>
                                    <?php
                                    foreach($hasil as $key=>$value){
                                        echo"<input type='hidden' name='hargaBarang' value='$value->hargaBarang'>";
                                        echo "<td style='float: right;'>".$value->hargaBarang."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Tip Traveller</td>
                                    <td>Rp</td>
                                    <?php
                                    foreach($hasil as $key=>$value){
                                        echo"<input type='hidden' name='tip' value='$value->hargaOngkir'>";
                                        echo "<td style='float: right;'>".$value->hargaOngkir."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>TitipAja Fee</td>
                                    <td>Rp</td>
                                    <?php
                                    foreach($hasil as $key=>$value){
                                        echo"<input type='hidden' name='fee' value='$value->hargaJasa'>";
                                        echo "<td style='float: right;'>".$value->hargaJasa."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Kode Unik Transaksi</td>
                                    <td>Rp</td>
                                    <?php
                                    foreach($hasil as $key=>$value){
                                        echo"<input type='hidden' name='kodeUnik' value='$value->idUser1'>";
                                        echo "<td style='float: right;'>".$value->idUser1."</td>";
                                    }
                                    ?>
                                </tr>
            
                            </table>
                            <br>
                            <p class="" style="width:100%;border-bottom:2px solid #dddddd"></p>
                    
                            <table class="table2">
                                <tr>
                                    <td style="width:66%;"><b>Total Harga</b></td>
                                    <td>Rp</td>
                                    <?php
                                    foreach($hasil as $key=>$value){
                                        echo"<input type='hidden' name='totalHarga' value='$value->idTrip'>";
                                        echo"<input type='hidden' name='idPenerima' value='$value->idUser1'>";
                                        echo"<input type='hidden' name='idPembeli' value='$value->idUser2'>";
                                        echo "<td style='float: right; width:30%: color:#ffa500'><b style='color:#ffa500'>".$value->idTrip."</b></td>";
                                    }
                                    ?>
                                </tr>
                            </table> 
                            
                            <label for="">Bukti Transfer</label> <br>
                            <figure><img src=''width=250px height=150px></figure>

                            <div class="w3-right" style="margin-top: 40%; padding-right:1%"> 
                                <input type="submit" class="btn btn-danger btn-sm" style="font-size:17px;" value="Persetujuan Pendaftaran">
                                <!-- <input id="submit" type="submit" class="btn btn-primary btn-sm" style="font-size:17px;" value="Submit"> -->
                            </div>

                        </div>
                </form>
    
                <div class="column">
                    <form action="profileTravellerMarket" method="GET">
                        <fieldset style="width: 70%;">
                            <div class="w3-container">
                            <h4 class="w3-center">Profile Traveller</h4>  
                                <div class="w3-center">
                                <?php
                                    foreach($user1 as $key => $value){    
                                        if($value->gambarProfile!=null){
                                            echo "<img src='../view/image/".$value->gambarProfile."' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                        }
                                        else{
                                            echo "<img src='../view/image/user.png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                        }
                                    }    
                                ?>
                                </div> 
                                    <hr>
                                    <?php  
                                        foreach($user1 as $key=>$value){
                                            echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-user fa-fw w3-margin-right w3-text-theme'></i>".$value->username."</p>";
                                            echo"<p style='margin-bottom:1%; '><i class='fa fa-phone fa-fw w3-margin-right w3-text-theme'></i>".$value->noHp."</p>";
                                            echo"<p style='margin-bottom:1%; '><i class='fa fa-credit-card fa-fw w3-margin-right w3-text-theme'></i>".$value->norek."</p>";
                                            echo"<p style='margin-bottom:1%; '><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i>".$value->alamat."</p>";
                                        }
                                    ?>   
                            </div>
                            <hr>
                            <h4 class="w3-center">Profile Customer</h4>  
                                <div class="w3-center">
                                <?php
                                    foreach($user2 as $key => $value){    
                                        if($value->gambarProfile!=null){
                                            echo "<img src='../view/image/".$value->gambarProfile."' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                        }
                                        else{
                                            echo "<img src='../view/image/user.png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                        }
                                    }    
                                ?>
                                </div> 
                                    <hr>
                                    <?php  
                                        foreach($user2 as $key=>$value){
                                            echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-user fa-fw w3-margin-right w3-text-theme'></i>".$value->username."</p>";
                                            echo"<p style='margin-bottom:1%; '><i class='fa fa-phone fa-fw w3-margin-right w3-text-theme'></i>".$value->noHp."</p>";
                                            echo"<p style='margin-bottom:1%; '><i class='fa fa-credit-card fa-fw w3-margin-right w3-text-theme'></i>".$value->norek."</p>";
                                            echo"<p style='margin-bottom:1%; '><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i>".$value->alamat."</p>";
                                        }
                                    ?>   
                            </div>
                        </fieldset>
                    </form>
                    
                </div>
            </div>
        </div>  
    </fieldset>