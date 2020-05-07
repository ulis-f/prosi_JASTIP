<div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 650px; ">
            <form action="postKlik" method="POST" enctype="multipart/form-data">
                <h2>Perjalanan</h2>
                <br>
                <table>
                    <h4>Rute</h4>
                    <tr>
                        <td><input type="text" placeholder="Asal" style="width: 255px;" name="asal"></td>
                        <td><i class="fa fa-angle-double-right" style="font-size:24px"></i></td>
                        <td><input type="text" placeholder="Tujuan" style="width: 255px;" name="tujuan"></td>
                    </tr>
                    <tr>
                        <td><input type="datetime-local" placeholder="Waktu Keberangkatan" name="waktuAsal"></td>
                        <td></td>
                        <td><input type="datetime-local" placeholder="Waktu Tiba" name="waktuTujuan"></td>
                    </tr>
                </table>
                <br>
                <h4>Upload Tiket</h4>
                <input type='file' name='fotoTiket' accept='image/*'>  
                
                
                <br>
                <br>
                <br>
                <br> 

                <div class="w3-right" style="padding-top: 100px;"> 
                    <div class="w3-btn" style="background-color:#b74449; color: white;">Cancel</div>
                    <input type="submit" class="w3-btn w3-theme-d2" value="Submit">
                </div>
            </form>
        </div>
    </div>