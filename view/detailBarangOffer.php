<style>
    figure:hover{
        transform: scale(2.4); 
    }

    /* Create two equal columns that sits next to each other */
    .column {
        width: 50%;
        float :left;
    }

    .column1 {
        width : 50%;
        float : right;
    }

</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style=" margin: auto; padding: 50px; height: 800px;">
            <form action="beliBarangOffer" method="GET">
                <h3><b>Penitipan Barang</b></h3> <br>
                    <div class="column1">
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
                        echo"<input type='hidden' name='namaUser' value='$value->namaUser'>";
                        echo"<input type='hidden' name='nohp' value='$value->nohp'>";
                        echo"<input type='hidden' name='alamat' value='$value->alamat'>";
                        echo"<figure><img src='image/market/".$value->gambarBarang."'width=250px height=150px></figure><br>"; 
                    }
                    ?>
                    
                    <p style="color:red; font-size:12px;">Note : <br>Sebelum melakukan pembelian barang, silakan menghubungi traveller terlebih dahulu
                    untuk negosiasi harga (Harga Ongkir). Untuk kontak traveller bisa dilihat pada profilenya.</p>
                    <!-- <div class="w3-right" style="padding-top: 100px; padding-right:1%">     -->
                    <br>
                    <input type='submit' class="w3-btn w3-theme" name="beliBarang" style="width:100%;" value='Beli Barang'>
                <!-- </div>    -->
            </form>
            </div>

            <div class="column">
            <form action="profileTravellerMarket" method="GET">
                <fieldset style="width:70%">
                    <div class="w3-container">
                    <h4 class="w3-center">Profile Traveller</h4>  
                        <div class="w3-center">
                        <?php
                            foreach($result as $key => $value){    
                                if($value->fotoProfile!=null){
                                    echo "<img src='../view/image/".$value->fotoProfile."' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                }
                                else{
                                    echo "<img src='../view/image/user.png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                                }
                            }    
                        ?>
                        </div> 
                            <hr>
                            <?php  
                                foreach($result as $key=>$value){
                                    echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-user fa-fw w3-margin-right w3-text-theme'></i>".$value->namaUser."</p>";
                                    echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-phone fa-fw w3-margin-right w3-text-theme'></i>".$value->nohp."</p>";
                                    echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i>".$value->alamat."</p>";
                                }
                            ?>   
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
    </div>
</div>

<script>


</script>