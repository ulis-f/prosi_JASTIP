<style>
    figure:hover{
        transform: scale(2.4); 
    }
</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 1050px; margin-top: 5%;">
            <form action="persetujuanPenitipan" method="POST">  
                    <h2>Persetujuan Penitipan Barang</h2><br>
                    <table>
                        <tr>
                            <td><label for="namaBarang">Nama Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='namaBarang' value='$value->namaBarang'>";
                                echo "<td>".$value->namaBarang."</td>";     
                            }
                            ?></td>    
                        </tr>
                        <tr>
                            <td><label for="kategoriBarang">Kategori Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='namaKategori' value='$value->namaKategori'>";
                                echo "<td>".$value->namaKategori."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="hargaBarang">Harga Barang</label></td>
                            <td>:</td>
                            <td><?php
                                echo"<input type='hidden' name='hargaBarang' value='$hargaDiJual'>";
                                echo "<td>".$hargaDiJual."</td>";
                            
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="hargaBarang">Harga Ongkir</label></td>
                            <td>:</td>
                            <td><?php
                                echo"<input type='hidden' name='hargaOngkir' value='$hargaOngkir'>";
                                echo "<td>".$hargaOngkir."</td>";
                            
                            ?></td>
                        </tr>
                        <tr>
                        <tr>
                            <td><label for="hargaBarang">Harga Total</label></td>
                            <td>:</td>
                            <td><?php
                                echo"<input type='hidden' name='totalHarga' value='$totalHarga'>";
                                echo "<td>".$totalHarga."</td>";
                            
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="namaNegara">Kota asal- Kota tujuan</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                                echo"<input type='hidden' name='kotaTujuan' value='$value->kotaTujuan'>";
                                echo "<td>".$value->kotaAwal."->".$value->kotaTujuan."</td>";
                            }
                            ?></td> 
                        </tr>
                        <!-- <tr>
                            <td><label for="namaNegara">Waktu awal - Waktu akhir</label></td>
                            <td>:</td>
                            <td>
                            <?php  
                            foreach($trip as $key=>$value){
                                $sec = strtotime($value->waktuAwal);
                                $newAwal = date("d/m/yy", $sec);
                                $ces = strtotime($value->waktuAkhir);
                                $newAkhir = date("d/m/yy", $ces);
                                echo"<input type='hidden' name='waktuAwal' value='$value->waktuAwal'>";
                                echo"<input type='hidden' name='waktuAkhir' value='$value->waktuAkhir'>";
                                echo "<td>".$newAwal."->".$newAkhir."</td>";
                            }
                            ?>
                            </td> 
                        </tr> -->
                        <tr>
                            <td><label for="deskripsiBarang">Deskripsi Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='deskripsi' value='$value->deskripsiBarang'>";
                                echo "<td>".$value->deskripsiBarang."</td>";
                            }
                            ?></td>
                        </tr>
                    </table>
                    <br>
                    <label for="gambarBarang">Gambar Barang</label>
                    <?php
                    foreach($result as $key=>$value){
                        echo"<input type='hidden' name='idUser' value='$value->namaUser'>";
                        echo"<input type='hidden' name='gambar' value='$value->gambarBarang'>";
                        echo"<figure><img src='image/market/".$value->gambarBarang."'width=250px height=150px></figure><br>"; 
                    }
                    ?> 

                    <br>
                    <input type='radio' id='verified' name='verified' value='verified'>Verified<br>
                    <input type='radio' id='unverified' name='verified' value='unverified'>Unverified<br>      
                    <br>
                    <label for='note'>Note</label> <br>
                    <textarea name='note' id='note' cols='30' rows='5'></textarea>  
                    <br><br><br><br><br>
                    <input type='submit' class='w3-btn w3-right w3-theme' value='Submit'>   
            </form>    
        </div>
    </div>