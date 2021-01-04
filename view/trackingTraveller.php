<style>
    body {
        background-color: white;
    }

    figure:hover {
        transform: scale(2.4);
    }
</style>

<ul class="nav" style="width:100%;">
    <li class="nav-item" style="margin-left:2%;">
        <a class="nav-link text-center w3-text-theme" href="tracking" style="height: 100%;">Customer</a>
    </li>
    <li class="nav-item w3-text-theme">
        <a class="nav-link text-center w3-text-theme" href="#" style="height: 100%; border-bottom: 4px solid #6699cc;">Traveller</a>
    </li>
</ul>

<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">
    <div class="container">
        <div class="w3-card-4 w3-white" style="padding: 50px; height: 800px; margin-top: 2%;">

            <div class="w3-bar" style="margin-bottom: 3%;">
                <h5><b>Status Pesanan</b></h5>
                <button class="btn btn-outline-success tablink w3-green" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id1')">Pesanan Diproses</button>
                <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id2')">Pesanan Dikirim Ke Indonesia</button>
                <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id3')">Pesanan Tiba Di Indonesia</button>
                <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id4')">Pesanan Dikirim</button>
                <button class="btn btn-outline-success tablink" type="button" style="border-bottom-left-radius: 25px; 
                border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;" onclick="openContent(this,'id5')">Pesanan Diterima</button>
            </div>

            <div id="id1" class="tabs">
                <?php
                foreach ($result1 as $key => $value) {
                    echo "
                    <form action='statusTracking' method='POST' enctype='multipart/form-data'>
                    <fieldset>
                    <table class=''>
                        <tr>
                            <td style='float: left; padding: 3px;'><h5>" . $value->kotaAwal . "</h5></td>
                            <td style='float: right; padding-right: 10px ;'><h5>" . $value->kotaTujuan . "</h5></td>
                            <input type='hidden' name='namaBarang' value='$value->namaBarang'>
                            <td rowspan='2' style='width: 15%; border-left:#dddddd 1px solid; padding-left:10px;color:#ffa500;font-size:15px;'><b>" . $value->namaBarang . "</b></td>
                            <td rowspan='2' style='width: 3%; padding: 3px;'><i class='fa fa-angle-double-right' style='font-size:25px;'></i></td>
                            <td style='width: 40%; padding: 10px; '><input required type='checkbox' name='pesananKirimKeIndo' value='pesananKirimKeIndo'>
                            <label for='pesananKirimKeIndo' style='font-weight: normal; font-size:13px;'>Ubah status menjadi Pesanan dikirim ke Indonesia</label></td>
                            
                        </tr>

                        <tr>
                            <td style='float:left; padding: 3px;font-size:13px;'><b>" . $value->waktuAwal . "</b></td>
                            <td style='float: right; padding-right: 10px;font-size:13px;'><b>" . $value->waktuAkhir . "</b></td>
                            <td><input type='submit' class='btn btn-primary btn-sm' style='float: right;padding: 9px 7px;border-radius: 25px;' value ='Ubah Status'></td> 
                        </tr>
                            
            
                    
                            
                    </table>
                </fieldset>
                </form>";
                } ?>
            </div>

            <div id="id2" class="tabs" style="display: none;">
                
                <?php
                foreach ($result2 as $key => $value) {
                    echo "
                    <form action='statusTracking' method='POST' enctype='multipart/form-data'>
                    <fieldset>
                    <table class=''>
                        <tr>
                            <td style='float: left; padding: 3px;'><h5>" . $value->kotaAwal . "</h5></td>
                            <td style='float: right; padding-right: 10px ;'><h5>" . $value->kotaTujuan . "</h5></td>
                            <input type='hidden' name='namaBarang' value='$value->namaBarang'>
                            <td rowspan='2' style='width: 15%; border-left:#dddddd 1px solid; padding-left:10px;color:#ffa500;font-size:15px;'><b>" . $value->namaBarang . "</b></td>
                            <td rowspan='2' style='width: 3%; padding: 3px;'><i class='fa fa-angle-double-right' style='font-size:25px;'></i></td>
                            <td style='width: 40%; padding: 10px; '><input required type='checkbox' name='pesananTibaDiIndo' value='pesananTibaDiIndo'>
                            <label for='pesananTibaDiIndo' style='font-weight: normal; font-size:13px;'>Ubah status menjadi Pesanan Tiba di Indonesia</label></td>
                            
                        </tr>

                        <tr>
                            <td style='float:left; padding: 3px;font-size:13px;'><b>" . $value->waktuAwal . "</b></td>
                            <td style='float: right; padding-right: 10px;font-size:13px;'><b>" . $value->waktuAkhir . "</b></td>
                            <td><input type='submit' class='btn btn-primary btn-sm' style='float: right;padding: 9px 7px;border-radius: 25px;' value ='Ubah Status'></td> 
                        </tr>
                            
                    </table>
                </fieldset>
                </form>";
                } ?>
            </div>

            <div id="id3" class="tabs" style="display: none">
                
                <?php
                foreach ($result3 as $key => $value) {
                    echo "
                    <form action='statusTracking' method='POST' enctype='multipart/form-data'>
                    <fieldset>
                    <table class=''>
                        <tr>
                            <td style='float: left; padding: 3px;'><h5>" . $value->kotaAwal . "</h5></td>
                            <td style='float: right; padding-right: 10px ;'><h5>" . $value->kotaTujuan . "</h5></td>
                            <input type='hidden' name='namaBarang' value='$value->namaBarang'>
                            <td rowspan='2' style='width: 15%; border-left:#dddddd 1px solid; padding-left:10px;color:#ffa500;font-size:15px;'><b>" . $value->namaBarang . "</b></td>
                            <td rowspan='2' style='width: 3%; padding: 3px;'><i class='fa fa-angle-double-right' style='font-size:25px;'></i></td>
                            <td style='width: 40%; padding: 10px; '><input required type='checkbox' name='pesananDikirim' value='pesananDikirim'>
                            <label for='pesananDikirim' style='font-weight: normal; font-size:13px;'>Ubah status menjadi Pesanan Dikirim</label></td>
                            
                        </tr>

                        <tr>
                            <td style='float:left; padding: 3px;font-size:13px;'><b>" . $value->waktuAwal . "</b></td>
                            <td style='float: right; padding-right: 10px;font-size:13px;'><b>" . $value->waktuAkhir . "</b></td>
                            <td>
                            <input required class='w3-input w3-border w3-border-theme' style='float:left;' placeholder='Masukkan No.Resi' type='text' id='noResi' name='noresi'>
                            <input type='submit' class='btn btn-primary btn-sm' style='float: right;padding: 9px 7px;border-radius: 25px;' value ='Ubah Status'>
                            </td> 
                        </tr>
                            
                    </table>
                </fieldset>
                </form>";
                } ?>
            </div>

            <div id="id4" class="tabs" style="display: none;">
                <?php
                foreach ($result4 as $key => $value) {
                    echo "
                    <form action='statusTracking' method='POST' enctype='multipart/form-data'>
                    <fieldset>
                    <table class=''>
                        <tr>
                            <td style='float: left; padding: 3px;'><h5>" . $value->kotaAwal . "</h5></td>
                            <td style='float: right; padding-right: 10px ;'><h5>" . $value->kotaTujuan . "</h5></td>
                            <input type='hidden' name='namaBarang' value='$value->namaBarang'>
                            <td rowspan='2' style='width: 15%; border-left:#dddddd 1px solid; padding-left:10px;color:#ffa500;font-size:15px;'><b>" . $value->namaBarang . "</b></td>
                            <td rowspan='2' style='width: 3%; padding: 3px;'><i class='fa fa-angle-double-right' style='font-size:25px;'></i></td>
                            <td style='width: 40%; padding: 10px; '><input required type='checkbox' name='pesananDiterima' value='pesananDiterima'>
                            <label for='pesananDiterima' style='font-weight: normal; font-size:13px;'>Ubah status menjadi Pesanan Diterima</label></td>
                            
                        </tr>

                        <tr>
                            <td style='float:left; padding: 3px;font-size:13px;'><b>" . $value->waktuAwal . "</b></td>
                            <td style='float: right; padding-right: 10px;font-size:13px;'><b>" . $value->waktuAkhir . "</b></td>
                            <td><input type='submit' class='btn btn-primary btn-sm' style='float: right;padding: 9px 7px;border-radius: 25px;' value ='Ubah Status'></td> 
                        </tr>
                            
                    </table>
                </fieldset>
                </form>";
                } ?>
            </div>

            <div id="id5" class="tabs" style="display: none">
                
                <?php
                foreach ($result5 as $key => $value) {
                    echo "<fieldset>
                    <table class=''>
                        <tr>
                            <td style='float: left; padding: 10px;width: 50%;'><h5>" . $value->kotaAwal . "</h5></td>
                            <td style='float: right; padding: 10px ;width: 50%;'><h5>" . $value->kotaTujuan . "</h5></td>
                            <td rowspan='2' style='width: 50%; border-left:#dddddd 1px solid; padding-left:10px;color:#ffa500;font-size:15px;'><b>" . $value->namaBarang . "</b></td>
                        </tr>
  
                        <tr>
                            <td style='float:left; padding: 10px;font-size:13px;'><b>" . $value->waktuAwal . "</b></td>
                            <td style='float: right; padding: 10px;font-size:13px;'><b>" . $value->waktuAkhir . "</b></td>
                        </tr>
                            
                    </table>
                </fieldset>";
                } ?>
            </div>
        </div>
    </div>
