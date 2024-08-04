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
                                <a href="delete_store.php?id=<?php echo $seller['id']; ?>">Delete Store</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>