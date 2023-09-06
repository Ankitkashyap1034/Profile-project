<?php
     include "config/conn.php";
     if(isset($_POST['log'])){
        $email = $_POST['email'];
        $password = $_POST["password"]; 
        $password = md5($password);  
 
         echo "<br>";
        
        if($email!=""){
            $active = "SELECT status FROM signup WHERE email='$email'";
            $active_query = mysqli_query($conn,$active);
            $row_fetch = mysqli_fetch_assoc($active_query);

            if($row_fetch['status']==1){
                $email_query = mysqli_query($conn,"SELECT * FROM signup WHERE email='$email' AND password='$password'");
                if( mysqli_num_rows($email_query)>0){
                    echo "Ok";
                }else{
                    echo "Username or password is wrong";
                }
            }
            else{
                echo "User is not active";
            }
             
         }else{
            echo "Email is empty";
         }
     }   
         
?>