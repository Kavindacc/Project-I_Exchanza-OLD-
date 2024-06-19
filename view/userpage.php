<?php 
session_start();
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
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>User page</title>
        </head>
        <body>
            <div>
                <h2>Hi, <?php echo  $_SESSION['username']; ?> </h2>
                <a href="logout.php"><button>Logout</button>
            </div>
            
            </div>

        </body>
        </html>