<?php
$conn = mysqli_connect("localhost","root","Sowjanya$12345","db");    
if(!$conn)
{
    echo "Database not connected" . mysqli_connect_error();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

require "../assets/predis/vendor/autoload.php"

$redis = new Predis\Client();



if(!empty($email) && !empty($password)){
        if(strlen($password)>5){
                if(strlen($email)>4) 
            {
            
            $stmt = $conn->prepare("SELECT email, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $pass);
                $stmt->fetch();
                    if ($pass === $password){
                        echo "success";
                    }
            }
            else{
                echo "something is wrong";
            }
        }
        else{
            echo "email";
        }
     }
    else{
        echo "password";
    }
}
else{
    echo "emp";
}
    
?>