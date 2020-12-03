<style>
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
</style>   

<div class="container">
        <div class="w3-card-4 w3-white" style="padding: 50px; height: 800px; margin-top: 5%;">
            <form action=" " method="">
                <div class="column">
                    <h2>Ringkasan Belanja</h2> 
                    <br><br>
                    <table>
                        <tr>
                            <td>kotaAwal</td>
                            <td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:24px'></i></td>    
                            <td>Kota Tujuan</td>
                        </tr>
                        <tr>
                            <td>Waktu awal</td>
                            <td>Waktu akhir</td>
                        </tr>
                    </table>
                    <br><br>

                    <div>
                        <div style="width: 40%; float: left;">
                            <img src='' width=100% height=150px>
                        </div>

                        <div style="width: 60%; float: right; padding-left: 20%; height: 150px;">
                            <h4>Nama Barang</h4>
                            <p>Deskripsi</p>
                        </div>
                    </div>

                    <br> <br>
                    <table>
                        <tr>
                            <td>Harga Barang</td>
                            <td>Rp</td>
                            <td>-----</td>
                        </tr>
                        <tr>
                            <td>Tip Traveller</td>
                            <td>Rp</td>
                            <td>-----</td>
                        </tr>
                        <tr>
                            <td>TitipAja Fee</td>
                            <td>Rp</td>
                            <td>-----</td>
                        </tr>
                        <tr>
                            <td>Kode Unik Transaksi</td>
                            <td>Rp</td>
                            <td>-----</td>
                        </tr>
    
                    </table>
                    <br>
                    <p class="" style="width:100%;border-bottom:2px solid #6699cc"></p>
                    <table>
                        <tr>
                            <td><b>Total Harga</b></td>
                            <td>Rp</td>
                            <td>----</td>
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
                        <div class="col-sm-4">
                            <img src="../view/image/bank/bni.png" alt="" style="width: 100px; height: 50px;">
                        </div>
                        <div class="col-sm-4">  
                            <img src="../view/image/bank/bri.png" alt="" style="width: 100px; height: 50px;">
                        </div>
                        <div class="col-sm-4">  
                            <img src="../view/image/bank/mandiri.png" alt="" style="width: 100px; height: 50px;">
                        </div>

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