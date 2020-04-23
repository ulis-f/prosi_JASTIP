<link rel="stylesheet" href="http://localhost:80/prosi_JASTIP/view/layout/style/style.css">
<h1 style="text-align: center;">titipaja</h1><br><br>
<form class="SignUp-form" action="registerKlik" method="POST">
<div class="container" style="width: 70%;">
            <h3>Register</h3>
            <p>Silahkan mengisi form ini untuk membuat akun.</p>
            <hr>
            <label for="nama"><b>Nama</b></label>
            <input type="text" placeholder="Masukkan Nama" name="nama" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Masukkan Email" name="email" >
            
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="noHp"><b>No. HP</b></label>
            <input type="text" placeholder="Masukkan No.Hp" name="noHp" >

            <label for="alamat"><b>Alamat</b></label>
            <input type="text" placeholder="Masukkan Alamat" name="alamat" >
            
            <label for="kelurahan"><b>Kelurahan</b></label>
            <input type="text" placeholder="Masukkan Kelurahan" name="kelurahan" >
            
            <label for="kecamatan"><b>Kecamatan</b></label>
            <input type="text" placeholder="Masukkan Kecamatan" name="kecamatan" >

            <label for="kota"><b>Kota</b></label>
            <input type="text" placeholder="Masukkan Kota" name="kota" >
            
            <label for="provinsi"><b>Provinsi</b></label>
            <input type="text" placeholder="Masukkan Provinsi" name="provinsi" >
            <hr>

            <input type="submit" class="w3-btn" style="background-color:#b74449; color: white;" value="register">
        </div>
</form>