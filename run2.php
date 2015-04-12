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
        $output = exec('sudo -u pi /home/pi/temp/OpenShow.sh '.$var);
    }
    elseif ($var2 == "vid"){
        $output = exec('sudo -u pi /home/pi/temp/startvideo.sh '.$var);
    }
    elseif ($var3 == "stream"){
        echo "Yep this would be a stream";
    }

    //$output = exec('/home/pi/OpenShow.sh '.$var);
    echo $output;
    //$user = get_current_user();
    //echo $user;
    echo $var;

    
?>

</body>
</html>
