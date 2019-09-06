<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");


    
    $name =  ($_POST['name']);
    $phone = ($_POST['Phone']);
    $company = ($_POST['Company']);
    
    
    $email = ($_POST['email']);
    $msg = ($_POST['Message']);
    
    $orgsize = ($_POST['org-size']);
    $ref = ($_POST['ref']);
    
    $con=mysqli_connect("localhost","id10457891_root","windows8","id10457891_contact");
     if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            echo mysqli_error($con);
        }

    if(!mysqli_select_db($con, 'id10457891_contact'))
        echo "Can't select database";
    else{
        
            $status =  
            mysqli_query($con, "INSERT INTO contactdb (name, phone, org_name, org_size, email, org_ref, msg)
            VALUES ('$name', '$phone' , '$company', '$orgsize', '$email', '$ref', '$msg')");
            
             if(!$status)
              echo("Error description: " . mysqli_error($con));
          
            else{
                $to = "desarkarjishnu@gmail.com";
                $subject = "hello";
                $headers = "Header";
                
                if(mail($to,$subject,$msg,$headers))
                    echo "mail sent \n\n";
                else
                    echo "mail did not sent";
                
                echo "Successfully";
            }
            
    
                
        }
        
?>
