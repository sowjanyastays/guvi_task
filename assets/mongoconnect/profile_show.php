
<?php
echo "in here";
require 'vendor/autoload.php';  
// Creating Connection  
$serverApi = new \MongoDB\Driver\ServerApi(\MongoDB\Driver\ServerApi::V1);
$client = new \MongoDB\Client(
    'mongodb+srv://sowjanyastays:Sowjanya$12345@cluster0.h8eaaic.mongodb.net/test', [], ['serverApi' => $serverApi]);

$db = $client->test;
$collection = $db->user_profile;   

$age = "india";

$record = $collection->find( [ 'country'=> $age] );  
foreach ($record as $employe) {  
echo $employe['age'], ': ', $employe['country']."<br>";  
}  

?>