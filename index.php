<html>
<head>
<script>

	function info(){
		alert("Your presentation will start shortly, you may leave the browser or use another action, press OK to continue");
	}

</script>
</head>
<body>
<?php echo "<div style='font-size: x-large;'>Upload a file to display on the TV</div>"; ?><br>

<br>
<div>

	<div style='padding-left:20px;'>
		<form enctype="multipart/form-data" action="upload.php" method="POST"><table><tr>
			<td style='padding-right: 20px;'>Title: <input name="title" required></td>
			<td style='padding-right: 20px;'><input type="hidden" name="MAX_FILE_SIZE" value="10000000">
			Choose a Presentation to upload: <input name="uploadedfile" type="file"></td>
			<td style='padding-right: 20px;'><input type="submit" value="Upload File"></td></tr>
		</table></form>  
	</div>
	<br><br><br>


	<div style='font-size: x-large;'>Download Templates and Instructions</div><br>
		<table>
		 <tr><td style='padding-left:20px;'><a href="/templates/template.pptx" download>PowerPoint</a></td><td style='padding-left:20px;'><a href="/templates/template.odp" download>LibreOffice</a></td><td style='padding-left:20px;'><a href="/templates/info.txt">Info</a></td></tr>
		</table>
	<div style='padding-left:20px;'>

	</div>
	<br><br><br>


	<div style='font-size: x-large;'>Run uploaded presentations</div>

	<br>
	<div style='padding-left:20px;'>
		<?php 
			try{
			$dbc = new PDO('sqlite:/home/pi/main.db');
			}
			catch(PDOException $e){
			echo $e->getMessage();
			}
			$sql = "SELECT * FROM files";
			echo "<br><table><tr><td style='padding-right: 20px;'>TITLE</td><td style='padding-right: 20px;'>FILE</td>";
			foreach ($dbc->query($sql) as $row){
				//echo $row['rowid']." - ".$row['file']." - ".$row['name'];
				$files = $row['file'];
				$names = explode("/",$files);
				$name = $names[5];
				echo "<tr><td style='padding-right: 20px;'>".$row['name']."</td><td style='padding-right: 20px;'>".$name."</td><form action='run2.php' method='post'  onsubmit='info()'><td style='padding-right: 20px;'><input type='hidden' name='file' value='".$row['file']."'><input type='submit' value='Run Now'></td></form><form action='delete.php' method='post'><td><input type='hidden' name='id' value='".$row['id']."'><input type='hidden' name='files' value='".$files."'><input type='submit' value='Delete'></td></form></tr>";
			}
			echo "</table>";
		
		?>
	</div>

	<br><br>
	<div style='font-size: x-large;'>Run uploaded videos (working on)</div>

	<br>
	<div style='padding-left:20px;'>
		<?php 
			try{
			$dbc = new PDO('sqlite:/home/pi/main.db');
			}
			catch(PDOException $e){
			echo $e->getMessage();
			}
			$sql = "SELECT * FROM files";
			echo "<br><table><tr><td style='padding-right: 20px;'>TITLE</td><td style='padding-right: 20px;'>FILE</td>";
			foreach ($dbc->query($sql) as $row){
				//echo $row['rowid']." - ".$row['file']." - ".$row['name'];
				$files = $row['file'];
				$names = explode("/",$files);
				$name = $names[5];
				echo "<tr><td style='padding-right: 20px;'>".$row['name']."</td><td style='padding-right: 20px;'>".$name."</td><form action='run2.php' method='post'  onsubmit='info()'><td style='padding-right: 20px;'><input type='hidden' name='file' value='".$row['file']."'><input type='submit' value='Run Now'></td></form><form action='delete.php' method='post'><td><input type='hidden' name='id' value='".$row['id']."'><input type='hidden' name='files' value='".$files."'><input type='submit' value='Delete'></td></form></tr>";
			}
			echo "</table>";
		
		?>
	</div>

	<br><br>
	<div style='font-size: x-large;'>Run video stream</div>

	<br>
	<div style='padding-left:20px;'>
		<form action="stream.php" method="POST"><table><tr>
			<td style='padding-right: 20px;'>URL: <input name="stream" required></td>
			<td style='padding-right: 20px;'><input type="submit" value="Start Stream"></td></tr>
		</table></form> 
	</div>


	<p></p>
	<p></p>
</div>
</body>
</html>
