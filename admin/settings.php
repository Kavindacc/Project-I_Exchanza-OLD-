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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contact_details = $_POST['contact_details'];
    $social_media_links = $_POST['social_media_links'];
   $admin->updateSettings($contact_details, $social_media_links);
    header("Location: settings.php");
}

$settings = $admin->getSettings();
?>


    <div class="settings">
        <h4>Site Settings</h4>
        <form method="post">
            <label for="contact_details">Contact Details</label>
            <textarea name="contact_details"><?php echo $settings['contact_details']; ?></textarea>
            <label for="social_media_links">Social Media Links</label>
            <textarea name="social_media_links"><?php echo $settings['social_media_links']; ?></textarea>
            <button type="submit">Update</button>
        </form>
    </div>

