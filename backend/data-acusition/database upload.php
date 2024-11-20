<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "plcwebaccess";
define("INTERVAL", 1);

include 'tcp_comn.php';

$plc1 = new tcp_comn("192.168.110.10", 8501);


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("INSERT INTO data (register, value) VALUES ( 'MR201', :MR201);
                            INSERT INTO data (register, value) VALUES ( 'MR203', :MR203);
                            INSERT INTO data (register, value) VALUES ( 'MR205', :MR205)");

    while (true) {


        $active = true;
        $nextTime   = microtime(true) + INTERVAL; // Set initial delay

        while ($active) {
            usleep(1000); // optional, if you want to be considerate

            if (microtime(true) >= $nextTime) {
                $msg = $plc1->sendData("RDS DM201.L 3\r");

                $energy = array_map('intval', explode(" ", $msg));

                $MR201 = $energy[0];
                $MR203 = $energy[1];
                $MR205 = $energy[2];

                $stmt->bindParam(':MR201',$MR201, PDO::PARAM_INT);
                $stmt->bindParam(':MR203', $MR203, PDO::PARAM_INT);
                $stmt->bindParam(':MR205', $MR205, PDO::PARAM_INT);
                $stmt->execute();
                echo "New record created successfully\n";
                $stmt->closeCursor(); 
                $nextTime = microtime(true) + INTERVAL;
            }
        }
    }
} catch (PDOException $e) {
    echo $conn . "<br>" . $e->getMessage();
}



$conn = null;
