
<div style="margin-bottom: 10px;">
	<button onclick="add()">Add</button>
</div>
<table border="1">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Pengarang</th>
		<th>Status</th>
		<th><a  href="" name="judul" value="$row->id">Aksi</th>
	</tr>
	<?php
		foreach ($result as $key => $row) {
			if ($row->status) {
				$status = "Available";
			}else{
				$status = "Rented until ".$row->return_date;
			}
			echo '
				<tr>
					<td>'.($key+1).'</td>
					<td>'.$row->name.'</td>
					<td>'.$row->author.'</td>
					<td>'.$status.'</td>
					<td>';
			if ($row->status) {
				echo '<button onclick="rent('.$row->id.')" style="width:70px;">Rent</button>';
			}else{
				echo '<form action="return" method="post" style="display:inline">
					<input type="hidden" name="book_id" value="'.$row->id.'">
					<input style="width:70px;" type="submit" style="width:70px;" value="Return">
					</form>
				';
			}
						
			echo '
				<form action="deleteBook" method="post" style="display:inline">
					<input type="hidden" name="book_id" value="'.$row->id.'">
					<input style="width:70px;" type="submit" style="width:70px;" value="Delete">
					</form>
				</tr>
			';
		}
	?>
	
</table>

<script>
	function add(){
		location.href = "add";
	}
	function rent(id){
		location.href = "rent?id="+id;
	}
</script>