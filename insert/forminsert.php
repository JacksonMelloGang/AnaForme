<?php

    $formlist = checkrqment();

    for($i = 0; $i < count($formlist); $i++){
        echo("<br>". $formlist[$i]);
    }

    if($formlist == false){
        die("Missing Values.");
    }

    $link = mysqli_connect("localhost", "root",  "", "anaforme", 3306);
    mysqli_query($link, "CREATE TABLE formvalue (id INT UNSIGNED NOT NULL AUTO_INCREMENT, mail VARCHAR(40) NOT NULL, teamleadname VARCHAR(40) NOT NULL, teammember VARCHAR(40) NOT NULL, discteamlead VARCHAR(40) NOT NULL, discteammemb VARCHAR(40) NOT NULL, isindisc BOOLEAN NULL, PRIMARY KEY (id));");
    $query = "INSERT INTO formvalue(mail, teamleadname, teammember, discteamlead, discteammemb, isindisc) VALUES('". $formlist[0] ."', '". $formlist[1] . "', '" . $formlist[2] . "', '" . $formlist[3] . "', '" . $formlist[4] . "', '" . $formlist[5] . "');";
    $iquery = mysqli_query($link, $query);
    echo("<br><br>". $query);

    if($iquery == false){
        die("<br><br>Couldn't insert value into the database, <br>Error: " . mysqli_error($link) . "<br>Errno: " . mysqli_errno($link));
    }

    if($formlist[5] == 1){
        //header("Location:", "http://localhost/xxx");
    }

    function checkrqment(){

    if(isset($_POST["mail"])){
        $mail = $_POST["mail"];
    
        if (isset($_POST["tl"])) {
            $tl = $_POST["tl"];

            if (isset($_POST["tm"])) {
                $tm = $_POST["tm"];
        
                if (isset($_POST["disctl"])) {
                    $disctl = $_POST["disctl"];

                    if (isset($_POST["disctm"])) {
                        $disctm = $_POST["disctm"];

                        if (isset($_POST["combobox"])) {
                            $combobox = $_POST["combobox"];
                            
                            $valuelist = array($mail, $tl, $tm, $disctl, $disctm, $combobox);
                            return $valuelist;
                        }
                    }
                }
            }
        }   
    }

    return false;
}

?>