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

    /* Popup container - can be anything you want */
    .popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    /* The actual popup */
    .popup .popuptext {
    visibility: hidden;
    width: 200px;
    background-color: #feeae6;
    color: #f75e3f;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
    }

    @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
    }

</style>
  
    <div class="container">
        <div class="w3-card-4 w3-white" style="padding: 50px; height: 600px;">
            <form action="persetujuanTravellerOffer" method="POST">
                <h3><b>Penitipan Barang</b></h2> 
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
                                echo"<input type='hidden' name='deskripsi' value='$value->deskripsiBarang'>";
                                echo "<td>".$value->deskripsiBarang."</td>";
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
                    <button class="w3-btn w3-theme" name="persetujuanTraveller" style="width:100%;">Beli Barang</button>  
                    </div>

                    <!-- <div class="w3-right" style="padding-top: 25%; padding-right:1%">  -->
                    <!-- <div class="popup" onclick="myFunctionPopUp()"> -->
                   
                        <!-- <span class="popuptext" id="myPopup">Pesanan anda sedang dalam tahap untuk diverifikasi traveller.
                        Silakan tunggu beberapa saat. <br> <br><br>
                        <button class="w3-btn w3-red" style="font-size:14px;">Ok</button>
                        </span> -->
                    <!-- </div>  
                </div>    -->
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

    function myFunctionPopUp() {
        var harga = document.getElementById('harga').value;
        var hargaOngkir = document.getElementById('hargaOngkir').value;
        var result = document.getElementById('totalHarga'); 

        if(parseInt(hargaOngkir)>0 && parseInt(harga)>0){  
            var popup = document.getElementById("myPopup");    
            popup.classList.toggle("show");
        }  
    } 
    </script>