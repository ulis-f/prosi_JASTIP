<style>
#waktuTersisa {
  text-align: center;
  margin-top: 0px;
}
</style>  

<div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 700px; margin-top: 5%;">
            <form action="" method="POST">
                <h2>Pembayaran</h2> 
                    <br><br>
                    <p id="waktuTersisa">Waktu tersisa pembayaran : <p id="demo"></p></p>
                    <table>
                        <tr>    
                            <td><label for="namaBarang">Nama Barang</label></td>
                            <td>:</td>
                            <td>
                            <?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->namaBarang."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="jumlahBarang">Jumlah Barang</label></td>
                            <td>:</td>
                            <td><?php
                            foreach($result as $key=>$value){
                                echo "<td>".$value->jumlahBarang."</td>";
                            }
                            ?></td>
                        </tr>
                        <tr>
                            <td><label for="totalHarga">Total Harga</label></td>
                            <td>:</td>
                            <td>total harga di sini</td>
                        </tr>
                        <tr>
                            <td><label for="bank">Pilih Bank</label></td>
                            <td>:</td>
                            <td><select name="jenisBank" id="jenisBank">
                                <option value="bca">BCA</option>
                                <option value="bni">BNI</option>
                                <option value="bri">BRI</option>
                                <option value="mandiri">MANDIRI</option>
                            </select></td>
                        </tr>
                    </table>
            </form> 

            Cara Pembayaran
            <h3>ATM BCA</h3>
                <ol>
                    <li>Pilih Menu Lain > Transfer > Dari Rekening Tabungan</li>
                    <li>Pilih ke Rekening BCA > Masukkan nomor Virtual Account BCA 12345678</li>
                    <li>Masukkan nominal transfer Rp. TOTAL HARGA DI SINI > Pilih Benar</li>
                    <li>Periksa detail transaksi > Pilih Ya</li>
                </ol>

            <h3>ATM LAIN</h3>
                <ol>
                    <li>Pilih Transfer > Transfer ke Bank Lain</li>
                    <li>Masukkan 014 sebagai kode BCA</li>
                    <li>Masukkan nomor Virtual Account BCA 12345678</li>
                    <li>Masukkan Jumlah Pembayaran > Pilih Konfirmasi</li>
                </ol>

            <h3>ATM BNI</h3>
                <ol>
                    <li>Pilih Menu Lain > Transfer > Dari Rekening Tabungan</li>
                    <li>Pilih ke Rekening BNI > Masukkan nomor Virtual Account BNI 12345678</li>
                    <li>Masukkan nominal transfer Rp. TOTOAL HARGA DI SINI > Pilih Benar</li>
                    <li>Periksa detail transaksi > Pilih Ya</li>
                </ol>

            <h3>ATM LAIN</h3>
                <ol>
                    <li>Pilih Transfer > Transfer ke Bank Lain</li>
                    <li>Masukkan 009 sebagai kode BNI</li>
                    <li>Masukkan nomor Virtual Account BNI 12345678</li>
                    <li>Masukkan Jumlah Pembayaran > Pilih Konfirmasi</li>
                </ol> 
            
            <h3>ATM BRI</h3>
                <ol>
                    <li>Pilih Menu Lain > Transfer > Dari Rekening Tabungan</li>
                    <li>Pilih ke Rekening BRI > Masukkan nomor Virtual Account BRI 12345678</li>
                    <li>Masukkan nominal transfer Rp. TOTAL HARGA DI SINI > Pilih Benar</li>
                    <li>Periksa detail transaksi > Pilih Ya</li>
                </ol>

            <h3>ATM LAIN</h3>
                <ol>
                    <li>Pilih Transfer > Transfer ke Bank Lain</li>
                    <li>Masukkan 002 sebagai kode BRI</li>
                    <li>Masukkan nomor Virtual Account BRI 12345678</li>
                    <li>Masukkan Jumlah Pembayaran > Pilih Konfirmasi</li>
                </ol>

            <h3>ATM MANDIRI</h3>
                <ol>
                    <li>Pilih Menu Lain > Transfer > Dari Rekening Tabungan</li>
                    <li>Pilih ke Rekening MANDIRI > Masukkan nomor Virtual Account MANDIRI 12345678</li>
                    <li>Masukkan nominal transfer Rp. TOTAL HARGA DI SINI > Pilih Benar</li>
                    <li>Periksa detail transaksi > Pilih Ya</li>
                </ol>

            <h3>ATM LAIN</h3>
                <ol>
                    <li>Pilih Transfer > Transfer ke Bank Lain</li>
                    <li>Masukkan 008 sebagai kode MANDIRI</li>
                    <li>Masukkan nomor Virtual Account MANDIRI 12345678</li>  
                    <li>Masukkan Jumlah Pembayaran > Pilih Konfirmasi</li>
                </ol>

            <a href="">Klik di sini jika pembayaran telah dilakukan</a> 
        </div>
    </div>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

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
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
        
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);
</script>