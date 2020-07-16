<?php
include_once 'apiHandler.php';
include_once './DBConnector.php';
$api = new ApiHandler();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $api_key_correct = false;
    $headers = apache_request_headers();
    $headers_api_key = $headers['Authorization'];
    $api->setUser_api_key($headers_api_key);
    $api_key_correct = $api->checkApiKey();
    if ($api_key_correct) {
        //create an order
        $name_of_food = $_POST['name_of_food'];
        $number_of_units = $_POST['number_of_units'];
        $unit_price = $_POST['unit_price'];
        $order_status = $_POST['order_status'];

        //connect to database
        $con = new DBConnector();

        //use getters and setters to assig values
        $api->setMealName($name_of_food);
        $api->setMealName($number_of_units);
        $api->setMealName($unit_price);
        $api->setMealName($order_status);

        $res = $api->createOrder();
        if ($res) {
            $response_array = ['success' => 1, 'message' => 'Order has been placed'];
            header('Content-type:application/json');
            echo json_encode($response_array);
        }
    }else{
        $response_array=['succes'=>0,'message'=>'Wrong API Key'];
        header('Content-type:application/json');
        echo json_encode($response_array);
    }
}elseif ($_SERVER['REQUEST_METHOD']==='GET') {
    //Retrieve Order Status
}else {
    //Echo to User that Service is not available
}
