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

    //echo "test";
    $title = $_POST['title'];
    //$var = $_POST['file'];
    //$var = $var + '.odp';
    if ($_POST['title'] != "")
    {
        if ($_POST['MAX_FILE_SIZE'] == "10000000")
        {
            // Where the file is going to be placed
            $target_path = "/home/pi/temp/pres/";
            //$target_path = "files/";
            $dat = date('Y-m-d');
            //echo $dat;

            $fileName = $_FILES['uploadedfile']['tmp_name'];
            $newFileName = replaceAll(basename( $_FILES['uploadedfile']['name']));

            //echo $fileName."<br>";
            /* Add the original filename to our target path.
            Result is "uploads/filename.extension" */
            $target_path = $target_path . $newFileName;
            //echo $target_path."<br>";

            //echo var_dump($_FILES);

            if(move_uploaded_file($fileName, $target_path))
            {
                echo "The file ".$newFileName." has been uploaded <br>";
                try{
                    $dbc = new PDO('sqlite:/home/pi/main.db');
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }

                $sql = "INSERT INTO files (file, name, uploaded) VALUES ('".$target_path."','".$title."','".$dat."')";
                //echo $sql;
                $err = $dbc->query($sql);
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
