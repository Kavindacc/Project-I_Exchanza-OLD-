<?php
require '../model/products.php';
session_start();
$filePath = null; //file upload start
if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
    $file = $_FILES['file'];
    $filename = $file['name'];
    $filetmpname = $file['tmp_name'];
    $filesize = $file['size'];
    $fileext = explode('.', $filename); //string convert array
    $fileactualext = strtolower(end($fileext));
    $allowed = ['jpg', 'jpeg', 'png'];

    if (in_array($fileactualext, $allowed)) {
        if ($filesize < 1000000) { // 1MB file size limit
            $fileNewName = uniqid();
            $fileNewName .= "." . $fileactualext;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>User page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top nav">
        <div class="container-fluid logo"><!--logo-->
            <a class="navbar-brand" href="#"><img src="../img/Exchanza.png" width="100px"></a>
            <!--toggle button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--sidebar-->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <!--sidebarheader-->
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title " id="offcanvasNavbarLabel">Exchanze</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <!--sider body-->
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center  flex-grow-1 pe-3">
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="../Project-I_Exchanza/view/thrift.php">Thrift</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Bidding</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Selling</a>
                        </li>
                    </ul>
                    <!--login nav-link-a-color-->
                    <div class="d-flex flex-column float-start flex-lg-row justify-content-center  align-items-center mt-3 mt-lg-0 gap-3">
                        <a href="../Project-I_Exchanza/view/cart.php" class="nav-link  text-decoration-none mx-1"><i class="fa-solid fa-cart-plus"><span></span></i></a>
                        <?php
                        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] === true) { ?>
                            <a href="logout.php" class=" text-decoration-none"><button class="lo-button btn-sm ms-2 px-3" style="color: #FFFF;">logout</button></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <h2 class="mt-3 ms-4">Hi, <?php echo  $_SESSION['username']; ?> </h2>


    <div class="container-fluid mt-3">
        <div class="row d-flex  mx-auto ">
            <div class="col-sm-3 d-flex flex-column ">

                <img src="../img/profile.png" class=" img-fluid rounded-4 py-2" alt="..." style=" max-height:350px;">
                <button type="button" class="btn btn-outline-primary m-2" onclick="showInformation()" id="information">Pesonal information</button>
                <button type="button" class="btn btn-outline-primary m-2" onclick="showOrderTable()" id="order">My Orders</button>
                <button type="button" class="btn btn-outline-primary m-2" onclick="showItemTable()" id="item">My Iteams</button>

            </div>
            <div class="col-sm-9 py-2 mt-5" id="itemtable">
                <table class="table  table-striped table-hover table-sm"><!--iteam table-->
                    <thead> 
                        <tr class="table-primary">
                            <th scope="col">Product_Id</th>
                            <th scope="col">Product_Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>   
                    </thead>

                    <tbody>
                         <?php
                        $obj = new Products();//product get product table accourding userid
                        $rows = $obj->get($_SESSION['userid']) ;
                        foreach($rows as $row) { ?>

                        <tr class="vertical-center">
                            <td><?php echo $row['product_id'];?></td>
                            <td><?php echo $row['product_name'];?></td>
                            <td><img src="<?php echo $row['image'];?>" class="table-image"></td>
                            <td><?php echo $row['price'];?></td>
                            <td><?php echo $row['category'];?></td>
                            <td><button type="button" class="btn btn-outline-success" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .9rem; --bs-btn-font-size: .75rem;"> Edit</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-outline-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .6rem; --bs-btn-font-size: .75rem;"> Delete</button>
                            </td>
                        </tr>

                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-9 py-2 mt-5" id="producttable">
                <table class="table  table-striped table-hover table-sm"><!--iteam table-->
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Product_Id</th>
                            <th scope="col">Product_Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><button type="button" class="btn btn-outline-success" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .9rem; --bs-btn-font-size: .75rem;"> Edit</button>&nbsp;&nbsp;
                                <button type="button" class="btn btn-outline-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .6rem; --bs-btn-font-size: .75rem;"> Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>