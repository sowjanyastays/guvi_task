<?php
$conn = mysqli_connect("localhost","root","Sowjanya$12345","db");         
if(!$conn)
{
    echo "Database not connected" . mysqli_connect_error();
}
$age = mysqli_real_escape_string($conn, $_POST['name']);
$country= mysqli_real_escape_string($conn, $_POST['email']);
$gender = mysqli_real_escape_string($conn, $_POST['password']);
 
require '../assets/mongoconnect/vendor/autoload.php';  
 
$serverApi = new \MongoDB\Driver\ServerApi(\MongoDB\Driver\ServerApi::V1);
$client = new \MongoDB\Client(
    'mongodb+srv://sowjanyastays:Sowjanya$12345@cluster0.h8eaaic.mongodb.net/test', [], ['serverApi' => $serverApi]);

$db = $client->test;
  
$collection = $db->user_profile;    
if(!empty($age) && !empty($gender) && !empty($country) ){
if(is_numeric($age)==true){
    if($gender==="female" || $gender==="male" || $gender==="other"){
        if($country>3){
            if(!empty($age) && !empty($gender) && !empty($country) ) 
                {
            $collection->insertOne( [ 'age' =>$age, 'country' =>$country, 'gender'=>$gender] );  
            echo "success";
            }

        }
        else{
        echo "country";
        }

    }
    else{
        echo "gender";
    }
}
    else{
        echo "age";
    }
}
else{
    echo "something is wrong";
}








