<?php 

require '../control/verificationcon.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">    
    <title>Verification Page</title>
</head>

<body>
    <div class="verification d-flex flex-column">
        <div class="text">
            <h3>OTP Verification</h3>
        </div>
        <?php if (isset($_GET['success'])) { ?>
                <div class="col bg-success text-white"><?php echo $_GET['success']; ?></div>
            <?php } ?>
            <?php if (isset($_GET['error'])) { ?>
                <div class="col bg-warningtext-white"><?php echo $_GET['error']; ?></div>
            <?php } ?>
        
        <form action="../control/verificationcon.php" method="post">
            <div class="input mt-3">
                <input type="text" class="form-control" placeholder="Enter Verification Code" name="vcode" required="">
            </div>
            <div class="button">
                <input class="btn btn-primary w-100" type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
</body>

</html>