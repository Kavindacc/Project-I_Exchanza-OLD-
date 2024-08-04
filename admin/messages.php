<?php
session_start();
include("includes/header.php");
require '../model/dbconnection.php';
require 'classes/Admin.php';

/*if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}*/

$admin = new Admin(Dbh::connect());
$messages = $admin->getMessages();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message_id = $_POST['message_id'];
    $reply = $_POST['reply'];
    $admin->replyMessage($message_id, $reply);
    header("Location: messages.php");
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="messages">
                    <h4>Messages</h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Message</th>
                                <th>Reply</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $message) : ?>
                                <tr>
                                    <td><?php echo $message['id']; ?></td>
                                    <td><?php echo $message['username']; ?></td>
                                    <td><?php echo $message['message']; ?></td>
                                    <td><?php echo $message['reply']; ?></td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="message_id" value="<?php echo $message['id']; ?>">
                                            <textarea name="reply"></textarea>
                                            <button type="submit">Reply</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>