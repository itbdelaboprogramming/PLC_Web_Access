<?php

include 'tcp_comn.php';

$plc1 = new tcp_comn("192.168.110.10", 8501);

$msg = $plc1->sendData("RDS R36000 4\r");


$lamp = array_map('intval', explode(" ", $msg));

$row = array('green' => $lamp[0], 'yellow' => $lamp[1], 'red' => $lamp[2], 'blue' => $lamp[3]);

echo json_encode($row);


$plc1->close();
