<link rel="stylesheet" href="http://localhost:80/prosi_JASTIP/view/layout/style/styleRegister.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h1 style="text-align: center;">titipaja</h1><br><br>
<form class="SignUp-form" action="registerKlik" method="POST">
<div class="container" style="width: 70%;">
            <h3>Register</h3>
            <p>Silahkan mengisi form ini untuk membuat akun.</p>
            <hr>
            <label for="nama"><b>Nama</b></label>
            <input type="text" placeholder="Masukkan Nama" name="nama" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Masukkan Email" name="email" required>
            
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="noHp"><b>No. HP</b></label>
            <input type="text" placeholder="Masukkan No.Hp" name="noHp" required>

            <label for="alamat"><b>Alamat</b></label>
            <input type="text" placeholder="Masukkan Alamat" name="alamat" required>
            
            <label for="kelurahan"><b>Kelurahan</b></label>
            <input type="text" placeholder="Masukkan Kelurahan" name="kelurahan" required>
            
            <label for="kecamatan"><b>Kecamatan</b></label>
            <input type="text" placeholder="Masukkan Kecamatan" name="kecamatan" required>

            <label for="kota"><b>Kota</b></label>
            <input type="text" placeholder="Masukkan Kota" name="kota" required>
            
            <label for="provinsi"><b>Provinsi</b></label>
            <input type="text" placeholder="Masukkan Provinsi" name="provinsi" required>
            <hr>

            <input type="submit" class="w3-btn w3-theme" style="width:100%;" value="register">
        </div>
</form>