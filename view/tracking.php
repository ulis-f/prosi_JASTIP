<style>
    body {
        background-color: white;
    }

    figure:hover {
        transform: scale(2.4);
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    .column {
        width: 48%;
        float: left;
    }

    .column1 {
        width: 48%;
        float: right;
    }

    .table1 {
        width: 100%;
    }

    .table1.td {
        width: 33%;
    }

    .table2 {
        width: 100%;
    }

    .table2.td {
        width: 33%;
    }
</style>

<ul class="nav" style="width:100%;">
    <li class="nav-item" style="margin-left:2%;">
        <a class="nav-link text-center w3-text-theme" href="#" style="height: 100%; border-bottom: 4px solid #6699cc;">Customer</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link text-center w3-text-theme" href="trackingTraveller" style="height: 100%;">Traveller</a>
    </li>
</ul>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">

    <div class="container">
        <div class="w3-card-4 w3-white" style="padding: 50px; height: 800px; margin-top: 5%;">

            <div class="w3-bar" style="margin-bottom: 3%;">
                <h5><b>Status Pesanan</b></h5>
                <button class="btn btn-outline-success tablink w3-green" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id1')">Pesanan Diproses</button>
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
                <?php
                foreach ($hasil as $key => $value) {
                    echo "<fieldset class='' style='border:#dddddd 1px solid'>
                    <div>
                        <div class='column' style='border-right:#dddddd 1px solid;'>
                            <div>
                                <div style='width: 30%; height: 50px; float: left;'>";
                    echo "<figure><img src='image/market/" . $value->gambarBarang . "' style='width: 100%; height: 100%;'></figure><br>
                                </div>
    
                                <div style='width: 30%; float: left; '>";
                    echo "<h5><b>" . $value->namaBarang . "</b></h5>";
                    echo "<p><b style='color:#ffa500'>" . $value->hargaTotal . "</b></p>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class='column1'>
                        
                            <button onclick='document.getElementById('detailBarang').style.display='block'' class='btn btn-primary btn-sm' style='float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;'>Detail Pemesanan</button>

                                <div id='detailBarang' class='w3-modal'>
                                <div class='w3-modal-content'>  
                                <div class='w3-container'>
                                    <span onclick='document.getElementById('detailBarang').style.display='none'' class='w3-button w3-display-topright'>&times;</span>
                                    <table style='width:100%;border-collapse: collapse; margin-top:5%;'>
                                        <tr>";


                    echo "<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                    echo "<td style='float:left;border-collapse: collapse;'>" . $value->kotaAwal . "</td>";
                    echo "<td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:20px'></i></td>";
                    echo "<td style='float:right;'>" . $value->kotaTujuan . "</td>";


                    echo "</tr>
                                        <tr>";

                    foreach ($hasil as $key => $value) {
                        echo "<td><b>" . $value->waktuAwal . "</b></td>";
                        echo "<td style='float:right;'><b>" . $value->waktuAkhir . "</b></td>";
                    }

                    echo "</tr>
                                    </table>
                                    <br>
                                    <div>
                                        <div style='width: 40%; float: left; height: 150px;'>";

                    foreach ($hasil as $key => $value) {
                        echo "<figure><img src='image/market/" . $value->gambarBarang . "'width=100% height=100%;></figure><br>";
                    }

                    echo "</div>
            
                                    <div style='width: 60%; float: right; padding-left: 10%; height: 150px;'>";

                    foreach ($hasil as $key => $value) {
                        echo "<input type='hidden' name='namaBarang' value='$value->namaBarang'>";
                        echo "<h4>" . $value->namaBarang . "</h4>";
                    }

                    foreach ($hasil as $key => $value) {
                        echo "<input type='hidden' name='deskripsi' value='$value->deskripsiBarang'>";
                        echo "<p>" . $value->deskripsiBarang . "</p>";
                    }

                    echo "<p class='' style='width:100%;border-bottom:2px solid #dddddd'></p>
                                    </div>
                                </div>

                                <table class='table1'>
                                    <tr>
                                        <td>Harga Barang</td>
                                        <td>Rp</td>";

                    foreach ($hasil as $key => $value) {
                        echo "<input type='hidden' name='hargaBarang' value='$value->hargaBarang'>";
                        echo "<td style='float: right;'>" . $value->hargaBarang . "</td>";
                    }

                    echo "</tr>
                                    <tr>
                                        <td>Tip Traveller</td>
                                        <td>Rp</td>";

                    foreach ($hasil as $key => $value) {
                        echo "<input type='hidden' name='tip' value='$value->hargaOngkir'>";
                        echo "<td style='float: right;'>" . $value->hargaOngkir . "</td>";
                    }

                    echo "</tr>
                                    <tr>
                                        <td>TitipAja Fee</td>
                                        <td>Rp</td>";

                    foreach ($hasil as $key => $value) {
                        echo "<input type='hidden' name='fee' value='$value->hargaJasa'>";
                        echo "<td style='float: right;'>" . $value->hargaJasa . "</td>";
                    }

                    echo "</tr>
                                    <tr>
                                        <td>Kode Unik Transaksi</td>
                                        <td>Rp</td>";

                    foreach ($hasil as $key => $value) {
                        echo "<input type='hidden' name='kodeUnik' value='$value->idUser1'>";
                        echo "<td style='float: right;'>" . $value->idUser1 . "</td>";
                    }

                    echo "</tr>
                
                                </table>
                                <br>
                                <p class='' style='width:100%;border-bottom:2px solid #dddddd'></p>
                        
                                <table class='table2' style='margin-bottom:5%;'>
                                    <tr> 
                                        <td style='width:66%;'><b>Total Harga</b></td>
                                        <td>Rp</td>";

                    foreach ($hasil as $key => $value) {
                        echo "<input type='hidden' name='totalHarga' value='$value->idTrip'>";
                        echo "<input type='hidden' name='idPenerima' value='$value->idUser1'>";
                        echo "<input type='hidden' name='idPembeli' value='$value->idUser2'>";
                        echo "<td style='float: right; width:30%: color:#ffa500'><b style='color:#ffa500'>" . $value->idTrip . "</b></td>";
                    }

                    echo "</tr>
                                </table> 
                            
                                </div>
                                </div>
                                </div>
    
                        </div>  
                        
                    </div>
                </fieldset>";
                }
                ?>
            </div>
            <?php
            foreach ($hasil2 as $key => $value) {
                echo "<div id='id2' class='tabs' style='display: none;'>
                ini halaman pesanan di kirim ke indonesia
                <fieldset class='' style='border:#dddddd 1px solid'>
                    <div>
                        <div class='column' style='border-right:#dddddd 1px solid;'>
                            <div>
                                <div style='width: 30%; height: 50px; float: left;'>
                                    <figure><img src='image/market/" . $value->gambarBarang . "' style='width: 100%; height: 100%;'></figure><br>
                                </div>

                                <div style='width: 30%; float: left; '>
                                    <h5><b>" . $value->namaBarang . "</b></h5>
                                    <p><b style='color:#ffa500'>Rp. " . $value->hargaTotal . "</b></p>
                                </div>
                            </div>
                        </div>


                        <div class='column1'>

                            <button onclick='document.getElementById('detailBarang').style.display='block'' class='btn btn-primary btn-sm' style='float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;'>Detail Pemesanan</button>

                            <div id='detailBarang' class='w3-modal'>
                                <div class='w3-modal-content'>
                                    <div class='w3-container'>
                                        <span onclick='document.getElementById('detailBarang').style.display='none'' class='w3-button w3-display-topright'>&times;</span>
                                        <table style='width:100%;border-collapse: collapse; margin-top:5%;''>
                                            <tr>";

                foreach ($hasil2 as $key => $value) {
                    echo "<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                    echo "<td style='float:left;border-collapse: collapse;'>" . $value->kotaAwal . "</td>";
                    echo "<td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:20px'></i></td>";
                    echo "<td style='float:right;'>" . $value->kotaTujuan . "</td>";
                }

                echo "</tr>
                                            <tr>";

                foreach ($hasil2 as $key => $value) {
                    echo "<td><b>" . $value->waktuAwal . "</b></td>";
                    echo "<td style='float:right;'><b>" . $value->waktuAkhir . "</b></td>";
                }

                echo "</tr>
                                        </table>
                                        <br>
                                        <div>
                                            <div style='width: 40%; float: left; height: 150px;'>";

                foreach ($hasil2 as $key => $value) {
                    echo "<figure><img src='image/market/" . $value->gambarBarang . "'width=100% height=100%;></figure><br>";
                }

                echo "</div>

                                            <div style='width: 60%; float: right; padding-left: 10%; height: 150px;'>";

                foreach ($hasil2 as $key => $value) {
                    echo "<input type='hidden' name='namaBarang' value='$value->namaBarang'>";
                    echo "<h4>" . $value->namaBarang . "</h4>";
                }

                foreach ($hasil2 as $key => $value) {
                    echo "<input type='hidden' name='deskripsi' value='$value->deskripsiBarang'>";
                    echo "<p>" . $value->deskripsiBarang . "</p>";
                }

                echo "<p class='' style='width:100%;border-bottom:2px solid #dddddd'></p>
                                            </div>
                                        </div>

                                        <table class='table1'>
                                            <tr>
                                                <td>Harga Barang</td>
                                                <td>Rp</td>";

                foreach ($hasil as $key => $value) {
                    echo "<input type='hidden' name='hargaBarang' value='$value->hargaBarang'>";
                    echo "<td style='float: right;'>" . $value->hargaBarang . "</td>";
                }

                echo "</tr>
                                            <tr>
                                                <td>Tip Traveller</td>
                                                <td>Rp</td>";

                foreach ($hasil2 as $key => $value) {
                    echo "<input type='hidden' name='tip' value='$value->hargaOngkir'>";
                    echo "<td style='float: right;'>" . $value->hargaOngkir . "</td>";
                }

                echo "</tr>
                                            <tr>
                                                <td>TitipAja Fee</td>
                                                <td>Rp</td>";

                foreach ($hasil2 as $key => $value) {
                    echo "<input type='hidden' name='fee' value='$value->hargaJasa'>";
                    echo "<td style='float: right;'>" . $value->hargaJasa . "</td>";
                }

                echo "</tr>
                                            <tr>
                                                <td>Kode Unik Transaksi</td>
                                                <td>Rp</td>";

                foreach ($hasil2 as $key => $value) {
                    echo "<input type='hidden' name='kodeUnik' value='$value->idUser1'>";
                    echo "<td style='float: right;'>" . $value->idUser1 . "</td>";
                }

                echo "</tr>

                                        </table>
                                        <br>
                                        <p class='' style='width:100%;border-bottom:2px solid #dddddd'></p>

                                        <table class='table2' style='margin-bottom:5%;'>
                                            <tr>
                                                <td style='width:66%;'><b>Total Harga</b></td>
                                                <td>Rp</td>";

                foreach ($hasil2 as $key => $value) {
                    echo "<input type='hidden' name='totalHarga' value='$value->idTrip'>";
                    echo "<input type='hidden' name='idPenerima' value='$value->idUser1'>";
                    echo "<input type='hidden' name='idPembeli' value='$value->idUser2'>";
                    echo "<td style='float: right; width:30%: color:#ffa500'><b style='color:#ffa500'>" . $value->hargaTotal . "</b></td>";
                }

                echo "</tr>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </fieldset>
            </div>";
            }
            ?>
            <?php
            foreach ($hasil3 as $key => $value) {
                echo "<div id='id3' class='tabs' style='display: none'>
                Ini Halaman pesanan tiba di indonesia
                <fieldset class='' style='border:#dddddd 1px solid'>
                    <div>
                        <div class='column' style='border-right:#dddddd 1px solid;'>
                            <div>
                                <div style='width: 30%; height: 50px; float: left;'>
                                    <figure><img src='image/market/" . $value->gambarBarang . "' style='width: 100%; height: 100%;'></figure><br>
                                </div>

                                <div style='width: 30%; float: left; '>
                                    <h5><b>" . $value->namaBarang . "</b></h5>
                                    <p><b style='color:#ffa500'>Rp. " . $value->hargaTotal . "</b></p>
                                </div>
                            </div>
                        </div>


                        <div class='column1'>

                            <button onclick='document.getElementById('detailBarang').style.display='block'' class='btn btn-primary btn-sm' style='float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;'>Detail Pemesanan</button>

                            <div id='detailBarang' class='w3-modal'>
                                <div class='w3-modal-content'>
                                    <div class='w3-container'>
                                        <span onclick='document.getElementById('detailBarang').style.display='none'' class='w3-button w3-display-topright'>&times;</span>
                                        <table style='width:100%;border-collapse: collapse; margin-top:5%;'>
                                            <tr>";

                foreach ($hasil3 as $key => $value) {
                    echo "<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                    echo "<td style='float:left;border-collapse: collapse;'>" . $value->kotaAwal . "</td>";
                    echo "<td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:20px'></i></td>";
                    echo "<td style='float:right;'>" . $value->kotaTujuan . "</td>";
                }

                echo "</tr>
                                            <tr>";

                foreach ($hasil3 as $key => $value) {
                    echo "<td><b>" . $value->waktuAwal . "</b></td>";
                    echo "<td style='float:right;'><b>" . $value->waktuAkhir . "</b></td>";
                }

                echo "</tr>
                                        </table>
                                        <br>
                                        <div>
                                            <div style='width: 40%; float: left; height: 150px;'>";

                foreach ($hasil3 as $key => $value) {
                    echo "<figure><img src='image/market/" . $value->gambarBarang . "'width=100% height=100%;></figure><br>";
                }

                echo "</div>

                                            <div style='width: 60%; float: right; padding-left: 10%; height: 150px;'>";

                foreach ($hasil3 as $key => $value) {
                    echo "<input type='hidden' name='namaBarang' value='$value->namaBarang'>";
                    echo "<h4>" . $value->namaBarang . "</h4>";
                }

                foreach ($hasil3 as $key => $value) {
                    echo "<input type='hidden' name='deskripsi' value='$value->deskripsiBarang'>";
                    echo "<p>" . $value->deskripsiBarang . "</p>";
                }

                echo "<p class='' style='width:100%;border-bottom:2px solid #dddddd'></p>
                                            </div>
                                        </div>

                                        <table class='table1'>
                                            <tr>
                                                <td>Harga Barang</td>
                                                <td>Rp</td>";

                foreach ($hasil3 as $key => $value) {
                    echo "<input type='hidden' name='hargaBarang' value='$value->hargaBarang'>";
                    echo "<td style='float: right;'>" . $value->hargaBarang . "</td>";
                }

                echo "</tr>
                                            <tr>
                                                <td>Tip Traveller</td>
                                                <td>Rp</td>";

                foreach ($hasil3 as $key => $value) {
                    echo "<input type='hidden' name='tip' value='$value->hargaOngkir'>";
                    echo "<td style='float: right;'>" . $value->hargaOngkir . "</td>";
                }

                echo "</tr>
                                            <tr>
                                                <td>TitipAja Fee</td>
                                                <td>Rp</td>";

                foreach ($hasil3 as $key => $value) {
                    echo "<input type='hidden' name='fee' value='$value->hargaJasa'>";
                    echo "<td style='float: right;'>" . $value->hargaJasa . "</td>";
                }

                echo "</tr>
                                            <tr>
                                                <td>Kode Unik Transaksi</td>
                                                <td>Rp</td>";

                foreach ($hasil3 as $key => $value) {
                    echo "<input type='hidden' name='kodeUnik' value='$value->idUser1'>";
                    echo "<td style='float: right;'>" . $value->idUser1 . "</td>";
                }

                echo "</tr>

                                        </table>
                                        <br>
                                        <p class='' style='width:100%;border-bottom:2px solid #dddddd'></p>

                                        <table class='table2' style='margin-bottom:5%;'>
                                            <tr>
                                                <td style='width:66%;'><b>Total Harga</b></td>
                                                <td>Rp</td>";

                foreach ($hasil3 as $key => $value) {
                    echo "<input type='hidden' name='totalHarga' value='$valuehasil3'>";
                    echo "<input type='hidden' name='idPenerima' value='$value->idUser1'>";
                    echo "<input type='hidden' name='idPembeli' value='$value->idUser2'>";
                    echo "<td style='float: right; width:30%: color:#ffa500'><b style='color:#ffa500'>" . $value->idTrip . "</b></td>";
                }

                echo "</tr>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </fieldset>
            </div>";
            }
            ?>
            <?php
            foreach ($hasil4 as $key => $value) {
                echo "<div id='id4' class='tabs' style='display: none;'>
                <fieldset class='' style='border:#dddddd 1px solid'>
                    <div>
                        <div class='column' style='border-right:#dddddd 1px solid;'>
                            <div>
                                <div style='width: 30%; height: 50px; float: left;'>
                                    <figure><img src='image/market/" . $value->gambarBarang . "' style='width: 100%; height: 100%;'></figure><br>
                                </div>

                                <div style='width: 30%; float: left; '>
                                    <h5><b>" . $value->namaBarang . "</b></h5>
                                    <p><b style='color:#ffa500'>Rp. " . $value->hargaTotal . "</b></p>
                                </div>
                            </div>
                        </div>


                        <div class='column1'>
                            <div style='float: left;'>
                                <h5><b>No. Resi</b></h5>
                                <b style='color:#ffa500'>47346</b>
                            </div>

                            <div style='float: center'>
                                <button class='btn btn-danger btn-sm' style='float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;'><a href='https://www.jne.co.id/id/tracking/trace'>
                                        Lacak Pesanan</a></button>

                                <button onclick='document.getElementById('detailBarang').style.display='block'' class='btn btn-primary btn-sm' style='float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;'>Detail Pemesanan</button>

                                <div id='detailBarang' class='w3-modal'>
                                    <div class='w3-modal-content'>
                                        <div class='w3-container'>
                                            <span onclick='document.getElementById('detailBarang').style.display='none'' class='w3-button w3-display-topright'>&times;</span>
                                            <table style='width:100%;border-collapse: collapse; margin-top:5%;'>
                                                <tr>";

                foreach ($hasil4 as $key => $value) {
                    echo "<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                    echo "<td style='float:left;border-collapse: collapse;'>" . $value->kotaAwal . "</td>";
                    echo "<td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:20px'></i></td>";
                    echo "<td style='float:right;'>" . $value->kotaTujuan . "</td>";
                }

                echo "</tr>
                                                <tr>";

                foreach ($hasil4 as $key => $value) {
                    echo "<td><b>" . $value->waktuAwal . "</b></td>";
                    echo "<td style='float:right;'><b>" . $value->waktuAkhir . "</b></td>";
                }

                echo "</tr>
                                            </table>
                                            <br>
                                            <div>
                                                <div style='width: 40%; float: left; height: 150px;'>";

                foreach ($hasil4 as $key => $value) {
                    echo "<figure><img src='image/market/" . $value->gambarBarang . "'width=100% height=100%;></figure><br>";
                }

                echo "</div>

                                                <div style='width: 60%; float: right; padding-left: 10%; height: 150px;'>";

                foreach ($hasil4 as $key => $value) {
                    echo "<input type='hidden' name='namaBarang' value='$value->namaBarang'>";
                    echo "<h4>" . $value->namaBarang . "</h4>";
                }


                foreach ($hasil4 as $key => $value) {
                    echo "<input type='hidden' name='deskripsi' value='$value->deskripsiBarang'>";
                    echo "<p>" . $value->deskripsiBarang . "</p>";
                }

                echo "<p class='' style='width:100%;border-bottom:2px solid #dddddd'></p>
                                                </div>
                                            </div>

                                            <table class='table1'>
                                                <tr>
                                                    <td>Harga Barang</td>
                                                    <td>Rp</td>";

                foreach ($hasil4 as $key => $value) {
                    echo "<input type='hidden' name='hargaBarang' value='$value->hargaBarang'>";
                    echo "<td style='float: right;'>" . $value->hargaBarang . "</td>";
                }

                echo "</tr>
                                                <tr>
                                                    <td>Tip Traveller</td>
                                                    <td>Rp</td>";

                foreach ($hasil4 as $key => $value) {
                    echo "<input type='hidden' name='tip' value='$value->hargaOngkir'>";
                    echo "<td style='float: right;'>" . $value->hargaOngkir . "</td>";
                }

                echo "</tr>
                                                <tr>
                                                    <td>TitipAja Fee</td>
                                                    <td>Rp</td>";

                foreach ($hasil4 as $key => $value) {
                    echo "<input type='hidden' name='fee' value='$value->hargaJasa'>";
                    echo "<td style='float: right;'>" . $value->hargaJasa . "</td>";
                }

                echo "</tr>
                                                <tr>
                                                    <td>Kode Unik Transaksi</td>
                                                    <td>Rp</td>";

                foreach ($hasil4 as $key => $value) {
                    echo "<input type='hidden' name='kodeUnik' value='$value->idUser1'>";
                    echo "<td style='float: right;'>" . $value->idUser1 . "</td>";
                }

                echo "</tr>

                                            </table>
                                            <br>
                                            <p class='' style='width:100%;border-bottom:2px solid #dddddd'></p>

                                            <table class='table2' style='margin-bottom:5%;'>
                                                <tr>
                                                    <td style='width:66%;'><b>Total Harga</b></td>
                                                    <td>Rp</td>";

                foreach ($hasil4 as $key => $value) {
                    echo "<input type='hidden' name='totalHarga' value='$value->idTrip'>";
                    echo "<input type='hidden' name='idPenerima' value='$value->idUser1'>";
                    echo "<input type='hidden' name='idPembeli' value='$value->idUser2'>";
                    echo "<td style='float: right; width:30%: color:#ffa500'><b style='color:#ffa500'>" . $value->idTrip . "</b></td>";
                }

                echo "</tr>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </fieldset>
            </div>";
            }
            ?>
            <?php
            foreach ($hasil5 as $key => $value) {
                echo "<div id='id5' class='tabs' style='display: none'>
                Ini Halaman diterima
                <fieldset class='' style='border:#dddddd 1px solid'>
                    <div>
                        <div class='column' style='border-right:#dddddd 1px solid;'>
                            <div>
                                <div style='width: 30%; height: 50px; float: left;'>
                                    <figure><img src='image/market/" . $value->gambarBarang . "' style='width: 100%; height: 100%;'></figure><br>
                                </div>

                                <div style='width: 30%; float: left; '>
                                    <h5><b>" . $value->namaBarang . "</b></h5>
                                    <p><b style='color:#ffa500'>Rp. " . $value->hargaTotal . "</b></p>
                                </div>
                            </div>
                        </div>

                        <div class='column1'>


                        </div>

                    </div>
                </fieldset>
            </div>";
            }
            ?>
        </div>
    </div>

</fieldset>

<script>
    function openContent(obj, idContentContainer) {
        var i, x, tablinks;

        x = document.getElementsByClassName("tabs");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("w3-green", "");
        }

        document.getElementById(idContentContainer).style.display = 'block';

        obj.className += "w3-green";

    }
</script>