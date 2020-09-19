<style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>

<ul class="nav nav-tabs justify-content-center" style="margin-top:6%; background-color:white;">
    <li class="nav-item">
        <a class="nav-link w3-text-theme" href="homeAdmin" style="height: 100%;">Post Trip</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link text-center w3-text-theme" href="#" style="border-bottom: 4px solid red; height: 100%;">Lengkapi Pendaftaran</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#"  style="height: 100%;">Form Barang</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%;">Pembayaran</a>  
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%;">Mengirim Uang</a>
    </li>
</ul>

</p>

<div class="container" style="margin-top:7%;">
    <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 700px; ">
        <h2>Lengkapi Pendaftaran</h2>        
        <table class="table table-striped">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Persetujuan</th>
        </tr>
        <?php
            foreach($result as $key => $value){
            echo"<tr>";
            echo"<form method='GET' action='detailDaftar'>";
            echo"<input type='hidden' name='id' value='".$value->IDuser."'>";  
            echo " <td>".$value->username."</td> ";
            echo " <td>".$value->email."</td>";
            echo " <td class='text-center'><input class='btn btn-primary btn-sm' style='font-size:15px' type='submit' value='Detail'></td>
                </tr>";
            echo"</form>";
            }
        ?>
        </table>
    </div>
</div>  