<div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 1000px; ">
            <h2>Penawaran Barang</h2>
            <br>
            <table>
            <form action="offerKlik" method="POST" enctype="multipart/form-data">
                <tr>
                    <td style="width: 250px;">Nama Barang</td>
                    <td>:</td>
                    <td><input type="text" placeholder="Masukkan Nama Barang" name="namaBarang" style="width: 255px;"></td>
                </tr>
                <tr>
                    <td style="width: 250px;">Kategori Barang</td>
                    <td>:</td>
                    <td><input type="text" placeholder="Masukkan Kategori Barang" name="kategoriBarang" style="width: 255px;"></td>
                </tr>
                <tr>
                    <td>Harga Dijual</td>
                    <td>:</td>
                    <td><input class="w3-input w3-border w3-border-theme" name="hargaDiJual" type="text"></td>
                </tr>
                <tr>
                    <td>Total Harga*</td>
                    <td>:</td>
                    <td><input class="w3-input w3-border w3-border-theme" name="totalHarga" type="text"></td>
                    <br>
                        *Total harga sudah termasuk biaya ongkir dan akan dipotong 4% untuk biaya transaksi titipaja
                </tr>
                <tr>
                    <td style="width: 250px;">Nama Negara</td>
                    <td>:</td>
                    <td><input type="text" placeholder="Masukkan Nama Negara" name="namaNegara" style="width: 255px;"></td>
                </tr>
                <tr>
                    <td>Deskripsi Barang</td>
                    <td>:</td>
                    <td>
                        <textarea name="deskripsiBarang" id="" cols="30" rows="5"></textarea>
                    </td>
                </tr>
<<<<<<< HEAD
=======
                <tr>
                    <td>Dapat ditemukan di</td>
                    <td>:</td>
                    <td><input type="text" placeholder="Ditemukan di" name="ditemukan" style="width: 255px;"></td>
                </tr>
            
>>>>>>> master
            </table>
            <br>
            <h4>Upload Gambar</h4>
            <input type='file' name="gambar" id="gambar" accept='image/*'> 
            
            
            <br>
            <br>
            <br>
            <br> 

            <div class="w3-right" style="padding-top: 100px;"> 
                <input type="submit" value="Submit" class="w3-btn w3-theme">
            </div>
            </form>
        </div>
    </div>