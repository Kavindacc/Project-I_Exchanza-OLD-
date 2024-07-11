<?php

require '../model/usern.php';
require '../model/dbconnection.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];
    
}

/*$token_hash = hash("sha256", $token);

$obj = new RegisteredCustormer();
$result = $obj->token($token_hash, Dbh::connect());
if (strtotime($result) <= time()) { //convrt secound time/ 
    echo "expire";

} else if (!$result) {
    echo "not found";
}

*/
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

<body class="d-flex justify-content-center align-items-center"style="height:100vh;">
    <div class="col-sm-4 ">

        <h2>Reset password</h2>


        <form action="../control/resetpasswordcon.php" method="post">
            <div class="mb-3">

                <input type="hidden" name="token" value="<?php echo $token; ?>">

            </div>
            <div class="mb-3">
                <?php if (isset($_GET['error'])) { ?>
                    <div class=" bg-warning text-white"><?php echo $_GET['error']; ?></div>
                <?php } ?>

                <?php if (isset($_GET['success'])) { ?>
                    <div class=" bg-success text-white"><?php echo $_GET['success']; ?></div>
                <?php } ?>
            </div>
            <div class="mb-3">

                <label class="form-label">Password</label>
                <input class="form-control" type="password" name="password" required>

            </div>
            <div class="mb-3">

                <label class="form-label">repeat Password</label>
                <input class="form-control" type="password" name="rpassword" required>

            </div>

            <div>
                <input class="btn btn-primary w-100" type="submit" value="Reset" name="reset" style="background:#897062;border:none;">
            </div>

        </form>
    </div>
</body>
<script type="text/javascript">
        function preventback() {
            window.history.forward()
        };
        setTimeout("preventback()", 0);
        window.onunload = function() {
            null
        };
    </script>
</html>