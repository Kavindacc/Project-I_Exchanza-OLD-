<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="shop.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="product-image-container">
                    <img id="mainImage" src="../img/olivia-front-tie.jpg" class="img-fluid product-image" alt="Product Image"
                        style="width: 400px; height: 400px;">
                </div>
                <div class="mt-3 d-flex item">
                    <img src="../img/olivia1.jpg" class="img-thumbnail thumbnail" alt="Thumbnail 1"
                        onclick="changeImage(this)">
                    <img src="../img/olivia2.jpg" class="img-thumbnail thumbnail" alt="Thumbnail 2"
                        onclick="changeImage(this)">
                    <img src="../img/olivia3.jpg" class="img-thumbnail thumbnail" alt="Thumbnail 3"
                        onclick="changeImage(this)">
                        <!-- https://via.placeholder.com/120 -->
                </div>
            </div>
            <div class="col-md-6">
                <h1>Olva Front Tie-Up Top
                    <svg class="heart-icon" id="heartIcon" viewBox="0 0 24 24">
                        <path
                            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                        </path>
                    </svg>
                </h1>
                <h2>LKR 3,150.00</h2>
                <p>or 3 x LKR 1,050.00 with KOKO or Mintpay</p>
                <p><span class="fw-bold">Availability: </span><span class="text-success fw-bold">In stock</span></p>
                <p><span class="fw-bold">Brand:</span> Chenara DODGE</p>
                <p><span class="fw-bold">Code:</span> 7445-9062-UK8</p>
                <div class="d-flex flex-column">
                    <p class="fw-bold">3 Colors</p>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Red
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Yellow
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Brown
                            </label>
                        </div>
                    </div>

                </div>
                <div class="mt-4">
                    <h5>6 Sizes</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary">XS</button>
                        <button class="btn btn-outline-secondary">S</button>
                        <button class="btn btn-outline-secondary">MD</button>
                        <button class="btn btn-outline-secondary">LG</button>
                        <button class="btn btn-outline-secondary">XL</button>
                        <button class="btn btn-outline-secondary">XXL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 5">
        <div id="toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            style="background-color: #897062;">
            <div class="toast-body" id="toastBody" style="color: white;">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="shop.js">

    </script>
</body>

</html>
