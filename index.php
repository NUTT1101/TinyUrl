<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TinyUrl_Demo</title>
</head>
<body>
    <?php
        require_once "./SerialNumber.php";
        require_once "./DatabaseConnect.php";
        require_once "./TinyUrl.php";
        


        $servername = "localhost";
        $username = "nutt1101";
        $password = "123";

        $connect = new DatabaseConnect($servername, $username, $password, "tinyurl");
        try {
            
        } catch (Throwable $th) {
            echo $th->getMessage();
        }

    ?>

</body>
</html>