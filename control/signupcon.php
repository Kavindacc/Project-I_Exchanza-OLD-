<?php


require '../model/user.php';
require 'otpsent.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            $object = new User();
            $emailexit = $object->emailexit($email);
            if ($email == $emailexit) {
                $errors[] = "Email already exists";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid Email";
            } else {
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            }
        }

        if ($country == '--Select Country--') { //location check
            $errors[] = "Country is required";
        }

        if ($gender == '--Select Gender--') { //gender check
            $errors[] = "Gender is required";
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

        if (empty($pnum)) { //phone number check
            $errors[] = "Phone Number is required";
        } else {
            $pnum = trim(stripslashes(htmlspecialchars($pnum))); //santizer number
        }

        if ($password !== $rpassword) { //repeat pasword check
            $errors[] = "Passwords do not match";
        }

        if (empty($errors)) {
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $otp_str=str_shuffle("0123456789");
            $otp=substr($otp_str,0,5);
            $object->insertdb($name, $email, $country, $gender,$pnum,$otp, $passwordhash); //insert data databse
            $obj=new Otp();//otpsent.php
            $obj->otpsent($email,$otp);
            
        } else {
            $errorString = implode("|", $errors); //array convert string
            header("Location: ../view/signup.php?error=$errorString");
        }
    }
}
