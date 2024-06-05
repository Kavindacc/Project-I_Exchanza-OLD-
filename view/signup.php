<?php require '../control/signupcon.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Signup</title>
</head>

<body>
    <!--form-->
    <div class="container p-4 regi">
        <div class="row text-center pb-2">
            <h2>Create Account</h2>
        </div>
        <div class="row justify-content-center">
            <?php if (isset($_GET['error'])) { ?>
                <div class="col-md-8 bg-warning text-white"><?php echo $_GET['error']; ?></div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <div class="col-md-8 bg-success text-white"><?php echo $_GET['success']; ?></div>
            <?php } ?>
        </div>
        <!--form start-->
        <form action="../control/signupcon.php" method="post" enctype="multipart/form-data"><!--action file control folder kta enna one-->
            <div class="row justify-content-center mt-4">
                <div class="col-md-4">
                    <label class="form-label">Full name</label>
                    <input type="text" class="form-control" placeholder="First and Last name" name="name">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" placeholder="example@gmail.com" name="email">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Country</label>
                    <select class="form-select" aria-label="Default select example" name="country">
                        <option value="--Select Country--">--Select Country--</option>
                        <option value="Sri lanka">Sri lanka</option>
                        <option value="Uk">Uk</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Phone number</label>
                    <input type="tel" class="form-control" name="pnum">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Gender</label>
                    <select class="form-select" aria-label="Default select example" name="gender">
                        <option value="--Select Gender--">--Select Gender--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Profile picture</label>
                    <input class="form-control" type="file" name="file">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Repeat password</label>
                    <input class="form-control" type="password" name="rpassword">
                </div>
            </div>
            <div class="row justify-content-center py-3">
                <div class="col-md-4">
                    <input class="btn btn-primary w-100" type="submit" value="Register" name="register">
                </div>
                <div class="col-md-4">
                    alredy have account<a href="login.php"> login in</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>