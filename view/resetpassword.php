<?php

require '../control/sendpassword.php';

$token = $_GET['token'];
$token_hash = hash("sha256", $token);

$obj = new User();
$result = $obj->token($token_hash);
if (strtotime($result) <= time()) { //convrt secound time/ 
    //token expired

} else if (!$result) {
    //token not found
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Resetpassword</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>Reset password</h2>
            </div>
        </div>
        <form action="../control/resetpasswordcon.php" method="post">
            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
                </div>
            </div>
            <div class="row">
            <?php if (isset($_GET['error'])) { ?>
                <div class="col-md-4 bg-warning text-white"><?php echo $_GET['error']; ?></div>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <div class="col-md-4 bg-success text-white"><?php echo $_GET['success']; ?></div>
            <?php } ?>
        </div>
            <div class="row mt-2 ">
                <div class="col-md-4">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" required="">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <label class="form-label">repeat Password</label>
                    <input class="form-control" type="password" name="rpassword" required="">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <input class="btn btn-primary w-100" type="submit" value="Reset" name="reset">
                </div>
            </div>
        </form>
    </div>
</body>

</html>