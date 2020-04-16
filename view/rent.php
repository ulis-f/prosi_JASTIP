
<form method="post" action="rent">
	Judul buku : <?php echo $book->name; ?> </br>
	Pengarang : <?php echo $book->author; ?> </br>
	<input type="hidden" name="id" value="<?php echo $book->id; ?>" />
	Lama peminjaman : <input name="duration" type="number" /> hari</br>
	<input type="submit" value="Rent" />
</form>