<?php


require '../model/user.php';

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

        $filePath = null; //file upload start
        if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
            $file = $_FILES['file'];
            $filename = $file['name'];
            $filetmpname = $file['tmp_name'];
            $filesize = $file['size'];
            $fileext = explode('.', $filename);//string convert array
            $fileactualext = strtolower(end($fileext));
            $allowed = ['jpg', 'jpeg', 'png'];

            if (in_array($fileactualext, $allowed)) {
                if ($filesize < 1000000) { // 1MB file size limit
                    $fileNewName = uniqid();
                    $fileNewName.= "." . $fileactualext;
                    $fileDestination = '../upload/' . $fileNewName;
                    move_uploaded_file($filetmpname, $fileDestination);
                    $filePath = $fileDestination;
                } else {
                    $errors[] = "File is too big";
                }
            } else {
                $errors[] = "Please upload jpg, jpeg, or png type";
            }
        } //file end

        if ($password !== $rpassword) { //repeat pasword check
            $errors[] = "Passwords do not match";
        }

        if (empty($errors)) {
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $object->insertdb($name, $email, $country, $gender,$filePath, $pnum, $passwordhash); //insert data databse
            header("Location: ../view/signup.php?success=Registration successful"); //home page go
        } else {
            $errorString = implode("|", $errors); //array convert string
            header("Location: ../view/signup.php?error=$errorString");
        }
    }
}
