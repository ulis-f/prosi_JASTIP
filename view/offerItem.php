
    <ul class="nav" style="width:100%;"> 
        <li class="nav-item" style="margin-left:2%;">
            <a class="nav-link text-center w3-text-theme" href="market" style="height: 100%;">Wanted Item</a>
        </li>
        <li class="nav-item w3-text-theme">
            <a class="nav-link text-center w3-text-theme" href="offerMarket" style="height: 100%; border-bottom: 4px solid #6699cc; ">Item Offer</a>
        </li>
    </ul> 


<style>
    body{
        background-color:white;
    }

    .container input[type=text],
    input[type=password] {
        width: 100%;
        padding-top: 3px;
        padding-bottom: 3px;
        border: #6699cc;

    }
    
</style>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">

    <p class="" style="width:100%;border-bottom:1px solid #6699cc"> 
        Sekarang anda berada di halaman :
        <a class="" href="offerMarket" style="text-decoration:none; ">Item Offer</a>
        <i class="fa fa-angle-double-right" style=""></i>
        <a class="" href="#" style="text-decoration:none; color:#6699cc"><b>Offer an Item</b></a>
    </p>   
    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 1000px; ">
            <h2>Penawaran Barang</h2>
            <br><br>
            <table>
            <form action="offerKlik" method="POST" enctype="multipart/form-data">   
                <tr>
                    <td><label for="trip">Trip yang masih aktif</label></td>
                    <td>:</td>
                    <td>
                    <?php
                            echo "<select class='form-control select2' id='trip' name='trip' style=''>";
                            foreach($result as $key=>$value){
                            $jamAkhir = date_create($value->waktuAkhir);
                            $jamAwal = date_create($value->waktuAwal);
                            echo "<option value='".$value->idtrip."'>
                                
                                ".$value->kotaAwal." ->
                            
                                ".$value->kotaTujuan."
                                
                                ".date_format($jamAwal, "d/m/Y")." ->
                                
                                ".date_format($jamAkhir, "d/m/Y")."
                                
                                </option>";
                            }
                            
                    ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 250px;"><label for=""> Nama Barang</label></td>
                    <td>:</td>
                    <td><input required type="text" class="w3-input w3-border w3-border-theme" name="namaBarang" style=""></td>
                </tr>
                <tr>
                    <td><label for="kategori">Kategori Barang</label></td>
                    <td>:</td>

                    <td><?php
                            echo "<select class='form-control select2' id='kategori' name='kategori' style=''>";
                            foreach($kategori as $key=>$value){
                            echo "<option value='".$value->id."'>".$value->nama."</option>";
                            }
                    ?></td>
                </tr>
                <tr> 
                    <td><label for=""> Harga Dijual</label></td>
                    <td>:</td>
                    <td><input required id="harga" class="w3-input w3-border w3-border-theme" name="hargaDiJual" type="text" onkeyup="hitung()"></td>
                </tr>
                <tr>
                    <td><label for=""> Total Harga*</label></td>
                    <td>:</td>
                    <td><input require id="totalHarga" class="w3-input w3-border w3-border-theme" name="totalHarga" type="text"></td>
                </tr>
                <tr>
                    <td><label for=""> Deskripsi Barang</label></td>
                    <td>:</td>
                    <td>
                        <textarea required name="deskripsiBarang" id="" cols="30" rows="5" style="width: 350px;"></textarea>
                    </td>
                </tr>
            </table>
            <br>
            <h4>Upload Gambar</h4>
            <input required type='file' name="gambar" id="gambar" accept='image/*'>   
            <br>
            <br>
            <p style="color:red;font-size:13px;">*Total harga sudah termasuk biaya ongkir dan akan dipotong 4% untuk biaya transaksi titipaja</p>
            <br>
            <br> 

            <div class="w3-right" style="padding-top: 100px;"> 
                <input type="submit" value="Submit" class="w3-btn w3-theme">
            </div>
            </form>
        </div>
    </div>
</fieldset>

    <script>
    $('.select2').select2();
        function hitung(){
            var harga = document.getElementById('harga').value;
            var result = document.getElementById('totalHarga');
            result.value =  parseInt(harga)+(parseInt(harga)*(4/100));
        }
    </script>