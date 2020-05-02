    <div class="w3-container">  
        <div id="postTrip" class="tabs w3-container"> 
            <div class="" style="width: 80%; margin-left: 10%; margin-right: 10%; margin-top: 5%;" >
				<div class="w3-card-4 w3-white" style="width:30%; float: left;margin-right: 5%; padding: 15px;" onclick="document.getElementById('persetujuan').style.display='block'" >
					<div class="">
						<label for="namaTraveller">Nama Traveller</label>
                    </div>
                    gambar
				</div>
			</div>
        </div>

    </div>

    <div id="persetujuan" class="modal">
        <form class="modal-content animate" action="#" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('persetujuan').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            <div class="container"> 
                <div class="" onclick="document.getElementById('persetujuan').style.display='block'" >  
                    <h2>Post Trip</h2>
                    <br>
                    foto trip disini
                    <table>
                        <tr>
                            <td>Tujuan</td>
                            <td></td>
                            <td>Asal</td>
                        </tr>
                        <tr>
                            <td>nama asal</td>
                            <td><i class="fa fa-angle-double-right" style="font-size:24px"></i></td>
                            <td>nama tujuan</td>
                        </tr>
                        <tr>
                            <td>waktu berangkat</td>
                            <td></td>
                            <td>waktu tiba</td>
                        </tr>
                    </table>
                    <br>
                    <input type="radio" id="verified" name="verified" value="verified">Verified<br>
                    <input type="radio" id="unverified" name="unverified" value="unverified">Unverified
                    <br> <br>
                    <label for="note">Note</label> <br>
                    <textarea name="" id="" cols="30" rows="5"></textarea>
                    <br><br><br><br><br>
                    <div class="w3-btn w3-right" style="background-color:#b74449; color: white;">Submit</div>
                </div>
            </div>
        </form>
    </div>