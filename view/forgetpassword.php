<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>forget password</title>
</head>
<body>
    <div class="container foget"style="margin-top:100px;">
        <h2>Forget Password</h2>
        <div class="row mt-4">
            <div class="col-md-7">
                Enter your email address below and we will send you a link to reset your password
            </div>
        </div>
        <div class="row mt-2">
            <?php if (isset($_GET['error'])) { ?>
                <div class="col-md-4  text-black"><?php echo $_GET['error']; ?></div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <div class="col-md-4 bg-success text-white"><?php echo $_GET['success']; ?></div>
            <?php } ?>
        </div>
        <form action="../control/resetpasswordcon.php" method="post">
        <div class="row mt-3 ">
            <div class="col-md-4">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" placeholder="Enter your email address" name="email">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <input class="btn btn-primary w-100" type="submit" value="continue" name="continue">
            </div>
        </div>
        </form>
        <div class="row mt-2">
            <div class="col-md-4">
                <a href="login.php"style="text-decoration:none;color:black;">Go to Back</a>
            </div>
        </div>
    </div>
</body>
</html>