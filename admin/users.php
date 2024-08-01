<?php
session_start();
include("includes/header.php");
include("../model/dbconnection.php");
require 'classes/Admin.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$admin = new Admin($conn);
$customers = $admin->getCustomers();
$sellers = $admin->getSellers();
?>

<div class="row">
    <div class="col-md-12">

        <?php if (isset($_SESSION['message'])) : ?>
            <h6 class="alert alert-success"><?= $_SESSION['message']; ?></h6>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h4>
                    Users List
                    <!--<a href="users-create.php" style="background-color:#CEC0B9; color:#4C3F31;" class="btn btn-sm float-end">Add user</a>-->

                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM users";
                        $statement = $conn->prepare($query);
                        $statement->execute();


                        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                        if ($result) {
                            foreach ($result as $row) {
                        ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= $row['name']; ?></td>
                                    <td><?= $row['email']; ?></td>
                                    <td><?= $row['phone']; ?></td>
                                    <td><?= $row['role']; ?></td>
                                    <td><?= $row['is_ban'] == 1 ? 'Banned' : 'Active'; ?></td>

                                    <td>
                                        <a href="users-edit.php?id=<?= $row['id']; ?>" style="background-color:#897062; color:white;" class="btn btn-sm">Edit</a>

                                    </td>
                                    <td>
                                        <form action="code.php" method="POST">
                                            <button type="submit" name="delete_user" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this data?')">Delete</button>

                                        </form>
                                    </td>

                                </tr>

                            <?php

                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">No record found</td>
                            </tr>
                        <?php

                        }
                        ?>

                    </tbody>
                </table>

            </div>
        </div>


    </div>

</div>


    <?php include("includes/footer.php"); ?>