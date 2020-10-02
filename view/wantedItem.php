<div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 750px; ">
            <h2>Permintaan Barang</h2>
            <br>
            <form action="wantedKlik" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="width: 250px;">Nama Barang</td>
                    <td>:</td>
                    <td><input type="text" name="nama" placeholder="Masukkan Nama Barang" style="width: 255px;"></td>
                </tr>
                <tr>
                    <td>Jumlah Barang</td>
                    <td>:</td>
                    <td><input class="w3-input w3-border w3-border-theme" name="jumlah" type="number" value="1"></td>
                </tr>
                <tr>
                    <td><label for="kategori">Kategori Barang</label></td>
                    <td>:</td>
                    <td><?php
                            echo "<select class='form-control select2' id='kategori' name='kategori' style='width:250px;'>";
                            foreach($kategori as $key=>$value){
                            echo "<option value='".$value->id."'>".$value->nama."</option>";
                            }
                    ?></td>
                </tr>
                <tr>
                    <td>Deskripsi Barang*</td>
                    <td>:</td>
                    <td>
                        <textarea name="deskripsi" id="" cols="30" rows="5"></textarea>
                    </td>
                </tr>
            </table>
            <br>
            <h4>Upload Gambar</h4>
            <input type='file' name="gambar" id="gambar" accept='image/*'>
            <br>
            <br>
            <p style="color:red;font-size:13px;">*Harus disertakan kondisi barang dan lokasi barang</p>
            <br>
            <br> 

            <div class="w3-right" style="padding-top: 100px;"> 
                <input type="submit" value="Submit" class="w3-btn w3-theme">
            </div>
            </form>
        </div>
    </div>