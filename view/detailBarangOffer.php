<style>
    figure:hover{
        transform: scale(2.4); 
    }
</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 950px; margin-top: 5%;">
            <form action="beliBarangOffer" method="GET">
                <h2>Penitipan Barang</h2> 
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
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='hargaBarang' value='$value->hargaBarang'>";
                                echo "<td>".$value->hargaBarang."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="namaNegara">Kota asal - Kota Tujuan</label></td>  
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                                echo"<input type='hidden' name='kotaTujuan' value='$value->kotaTujuan'>";
                                echo "<td>".$value->kotaAwal."->".$value->kotaTujuan."</td>";
                            }
                            ?></td> 
                        </tr>
                        <tr>
                            <td><label for="waktu">Waktu</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='waktuAwal' value='$value->waktuAwal'>";
                                echo"<input type='hidden' name='waktuAkhir' value='$value->waktuAkhir'>";
                                echo "<td>".$value->waktuAwal."->".$value->waktuAkhir."</td>";
                            }
                            ?></td> 
                        </tr>
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
                        echo"<input type='hidden' name='gambar' value='$value->gambarBarang'>";
                        echo"<figure><img src='image/market/".$value->gambarBarang."'width=250px height=150px></figure><br>"; 
                    }
                    ?><br> 
                    
                    <p style="color:red; font-size:12px;">Note : <br>Sebelum melakukan pembelian barang, silakan menghubungi traveller terlebih dahulu
                    untuk negosiasi harga (Harga Ongkir). Untuk kontak traveller bisa dilihat pada profilenya.</p>
                    <div class="w3-right" style="padding-top: 100px; padding-right:1%">    
                    <br><br><br><br><br> 
                    <input type='submit' class="w3-btn w3-theme" name="beliBarang" style="" value='Beli Barang'>
                </div>   
            </form>
            <form action="profileTravellerMarket" method="GET">
            <?php
            foreach($result as $key => $value){
                echo"<input type='hidden' name='namaUser' value='$value->namaUser'>";
                echo "<p>".$value->namaUser."</p>";
            }
            ?>
            <p></p>     
            <input type='submit' class="btn btn-danger btn-sm" name="profile" style="font-size:12px;" value='Lihat Profile Traveler'>
            </form>
        </div>
    </div>
</div>

<script>


</script>