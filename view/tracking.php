<style>
    figure:hover{
            transform: scale(2.4); 
        }

        body {
            background-color: #f9f9f9;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .column {
            width: 48%;
            float :left;
        }

        .column1 {
            width : 48%;
            float : right;
        }

        .table1 {
            width : 100%;
        }

        .table1.td{
            width : 33%;
        }
        .table2 {
            width : 100%;
        }

        .table2.td{
            width : 33%;
        }

        a:link, a:visited {
            background-color: #f44336;
            color: white;
            padding: 9px 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top: 20%;
            border-radius: 25px;
            font-size: 13px;
        }
</style>

    <div class="container">
        <div class="w3-card-4 w3-white" style="padding: 50px; height: 800px; margin-top: 5%;">
            <!-- <p>Maukkan Nomor Resi untuk melakukan pelacakan barang anda</p>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        <form class="">
                            <div class="card-body row no-gutters align-items-center">
                                <div class="col">
                                    <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Masukkan No. Resi">
                                </div>
                               
                                <div class="col-auto">
                                    <button class="btn btn-lg btn-success" type="submit">Cari</button>
                                </div>
                            
                            </div>
                        </form>
                    </div>
                </div> -->
            
            <div style="margin-top: 3%;">
                <!-- <div>
                    <img src='image/tracking/tracking1.PNG'width=50% height=50%>
                    <h4>Pesanan anda sedang diproses</h4>
                </div>

                <div>
                    <img src='image/tracking/tracking2.PNG'width=50% height=50%>
                    <h4>Pesanan anda sedang dikirim</h4>
                    <p>Silahkan <a href="https://www.jne.co.id/id/tracking/trace" style="color: red;">Klik Disini</a> untuk melacak barang anda</p>
                </div>
                
                <div>
                    <img src='image/tracking/tracking3.PNG'width=50% height=50%>
                    <h4>Pesanan anda telah diterima</h4>
                </div> -->
                
                <nav class="navbar navbar-light bg-light">
                        <h5><b>Status Pesanan</b></h5>

                        
                        <div style="float: right;">
                        <button class="btn btn-outline-success" type="button" style="border-bottom-left-radius: 25px; 
                        border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;">Pesanan Diproses</button>
                        <button class="btn btn-outline-success active" type="button" style="border-bottom-left-radius: 25px; 
                        border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;">Pesanan Dikirim</button>
                        <button class="btn btn-outline-success" type="button" style="border-bottom-left-radius: 25px; 
                        border-top-left-radius: 25px; border-bottom-right-radius: 25px; border-top-right-radius: 25px;">Pesanan Diterima</button>  
                    </div>
                </nav>
            </div>

            <fieldset class="" style="border:#dddddd 1px solid">
                <div>
                    <div class="column" style="border-right:#dddddd 1px solid;">
                        <div>
                            <div style="width: 30%; height: 50px; float: left;">
                                <figure><img src='image/market/topi.jpg' style="width: 100%; height: 100%;"></figure><br>
                            </div>

                            <div style="width: 30%; float: left; ">
                                <h5><b>Topi NY</b></h5>
                                <p><b style='color:#ffa500'>Rp. 300000</b></p>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="column1">
                        <div style="float: left;">
                            <h5><b>No. Resi</b></h5>
                            <b style='color:#ffa500'>47346</b> 
                        </div>
                          
                        <div style="float: right;">
                            <a href="https://www.jne.co.id/id/tracking/trace">Lacak Pesanan</a>
                        </div>

                    </div>  
                    
                </div>
            </fieldset>

        </div>
    </div>