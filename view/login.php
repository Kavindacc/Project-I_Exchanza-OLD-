<?php require '../control/logincon.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container" style="margin-top:100px;">
        <div class="row text-center pb-3">
            <h2>Login now</h2>
        </div>
        <div class="row justify-content-center pb-2">
            <div class="col-md-4">
                No account yet? <a href="signup.php">join now for free</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if (isset($_GET['error'])) { ?>
                <div class="col-md-4 bg-warning text-white"><?php echo $_GET['error']; ?></div>
            <?php } ?>
        </div>
        <form action="../control/logincon.php" method="post">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" placeholder="example@gmail.com" name="email" required="">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" required="">
                </div>
            </div>

            <div class="row justify-content-center mt-2">
                <div class="col-md-4"><a href="forgetpassword.php">forget password</a></div>
            </div>
            <div class="row justify-content-center mt-2">
                <div class="col-md-4">
                    <input class="btn btn-primary w-100" type="submit" value="Sign In" name="signin">
                </div>
            </div>
        </form>
    </div>
</body>

</html>