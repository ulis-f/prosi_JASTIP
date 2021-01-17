<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: white;
    }

    body {
        background-color: white;
    }

    #laporan {
        overflow-y: scroll;
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
        <a class="nav-link text-center " href="persetujuanBarang" style="height: 100%; ">Form Barang</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="pembayaranAdmin" style="height: 100%;">Pembayaran</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="pengirimanUang" style="height: 100%;">Pengiriman Uang</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%; border-bottom: 4px solid #6699cc;">Laporan</a>
    </li>
</ul>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">
    <div class="container" style="">
        <div class="w3-card-4 w3-white" id="laporan" style="width:60%; margin: auto; padding: 50px; height: 700px; ">
            <h3><b>Laporan</b></h3>
            <div style="margin-top: 25px; margin-bottom: 20px; margin-right: 20px;">
                <div class="container">
                    <div class="w3-bar" style="margin-bottom: 3%;">
                        <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                        border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id1')">Pendapatan</button>
                        <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                        border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id2')">Traveller</button>
                        <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                        border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id3')">User</button>
                    </div>

                    <div id="id1" class="tabs">
                        <form action="laporan" method="GET">
                            <div class="input-group md-form form-sm form-2 pl-0">
                                <select class="form-control" name="bulan">;
                                    <option value="Semua">Semua</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">July</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>

                        <table class="table table-striped" style="margin-top:2%;">
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Bank</th>
                                <th>Pendapatan</th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($pendapatan as $key => $value) {
                                echo "<tr>
                                <td>" . $i . "</td>
                                <td>" . $value->bulan . "</td>
                                <td>" . $value->namaBank . "</td>
                                <td>" . $value->pendapatan . "</td>
                            </tr>";
                                $i++;
                            }
                            ?>
                            <?php
                            $res = 0;
                            foreach ($total as $key => $value) {
                                echo "<tr>
                                <td colspan='3'>Total uang yang dikirim melalui BCA</td>
                                <td>";
                                if ($value->namaBank == 'BCA') {
                                    $res += $value->pendapatan;
                                    echo $value->pendapatan;
                                }
                                echo "</td>
                            </tr>
                            <tr>
                                <td colspan='3'>Total uang yang dikirim melalui BRI</td>
                                <td>";
                                if ($value->namaBank == 'BRI') {
                                    $res += $value->pendapatan;
                                    echo $value->pendapatan;
                                }
                                echo "</td>
                            </tr>
                            <tr>
                                <td colspan='3'>Total uang yang dikirim melalui MANDIRI</td>
                                <td>";
                                if ($value->namaBank == 'MANDIRI') {
                                    $res += $value->pendapatan;
                                    echo $value->pendapatan;
                                }
                                echo "</td>
                            </tr>
                            <tr>
                                <td colspan='3'><b>Total Pendapatan</b></td>
                                <td>" . $res . "</td>
                            </tr>";
                            }
                            ?>
                        </table>
                    </div>

                    <div id="id2" class="tabs" style="display: none;">
                        <table class="table table-striped" style="margin-top:2%;">
                            <p>Traveller yang paling banyak melakukan upload trip dalam kurun waktu 3 bulan terakhir</p>
                            <tr>
                                <th>No</th>
                                <th>Nama Traveller</th>
                                <th>Jumlah Trip</th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($tripTraveller as $key => $value) {
                                echo "<tr>
                                <td>" . $i . "</td>
                                <td>" . $value->nama . "</td>
                                <td>" . $value->jumlah . "</td>
                            </tr>";
                                $i++;
                            }
                            ?>
                        </table>
                    </div>

                    <div id="id3" class="tabs" style="display: none;">
                        <table class="table table-striped" style="margin-top:2%;">
                            <p>Customer yang paling banyak melakukan transaksi dalam kurun waktu 3 bulan terakhir</p>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Jumlah Transaksi</th>
                            </tr>
                            <?php
                            $i = 1;
                            foreach ($pendapatanCustomer as $key => $value) {
                                echo "<tr>
                                <td>" . $i . "</td>
                                <td>" . $value->nama . "</td>
                                <td>" . $value->jumlah . "</td>
                            </tr>";
                                $i++;
                            }
                            ?>
                        </table>
                    </div>

                </div>
            </div>
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