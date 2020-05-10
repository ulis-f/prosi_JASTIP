<ul class="nav nav-tabs justify-content-center" style="margin-top:6%; background-color:white;height: 60px; padding-top: 20px;">
    <li class="nav-item">
        <a class="nav-link" href="#">Post Trip</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" style="background-color:#ebebeb;">Lengkapi Pendaftaran</a>
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

<div class="container">
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
        echo " <td><input type='submit' value='Submit'></td>   
            </tr>";
        echo"</form>";
        }
    ?>
    </table>
</div>  