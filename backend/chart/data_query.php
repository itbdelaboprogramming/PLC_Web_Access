<?php 
// Path: backend/chart/data_query.php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "plcwebaccess";

// table used is data

// Decode the JSON data into a PHP array
$input = file_get_contents("php://input");
$data = json_decode($input, true);
header('Content-Type: application/json');


 try {
     //connect to the database
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    
    //chek input data
    switch ($data["time"]) {
        case "day":
            $stmt = $conn->prepare("SELECT register, DATE(timestamp) AS time, AVG(value) AS avg_value FROM data WHERE timestamp >= NOW() - INTERVAL 7 DAY GROUP BY register, DATE(timestamp) ORDER BY register, time DESC;");
          break;
        case "month":
            $stmt = $conn->prepare("SELECT register, DATE_FORMAT(timestamp, '%Y-%m') AS time, AVG(value) AS avg_value FROM data WHERE timestamp >= NOW() - INTERVAL 12 MONTH GROUP BY register, DATE_FORMAT(timestamp, '%Y-%m') ORDER BY register, time DESC;");
          break;
        case "hour":
            $stmt = $conn->prepare("SELECT register, DATE_FORMAT(timestamp, '%Y-%m-%d %H:00:00') AS time, AVG(value) AS avg_value FROM data WHERE timestamp >= NOW() - INTERVAL 24 HOUR GROUP BY register, DATE_FORMAT(timestamp, '%Y-%m-%d %H:00:00') ORDER BY register, time DESC;");
          break;
        default:
        $stmt = $conn->prepare("SELECT register, DATE_FORMAT(timestamp, '%Y-%m') AS time, AVG(value) AS avg_value FROM data WHERE timestamp >= NOW() - INTERVAL 12 MONTH GROUP BY register, DATE_FORMAT(timestamp, '%Y-%m') ORDER BY register, time DESC;");
        }
    
    $stmt->execute();
    // echo "Executed successfully";

    $powerMeter = array();
    $currentMeter = array();
    $voltMeter = array();
    $time = array();

    $rows = $stmt->fetchAll();
    
        foreach ($rows as $row) {
            if ($row['register'] == 'MR201'){
                array_push($currentMeter, $row['avg_value']);
                array_push($time, $row['time']);
            }elseif($row['register'] == 'MR203'){
                array_push($voltMeter, $row['avg_value']/100);
                array_push($time, $row['time']);
            }elseif($row['register'] == 'MR205'){
                array_push($powerMeter, $row['avg_value']);
                array_push($time, $row['time']);
            }else{
                echo "unknwon regiseter";
            }
        }

    $msg = array('currentMeter'=>$currentMeter,'voltMeter'=>$voltMeter,'powerMeter'=>$powerMeter,'time'=>$time);
    
echo json_encode($msg);


}catch (PDOException $e) {
    echo "<br>" . $e->getMessage();
}