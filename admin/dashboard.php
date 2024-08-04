<?php
session_start();
require '../model/dbconnection.php';
require 'classes/Admin.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$admin = new Admin(Dbh::connect());
/*$totalUsers = $admin->getTotalUsers();
$totalSales = $admin->getTotalSales();
$totalFeedbacks = $admin->getTotalFeedbacks();
$totalEarnings = $admin->getTotalEarnings();*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <!--<div class="sidebar">
        <div class="brand">
            <i class="fab fa-apple"></i> Brand Name
        </div>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="customers.php"><i class="fas fa-users"></i> Customers</a></li>
            <li><a href="messages.php"><i class="fas fa-envelope"></i> Messages</a></li>
            <li><a href="settings.php"><i class="fas fa-cogs"></i> Settings</a></li>
            <li><a href="payments.php"><i class="fas fa-credit-card"></i> Payments</a></li>
            <li><a href="manage_stores.php"><i class="fas fa-store"></i> Manage Stores</a></li>
            <li><a href="signout.php"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
        </ul>
    </div>-->
    <div class="main-content">
        <header>
            <h2>Dashboard</h2>
            <div class="toggle">
                <i class="fas fa-bars"></i>
            </div>
            <div class="search-wrapper">
                <input type="search" placeholder="Search here">
                <i class="fas fa-search"></i>
            </div>
            <div class="user-wrapper">
                <img src="img/user.png" alt="User Image">
                <div>
                    <h4>Admin Name</h4>
                    
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1><?php echo $totalUsers; ?></h1>
                        <span>Users</span>
                    </div>
                    <div>
                        <span class="fas fa-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $totalSales; ?></h1>
                        <span>Sales</span>
                    </div>
                    <div>
                        <span class="fas fa-shopping-cart"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1><?php echo $totalFeedbacks; ?></h1>
                        <span>Feedbacks</span>
                    </div>
                    <div>
                        <span class="fas fa-comments"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>$<?php echo $totalEarnings; ?></h1>
                        <span>Earnings</span>
                    </div>
                    <div>
                        <span class="fas fa-dollar-sign"></span>
                    </div>
                </div>
            </div>
            <div class="recent-grid">
                <div class="orders">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Orders</h3>
                            <button>View All <span class="fas fa-arrow-right"></span></button>
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Star Refrigerator</td>
                                        <td>$1200</td>
                                        <td>Paid</td>
                                        <td><span class="status delivered">Delivered</span></td>
                                    </tr>
                                    <tr>
                                        <td>Dell Laptop</td>
                                        <td>$110</td>
                                        <td>Due</td>
                                        <td><span class="status pending">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>Apple Watch</td>
                                        <td>$1200</td>
                                        <td>Paid</td>
                                        <td><span class="status return">Return</span></td>
                                    </tr>
                                    <tr>
                                        <td>Adidas Shoes</td>
                                        <td>$620</td>
                                        <td>Due</td>
                                        <td><span class="status in-progress">In Progress</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>Recent Customers</h3>
                        </div>
                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <img src="img/customer1.png" alt="Customer Image">
                                    <div>
                                        <h4>David</h4>
                                        <small>Italy</small>
                                    </div>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/customer2.png" alt="Customer Image">
                                    <div>
                                        <h4>Amit</h4>
                                        <small>India</small>
                                    </div>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/customer1.png" alt="Customer Image">
                                    <div>
                                        <h4>David</h4>
                                        <small>Italy</small>
                                    </div>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/customer2.png" alt="Customer Image">
                                    <div>
                                        <h4>Amit</h4>
                                        <small>India</small>
                                    </div>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/customer1.png" alt="Customer Image">
                                    <div>
                                        <h4>David</h4>
                                        <small>Italy</small>
                                    </div>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <img src="img/customer2.png" alt="Customer Image">
                                    <div>
                                        <h4>Amit</h4>
                                        <small>India</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="js/main.js"></script>
</body>
</html>
