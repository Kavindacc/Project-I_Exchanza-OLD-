<?php
// test code
session_start();
include("../model/dbconnection.php");

if(isset($_POST['delete_user']))
{
    $user_id =$_POST['delete_user'];

    try {
        $query = "DELETE FROM usern WHERE id=:user_id";
        $statement = $conn->prepare($query);
        $data = [':user_id'=>$user_id];

       $query_execute = $statement->execute($data);

       if ($query_execute) {
        $_SESSION['message'] = "Deleted Successfully";
        header("Location: users.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something went wrong";
        header("Location: users.php");
        exit(0);
    }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


if (isset($_POST['updateuser_btn'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $is_ban = isset($_POST['is_ban']) && $_POST['is_ban'] == true ? 1 : 0;
    $role = $_POST['role'];

    try {

        $query = "UPDATE users SET name=:name, phone=:phone, email=:email, is_ban=:is_ban, role=:role WHERE id = :user_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ":name" => $name,
            ":phone" => $phone,
            ":email" => $email,
            ":is_ban" => $is_ban,
            ":role" => $role,
            ":user_id" => $user_id,

        ];
        $query_execute = $statement->execute($data);

        
        if ($query_execute) {
            $_SESSION['message'] = "Updated Successfully";
            header("Location: users.php");
            exit(0);
        } else {
            $_SESSION['message'] = "Something went wrong";
            header("Location: users.php");
            exit(0);
        }
    } catch (\PDOException $e) {
        echo $e->getMessage();
    }
}









if (isset($_POST['saveuser'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_ban = isset($_POST['is_ban']) && $_POST['is_ban'] == true ? 1 : 0;
    $role = $_POST['role'];

    $query = "INSERT INTO users (name, phone, email, password, is_ban, role) VALUES(:name, :phone, :email, :password, :is_ban, :role)";
    $query_run = $conn->prepare($query);

    $data = [
        ":name" => $name,
        ":phone" => $phone,
        ":email" => $email,
        ":password" => $password,
        ":is_ban" => $is_ban,
        ":role" => $role,
    ];
    $query_execute = $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "Added Successfully";
        header("Location: users.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something went wrong";
        header("Location: users.php");
        exit(0);
    }
}
