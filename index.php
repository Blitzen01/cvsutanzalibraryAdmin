<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CVSU Tanza Campus - Library</title>

        <link rel="stylesheet" href="assets/style/style.css">
        <?php include "assets/cdn/cdn_links.php" ;?>
    </head>

    <body>
        <?php
            // Check if the user is already logged in
            session_start();
            if (isset($_SESSION['username'])) {
                header("Location: admin/dashboard.php"); // Redirect to the dashboard if already logged in
                exit;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Validate user credentials (you may want to fetch the data from a database)
                $username = 'admin'; // Replace with your desired username
                $password = 'password'; // Replace with your desired password

                $submitted_username = $_POST['username'];
                $submitted_password = $_POST['password'];

                if ($username === $submitted_username && $password === $submitted_password) {
                    // Set the session variable to indicate the user is logged in
                    $_SESSION['username'] = $username;
                    header("Location: admin/dashboard.php");
                    exit;
                } else {
                    echo '<p style="color: red;">Invalid credentials. Please try again.</p>';
                }
            }
        ?>

        <div id="adminLogin" class="card shadow-lg">
            
            <div class="text-center pt-2">
                <img src="image/cvsu_library.png" alt="" srcset="">
            </div>
            <div class="card-body">
                <form class="pt-1" action="index.php" method="post">
                    <h2>Librarian</h2>

                    <p class="text-center pt-2">or</p>

                    <div id="text-field">
                        <label for="username">Username</label>
                        <input type="text" name="username" autocomplete="off" required placeholder="Enter your username">
                    </div>
                    <div id="text-field">
                        <label for="password">Password</label>
                        <input type="password" name="password" required placeholder="Enter your password">
                    </div>
                    <button id="loginBtn" type="submit" name="loginBtn">LOG IN</button>
                    <h6><a class="nav-link text-end pt-3" href="">forgot password ?</a></h6>
                </form>
            </div>
        </div>

    </body>
    
</html>