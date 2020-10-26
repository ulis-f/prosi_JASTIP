<style>
    figure:hover{
        transform: scale(2.4); 
    }
</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 850px; margin-top: 5%;">
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
                    <br><br><br><br><br>
                    <div class="w3-right" style="padding-top: 100px; padding-right:1%"> 
                    <input type='submit' class="btn btn-danger btn-sm" name="profile" style="font-size:17px;" value='Lihat Profile Traveler'>
                    <input type='submit' class="btn btn-primary btn-sm" name="beliBarang" style="font-size:17px;" value='Beli Barang'>
                </div>   
            </form>    
        </div>
    </div>
</div>

<script>


</script>