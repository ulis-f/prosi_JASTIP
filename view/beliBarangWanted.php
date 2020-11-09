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

    .container input[type=text],
    input[type=password] {
        width: 100%;
        padding-top: 3px;
        padding-bottom: 3px;
    }
</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="padding: 50px; height: 800px; margin-top: 5%;">
            <form action="persetujuanTravellerOffer" method="POST">
                <h2>Penitipan Barang</h2> 
                <br>
                    <div class="column">
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
                            <td><label for="deskripsiBarang">Deskripsi Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='deskripsi' value='$value->deskripsiBarang'>";
                                echo "<td>".$value->deskripsiBarang."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="jumlahBarang">Jumlah Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='jumlahBarang' value='$value->jumlahBarang'>";
                                echo "<td>".$value->jumlahBarang."</td>";
                            }
                            ?></td>
                        </tr>
                    </table>

                    <table>
                        <tr>
                        <td><label for="trip">Trip yang masih aktif</label></td>
                        <td>:</td>
                            <td>
                            <?php
                                    echo "<select class='form-control' id='trip' style='width:250px;' name='trip' style=''>";
                                    foreach($trip as $key=>$value){
                                    $jamAkhir = date_create($value->waktuAkhir);
                                    $jamAwal = date_create($value->waktuAwal);
                                    echo "<option value='".$value->idtrip."'>
                                    
                                        ".$value->kotaTujuan."->
                                        
                                        ".$value->kotaAwal." 
                                        
                                        ".date_format($jamAkhir, "d/m/Y")."->
                                        
                                        ".date_format($jamAwal, "d/m/Y")."  
                                        </option>";
                                    }        
                            ?>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <label for="gambarBarang">Gambar Barang</label>
                    <?php
                    foreach($result as $key=>$value){
                        echo"<input type='hidden' name='namaUser' value='$value->namaUser'>";
                        echo"<input type='hidden' name='nohp' value='$value->nohp'>";
                        echo"<input type='hidden' name='alamat' value='$value->alamat'>";
                        echo"<input type='hidden' name='gambar' value='$value->gambarBarang'>";
                        echo"<figure><img src='image/market/".$value->gambarBarang."'width=250px height=150px></figure><br>"; 
                    }
                    ?>
                    </div>

                    <div class="column1">
                        <label>Harga Dijual</label></td><br>
                        <input required id="harga" class="w3-input w3-border w3-border-theme" name="hargaDiJual" type="text" onkeyup="hitung()">
                        <br>
                        <label>Harga Ongkir</label><br>
                        <input required id="hargaOngkir" class="w3-input w3-border w3-border-theme" name="hargaOngkir" type="text" onkeyup="hitung()">
                        <br>
                        <label>Total Harga*</label><br>
                        <input required id="totalHarga" class="w3-input w3-border w3-border-theme" name="totalHarga" type="text">
                    
                    <br>
                    <p style="color:red;font-size:13px;">*Total harga sudah termasuk biaya ongkir dan akan dipotong 4% untuk biaya transaksi titipaja</p>
                    <br>
                    </div>

                    <div class="w3-right" style="padding-top: 25%; padding-right:1%"> 
                    <button class="w3-btn w3-theme" name="persetujuanTraveller" style="font-size:17px;">Beli Barang</button>   
                </div>   
            </form>    
        </div>
    </div>

<script>
    $('.select2').select2();
        function hitung(){
            var harga = document.getElementById('harga').value;
            var hargaOngkir = document.getElementById('hargaOngkir').value;
            var result = document.getElementById('totalHarga');  
            result.value =  parseInt(hargaOngkir)+parseInt(harga)+(parseInt(harga)*(4/100)); 
        }
    </script>