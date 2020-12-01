<style>
    #waktuTersisa{
        margin-left: auto;
        margin-right: auto;
    }
</style>   

<div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: auto; margin-top: 5%;">
            <form action="" method="POST">
                <h2>Pembayaran</h2> 
                    <br>
                    <div>
                    <table id="waktuTersisa">
                        <td><h5>Waktu tersisa pembayaran</h5></td>
                        <td> : </td>
                        <td><h5><div id="demo"></div></h5></td>
                    </table>  
                    </div>

                    <br><br>
                    <table>
                        <tr>    
                            <td><label for="namaBarang">Nama Barang</label></td>
                            <td>:</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->namaBarang."</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td><label for="jumlahBarang">Jumlah Barang</label></td>
                            <td>:</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->jumlahBarang."</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td><label for="totalHarga">Total Harga</label></td>
                            <td>:</td>
                            <?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->hargaBarang."</td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td><label for="bank">Pilih Bank</label></td>
                            <td>:</td>
                            <td><select name="jenisBank" id="jenisBank">
                                <option value="bca" onclick="pilihBank()">BCA</option>
                                <option value="bni" onclick="pilihBank()">BNI</option>
                                <option value="bri" onclick="pilihBank()">BRI</option>
                                <option value="mandiri" onclick="pilihBank()">MANDIRI</option>
                            </select></td>
                        </tr>
                    </table>
            </form> 
            <br>
            <BUtton onclick="pilihBank()" class="btn btn-primary btn-sm">Lihat Cara Pembayaran!</BUtton>
            <br><br>

            <p id="bank"></p>
            <!-- <h7>ATM BCA</h7>
                <ol>
                    <li>Pilih menu <b>Transaksi Lainnya</b> > <b>Transfer</b> > <b>ke Rekening BCA Virtual Account</b></li>
                    <li>Pilih ke Rekening BCA > Masukkan nomor Virtual Account BCA 12345678</li>
                    <li>Masukkan nominal transfer Rp. TOTAL HARGA DI SINI > Pilih Benar</li>
                    <li>Periksa detail transaksi > Pilih Ya</li>
                </ol>

            <h7>ATM LAIN</h7>
                <ol>
                    <li>Pilih Transfer > Transfer ke Bank Lain</li>
                    <li>Masukkan 014 sebagai kode BCA</li>
                    <li>Masukkan nomor Virtual Account BCA 12345678</li>
                    <li>Masukkan Jumlah Pembayaran > Pilih Konfirmasi</li>
                </ol>

            <h7>ATM BNI</h7>
                <ol>
                    <li>Pilih Menu Lain > Transfer > Dari Rekening Tabungan</li>
                    <li>Pilih ke Rekening BNI > Masukkan nomor Virtual Account BNI 12345678</li>
                    <li>Masukkan nominal transfer Rp. TOTOAL HARGA DI SINI > Pilih Benar</li>
                    <li>Periksa detail transaksi > Pilih Ya</li>
                </ol>

            <h7>ATM LAIN</h7>
                <ol>
                    <li>Pilih Transfer > Transfer ke Bank Lain</li>
                    <li>Masukkan 009 sebagai kode BNI</li>
                    <li>Masukkan nomor Virtual Account BNI 12345678</li>
                    <li>Masukkan Jumlah Pembayaran > Pilih Konfirmasi</li>
                </ol> 
            
            <h7>ATM BRI</h7>
                <ol>
                    <li>Pilih menu <b>Transaksi Lain</b>, kemudian pilih menu <b>Pembayaran</b></li>
                    <li>Setelah itu klik Menu <b>Lainnya</b>, lalu pilih menu <b>Briva</b></li>
                    <li>Masukkan nomor rekening dengan nomor Virtual Account Anda (contoh: 7810202001539202)
                        dan pilih <b>Benar</b></li>
                    <li>Periksa detail transaksi > Pilih <b>Ya</b></li>
                </ol>

            <h7>ATM LAIN</h7>
                <ol>
                    <li>Pilih menu <b>Transaksi Lain</b>, kemudian pilih menu <b>Transfer</b></li>
                    <li>Setelah itu pilih menu <b>Ke Rek Bank Lain</b></li>
                    <li>Masukkan Kode Bank Tujuan: BRI (Kode Bank: 002). Lalu klik <b>Benar</b></li>
                    <li>Masukkan jumlah pembayaran sesuai tagihan. Klik <b>Benar</b></li>
                    <li>Sistem akan memverifikasi data yang dimasukkan. Pilih <b>Benar</b> untuk memproses pembayaran</li>
                </ol>

            <h7>ATM MANDIRI</h7>
                <ol>
                    <li>Pilih Menu Lain > Transfer > Dari Rekening Tabungan</li>
                    <li>Pilih ke Rekening MANDIRI > Masukkan nomor Virtual Account MANDIRI 12345678</li>
                    <li>Masukkan nominal transfer Rp. TOTAL HARGA DI SINI > Pilih Benar</li>
                    <li>Periksa detail transaksi > Pilih Ya</li>
                </ol>

            <h7>ATM LAIN</h7>
                <ol>
                    <li>Pilih Transfer > Transfer ke Bank Lain</li>
                    <li>Masukkan 008 sebagai kode MANDIRI</li>
                    <li>Masukkan nomor Virtual Account MANDIRI 12345678</li>  
                    <li>Masukkan Jumlah Pembayaran > Pilih Konfirmasi</li>
                </ol> -->
            <br><br>
            <a href="" style="text-decoration-line: underline; color:#6699cc; float:right">Klik di sini jika pembayaran telah dilakukan</a> 
        </div>
    </div>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Dec 3, 2020 15:37:25").getTime();

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


    function pilihBank() {
        var bank = document.getElementById('jenisBank').value;
        if (bank=="mandiri") {
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
        else if (bank=="bri") {
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
        else if (bank=="bni") {
            document.getElementById("bank").innerHTML = "<h7>ATM BNI</h7>"+
                "<ol>"+
                    "<li>Pilih menu <b>Transaksi Lain</b>, kemudian pilih menu <b>Pembayaran</b></li>"+
                    "<li>Setelah itu klik Menu <b>Lainnya</b>, lalu pilih menu <b>Transfer</b></li>"+
                    "<li>Pilih <b>Virtual Account Billing</b> Masukkan nomor rekening dengan nomor Virtual Account Anda (contoh: 8277087781881441) dan pilih <b>Benar</b></li>"+
                    "<li>Periksa detail transaksi > Pilih <b>Ya</b></li>"+
                "</ol>"
                +
                "<h7>ATM LAIN</h7>"+
                "<ol>"+
                    "<li>Pilih menu <b>Transfer antar bank</b></li>"+
                    "<li>Masukkan kode bank BNI (009) atau pilih bank yang dituju yaitu BNI</li>"+
                    "<li>Masukan 16 Digit Nomor Virtual Account pada kolom rekening tujuan (Contoh: 8277087781881441)"+
                    "<li>Masukkan nominal transfer sesuai tagihan Anda. Nominal yang berbeda tidak dapat diproses</li>"+
                    "<li>Masukkan jumlah pembayaran</li>"
                    "<li>Periksa detail transaksi > Pilih <b>Ya</b></li>"
                "</ol>";  
        }
        else{
            document.getElementById("bank").innerHTML = "<h7>ATM BCA</h7>"+
                "<ol>"+
                    "<li>Pilih menu <b>Transaksi Lainnya</b> > <b>Transfer</b> > <b>ke Rekening BCA Virtual Account</b></li>"+
                    "<li>Masukkan 5 angka kode perusahaan untuk Tokopedia (80777) dan Nomor HP yang kamu daftarkan di akun Tokopedia (Contoh: 80777081316951940)</li>"+
                    "<li>Di halaman konfirmasi, pastikan detil pembayaran sudah sesuai</li>"+
                    "<li>Jika sudah benar > Pilih <b>Ya</b></li>"+
                "</ol>";
        }
    }
</script>    