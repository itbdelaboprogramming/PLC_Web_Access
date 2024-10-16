<?php

include('tcp_comn.php');

$plc1 = new tcp_comn("192.168.0.10", 8501);

$msg = $plc1->sendData("RDS DM201.L 3\r");


$energy = array_map('intval', explode(" ", $msg));

$row = array('current' => $energy[0], 'volt' => $energy[1], 'appEnergy'=> $energy[2]);

echo json_encode($row);


$plc1->close();