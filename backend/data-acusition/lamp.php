<?php


include 'tcp_comn.php';


$lampList = array("green"=>0,"yellow"=>1,"red"=>2,"blue"=>3);

$plc1 = new tcp_comn("192.168.110.10", 8501);



// Set the content type to JSON
header('Content-Type: application/json');

// Get the raw POST data
$input = file_get_contents('php://input');



// Decode the JSON data into a PHP array
$data = json_decode($input, true);


// Debugging output
error_log("Input Data: " . $input);
error_log("Decoded Data: " . print_r($data, true));

// Check if the data was decoded properly
if ($data !== null && isset($data['lamp'])) {
    $lamp = $data['lamp'];


    
    $rrelay =  36000+ $lampList[$lamp];
    $mrelay =   $lampList[$lamp];
    $check =  $plc1->sendData("RD R$rrelay\r");
    $check = (int)$check;

    if($check){
        $plc1->sendData(("WR MR$mrelay 0\r"));
    }else{
        $plc1->sendData(("WR MR$mrelay 1\r"));
    }
    
    $response = [
        'status' => 'success',
        'message' => 'Data received successfully',
        'receivedData' => $check,
    ];

    
} else {
    // Invalid or missing data
    $response = [
        'status' => 'error',
        'message' => $input,
    ];
}


// Send the response as JSON
echo json_encode($response);
