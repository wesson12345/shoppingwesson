<?php

require_once 'config/dbconn.php';

if($_POST)
{
    if(!empty($_POST['username']) && !empty($_POST['pass']))
    {
        $user_name 		= $_POST['username'];
        $user_password 	= $_POST['pass'];
        
        //password_hash see : http://www.php.net/manual/en/function.password-hash.php
        $password 	= password_hash($user_password, PASSWORD_DEFAULT);

        try
        {
            $stmt = $db_con->prepare("SELECT * FROM user WHERE username =:username" );
            $stmt->execute(array(":username"=>$user_name ));
            $count = $stmt->rowCount();

            if($count == 0)
            {
                $stmt = $db_con->prepare("INSERT INTO user(username,password) VALUES(:username,:pass)");
                $stmt->bindParam(":username",$user_name);
                $stmt->bindParam(":pass",$password);

                if($stmt->execute())
                {
                    echo "registered";
                }
                else
                {
                    echo "Query could not execute !";
                }
            }
            else
            {
                echo "username già registrato";
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }else
    {
        echo "Compilare il form";
    }
}
?>