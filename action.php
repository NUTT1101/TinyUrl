<?php
    require_once "./database/DatabaseConnect.php";
    require_once "./SerialNumber.php";
    require_once "./TinyUrl.php";
    
    $link = $_POST["link"];

    if (!empty($link)) {
        try {
            $connect = new DatabaseConnect("", "", "", "");
            $serial_number = new SerialNumber();
            
            $tinyurl = new TinyUrl($connect->get_connected(), $link, $serial_number->get_serial_number());

            $connect->close_connected();
            header("Refresh:0; url=./index.php");
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }

?>