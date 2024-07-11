<?php

require '../model/usern.php';
require '../model/dbconnection.php';

if (isset($_POST['reset'])) {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];

    if ($password !== $rpassword) {
        header("Location: ../view/resetpassword.php?error=Passwords do not match");
        exit();
    }

    $token_hash = hash("sha256", $token);
    $obj = new RegisteredCustormer();
    $result = $obj->validateToken($token_hash, Dbh::connect());

    if ($result === false) {
        header("Location: ../view/resetpassword.php?error=Token not found");
        exit();
    } else if (strtotime($result['reset_token_expire']) <= time()) {
        header("Location: ../view/resetpassword.php?error=Token has expired");
        exit();
    } else {
        $errors = [];
        if (empty($password) || empty($rpassword)) {
            $errors[] = "Password is required";
        } else {
            $spassword = trim(stripslashes(htmlspecialchars($password)));
            $uppercase = preg_match('@[A-Z]@', $spassword);
            $lowercase = preg_match('@[a-z]@', $spassword);
            $number = preg_match('@[0-9]@', $spassword);
            $specialChars = preg_match('@[^\w]@', $password);

            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                $errors[] = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character";
            }
        }
        if (empty($errors)) {
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $userid = $result['userid'];
            $obj->updatePassword($passwordhash, $userid, Dbh::connect());
            header("Location: ../view/login.php?success=Password reset successful");
        } else {
            $errorString = implode("|", $errors);
            header("Location: ../view/resetpassword.php?error=$errorString");
        }
    }
}
?>
