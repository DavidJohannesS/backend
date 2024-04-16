<?php
// index.php

// Include the init.php file
require_once '../config/init.php';

// Get the HTTP method, path and input of the request
$method = $_SERVER['REQUEST_METHOD'];
$request = isset($_SERVER['PATH_INFO']) ? explode('/', trim($_SERVER['PATH_INFO'],'/')) : [];

$input = json_decode(file_get_contents('php://input'),true);

// Create a new instance of UserController
$userController = new UserController();
$appointmentController = new AppointmentController();

// Handle request based on HTTP method
switch ($method) {
  case 'GET':
    // Call a method in UserController to handle GET requests
    break;
  case 'POST':
    if (isset($input['action'])) {
        if ($input['action'] == 'register') {
            $userController->register($input['firstname'], $input['lastname'], $input['email'], $input['phone'], $input['department'], $input['password']);
        } elseif ($input['action'] == 'login') {
            $userController->login($input['username'], $input['password']);
        } elseif ($input['action'] == 'addAppointment') {
            $appointmentController->addAppointment($input['day'], $input['month'], $input['year'], $input['startTime'], $input['endTime']);
        }
    }
    break;
  case 'PUT':
    // Call a method in UserController to handle PUT requests
    break;
  case 'DELETE':
    // Call a method in UserController to handle DELETE requests
    break;
}
?>
