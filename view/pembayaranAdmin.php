
<style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: white;
    }

    body{
        background-color:white;
    }
</style>

<ul class="nav" style="margin-top:7%; background-color:white; margin-left:2%;">
    <li class="nav-item w3-text-theme w3-text-theme">
        <a class="nav-link w3-text-theme" href="homeAdmin" style="height: 100%;">Post Trip</a>
    </li>
    <li class="nav-item w3-text-theme w3-text-theme">
        <a class="nav-link w3-text-theme" href="lengkapDaftar" style="height: 100%;">Lengkapi Pendaftaran</a>
    </li>
    <li class="nav-item w3-text-theme w3-text-theme">
        <a class="nav-link text-center " href="persetujuanBarang"  style="height: 100%;">Form Barang</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link text-center" href="pembayaranAdmin" style="height: 100%; border-bottom: 4px solid #6699cc;">Pembayaran</a>  
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link" href="#" style="height: 100%;">Mengirim Uang</a>
    </li>
</ul>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">
    <p class="" style="width:100%;border-bottom:1px solid #6699cc"> 
        Sekarang anda berada di halaman :
        <a class="" href="#" style="text-decoration:none; color:#6699cc "><b>Pembayaran</b></a>
        <i class="fa fa-angle-double-right" style=""></i>  
        <a class="" href="#" style="text-decoration:none; ">Detail Pembayaran</a>
    </p>
    <div class="container" style="margin-top:7%;">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 700px; ">

        <div class="w3-bar w3-theme-l3" style="margin-bottom:5%;">
            <button class=" tablink w3-bar-item w3-button w3-light-grey" onclick="openContent(this,'Pending')" >Pending</button>
            <button class=" tablink w3-bar-item w3-button" onclick="openContent(this,'Verified')">Verified</button>
            <button class=" tablink w3-bar-item w3-button"  onclick="openContent(this,'Unverified')">Unverified</button>
        </div>  
            
                <div id="Pending" class="tabs">
                    <form method="GET" action="detailPembayaran">    
                        <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengirim</th>
                            <th>Email Pengirim</th>
                            <th>Waktu Pengiriman</th>
                            <th>Detail</th>
                        </tr>
                    
                        <?php
                        $i=1;
                        foreach($result as $key=>$value){ 
                            echo"<tr>";
                            echo"<input type='hidden' name='namaPembeli' value='$value->username'>";
                            echo"<input type='hidden' name='idTrip' value='$value->market'>";
                            echo"<td>$i</td>";
                            echo "<td>Nama Pengirim</td>";
                            echo "<td>".$value->email."</td>";
                            echo "<td>Waktu Pengiriman</td>";
                            echo "<td class='text-center'><input class='btn btn-primary btn-sm' style='font-size:15px' type='submit' value='Detail'></td>";
                            echo"</tr>";
                            $i++;
                        }
                        ?>
                        </table>
                    </form>
                </div>

                <div id="Verified" class="tabs" style="display: none;">
                    ini halaman verified
                </div>
            
                <div id="Unverified" class="tabs" style="display: none">
                    Ini Halaman Unverified
                </div>  

            
        </div>
    </div> 
</fieldset>

<script>
    function openContent(obj, idContentContainer){
        var i,x,tablinks;

        x=document.getElementsByClassName("tabs");
        for(i=0; i<x.length;i++){
            x[i].style.display="none";
            x[i].style.color="black";
        }

        tablinks = document.getElementsByClassName("tablink");
        for(i=0; i<tablinks.length;i++){
            tablinks[i].className= tablinks[i].className.replace("w3-light-grey","");
        }
        
        document.getElementById(idContentContainer).style.display='block';

        obj.className+="w3-light-grey";
        
    }
</script>
