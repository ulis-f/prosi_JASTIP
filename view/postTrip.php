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
                        <td><input id="waktuAwal" type="datetime-local" placeholder="Waktu Keberangkatan" name="waktuAsal"></td>
                        <td></td>
                        <td><input id="waktuAkhir" type="datetime-local" placeholder="Waktu Tiba" name="waktuTujuan"></td>
                    </tr>
                </table>
                <br>
                <h4>Upload Tiket</h4>
                <input type='file' name='fotoTiket' accept='image/*'>  
                
                
                <br>
                <br>
                <br>
                <br> 

                <div class="w3-right" style="padding-top: 100px; padding-right:1%"> 
                    <button class="btn btn-danger btn-sm" style="font-size:17px;">Cancel</button>
                    <input id="submit" type="submit" class="btn btn-primary btn-sm" style="font-size:17px;" value="Submit">
                </div>
            </form>
        </div>
    </div>

    <script>
        
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();


        today = yyyy + '-' + mm + '-' + dd +'T00:00';

        var max = new Date();
        var yyyy1 = max.getFullYear()+1;
        max = yyyy1 + '-' + mm + '-' + dd +'T00:00'

  
        var waktuAwal = document.getElementById("waktuAwal");
        var attValue = document.createAttribute("value");
        var attMin = document.createAttribute("min");
        var attMax = document.createAttribute("max");
        attValue.value = today;
        attMin.value = today;
        attMax.value = max;
        waktuAwal.setAttributeNode(attValue);
        waktuAwal.setAttributeNode(attMin);
        waktuAwal.setAttributeNode(attMax);

        var waktuAkhir = document.getElementById("waktuAkhir");
        var att1Value = document.createAttribute("value");
        var att1Min = document.createAttribute("min");
        var att1Max = document.createAttribute("max");
        att1Value.value = today;
        att1Min.value = today;
        att1Max.value = max;
        waktuAkhir.setAttributeNode(att1Value);
        waktuAkhir.setAttributeNode(att1Min);
        waktuAkhir.setAttributeNode(att1Max);
    </script>