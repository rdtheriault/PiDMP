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

	$output = exec('sudo -u pi /home/pi/OpenShow.sh '.$var);
	//$output = exec('/home/pi/OpenShow.sh '.$var);
	echo $output;
	//$user = get_current_user();
	//echo $user;
	<br> echo $var;

	
?>

</body>
</html>
