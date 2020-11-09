<style>
html, body, h1, h2, h3, h4, h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">
<div class="w3-container w3-content" style="margin-top:5%;">     
    <div class="w3-card w3-round w3-white" style="width:50%;">
        <div class="w3-container">
        <h4 class="w3-center">Profile Traveller</h4>  
            <div class="w3-center">
            <?php
                foreach($result as $key => $value){    
                    if($value->gambarProfile!=null){
                        echo "<img src='../view/image/".$value->gambarProfile."' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                    }
                    else{
                        echo "<img src='../view/image/user.png' class='w3-circle' style='height:106px;width:106px' alt='Avatar'></p>";
                    }
                }   
            ?>
            </div> 
                <hr>
                <?php  
                    foreach($result as $key=>$value){
                        echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-user fa-fw w3-margin-right w3-text-theme'></i>".$value->username."</p>";
                        echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-phone fa-fw w3-margin-right w3-text-theme'></i>".$value->noHp."</p>";
                        echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-envelope fa-fw w3-margin-right w3-text-theme'></i>".$value->email."</p>";
                        echo"<p style='margin-bottom:1%; margin-top:1%;'><i class='fa fa-home fa-fw w3-margin-right w3-text-theme'></i>".$value->alamat."</p>";
                    }
                ?>   
        </div>
    </div>
</div>

