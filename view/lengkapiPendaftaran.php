<link rel="stylesheet" href="http://localhost:80/prosi_JASTIP/view/layout/style/style.css">
<div class="container">
        <div class="w3-card-4 w3-white" style="width:60%; margin: auto; padding: 50px; height: 1000px; ">
            <h2>Pendaftaran Tambahan</h2>
            <br>
            <br>
            <br>
            <form action="lengkapKlik" method="POST" enctype="multipart/form-data">
                <div class="container"> 
                    <label for="nik"><b>NIK</b></label>
                    <input type="text" placeholder="no KTP" name="nik">
                    <br>
                    <label for="bank"><b>Nama Bank</b></label>
                    <br>
                    <br>
                    <select id="bank" name="namaBank"> 
                        <option value="BCA">BCA</option>
                        <option value="BRI">BRI</option>
                        <option value="BNI">BNI</option>
                        <option value="OCBC">OCBC NISP</option>
                        <option value="MANDIRI">MANDIRI</option>
                    </select>
                    <br>
                    <br>
                    <label for="noRek"><b>No. Rekening</b></label>
                    <br>
                    <div style="font-size: 10px;">(Contoh input: BCA: 123-456-7891, BNI: 12-3456-7891 ,BRI: 1234-56-789123-45-6, OCBC: 123.45.6789.123, MANDIRI: 123-45-6789123-4 )</div>
                    <input type="text" placeholder="Nomor Rekening" name="noRek">
                    <br>
                    <h4>Upload Foto KTP</h4> 
                    <div style="font-size: 10px;">(Maksimum Size: 10MB)</div>
                    <input type='file' name="fotoKTP" id="fotoKTP" accept='image/*'>  
                    <br>
                    <h4>Upload Foto Swafoto</h4>  
                    <div style="font-size: 10px;">(Maksimum 10MB)</div>
                    <input type='file' name="fotoSelfie" id="fotoSelfie" accept='image/*'>  
                    <br>
                     
                </div>

                <br>
                <br>
                <br> 

                <div class="w3-right" style="padding-top: 100px;"> 
                    <input type="submit" value="subimt" class="w3-btn w3-theme">
                </div>

            </form>
        </div>
    </div>

    
    
