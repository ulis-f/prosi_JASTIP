
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

    .files input {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 120px 0px 85px 35%;
        text-align: center !important;
        margin: 0;
        width: 100% !important;
        }
        .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
        }
        .files{ position:relative}
        .files:after {  pointer-events: none;
            position: absolute;
            top: 120px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .color input{ background-color:#f1f1f1;}
        .files:before {
            position: absolute;
            bottom: 10px;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 40px;
            content: " or drag it here. ";
            display: block;
            margin: 0 auto;
            color: #2ea591;
            font-weight: 600;
            text-transform: capitalize;
            text-align: center;
        }
</style>   

<div class="container">
        <div class="w3-card w3-white" style="padding: 50px; height: 800px; margin-top: 3%;">
            <form action="pembayaranKeAdmin" method="POST">
                <div class="column">
                    <h3><b>Ringkasan Belanja</b></h3> 
                    <br> 
                    <table style="width:100%;border-collapse: collapse;">
                        <tr>
                        <?php
                        foreach($result as $key=>$value){
                            echo"<input type='hidden' name='kotaAwal' value='$value->kotaAwal'>";
                            echo"<td style='float:left;border-collapse: collapse;'>".$value->kotaAwal."</td>";
                            echo"<td rowspan='2'><i class='fa fa-angle-double-right' style='font-size:20px'></i></td>";  
                            echo"<td style='float:right;'>".$value->kotaTujuan."</td>";
                        }
                        ?>
                        </tr>
                        <tr>
                        <?php
                        foreach($result as $key=>$value){
                           echo "<td><b>".$value->waktuAwal."</b></td>";
                           echo "<td style='float:right;'><b>".$value->waktuAkhir."</b></td>";
                                
                        }
                        ?>
                        </tr>
                    </table>
                    <br>
                    <div>
                        <div style="width: 40%; float: left; height: 150px;">
                        <?php
                        foreach($result as $key=>$value){
                            echo"<figure><img src='image/market/".$value->gambar."'width=100% height=100%;></figure><br>"; 
                        }
                        ?>
                        </div>

                        <div style="width: 60%; float: right; padding-left: 10%; height: 150px;">
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
                                $total = ($value->totalHarga)-($value->kodeUnik);
                                echo "<td style='float: right; width:30%: color:#ffa500'><b style='color:#ffa500'>".$total."</b></td>";
                            }
                            ?>
                        </tr>
                    </table>
                </div>
                
                
                <div class="column1">
                        <h3 style="float:left"><b>Pembayaran</b></h3>
                        <h3><b><div id="demo" style="float:right;color:red;"></div></h3></b>
                        <!-- <h3><div class="countdown" style="float:right;color:red;">
                            <span id="time"><b>24:00:00</b></span>
                        </div></h3> -->
                        <br><br><br>
                        <div class="container">
                            <div class="col-sm-4">    
                                <img src="../view/image/bank/bca.png" class="active" name="jenisBank" id="jenisBank"  value="bca" onclick="toggleVisibility('bank');" alt="" style="width: 100%; border: 2px solid #dddddd; padding:8px; cursor:pointer; border:">
                            </div>

                            <div class="col-sm-4">  
                                <img src="../view/image/bank/BRI.png" name="jenisBank2" id="jenisBank2" value="bri" onclick="toggleVisibility('bank1');" alt="" style="width: 100%;  border: 2px solid #dddddd; cursor:pointer">
                            </div>

                            <div class="col-sm-4">  
                                <img src="../view/image/bank/mandiri.png" name="jenisBank" id="jenisBank" value="mandiri" onclick="toggleVisibility('bank2');" alt="" style="width: 100%;  border: 2px solid #dddddd; padding:8px; cursor:pointer">
                            </div>
                        </div>
                        <br>

                        <div class="inner_div">
                            <div id="bank">
                                <h4>No. Rekening BCA : 731 025 4675</h4>
                                <p>(Titip Aja)</p>
                            </div>
                            <div id="bank1" style="display: none;">
                                <h4>No. Rekening BRI : 034 025 467 432 098</h4>
                                <p>(Titip Aja)</p>
                            </div>
                            <div id="bank2" style="display: none;">
                                <h4>No. Rekening Mandiri : 3034 025 467 432</h4>
                                <p>(Titip Aja)</p>  
                            </div>
                        </div>
                
                        <div class="">
                            
                                <div class="form-group files color">
                                    <p style="font-size:12px;">Silahkan mengunduh bukti transfer Anda di bawah ini dengan jumlah yang sesuai
                                        dengan jumlah yang sesuai dengan yang tertulis pada ringkasan belanja, jika jumlah
                                        uang yang diterima tidak sesuai, pihak TitipAja berhak menolak proses pembayaran.
                                    </p>
                                    <input type='file' class ="form-control" name="buktiPembayaran" id="buktiPembayaran" accept='image/*' multiple="" required> 
                                </div>
                            
                        </div>
                        
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
    document.getElementById("demo").innerHTML = "Waktu tersisa: "+hours + ":"
    + minutes + ":" + seconds;
        
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "Waktu tersisa : EXPIRED";
    }
    }, 1000);


    function pilihBank() {
        var bank = document.getElementById('jenisBank').value;
        if (bank=="bca") {
            document.getElementById("bank").innerHTML = "<h4>No. Rekening : coba 731 025 4675</h4>"+
                    "<h5>(Titip Aja)</h5>";
        }
    }

    var divs = ["bank", "bank1", "bank2"];
    var visibleDivId = null;
    function toggleVisibility(divId) {
      if(visibleDivId === divId) {
        visibleDivId = null;
      } else {
        visibleDivId = divId;
      }
      hideNonVisibleDivs();
    }
    function hideNonVisibleDivs() {
      var i, divId, div;
      for(i = 0; i < divs.length; i++) {
        divId = divs[i];
        div = document.getElementById(divId);
        if(visibleDivId === divId) {
          div.style.display = "block";
        } else {
          div.style.display = "none";
        }   
      }
    }

    $('.file-upload').file_upload();

    document.getElementById("gameStart").addEventListener("click", function(){
    setInterval(function time(){

    var d = new Date();
    var hours = 23 - d.getHours();
    var min = 60 - d.getMinutes();
    if((min + '').length == 1){
        min = '0' + min;
    }
    var sec = 60 - d.getSeconds();
    if((sec + '').length == 1){
            sec = '0' + sec;
    }
    jQuery('#the-final-countdown p').html(hours+':'+min+':'+sec)
    }, 1000);

    console.log(countdown);
    });
    
</script> 