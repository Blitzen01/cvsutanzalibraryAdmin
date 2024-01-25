<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Settings</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body">
            <h1 id="pageHeader" class="mb-5">Account Settings</h1>

            <div class="container">
                <section id="profile">
                    <h1 id="pageHeader">Profile</h1>
                </section>
                <section id="personalInfo">
                    <h1 id="pageHeader">Personal Information</h1>
                </section>
            </div>
        </div>

        <script src="../assets/script/script.js"></script>
    </body>
</html>