    <ul class="nav nav-tabs justify-content-left" style="background-color:white; width:100%; margin-top:-2%;position: static;"> 
        <li class="nav-item">
            <a class="nav-link text-center w3-text-theme" href="market" style="height: 100%; ">Wanted Item</a>
        </li>
        <li class="nav-item w3-text-theme">
            <a class="nav-link text-center w3-text-theme" href="offerMarket" style="height: 100%; border-bottom: 4px solid red;">Offer Item</a>
        </li>
    </ul>

<div style="margin-top:1%; margin-bottom:2%;margin-top:50px; padding-left:15px">
    <h6>Want a offer <a id="offer" href="" onclick="validasi()" style="color:#b74449;">+Offer</a></h6>
</div>

<div class="container-fluid">
    <div class="row">  
        <div class="col"> 
            <div class="w3-card w3-white">
                <p align='left' style='padding:10px; background-color:#6699cc'><label style="color:white;">Nama Barang</label></p>
                <img src="image/sepatu.jpg" style="width:200px;height=150px">
                <h4 align='left' style='padding-bottom:10px;padding-left:10px;color:#6699cc'>Rp. 200.000</h4>
            </div>
        </div>
        <div class="col">
            <div class="w3-card w3-white">
                <p align='left' style='padding:10px; background-color:#6699cc'><label style="color:white;">Nama Barang</label></p>
                <img src="image/sepatu.jpg" style="width:200px;height=150px">
                <h4 align='left' style='padding-bottom:10px;padding-left:10px;color:#6699cc'>Rp. 200.000</h4>
            </div>
        </div>
        <div class="col">
            <div class="w3-card w3-white">
                <p align='left' style='padding:10px; background-color:#6699cc'><label style="color:white;">Nama Barang</label></p>
                <img src="image/sepatu.jpg" style="width:200px;height=150px">
                <h4 align='left' style='padding-bottom:10px;padding-left:10px;color:#6699cc'>Rp. 200.000</h4>
            </div>
        </div>
        <div class="col">
            <div class="w3-card w3-white">
                <p align='left' style='padding:10px; background-color:#6699cc'><label style="color:white;">Nama Barang</label></p>
                <img src="image/sepatu.jpg" style="width:200px;height=150px">
                <h4 align='left' style='padding-bottom:10px;padding-left:10px;color:#6699cc'>Rp. 200.000</h4>
            </div>
        </div>
        <div class="col">
            <div class="w3-card w3-white">
                <p align='left' style='padding:10px; background-color:#6699cc'><label style="color:white;">Nama Barang</label></p>
                <img src="image/sepatu.jpg" style="width:200px;height=150px">
                <h4 align='left' style='padding-bottom:10px;padding-left:10px;color:#6699cc'>Rp. 200.000</h4>
            </div>
        </div>  
        <!-- break -->
        <?php
        foreach($result as $key => $value){
            echo "<div class='col'>"; 
            echo    "<div class='w3-card w3-white'>";
            echo        "<p align='left' style='padding:10px; background-color:#6699cc'><label style='color:white;'>".$value->namaBarang."</label></p>";
            echo        "<img src='image/market/".$value->gambarBarang."' style='width:200px;height=150px'>";
            echo        "<h4 align='left' style='padding-bottom:10px;padding-left:10px;color:#6699cc'>RP".$value->hargaBarang."</h4>";
            echo"    </div>
            </div>";
        }
        ?>
    </div>
</div>

<script>
    function validasi(){
        <?php
        if($nama==null){
            
            $message = "Login Terlebih Dahulu";
            echo "alert('$message');";
            
        }
        else{
            echo " document.getElementById('offer').href='addOfferMarket';";
        }
        ?>
    }
</script>  






