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
            <form action="" method="POST">
                <h2>Penitipan Barang</h2> 
                <br>
                    <div class="column">
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
                        
                        <tr>
                            <td><label for="namaNegara">Kota asal - Kota Tujuan</label></td>  
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->kotaAwal."->".$value->kotaTujuan."</td>";
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
                    </div>

                    <div class="column1">
                        <label>Harga Dijual</label></td><br>
                        <input id="harga" class="w3-input w3-border w3-border-theme" name="hargaDiJual" type="text" onkeyup="hitung()">
                        <br>
                        <label>Harga Ongkir</label><br>
                        <input id="hargaOngkir" class="w3-input w3-border w3-border-theme" name="hargaOngkir" type="text" onkeyup="hitung()">
                        <br>
                        <label>Total Harga*</label><br>
                        <input id="totalHarga" class="w3-input w3-border w3-border-theme" name="totalHarga" type="text">
                    
                    <br>
                    <p style="color:red;font-size:13px;">*Total harga sudah termasuk biaya ongkir dan akan dipotong 4% untuk biaya transaksi titipaja</p>
                    <br>
                    </div>

                    <div class="w3-right" style="padding-top: 25%; padding-right:1%"> 
                    <button class="w3-btn w3-theme" style="font-size:17px;">Beli Barang</button>
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