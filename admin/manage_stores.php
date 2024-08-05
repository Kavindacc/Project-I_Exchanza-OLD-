<?php
session_start();
require '../model/dbconnection.php';
require 'classes/Admin.php';
include("includes/header.php");

/*if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}*/

$admin = new Admin(Dbh::connect());
$sellers = $admin->getSellers();
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <h4>Manage Stores</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Variant</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sellers as $seller) : ?>
                        <tr>
                            <td><?php echo $seller['id']; ?></td>
                            <td><?php echo $seller['username']; ?></td>
                            <td><?php echo $seller['email']; ?></td>
                            <td><?php echo $seller['variant']; ?></td>
                            <td>
                            <button type="submit" a href="delete_store.php?id=<?= $seller['id']; ?>" style="background-color:#897062; color:white;" class="btn btn-sm" onclick="return confirm('Are you sure you want to ban this user?')">Delete</a>
                            <!-- <button type="submit" a href="delete_store.php?id=<?php echo $seller['id']; ?>">Delete Store</a> onclick="return confirm('Are you sure you want to delete this data?')">Delete</button> -->
                                <!-- <button type="submit" name="delete_user" value="<?= $row['userid']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>