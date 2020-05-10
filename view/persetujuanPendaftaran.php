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

<ul class="nav nav-tabs justify-content-center" style="margin-top:6%; background-color:white;height: 60px; padding-top: 20px;">
    <li class="nav-item">
        <a class="nav-link" href="homeAdmin">Post Trip</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" style="background-color:#f9f9f9;">Lengkapi Pendaftaran</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Form Barang</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Pembayaran</a>  
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Mengirim Uang</a>
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
            echo"<input type='hidden' name='id' value'".$value->IDuser."'>";  
            echo " <td>".$value->username."</td> ";
            echo " <td>".$value->email."</td>";
            echo " <p align='center'><td><input type='submit' value='Submit'></td></p>
                </tr>";
            echo"</form>";
            }
        ?>
        </table>
    </div>
</div>  