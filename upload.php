<html>
<head>


</head>
<body>

<?php
    function replaceAll($text){
        $text=strtolower(htmlentities($text));
        //$text=str_replace(get_html_translation_table(),"-", $text);
        $text=str_replace(" ","-",$text);
        //$text= reg_replace("/[-]+/i","-",$text);
        return $text;
    }

  function seperate($text, $type){
    $array = explode('.', $text);
    if ($type == "file"){return $array[0];}
    if ($type == "type"){return $array[1];}
  }


    function checkForFile($path, $text){
        $exists = file_exists($path);
    $typ = seperate($text, "type");
    $name = seperate($text, "file");
    $targ = seperate($path, "file");
    if (!$exists){return $text;}
    else {
        while($exists) {
            $name = $name."A";//update name
            $targ = $targ."A";//update target
            $final = $name.".".$typ;
            $test = $targ.".".$typ;
            $exists = file_exists($test);
            }
        return $final;
    }
    }

  function checkType($text){
    $type = seperate($text, "type");
    if ($type == "odp" OR $type == "pps"){return "pres";}
    elseif ($type == "mp4" OR $type == "mkv"){return "vid";}
    else {return "none";}
  }

    //echo "test";
    $title = $_POST['title'];

    if ($_POST['title'] != "")
    {
        if ($_POST['MAX_FILE_SIZE'] == "10000000")
        {
            // Where the file is going to be placed
            $target_path = "/home/pi/temp/pres/";
            $dat = date('Y-m-d');
            //echo $dat;

            $fileName = $_FILES['uploadedfile']['tmp_name'];
            $newFileName = replaceAll(basename( $_FILES['uploadedfile']['name']));  //gets rid of spaces
        $type = checkType($newFileName);  //get the file type (returning none if not accepted)
        

            //echo $fileName."<br>";
            $target_test = $target_path . $newFileName;//get path to use to check for file
        $newFileName = checkForFile($target_test, $newFileName);  //check if files names exist and adds A to end until it does not
        $target_path = $target_path . $newFileName;//put together final name


            //echo $target_path."<br>";
            //echo var_dump($_FILES);

            if(move_uploaded_file($fileName, $target_path) AND $type != "none")
            {
                echo "The file ".$newFileName." has been uploaded <br>";
                try{
                    $dbc = new PDO('sqlite:/home/pi/temp/main.db');
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }

                $sql = "INSERT INTO files (file, name, uploaded, types) VALUES ('".$target_path."','".$title."','".$dat."','".$type."')";
                //echo $sql;
                $err = $dbc->query($sql);
            } 
        elseif ($type == "none")
        {
        echo "You did not use an allowed file type, please use .odp or .pps for presentations or .mp4 or .mkv for videos";
        }
            else
            {
                echo "There was an error uploading the file, please try again!<br>";
            }
        }
        else
        {
            echo "Don't know how you got here... <br>";
        }
    }
    else
    {
        echo "You did not enter a title, please go back and try again";
    }
    $user = get_current_user();
    //echo $user;

    //phpinfo();
?>

<br>
<a href='/'>Go back to main page</a>

</body>
</html>
