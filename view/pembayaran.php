
<style>
    figure:hover{
        transform: scale(2.4); 
    }

    figure{
        margin: 0px;
	    float: left;
        height: 130px;    
    }

    #waktuTersisa{
        margin-left: auto;
        margin-right: auto;
    }

    body {
        background-color: #f9f9f9;
    }

    label {
        font-weight: normal !important;
    }

    .column {
        width: 48%;
        float :left;
    }

    .column1 {
        width : 48%;
        float : right;
    }

    .table1 {
        width : 100%;
    }

    .table1.td{
        width : 33%;
    }
    .table2 {
        width : 100%;
    }

    .table2.td{
        width : 33%;
    }


</style>   

<div class="container">
        <div class="w3-card-4 w3-white" style="padding: 50px; height: 800px; margin-top: 5%;">
            <form action=" " method="">
                <div class="column">
                    <h2>Ringkasan Belanja</h2> 
                    <br><br>
                    <table>
                        <tr>
                        <?php
                        foreach($result as $key=>$value){
                            echo"<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                            echo"<td>".$value->kotaAwal."</td>";
                            echo"<td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:24px'></i></td>";  
                            echo"<td>".$value->kotaTujuan."</td>";
                        }
                        ?>
                        </tr>
                        <tr>
                        <?php
                        foreach($result as $key=>$value){
                           echo "<td>".$value->waktuAwal."</td>";
                           echo "<td>".$value->waktuAkhir."</td>";
                                
                        }
                        ?>
                        </tr>
                    </table>
                    <br><br>

                    <div>
                        <div style="width: 40%; float: left; height: 150px;">
                        <?php
                        foreach($result as $key=>$value){
                            echo"<figure><img src='image/market/".$value->gambar."'width=100% height=100%;></figure><br>"; 
                        }
                        ?>
                        </div>

                        <div style="width: 60%; float: right; padding-left: 20%; height: 150px;">
                        <?php
                        foreach($result as $key=>$value){
                                echo"<input type='hidden' name='namaBarang' value='$value->namaBarang'>";
                                echo "<h4>".$value->namaBarang."</h4>";     
                            }
                            ?>
                        <?php
                        foreach($result as $key=>$value){
                                echo"<input type='hidden' name='deskripsi' value='$value->deskripsi'>";
                                echo "<p>".$value->deskripsi."</p>";     
                            }
                            ?>
                            <p class="" style="width:100%;border-bottom:2px solid #dddddd"></p>
                        </div>
                    </div>

                    <br> <br>
                    <table class="table1">
                        <tr>
                            <td>Harga Barang</td>
                            <td>Rp</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='hargaBarang' value='$value->hargaBarang'>";
                                echo "<td style='float: right;'>".$value->hargaBarang."</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Tip Traveller</td>
                            <td>Rp</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='tip' value='$value->tipTraveller'>";
                                echo "<td style='float: right;'>".$value->tipTraveller."</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>TitipAja Fee</td>
                            <td>Rp</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='fee' value='$value->fee'>";
                                echo "<td style='float: right;'>".$value->fee."</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Kode Unik Transaksi</td>
                            <td>Rp</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='kodeUnik' value='$value->kodeUnik'>";
                                echo "<td style='float: right;'>".$value->kodeUnik."</td>";
                            }
                            ?>
                        </tr>
    
                    </table>
                    <br>
                    <p class="" style="width:100%;border-bottom:2px solid #dddddd"></p>
            
                    <table class="table2">
                        <tr>
                            <td style="width:66%;"><b>Total Harga</b></td>
                            <td>Rp</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo"<input type='hidden' name='totalHarga' value='$value->totalHarga'>";
                                echo "<td style='float: right; width:30%:'>".$value->totalHarga."</td>";
                            }
                            ?>
                        </tr>
                    </table>
                </div>
                
                
                <div class="column1">
                        <h2>Pembayaran</h2> 
                        <table id="waktuTersisa" style="color:red;">  
                            <td>Waktu tersisa pembayaran</td>
                            <td> : </td>
                            <td><div id="demo"></div></td>
                        </table> 
                        <br><br> 
                        <div>
                            <div class="col-sm-4">    
                                <img src="../view/image/bank/bca.png" name="jenisBank1" id="jenisBank1"  value="bca" onclick="pilihBank()" alt="" style="width: 100%; border: 2px solid #dddddd; padding:8px;">
                            </div>

                            <div class="col-sm-4">  
                                <img src="../view/image/bank/BRI.png" name="jenisBank2" id="jenisBank2" value="bri" onclick="pilihBank()" alt="" style="width: 100%;  border: 2px solid #dddddd;">
                            </div>

                            <div class="col-sm-4">  
                                <img src="../view/image/bank/mandiri.png" name="jenisBank3" id="jenisBank3" value="mandiri" onclick="pilihBank() "alt="" style="width: 100%;  border: 2px solid #dddddd; padding:8px;">
                            </div>
                        </div>
                        <p id="bank"></p>
                        <br><br><br>
                        <p>Silahkan mengunduh bukti pembayaran</p><br>
                        
                        
                        
                        <input type="submit" class="w3-btn w3-theme" style="width:100%;" value="Submit">
                </div>  
                
                
            </form>    
        </div>
    </div>

    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("Dec 10, 2020 10:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();
        
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
        
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "hari " + hours + "jam "
    + minutes + "menit " + seconds + "detik ";
        
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);

    var bank = document.getElementById('jenisBank1').value;
    var bank2 = document.getElementById('jenisBank2').value;
    var bank3 = document.getElementById('jenisBank3').value;


    bank.onclick = function(){
        document.getElementById("bank").innerHTML = "<h7>ATM BCA</h7>"+
                "<ol>"+
                    "<li>Pilih menu <b>Transaksi Lainnya</b> > <b>Transfer</b> > <b>ke Rekening BCA Virtual Account</b></li>"+
                    "<li>Masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang kamu daftarkan di akun Tokopedia (Contoh: 80777081316951940)</li>"+
                    "<li>Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai</li>"+
                    "<li>Jika sudah benar > Pilih <b>Ya</b></li>"+
                "</ol>";
    }

    bank.onclick()= function{
        document.getElementById("bank").innerHTML = "<h7>ATM BRI</h7>"+
                "<ol>"+
                    "<li>Pilih menu <b>Transaksi Lain</b>, kemudian pilih menu <b>Pembayaran</b></li>"+
                    "<li>Setelah itu klik Menu <b>Lainnya</b>, lalu pilih menu <b>Briva</b></li>"+
                    "<li>Masukkan nomor rekening dengan nomor Virtual Account Anda (contoh: 7810202001539202) dan pilih <b>Benar</b></li>"+
                    "<li>Periksa detail transaksi > Pilih <b>Ya</b></li>"+
                "</ol>"
                +
                "<h7>ATM LAIN</h7>"+
                "<ol>"+
                    "<li>Pilih menu <b>Transaksi Lain</b>, kemudian pilih menu <b>Transfer</b></li>"+
                    "<li>Setelah itu pilih menu <b>Ke Rek Bank Lain</b></li>"+
                    "<li>Masukkan Kode Bank Tujuan: BRI (Kode Bank: 002). Lalu klik <b>Benar</b></li>"+
                    "<li>Masukkan jumlah pembayaran sesuai tagihan. Klik <b>Benar</b></li>"+
                    "<li>Sistem akan memverifikasi data yang dimasukkan. Pilih <b>Benar</b> untuk memproses pembayaran</li>"+
                "</ol>";

    }

    bank3.onclick = function(){
        document.getElementById("bank").innerHTML = "<h7>ATM MANDIRI</h7>"+
                "<ol>"+
                    "<li>Pilih Menu <b>Bayar/Beli</b> kemudian pilih menu <b>Lainnya</b></li>"+
                    "<li>Kemudian pilih menu <b>Lainnya</b>, hingga menemukan menu <b>Multipayment</b></li>"+
                    "<li>Masukkan kode biller TitipAja 8870, lalu pilih <b>Benar</b></li>"+
                    "<li>Masukkan <b>Nomor Virtual Account</b> TitipAja, lalu pilih tombol <b>Benar</b></li>"+
                    "<li>Masukkan Angka <b>1</b> untuk memilih tagihan, lalu pilih tombol <b>Ya</b></li>"+
                    "<li>Akan muncul konfirmasi pembayaran, lalu pilih tombol <b>Ya</b></li>"
                "</ol>"; 
    }

    // function pilihBank() {
        
    //     if (bank3) {
    //         document.getElementById("bank").innerHTML = "<h7>ATM MANDIRI</h7>"+
    //             "<ol>"+
    //                 "<li>Pilih Menu <b>Bayar/Beli</b> kemudian pilih menu <b>Lainnya</b></li>"+
    //                 "<li>Kemudian pilih menu <b>Lainnya</b>, hingga menemukan menu <b>Multipayment</b></li>"+
    //                 "<li>Masukkan kode biller TitipAja 8870, lalu pilih <b>Benar</b></li>"+
    //                 "<li>Masukkan <b>Nomor Virtual Account</b> TitipAja, lalu pilih tombol <b>Benar</b></li>"+
    //                 "<li>Masukkan Angka <b>1</b> untuk memilih tagihan, lalu pilih tombol <b>Ya</b></li>"+
    //                 "<li>Akan muncul konfirmasi pembayaran, lalu pilih tombol <b>Ya</b></li>"
    //             "</ol>";    
    //     }
    //     // else if (bank2=="bri") {  
    //         document.getElementById("bank").innerHTML = "<h7>ATM BRI</h7>"+
    //             "<ol>"+
    //                 "<li>Pilih menu <b>Transaksi Lain</b>, kemudian pilih menu <b>Pembayaran</b></li>"+
    //                 "<li>Setelah itu klik Menu <b>Lainnya</b>, lalu pilih menu <b>Briva</b></li>"+
    //                 "<li>Masukkan nomor rekening dengan nomor Virtual Account Anda (contoh: 7810202001539202) dan pilih <b>Benar</b></li>"+
    //                 "<li>Periksa detail transaksi > Pilih <b>Ya</b></li>"+
    //             "</ol>"
    //             +
    //             "<h7>ATM LAIN</h7>"+
    //             "<ol>"+
    //                 "<li>Pilih menu <b>Transaksi Lain</b>, kemudian pilih menu <b>Transfer</b></li>"+
    //                 "<li>Setelah itu pilih menu <b>Ke Rek Bank Lain</b></li>"+
    //                 "<li>Masukkan Kode Bank Tujuan: BRI (Kode Bank: 002). Lalu klik <b>Benar</b></li>"+
    //                 "<li>Masukkan jumlah pembayaran sesuai tagihan. Klik <b>Benar</b></li>"+
    //                 "<li>Sistem akan memverifikasi data yang dimasukkan. Pilih <b>Benar</b> untuk memproses pembayaran</li>"+
    //             "</ol>";  
    //     //}
    //     // else{
    //         document.getElementById("bank").innerHTML = "<h7>ATM BCA</h7>"+
    //             "<ol>"+
    //                 "<li>Pilih menu <b>Transaksi Lainnya</b> > <b>Transfer</b> > <b>ke Rekening BCA Virtual Account</b></li>"+
    //                 "<li>Masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang kamu daftarkan di akun Tokopedia (Contoh: 80777081316951940)</li>"+
    //                 "<li>Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai</li>"+
    //                 "<li>Jika sudah benar > Pilih <b>Ya</b></li>"+
    //             "</ol>";
    //     // }
    }
</script> 