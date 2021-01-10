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
            <a class="nav-link text-center " href="persetujuanBarang"  style="height: 100%; ">Form Barang</a>
        </li>
        <li class="nav-item w3-text-theme">
            <a class="nav-link" href="pembayaranAdmin" style="height: 100%;">Pembayaran</a>  
        </li>
        <li class="nav-item w3-text-theme">
            <a class="nav-link" href="pengirimanUang" style="height: 100%;">Pengiriman Uang</a>
        </li>
        <li class="nav-item w3-text-theme">
            <a class="nav-link" href="#" style="height: 100%; border-bottom: 4px solid #6699cc;">Laporan</a>
        </li>
    </ul>
    
<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">   
    <div class="container" style="">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 700px; ">
            <h3><b>Laporan</b></h3>
            <div style="margin-top: 25px; margin-bottom: 20px; margin-right: 20px;">
                <div class="container">
                    <div class="w3-bar" style="margin-bottom: 3%;">
                        <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                        border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id1')">Pendapatan</button>
                        <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                        border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id2')">Traveller</button>  
                        <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                        border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id3')">Customer</button>  
                    </div>

                    <div id="id1" class="tabs">
                        <div class="input-group md-form form-sm form-2 pl-0">
                            <select class="form-control">
                                <option value="Semua">Semua</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="July">July</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                            <div class="input-group-append">
                              <button class="btn-primary">Cari</button>
                            </div>
                        </div>              
                        
            
                        <table class="table table-striped" style="margin-top:2%;">
                            <tr>
                                <th>No</th>
                                <th>Market</th>
                                <th>Bulan</th>
                                <th>Total Pendapatan</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Offer</td>
                                <td>Januari</td>
                                <td>Total</td>
                            </tr>
                        </table>            
                    </div>
        
                    <div id="id2" class="tabs" style="display: none;">
                        <table class="table table-striped" style="margin-top:2%;">
                            <p>Traveller yang paling banyak melakukan upload trip dalam kurun waktu 3 bulan terakhir</p>
                            <tr>
                                <th>No</th>
                                <th>Nama Traveller</th>
                                <th>Jumlah Trip</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>nama traveller</td>
                                <td>jumlah trip</td>  
                            </tr>
                        </table> 
                    </div>

                    <div id="id3" class="tabs" style="display: none;">
                        <table class="table table-striped" style="margin-top:2%;">
                            <p>Customer yang paling banyak melakukan transaksi dalam kurun waktu 3 bulan terakhir</p>
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>Jumlah Transaksi</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>nama customer</td>
                                <td>jumlah transksi</td>  
                            </tr>
                        </table> 
                    </div>
                     
                </div>
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
        }

        tablinks = document.getElementsByClassName("tablink");
        for(i=0; i<tablinks.length;i++){
            tablinks[i].className= tablinks[i].className.replace("w3-green","");
        }
        
        document.getElementById(idContentContainer).style.display='block';

        obj.className+="w3-green";
        
    }
</script>

