<style>
    figure:hover{
            transform: scale(2.4); 
        }

        body {
            background-color: #f9f9f9;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .column {
            width: 48%;
            float :left;
        }

        .column1 {
            width : 48%;
            float : right;
        }

        .table1 {
            width : 100%;
        }

        .table1.td{
            width : 33%;
        }
        .table2 {
            width : 100%;
        }

        .table2.td{
            width : 33%;
        }

</style>

    <div class="container">
        <div class="w3-card-4 w3-white" style="padding: 50px; height: 800px; margin-top: 5%;">

            <div class="w3-bar" style="margin-bottom: 3%;">
                <h5><b>Status Pesanan</b></h5>
                <button class="btn btn-outline-success tablink w3-green" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;"  onclick="openContent(this,'id1')">Pesanan Diproses</button>
                <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id2')">Pesanan Dikirim Ke Indonesia</button>
                <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id3')">Pesanan Tiba Di Indonesia</button>
                <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id4')">Pesanan Dikirim</button>
                <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id5')">Pesanan Diterima</button>  
            </div>

            <div id="id1" class="tabs">
                ini halaman pesanan di proses
                <fieldset class="" style="border:#dddddd 1px solid">
                    <div>
                        <div class="column" style="border-right:#dddddd 1px solid;">
                            <div>
                                <div style="width: 30%; height: 50px; float: left;">
                                    <figure><img src='image/market/topi.jpg' style="width: 100%; height: 100%;"></figure><br>
                                </div>
    
                                <div style="width: 30%; float: left; ">
                                    <h5><b>Topi NY</b></h5>
                                    <p><b style='color:#ffa500'>Rp. 300000</b></p>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="column1">
                        
                            <button onclick="document.getElementById('detailBarang').style.display='block'" class="btn btn-primary btn-sm" style="float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;">Detail Pemesanan</button>

                                <div id="detailBarang" class="w3-modal">
                                <div class="w3-modal-content">  
                                <div class="w3-container">
                                    <span onclick="document.getElementById('detailBarang').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                    <table style="width:100%;border-collapse: collapse; margin-top:5%;">
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
                        
                                <table class="table2" style="margin-bottom:5%;">
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
                            
                                </div>
                                </div>
                                </div>
    
                        </div>  
                        
                    </div>
                </fieldset>
            </div>

            <div id="id2" class="tabs" style="display: none;">
                ini halaman pesanan di kirim ke indonesia
                <fieldset class="" style="border:#dddddd 1px solid">
                    <div>
                        <div class="column" style="border-right:#dddddd 1px solid;">
                            <div>
                                <div style="width: 30%; height: 50px; float: left;">
                                    <figure><img src='image/market/topi.jpg' style="width: 100%; height: 100%;"></figure><br>
                                </div>
    
                                <div style="width: 30%; float: left; ">
                                    <h5><b>Topi NY</b></h5>
                                    <p><b style='color:#ffa500'>Rp. 300000</b></p>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="column1">
                        
                            <button onclick="document.getElementById('detailBarang').style.display='block'" class="btn btn-primary btn-sm" style="float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;">Detail Pemesanan</button>

                                <div id="detailBarang" class="w3-modal">
                                <div class="w3-modal-content">  
                                <div class="w3-container">
                                    <span onclick="document.getElementById('detailBarang').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                    <table style="width:100%;border-collapse: collapse; margin-top:5%;">
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
                        
                                <table class="table2" style="margin-bottom:5%;">
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
                            
                                </div>
                                </div>
                                </div>
    
                        </div>  
                        
                    </div>
                </fieldset>
            </div>
        
            <div id="id3" class="tabs" style="display: none">
                Ini Halaman pesanan tiba di indonesia
                <fieldset class="" style="border:#dddddd 1px solid">
                    <div>
                        <div class="column" style="border-right:#dddddd 1px solid;">
                            <div>
                                <div style="width: 30%; height: 50px; float: left;">
                                    <figure><img src='image/market/topi.jpg' style="width: 100%; height: 100%;"></figure><br>
                                </div>
    
                                <div style="width: 30%; float: left; ">
                                    <h5><b>Topi NY</b></h5>
                                    <p><b style='color:#ffa500'>Rp. 300000</b></p>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="column1">
                        
                            <button onclick="document.getElementById('detailBarang').style.display='block'" class="btn btn-primary btn-sm" style="float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;">Detail Pemesanan</button>

                                <div id="detailBarang" class="w3-modal">
                                <div class="w3-modal-content">  
                                <div class="w3-container">
                                    <span onclick="document.getElementById('detailBarang').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                    <table style="width:100%;border-collapse: collapse; margin-top:5%;">
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
                        
                                <table class="table2" style="margin-bottom:5%;">
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
                            
                                </div>
                                </div>
                                </div>
    
                        </div>  
                        
                    </div>
                </fieldset>
            </div>  

            <div id="id4" class="tabs" style="display: none;">
                <fieldset class="" style="border:#dddddd 1px solid">
                    <div>
                        <div class="column" style="border-right:#dddddd 1px solid;">
                            <div>
                                <div style="width: 30%; height: 50px; float: left;">
                                    <figure><img src='image/market/topi.jpg' style="width: 100%; height: 100%;"></figure><br>
                                </div>
    
                                <div style="width: 30%; float: left; ">
                                    <h5><b>Topi NY</b></h5>
                                    <p><b style='color:#ffa500'>Rp. 300000</b></p>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="column1">
                            <div style="float: left;">
                                <h5><b>No. Resi</b></h5>
                                <b style='color:#ffa500'>47346</b> 
                            </div>
                            
                            <div style="float: center">
                                <button class="btn btn-danger btn-sm" style="float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;"><a href="https://www.jne.co.id/id/tracking/trace">
                                Lacak Pesanan</a></button>

                                <button onclick="document.getElementById('detailBarang').style.display='block'" class="btn btn-primary btn-sm" style="float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;">Detail Pemesanan</button>

                                <div id="detailBarang" class="w3-modal">
                                <div class="w3-modal-content">  
                                <div class="w3-container">
                                    <span onclick="document.getElementById('detailBarang').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                    <table style="width:100%;border-collapse: collapse; margin-top:5%;">
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
                        
                                <table class="table2" style="margin-bottom:5%;">
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
                            
                                </div>
                                </div>
                                </div>
                            </div>
    
                        </div>  
                        
                    </div>
                </fieldset>
            </div>
        
            <div id="id5" class="tabs" style="display: none">
                Ini Halaman diterima
                <fieldset class="" style="border:#dddddd 1px solid">
                    <div>
                        <div class="column" style="border-right:#dddddd 1px solid;">
                            <div>
                                <div style="width: 30%; height: 50px; float: left;">
                                    <figure><img src='image/market/topi.jpg' style="width: 100%; height: 100%;"></figure><br>
                                </div>
    
                                <div style="width: 30%; float: left; ">
                                    <h5><b>Topi NY</b></h5>
                                    <p><b style='color:#ffa500'>Rp. 300000</b></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="column1">
                        
    
                        </div>  
                        
                    </div>
                </fieldset>
            </div>  
        </div>
    </div>

<script>
    function openContent(obj, idContentContainer){
        var i,x,tablinks;

        x=document.getElementsByClassName("tabs");
        for(i=0; i<x.length;i++){
            x[i].style.display="none";
        }

        tablinks = document.getElementsByClassName("tablink");
        for(i=0; i<tablinks.length;i++){
            tablinks[i].className= tablinks[i].className.replace("w3-green","");
        }
        
        document.getElementById(idContentContainer).style.display='block';

        obj.className+="w3-green";
        
    }
</script>
