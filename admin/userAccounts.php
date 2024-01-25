<?php
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Circulation</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>
        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>
        <div id="admin-body">
            <section id="list">
                <h1 id="pageHeader">List</h1>
            </section>
            
            <section id="view">
                <h1 id="pageHeader">View</h1>
            </section>
            
            <section id="profile">
                <h1 id="pageHeader">Profile</h1>
            </section>
            
        </div>

        <script src="../assets/script/script.js"></script>
    </body>
</html>