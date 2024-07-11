<?php


require '../model/dbconnection.php';
require '../model/visitor.php';
require 'otpsent.php';


    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $country = $_POST['country'];
        $pnum = $_POST['pnum'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];
        $errors = [];

        if (empty($name)) { //name check
            $errors[] = "Name is required";
        } else {
            $sname = trim(stripslashes(htmlspecialchars($name))); //santizer name
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $errors[] = "Only letters and white space allowed";
            }
        }

        if (empty($email)) { //email check
            $errors[] = "Email is required";
        } else {
            $visitor = new Visitor(null, $email, null, null, null, null, null);
            $emailexit = $visitor->emailexit($email,Dbh::connect());
            if ($email == $emailexit) {
                $errors[] = "Email already exists";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid Email";
            } else {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);//santize email
            }
        }

        if (empty($country)) { //location check
            $errors[] = "Country is required";
        }
        else{
            $country = trim(stripslashes(htmlspecialchars($country)));//santize
        }

        if (empty($gender)) { //gender check
            $errors[] = "Gender is required";
        }
        else{
            $gender = trim(stripslashes(htmlspecialchars($gender)));//santize
        }

        if (empty($password)) { //password check
            $errors[] = "Password is required";
        } else {
            $spassword = trim(stripslashes(htmlspecialchars($password)));
            $uppercase = preg_match('@[A-Z]@', $spassword);
            $lowercase = preg_match('@[a-z]@', $spassword);
            $number    = preg_match('@[0-9]@', $spassword);
            $specialChars = preg_match('@[^\w]@', $password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $errors[] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character";
            }
        }

        if (empty($pnum)) {
            $errors[] = "Phone Number is required";
        } else {
            // Sanitize the phone number
            $saniPhoneNumber = preg_replace("/[^0-9]/", "", $pnum);
        
            if (strlen($saniPhoneNumber) === 10) {
                // Valid phone number
                $pnum = $saniPhoneNumber;
            } else {
                $errors[] = "Invalid Phone Number format";
            }
        }
        

        if ($password !== $rpassword) { //repeat pasword check
            $errors[] = "Passwords do not match";
        }

        if (empty($errors)) {
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $otp_str=str_shuffle("0123456789");
            $otp=substr($otp_str,0,5);
            $object = new Visitor($name, $email, $country, $gender,$pnum,$otp, $passwordhash);
            $object->signup(Dbh::connect()); //insert data databse
            $obj=new Otp();//otpsent.php
            $obj->otpsent($email,$otp);
            
        } 
    }

