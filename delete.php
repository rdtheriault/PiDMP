<html>
<body>

  <?php
  
  	$id = $_POST['id'];
  	$file = $_POST['files'];
  	//echo $id;
  	//echo $file;
  
  	try{
  		$dbc = new PDO('sqlite:/home/pi/main.db');
  	}
  	catch(PDOException $e){
  		echo $e->getMessage();
  	}
  
  	$sql = "DELETE FROM files where id = '".$id."'";
  	//echo $sql;
  	$err = $dbc->query($sql);
  	if (!$err){echo $dbc->lastErrorMsg();}
  	else {echo "File has been deleted from DB <br><br>";}
  	$err2 = unlink($file);
  	if (!$err2){echo "File not deleted<br><br>";}
  	else {echo "File has been deleted from system.<br><br>";}
  ?>
  
  
  <a href='/'>Go back to main page</a>
</body>
</html>
