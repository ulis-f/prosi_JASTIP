<style>
    figure:hover{
        transform: scale(2.4); 
    }
</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 1050px; margin-top: 5%;">
            <form action="" method="POST">  
                    <h2>Persetujuan Penitipan Barang</h2>  
                    <table>
                        <tr>
                            <td><label for="namaBarang">Nama Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->namaBarang."</td>";     
                            }
                            ?></td>    
                        </tr>
                        <tr>
                            <td><label for="kategoriBarang">Kategori Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->namaKategori."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="hargaBarang">Harga Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->hargaBarang."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="hargaBarang">Harga Jasa</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->hargaBarang."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="hargaBarang">Harga Ongkir</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->hargaBarang."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="namaNegara">Kota asal- Kota tujuan</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->kotaAwal."->".$value->kotaTujuan."</td>";
                            }
                            ?></td> 
                        </tr>
                        <tr>
                            <td><label for="deskripsiBarang">Deskripsi Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->deskripsiBarang."</td>";
                            }
                            ?></td>
                        </tr>
                    </table>
                    <br>
                    <label for="gambarBarang">Gambar Barang</label>
                    <?php
                    foreach($result as $key=>$value){
                        echo"<figure><img src='image/market/".$value->gambarBarang."'width=250px height=150px></figure><br>"; 
                    }
                    ?> 

                    <br>
                    <input type='radio' id='verified' name='verified' value='verified'>Verified<br>
                    <input type='radio' id='unverified' name='unverified' value='unverified'>Unverified<br>      
                    <br>
                    <label for='note'>Note</label> <br>
                    <textarea name='' id='' cols='30' rows='5'></textarea>
                    <br><br><br><br><br>
                    <input type='submit' class='w3-btn w3-right w3-theme' value='Submit'>   
            </form>    
        </div>
    </div>