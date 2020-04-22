<?php
    echo $result;
?>

<form action="hapusAkun" method="post" style="display:inline">
	<input style="width:70px;" type="submit" style="width:70px;" value="DeleteAkun">
</form>

<form action="logout" method="get" style="display:inline">
	<input style="width:70px;" type="submit" style="width:70px;" value="logout">
</form>

<button onclick="gantiPass()">Edit Password</button>

<script>
    function gantiPass(){
        location.href = "editPass";
    }
</script>

