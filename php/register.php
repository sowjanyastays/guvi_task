<?php
$conn = mysqli_connect("localhost","root","Sowjanya$12345","db");        //connecting the database
if(!$conn)
{
    echo "Database not connected" . mysqli_connect_error();
}
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(strlen($name)>4){
    if(strlen($email)>4){
        $query = " SELECT * FROM users WHERE email = ? "; // SQL with parameters
        $stmt = $conn->prepare($query); 
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

            if (mysqli_num_rows($result) > 0) {
                echo "exist";
            }
            else{
        if(strlen($password)>5){
            if(!empty($name) && !empty($email) && !empty($password) ) 
{   
     $stmt = $conn->prepare("INSERT INTO users(name, email, password) VALUES (?, ?, ?)");
                                 $stmt->bind_param("sss", $name, $email, $password);
                                $stmt->execute();
                                echo "success";
}
    else{
        echo "something is wrong";
    }

        }
    else{
        echo "password";
    }
            }
    }
    else{
        echo "email";
    }
}
else{
    echo"name";
}








