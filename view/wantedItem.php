<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <ul class="nav" style="width:100%;"> 
        <li class="nav-item" style="margin-left:2%;">
            <a class="nav-link text-center w3-text-theme" href="market" style="height: 100%;border-bottom: 4px solid #6699cc; ">Wanted Item</a>
        </li>
        <li class="nav-item w3-text-theme">
            <a class="nav-link text-center w3-text-theme" href="offerMarket" style="height: 100%; ">Item Offer</a>
        </li>
    </ul> 


<style>
    .select2-container .select2-selection--single{
        height:50px !important;
        padding:2%;
        margin-bottom:5px;
        margin-top:5px;
    }
    .select2-container--default .select2-selection--single{
        border: 1px solid #6699cc !important; 
        border-radius: 1px !important; 
    }

    body{
        background-color:white;
    }

    
</style>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">

    <p class="" style="width:100%;border-bottom:1px solid #6699cc"> 
        Sekarang anda berada di halaman :
        <a class="" href="market" style="text-decoration:none; ">Wanted Item</a>
        <i class="fa fa-angle-double-right" style=""></i>
        <a class="" href="#" style="text-decoration:none; color:#6699cc"><b>Item Request</b></a>
    </p>

    <div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 850px; ">
            <h2>Permintaan Barang</h2>
            <br>
            <form action="wantedKlik" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td style="width: 250px;">Nama Barang</td>
                    <td>:</td>
<<<<<<< HEAD
                    <td><input type="text" name="nama" placeholder="Masukkan Nama Barang"></td>
=======
                    <td><input type="text" name="nama" placeholder="Masukkan Nama Barang" style="width: 255px;"></td>
>>>>>>> master
                </tr>
                <tr>
                    <td>Jumlah Barang</td>
                    <td>:</td>
                    <td><input class="w3-input w3-border w3-border-theme" name="jumlah" type="number" value="1"></td>
                </tr>
              
                <tr>
                    <td><label for="kategori">Kategori Barang</label></td>
                    <td>:</td>
                    <td><?php
<<<<<<< HEAD
                            echo "<select class='form-control select2' id='kategori' name='kategori' style=''>";
=======
                            echo "<select class='form-control select2' id='kategori' name='kategori' style='width:250px;'>";
>>>>>>> master
                            foreach($kategori as $key=>$value){
                            echo "<option value='".$value->id."'>".$value->nama."</option>";
                            }
                    ?></td>
                </tr>
                <tr>
                    <td>Deskripsi Barang*</td>
                    <td>:</td>
                    <td>
                        <textarea name="deskripsi" id="" cols="30" rows="5"></textarea>
                    </td>
                </tr>
            </table>
            <br>
            <h4>Upload Gambar</h4>
            <input type='file' name="gambar" id="gambar" accept='image/*'>
            <br>
            <br>
            <p style="color:red;font-size:13px;">*Harus disertakan kondisi barang dan lokasi barang</p>
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
</script>