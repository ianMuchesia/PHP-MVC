<?php 
$data_source_name = 'mysql:host=localhost;dbname=assignment_tracker';
$username = 'Ian';
$password = 'password';


try {
    
    $db = new PDO($data_source_name, $username, $password);
    // set the PDO error mode to exception
 
} catch (PDOException $e) {
    //throw $th;
    $error = 'Database Error: ';
    $error.= $e->getMessage();
    include('view/error.php');
    exit();
}