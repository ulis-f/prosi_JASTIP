<div class="container">
    <h2>Lengkapi Pendaftaran</h2>        
    <table class="table table-striped">
    <?php
        foreach($result as $key => $value){
        echo"<form method='GET' action='detailDaftar'>";
        echo "<tr>";
        echo"<th>Nama</th>
                <th>Email</th>
                <th>Persetujuan</th>
            </tr>
            <tr>";
        echo " <td>".$value->username."</td> ";
        echo " <td>".$value->email."</td>";
        echo " <td><input type='submit' value='Submit'></td>   
            </tr>";
        echo "</form>";
        }
    ?>
    </table>
</div>  