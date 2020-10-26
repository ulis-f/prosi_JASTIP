<style>
    figure:hover{
        transform: scale(2.4); 
    }
</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 850px; margin-top: 5%;">
            <form action="" method="POST">
                <h2>Penitipan Barang</h2> 
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
                            <td>Harga Dijual</td>
                            <td>:</td>
                            <td><input id="harga" class="w3-input w3-border w3-border-theme" name="hargaDiJual" type="text" onkeyup="hitung()"></td>
                        </tr>
                        <tr> 
                            <td>Harga Ongkir</td>
                            <td>:</td>
                            <td><input id="harga" class="w3-input w3-border w3-border-theme" name="hargaOngkir" type="text" onkeyup="hitung()"></td>
                        </tr>
                        <tr>
                            <td>Total Harga*</td>
                            <td>:</td>
                            <td><input id="totalHarga" class="w3-input w3-border w3-border-theme" name="totalHarga" type="text"></td>
                        </tr>
                        <tr>
                            <td><label for="namaNegara">Kota asal - Kota Tujuan</label></td>  
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->kotaAwal."->".$value->kotaTujuan."</td>";
                            }
                            ?></td> 
                        </tr>
                        <tr>
                            <td><label for="waktu">Waktu</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->waktuAwal."->".$value->waktuAkhir."</td>";
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
                    ?><br> 
                    <br><br><br><br><br>
                    <div class="w3-right" style="padding-top: 100px; padding-right:1%"> 
                    <button class="btn btn-primary btn-sm" style="font-size:17px;">Beli Barang</button>
                </div>   
            </form>    
        </div>
    </div>
</div>

<script>
    $('.select2').select2();
        function hitung(){
            var harga = document.getElementById('harga').value;
            var result = document.getElementById('totalHarga');  
            result.value =  parseInt(harga)+(parseInt(harga)*(4/100));
        }
    </script>