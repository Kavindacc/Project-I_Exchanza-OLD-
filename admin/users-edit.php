<?php 
include("includes/header.php"); 
include("../model/dbconnection.php"); 
?>

<div class="row">
    
    
        <div class="card">

            <div class="card-header">
                <h4>
                    Edit User
                    <a href="users.php" style="background-color:#CEC0B9; color:#4C3F31;" class="btn btn-danger btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <?php
                if(isset($_GET['id']))
                {
                    $users_id= $_GET['id'];

                    $query = "SELECT * FROM usern WHERE userid = :user_id LIMIT 1" ;
                    $statement = Dbh::connect()->prepare($query);
                    $data =[":user_id" =>$users_id];
                    $statement->execute($data);

                    $result = $statement->fetch(PDO::FETCH_ASSOC);
                }

                ?>
                <form action="code.php" method="POST">
                    <!-- <input type="hidden" name="user_id" value="<?=$result['userid']; ?>"/>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $result['name']; ?>" class="form-control">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Phone No.</label>
                                <input type="text" name="phone" value="<?= $result['phoneno']; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" value="<?= $result['email']; ?>" class="form-control">
                            </div>
                        </div>
                       
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label>Select Role</label>
                                <select name="role" class="form-select">
                                    <option value="">Select role</option>
                                    <option value="admin"<?= $result['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                    <option value="user"<?= $result['role'] == 'customer' ? 'selected' : ''; ?>>Customer</option>
                                    <option value="user"<?= $result['role'] == 'seller' ? 'selected' : ''; ?>>Seller</option>

                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>Is Ban</label>
                                </br>
                                <input type="checkbox" name="is_ban" <?= $result['is_ban'] ? 'checked' : ''; ?> style="width:30px;height:30px">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                            </br>
                                <button type="submit" name="updateuser_btn" style="background-color:#897062; color:white;" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>

</div>




<?php include("includes/footer.php");?>