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