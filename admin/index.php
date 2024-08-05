<?php 
session_start();
require '../model/dbconnection.php';
require 'classes/Admin.php';
include("includes/header.php");

// Instantiate the Admin class
$admin = new Admin(Dbh::connect());

// Get counts from the database
$totalUsers = $admin->getTotalUsers();
$totalSales = $admin->getTotalSales();
$totalFeedbacks = $admin->getTotalFeedbacks();
$totalEarnings = $admin->getTotalEarnings();
?>
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card card-body p-3" style="background-color: #d6bfb1; color: black; border-radius: 10px;">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Users</p>
            <h5 class="font-weight-bolder mb-0">
                <?php echo $totalUsers; ?>
            </h5>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card card-body p-3" style="background-color: #d6bfb1; color: black; border-radius: 10px;">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Feedbacks</p>
            <h5 class="font-weight-bolder mb-0">
                <?php echo $totalFeedbacks; ?>
            </h5>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card card-body p-3" style="background-color: #d6bfb1; color: black; border-radius: 10px;">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Sales</p>
            <h5 class="font-weight-bolder mb-0">
                <?php echo $totalSales; ?>
            </h5>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card card-body p-3" style="background-color: #d6bfb1; color: black; border-radius: 10px;">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Earnings</p>
            <h5 class="font-weight-bolder mb-0">
                <?php echo $totalEarnings; ?>
            </h5>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
