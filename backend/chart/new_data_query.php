<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "plcwebaccess";




try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM `data` WHERE DATE(`timestamp`) > DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
    $stmt->execute();

    while ($data = $stmt->fetch()) {
        if ($data['register'] == 'MR201'){
            $currentMeter[$data['timestamp']] = $data['value'];
        }elseif($data['register'] == 'MR203'){
            $voltMeter[$data['timestamp']] = $data['value'];
        }elseif($data['register'] == 'MR205'){
            $powerMeter[$data['timestamp']] = $data['value'];
        }else{
            echo "unknwon regiseter";
        }
    }

    
}catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}