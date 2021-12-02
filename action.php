<?php
    require_once "./database/DatabaseConnect.php";
    require_once "./SerialNumber.php";
    require_once "./TinyUrl.php";
    session_start();

    if (!empty($_POST["link"])) {
        try {
            $link = $_POST["link"];
            $connect = new DatabaseConnect("", "", "", "");
            $serial_number = new SerialNumber();
            
            $tinyurl = new TinyUrl($connect->get_connected(), $link, $serial_number->get_serial_number());

            $connect->close_connected();
    
            $_SESSION[$serial_number->get_serial_number()] = $link;
            header("location: ./index.php");
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    } else {
        echo "<script>alert('fuck you!');location.href='./index.php'</script>";
    }
