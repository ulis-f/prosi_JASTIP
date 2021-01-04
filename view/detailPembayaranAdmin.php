<style>
    figure:hover {
        transform: scale(2.4);
    }

    figure {
        margin: 0px;
        float: left;
        height: 130px;
    }

    body {
        background-color: white;
    }

    /* Create two equal columns that sits next to each other */
    .column {
        width: 30%;
        float: left;
        margin-right: 2%;
    }

    .column1 {
        width: 60%;
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

<ul class="nav" style="margin-top:7%; background-color:white; margin-left:2%;">
    <<<<<<< HEAD=======<<<<<<< Updated upstream <li class="nav-item w3-text-theme w3-text-theme">
        <a class="nav-link w3-text-theme" href="homeAdmin" style="height: 100%;">Post Trip</a>
        </li>
        <li class="nav-item w3-text-theme w3-text-theme">
            <a class="nav-link w3-text-theme" href="lengkapDaftar" style="height: 100%;">Lengkapi Pendaftaran</a>
        </li>
        <li class="nav-item w3-text-theme w3-text-theme">
            <a class="nav-link text-center " href="persetujuanBarang" style="height: 100%;">Form Barang</a>
        </li>
        <li class="nav-item w3-text-theme">
            <a class="nav-link text-center" href="#" style="height: 100%; border-bottom: 4px solid #6699cc;">Pembayaran</a>
        </li>
        <li class="nav-item w3-text-theme">
            <a class="nav-link" href="pengirimanUang" style="height: 100%;">Pengiriman Uang</a>
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
        <div class="w3-card-4 w3-white" style=" margin: auto; padding: 50px; height: 520px; margin-top: 5%;">
            <h3><b>Detail Pembayaran</b></h3> <br>
            <div class="column1">
                =======
                >>>>>>> d09a6e6146fb61e0a70679fad2e131095959ee25
                <li class="nav-item w3-text-theme w3-text-theme">
                    <a class="nav-link w3-text-theme" href="homeAdmin" style="height: 100%;">Post Trip</a>
                </li>
                <li class="nav-item w3-text-theme w3-text-theme">
                    <a class="nav-link w3-text-theme" href="lengkapDaftar" style="height: 100%;">Lengkapi Pendaftaran</a>
                </li>
                <li class="nav-item w3-text-theme w3-text-theme">
                    <a class="nav-link text-center " href="persetujuanBarang" style="height: 100%;">Form Barang</a>
                </li>
                <li class="nav-item w3-text-theme">
                    <a class="nav-link text-center" href="#" style="height: 100%; border-bottom: 4px solid #6699cc;">Pembayaran</a>
                </li>
                <li class="nav-item w3-text-theme">
                    <a class="nav-link" href="pengirimanUang" style="height: 100%;">Pengiriman Uang</a>
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
                        <div class="w3-card-4 w3-white" style=" margin: auto; padding: 50px; height: 520px; margin-top: 5%;">
                            <h3><b>Detail Pembayaran</b></h3> <br>
                            <div class="column1">


                                <div id="detailBarang" class="w3-modal">
                                    <div class="w3-modal-content" style="width:40%;">
                                        <div class="w3-container">
                                            <span onclick="document.getElementById('detailBarang').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <table style="width:100%;border-collapse: collapse; margin-top:5%;">
                                                <tr>
                                                    <?php
                                                    foreach ($trip as $key => $value) {
                                                        echo "<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                                                        echo "<td style='float:left;border-collapse: collapse;'>" . $value->kotaAwal . "</td>";
                                                        echo "<td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:20px'></i></td>";
                                                        echo "<td style='float:right;'>" . $value->kotaTujuan . "</td>";
                                                    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    foreach ($trip as $key => $value) {
                                                        echo "<td><b>" . $value->waktuAwal . "</b></td>";
                                                        echo "<td style='float:right;'><b>" . $value->waktuAkhir . "</b></td>";
                                                    }
                                                    ?>
                                                </tr>
                                            </table>
                                            <br>
                                            <div>
                                                <div style="width: 40%; float: left; height: 150px;">
                                                    <?php
                                                    foreach ($hasil as $key => $value) {
                                                        echo "<figure><img src='image/market/" . $value->gambarBarang . "'width=100% height=100%;></figure><br>";
                                                    }
                                                    ?>
                                                </div>

                                                <div style="width: 60%; float: right; padding-left: 10%; height: 150px;">
                                                    <?php
                                                    foreach ($hasil as $key => $value) {
                                                        echo "<input type='hidden' name='namaBarang' value='$value->namaBarang'>";
                                                        echo "<h4>" . $value->namaBarang . "</h4>";
                                                    }
                                                    ?>
                                                    <?php
                                                    foreach ($hasil as $key => $value) {
                                                        echo "<input type='hidden' name='deskripsi' value='$value->deskripsiBarang'>";
                                                        echo "<p>" . $value->deskripsiBarang . "</p>";
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
                                                    foreach ($hasil as $key => $value) {
                                                        echo "<input type='hidden' name='hargaBarang' value='$value->hargaBarang'>";
                                                        echo "<td style='float: right;'>" . $value->hargaBarang . "</td>";
                                                    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <td>Tip Traveller</td>
                                                    <td>Rp</td>
                                                    <?php
                                                    foreach ($hasil as $key => $value) {
                                                        echo "<input type='hidden' name='tip' value='$value->hargaOngkir'>";
                                                        echo "<td style='float: right;'>" . $value->hargaOngkir . "</td>";
                                                    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <td>TitipAja Fee</td>
                                                    <td>Rp</td>
                                                    <?php
                                                    foreach ($hasil as $key => $value) {
                                                        echo "<input type='hidden' name='fee' value='$value->hargaJasa'>";
                                                        echo "<td style='float: right;'>" . $value->hargaJasa . "</td>";
                                                    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                    <td>Kode Unik Transaksi</td>
                                                    <td>Rp</td>
                                                    <?php
                                                    foreach ($hasil as $key => $value) {
                                                        echo "<input type='hidden' name='kodeUnik' value='$value->idTrip'>";
                                                        echo "<td style='float: right;'>" . $value->idTrip . "</td>";
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
                                                    foreach ($hasil as $key => $value) {
                                                        echo "<input type='hidden' name='totalHarga' value='$value->noresi'>";

                                                        echo "<td style='float: right; width:30%: color:#ffa500'><b style='color:#ffa500'>" . $value->noresi . "</b></td>";
                                                    }
                                                    ?>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <form action="persetujuanPembayaran" method="POST">
                                    <table>
                                        <tr>
                                            <td>
                                                <h5>Bank yang dituju</h5>
                                            </td>
                                            <td>:</td>
                                            <?php
                                            foreach ($hasil as $key => $value) {
                                                echo "<td><h5>" . $value->jumlahBarang . "</h5></td>";
                                            }
                                            ?>
                                        </tr>
                                        <tr>
                                            <td>Total Harga</td>
                                            <td>:</td>
                                            <?php
                                            foreach ($hasil as $key => $value) {
                                                echo "<td>Rp." . $value->noresi . "</td>";
                                                echo "<input type='hidden' name='idPenerima' value='$value->idUser1'>";
                                                echo "<input type='hidden' name='idPembeli' value='$value->idUser2'>";
                                                echo "<input type='hidden' name='namaBarang' value='$value->namaBarang'>";
                                            }
                                            ?>
                                        </tr>
                                    </table>
                                    <br>
                                    <div style="float:left">
                                        <label for="">Bukti Transfer</label> <br>
                                        <figure>
                                            <?php
                                            foreach ($hasil as $key => $value) {
                                                echo "<img src='image/pembayaran/" . $value->namaKategori . "' width=250px height=100px>";
                                            }
                                            ?>
                                        </figure>
                                    </div>

                                    <div style="float:right">
                                        <label for='note'>Note :</label> <br>
                                        <textarea name='' id='' cols='30' rows='5' style="height:100px;"></textarea> <br> <br>
                                        <input type='radio' id='verified' name='verified' value='verified'>Verified <div style="float:right;">
                                            <input type='radio' id='unverified' name='verified' value='unverified'>Unverified<br>
                                        </div>
                                    </div>


                                    <input type="submit" class="btn w3-theme btn-sm" style="font-size:17px; margin-top:10%; width:100%;" value="Submit">
                                    <!-- <input id="submit" type="submit" class="btn btn-primary btn-sm" style="font-size:17px;" value="Submit"> -->

                                </form>
                            </div>

                            <div class="column">
                                <div class="btn-group-vertical" style="width:80%; border-line:1px black; ">
                                    <button type="button" class="btn w3-light-grey w3-text-theme" style="padding:5%;" onclick="document.getElementById('detailBarang').style.display='block'">Detail Barang</button>
                                    <button type="button" class="btn w3-light-grey w3-text-theme" style="padding:5%;" onclick="document.getElementById('detailTraveller').style.display='block'">Detail Profile Traveller</button>
                                    <button type="button" class="btn w3-light-grey w3-text-theme" style="padding:5%;" onclick="document.getElementById('detailCustomer').style.display='block'">Detail Profile Customer</button>
                                </div>

                                <div id="detailTraveller" class="w3-modal">
                                    <div class="w3-modal-content" style="width:40%;">
                                        <div class="w3-container">
                                            <span onclick="document.getElementById('detailTraveller').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <form action="profileTravellerMarket" method="GET">
                                                <fieldset style="width: 100%;">
                                                    <div class="w3-container">
                                                        <h4 class="w3-center">Profile Traveller</h4>
                                                        <div class="w3-center">
                                                            <?php
                                                            foreach ($user1 as $key => $value) {
                                                                if ($value->gambarProfile != null) {
                                                                    echo "<img src='../view/image/" . $value->gambarProfile . "' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                                                } else {
                                                                    echo "<img src='../view/image/user.png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                        <hr>
                                                        <?php
                                                        foreach ($user1 as $key => $value) {
                                                            echo "<p style=''><i class='fa fa-user fa-fw w3-margin-right w3-text-theme'></i>" . $value->username . "</p>";
                                                            echo "<p style=''><i class='fa fa-phone fa-fw w3-margin-right w3-text-theme'></i>" . $value->noHp . "</p>";
                                                            echo "<p style=''><i class='fa fa-credit-card fa-fw w3-margin-right w3-text-theme'></i>" . $value->norek . "</p>";
                                                            echo "<p style=''><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i>" . $value->alamat . "</p>";
                                                        }
                                                        ?>
                                                    </div>
                                                    <hr>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div id="detailCustomer" class="w3-modal">
                                    <div class="w3-modal-content" style="width:40%;">
                                        <div class="w3-container">
                                            <span onclick="document.getElementById('detailCustomer').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                            <form action="profileTravellerMarket" method="GET">
                                                <fieldset style="width: 100%;">
                                                    <div class="w3-container">
                                                        <h4 class="w3-center">Profile Customer</h4>
                                                        <div class="w3-center">
                                                            <?php
                                                            foreach ($user2 as $key => $value) {
                                                                if ($value->gambarProfile != null) {
                                                                    echo "<img src='../view/image/" . $value->gambarProfile . "' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                                                } else {
                                                                    echo "<img src='../view/image/user.png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                        <hr>
                                                        <?php
                                                        foreach ($user2 as $key => $value) {
                                                            echo "<p style='margin-bottom:0; margin-top:0;'><i class='fa fa-user fa-fw w3-margin-right w3-text-theme'></i>" . $value->username . "</p>";
                                                            echo "<p style='margin-bottom:0; margin-top:0;'><i class='fa fa-phone fa-fw w3-margin-right w3-text-theme'></i>" . $value->noHp . "</p>";
                                                            echo "<p style='margin-bottom:0; margin-top:0;'><i class='fa fa-credit-card fa-fw w3-margin-right w3-text-theme'></i>" . $value->norek . "</p>";
                                                            echo "<p style='margin-bottom:0; margin-top:0;'><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i>" . $value->alamat . "</p>";
                                                        }
                                                        ?>
                                                    </div>
                                                    <hr>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>