</fieldset>


<fieldset class="" style="margin-left:2%; margin-right:2%; border: #6699cc 1px solid">
    <div class="container">
        <div class="w3-card-4 w3-white" style="padding: 50px; height: 800px; margin-top: 5%;">

            <?php
            foreach ($result as $key => $value) {
                echo "<fieldset>
                <table class='no-spacing' cellspacing='0'>
                    <tr>";
                echo "<td rowspan='2' style='width: 15%; padding: 10px;'><b>" . $value->namaBarang . "</b></td>
                        <td rowspan='2' style='width: 3%; padding: 10px;'><i class='fa fa-angle-double-right' style='font-size:36px;'></i></td>
                        <td rowspan='2' style='width: 15%; padding: 10px; border-right:#dddddd 1px solid;'>Dikirim ke indonesia</td>";

                echo "<div style='width: 46%;'>
                            <td style='float: left; width: 45%; padding: 10px;'>
                                <h5>" . $value->kotaAwal . "</h5>
                            </td>
                            <td style='float: right; padding: 10px ; border-right:#dddddd 1px solid;'>
                                <h5>" . $value->kotaTujuan . "</h5>
                            </td>
                        </div>";



                echo "<td rowspan='2' onclick=" . "document.getElementById('ubahStatus').style.display='block'" . " style='width: 10%; padding: 10px;border-left:#dddddd 1px solid;'>
                        <button class='btn btn-primary btn-sm' style='float: right;padding: 9px 7px;margin-top: 5%;border-radius: 25px;'>Ubah Status</button></td>
                    </tr>

                    <tr>";


                echo "<td style='float:left; padding: 10px;'><b>" . $value->waktuAwal . "</b></td>
                        <td style='float: right; padding: 10px;'><b>" . $value->waktuAkhir . "</b></td>";

                echo "</tr>
                </table>
            </fieldset>
            
            
            <div id='ubahStatus' class='w3-modal'>
                <div class='w3-modal-content' style='border-radius: 15px; width: 55%;'>
                    <div class='w3-container'>
                        <span onclick=" . "document.getElementById('ubahStatus').style.display='none'" . " class='w3-button w3-display-topright'>&times;</span>

                        <div style='margin-top: 25px; margin-bottom: 20px; margin-right: 20px;'>
                            <div class='container'>
                                <div class='btn-group-vertical' style='width:50%; float: left; margin-right: 2%;'>
                                    <button type='button' class='btn tablink w3-light-grey w3-text-theme' class='active' name='statusBarang' id='pesananDiproses' value='pesananDiproses' onclick=" . "toggleVisibility('status1');" . ">Pesanan Diproses</button>
                                    <button type='button' class='btn tablink w3-light-grey w3-text-theme' name='statusBarang' id='pesananKirimKeIndo' value='pesananKirimKeIndo' onclick=" . "toggleVisibility('status2');" . ">Pesanan Dikirim Ke Indonesia</button>
                                    <button type='button' class='btn tablink w3-light-grey w3-text-theme' name='statusBarang' id='pesananTibaDiIndo' value='pesananTibaDiIndo' onclick=" . "toggleVisibility('status3');" . ">Pesanan Tiba Di Indonesia</button>
                                    <button type='button' class='btn tablink w3-light-grey w3-text-theme' name='statusBarang' id='pesananDikirim' value='pesananDikirim' onclick=" . "toggleVisibility('status4');" . ">Pesanan Dikirim</button>
                                    <button type='button' class='btn tablink w3-light-grey w3-text-theme' name='statusBarang' id='pesananDiterima' value='pesananDiterima' onclick=" . "toggleVisibility('status5');" . ">Pesanan Diterima</button>
                                </div>


                                <form action='statusTracking' method='POST' enctype='multipart/form-data'>";


                echo "<input type = 'hidden' name = 'namaBarang' value = '" . $value->namaBarang . "'";

                echo "</form>

                                <div class='inner_div'>
                                    <div id='status1'>
                                        <div style='float: right;width: 48%;'>
                                            <div style='margin-top: 20%;'>
                                                <input type='checkbox' name='pesananDiproses' value='pesananDiproses'>
                                                <label for='pesananDiproses'>Pesanan Diproses</label><br>
                                            </div>
                                            
                                            <div class='w3-right' style='padding-top: 10%; padding-right:1%'>
                                                <button class='w3-btn w3-theme' name='pesananDiproses'>Simpan</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id='status2' style='display: none;'>
                                        <div style='float: right;width: 48%;'>
                                            <div style='margin-top: 20%;'>
                                                <input type='checkbox' name='pesananKirimKeIndo' value='pesananKirimKeIndo'>
                                                <label for='pesananKirimKeIndo'>Pesanan Dikirim Ke Indonesia</label><br>
                                            </div>
                                            <div class='w3-right' style='padding-top: 10%; padding-right:1%'>
                                                <button class='w3-btn w3-theme' name='pesananKirimKeIndo'>Simpan</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id='status3' style='display: none;'>
                                        <div style='float: right;width: 48%;'>
                                            <div style='margin-top: 20%;'>
                                                <input type='checkbox' name='pesananTibaDiIndo' value='pesananTibaDiIndo'>
                                                <label for='pesananTibaDiIndo'>Pesanan Tiba di Indonesia</label><br>
                                            </div>
                                            <div class='w3-right' style='padding-top: 10%; padding-right:1%'>
                                                <button class='w3-btn w3-theme' name='pesananTibaDiIndo'>Simpan</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id='status4' style='display: none;'>
                                        <div style='float: right;width: 48%;'>
                                            <div>
                                                <input type='checkbox' name='pesananDikirim' value='pesananDikirim'>
                                                <label for='pesananDikirim'>Pesanan Dikirim</label><br>
                                            </div>
                                            <label for=''>No. Resi</label>
                                            <input required class='w3-input w3-border w3-border-theme' placeholder='Masukkan No.Resi' type='text' id='noResi' name='noresi'>
                                            <div class='w3-right' style='padding-top: 10%; padding-right:1%'>
                                                <button class='w3-btn w3-theme' name='pesananDikirim'>Simpan</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id='status5' style='display: none;'>
                                        <div style='float: right;width: 48%;'>
                                            <div style='margin-top: 20%;'>
                                                <input type='checkbox' name='pesananDiterima' value='pesananDiterima'>
                                                <label for='pesananDiterima'>Pesanan Diterima</label><br>
                                            </div>
                                            <div class='w3-right' style='padding-top: 10%; padding-right:1%'>
                                                <button class='w3-btn w3-theme' name='pesananDiterima'>Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>

                            </div>

                        </div>


                    </div>



                </div>
            </div>   
        ";
            } ?></div>

    </div>
</fieldset>

<script>
    var divs = ["status1", "status2", "status3", "status4", "status5"];
    var visibleDivId = null;

    function toggleVisibility(divId) {
        if (visibleDivId === divId) {
            visibleDivId = null;
        } else {
            visibleDivId = divId;
        }
        hideNonVisibleDivs();
    }

    function hideNonVisibleDivs() {
        var i, divId, div;
        for (i = 0; i < divs.length; i++) {
            divId = divs[i];
            div = document.getElementById(divId);
            if (visibleDivId === divId) {
                div.style.display = "block";
            } else {
                div.style.display = "none";
            }
        }
    }

    function openContent(obj, idContentContainer) {
        var i, x, tablinks;

        x = document.getElementsByClassName("tabs");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("w3-green", "");
        }

        document.getElementById(idContentContainer).style.display = 'block';

        obj.className += "w3-green";

    }
</script>