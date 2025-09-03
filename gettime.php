<?php
$currentMilliSecond = (int) (microtime(true) * 1000);
$data = array(
    "status" => "1",
    "message" => $currentMilliSecond,
);
echo json_encode($data);
?>