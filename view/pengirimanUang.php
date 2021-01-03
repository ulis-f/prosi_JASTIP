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
</style>

<ul class="nav" style="margin-top:7%; background-color:white; margin-left:2%;">
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
        <a class="nav-link text-center" href="pembayaranAdmin" style="height: 100%;">Pembayaran</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%; border-bottom: 4px solid #6699cc;">Pengiriman Uang</a>
    </li>
</ul>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">
    <p class="" style="width:100%;border-bottom:1px solid #6699cc">
        Sekarang anda berada di halaman :
        <a class="" href="pengirimanUang" style="text-decoration:none; color:#6699cc "><b>Pengiriman Uang</b></a>
        <i class="fa fa-angle-double-right"></i>
        <a class="" href="#" style="text-decoration:none; ">Detail Pengiriman Uang</a>
    </p>

    <div class="container" style="">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 700px; ">

            <div id="" class="">
                <form method="GET" action="detailPengirimanUang">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengirim</th>
                            <th>Email Pengirim</th>
                            <th>Detail</th>
                        </tr>  

                        <?php
                        $i = 1;
                        foreach ($result as $key => $value) {
                            echo "<tr>";
                            echo "<input type='hidden' name='namaPembeli' value='$value->idPembeli'>";
                            echo "<input type='hidden' name='namaPenerima' value='$value->idPenerima'>";
                            echo "<input type='hidden' name='idTrip' value='$value->idTrip'>";
                            echo "<td>$i</td>";
                            echo "<td>" . $value->nama . "</td>";
                            echo "<td>" . $value->email . "</td>";
                            echo "<td class='text-center'><input class='btn btn-primary btn-sm' style='font-size:15px' type='submit' value='Detail'></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</fieldset>


