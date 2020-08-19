<?php

require 'database/models/User.php'; // user management for authentication

class UserController
{
    protected $user;
    
    public function __construct()
    {
        $this->user = new User();
    }

    public function register()
    {
        require "./helpers/helper.php";

        if(isset($_POST["account_name"],$_POST["password1"],$_POST["password2"],$_POST["last_name"],$_POST["first_name"]) && $_POST["password1"]==$_POST["password2"])
        {
            $password=sanitize($_POST["password1"]);
            $account_name=$_POST["account_name"];
            $last_name= sanitize($_POST["last_name"]);
            $first_name= sanitize($_POST["first_name"]);
    
            $password = password_hash($password, PASSWORD_DEFAULT);
    
            $newAccount=$this->user->addAccount($last_name,$first_name,$account_name,$password);
            echo $newAccount;
            require '../views/registered.view.php';
        } else {
            $message ="Tarkista salasanat";
            require '../views/register.form.view.php';
        }
    }
}