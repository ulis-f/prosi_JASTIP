<style>
    figure:hover{
        transform: scale(2.4); 
    }
</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 950px; margin-top: 5%;">
            <form action="" method="POST">
                <h2>Penitipan Barang</h2> 
                    <table>
                        <tr>
                            <td><label for="namaBarang">Nama Barang</label></td>
                            <td>:</td>
                            <td>
                            <?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->namaBarang."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="jumlahBarang">Jumlah Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->jumlahBarang."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="kategoriBarang">Kategori Barang</label></td>
                            <td>:</td>
                            <td>
                            <?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->namaKategori."</td>";
                            }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="deskripsiBarang">Deskripsi Barang</label></td>
                            <td>:</td>
                            <td>
                            <?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->deskripsiBarang."</td>";
                            }
                            ?>
                            </td>
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
                    <br><br><br>
                    <p style="color:red; font-size:12px;">Note : <br>Sebelum melakukan pembelian barang, silakan menghubungi customer terlebih dahulu
                    untuk negosiasi harga (Harga Ongkir dan Harga Barang). Untuk kontak customer bisa dilihat pada profilenya.</p>
                    <div class="w3-right" style="padding-top: 100px; padding-right:1%">    
                    <br><br><br><br><br> 
                    <input type='submit' class="w3-btn w3-theme" name="beliBarang" style="" value='Accept'>
                    
                </div>     
            </form> 
            <input type='submit' class="btn btn-danger btn-sm" name="profile" style="" value='Lihat Profile Customer'>   
        </div>
    </div>