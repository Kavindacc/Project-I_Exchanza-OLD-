<?php

require 'sendpassword.php';

$token = $_POST['token'];
$token_hash = hash("sha256", $token);

$obj = new RegisteredCustormer();
$result = $obj->token($token_hash,dbh::connect());
if (strtotime($result) <= time()) { //convrt secound time/ 
    //token expired

} else if (!$result) {
    //token not found
}
else{//token valid

    if (empty($password)|| empty($rpassword)) { //password check
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
    if (empty($errors)) {
        $passwordhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $result = $obj->userid(dbh::connect());
        $obj->updatepassword($passwordhash,$result,dbh::connect()); //insert data databse
        header("Location: ../view/resetpassword.php?success=Reset password successful"); //home page go
    } else {
        $errorString = implode("|", $errors); //array convert string
        header("Location: ../view/resetpassword.php?error=$errorString");
    }
}

?>