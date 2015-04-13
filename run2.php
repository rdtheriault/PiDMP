<html>
<body>

<?php 
	//echo "test";
	//$output = shell_exec('/home/pi/Desktop/OpenShow.sh');
	//$output = shell_exec('whoami');
	//$command = escapeshellcmd('/home/pi/Desktop/OpenShow.py');
	//$output = shell_exec($command);
	//$output = exec('sudo python /home/pi/Desktop/OpenShow.py');

	$var = $_POST["file"];
	$var2 = $_POST["type"];
	$var3 = $_POST["stream"];

	if ($var2 == "pres"){
		//echo "Yep this would be a presentation";
		$output = exec('sudo -u pi /home/pi/temp/OpenShow.sh '.$var);
	}
	elseif ($var2 == "vid"){
		//echo "Yep this would be a video";
		$output = exec('sudo -u pi /home/pi/temp/startvideo.sh '.$var);
	}
	elseif ($var2 == "vids"){
		//echo "Yep this would be videos";
		$output = exec('sudo -u pi /home/pi/temp/startvideos.sh '.$var);
	
	elseif ($var2 == "stream"){
		echo "Yep this would be a stream";
		$output = exec('sudo -u pi /home/pi/temp/stream.sh '.$var3);
	}

	//$output = exec('/home/pi/OpenShow.sh '.$var);
	echo $output;
	//$user = get_current_user();
	//echo $user;
	echo $var;

	
?>

</body>
</html>

