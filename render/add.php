<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';

    if(isset($_GET['id']) && isset($_GET['page'])) {
        $id = $_GET['id'];
        $page = $_GET['page'];
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>

        <link rel="stylesheet" href="../style.css">

        <!-- Bootstrap style -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <!-- Bootstrap script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- font awesome -->
        <script src="https://kit.fontawesome.com/9475ab4ee0.js" crossorigin="anonymous"></script>

        <style>
            /* service */
            .ck-editor__editable[role="textbox"] {
                min-height: 300px;
            }

            .ck-editor__editable[role="textbox"]:focus {
                border-color: rgb(0, 190, 25) !important;
                box-shadow: 0 0 0 0.2rem rgb(0,114,5,0.25) !important;
            }

            .form-control:focus {
                border-color: rgb(0, 190, 25) !important;
                box-shadow: 0 0 0 0.2rem rgb(0,114,5,0.25) !important;
            }
        </style>
    </head>

    <body>
        <?php
            // adding data for about
            if($page == 'about') {

                ?>

                <div class="container p-5">
                    <h1 style="text-transform: uppercase;">Insert New <?php echo $id; ?></h1>
                    <form method="post">
                        <input type="text" class="form-control mb-2" name="addSubtext" autocomplete="off" placeholder="Enter new <?php echo $id; ?>">
                        <button class="btn btn-success" type="submit" name="addBtn">ADD</button>
                        <button class="btn btn-danger"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">CANCEL</a></button>
                    </form>

                    <?php
                        // Check if the form is submitted
                        if (isset($_POST['addBtn'])) {
                            // Get the form data
                            $subText = $_POST['addSubtext'];

                            // Create a prepared statement
                            $insert_sql = "INSERT INTO librarypages (pages, mainText, subText) VALUES (?, ?, ?)";
                            $stmt = mysqli_prepare($conn, $insert_sql);

                            if ($stmt) {
                                // Bind parameters
                                mysqli_stmt_bind_param($stmt, "sss", $page, $id, $subText);

                                // Set parameter values
                                $page = $page; // You may want to set $page to a default value or fetch it from somewhere

                                // Execute the statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Insert successful
                                    echo "Record inserted successfully.";
                                    echo '<script type="text/javascript">setTimeout(function(){ location.href = "../librarypages/about.php"; }, 500);</script>';
                                } else {
                                    // Insert failed
                                    echo "Error: " . mysqli_error($conn);
                                }

                                // Close the statement
                                mysqli_stmt_close($stmt);
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        }

                    ?>

                    <button class="btn d-flex ms-auto btn-info"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">Go Back</a></button>
                </div>

                <?php

            } else if($page == 'links') {

                ?>

                    <div class="container p-5">
                        <h1 style="text-transform: uppercase;">Insert New <?php echo $id; ?></h1>
                        <form method="post">
                            <input type="text" class="form-control mb-2" name="addSubtext" autocomplete="off" placeholder="Enter new <?php echo $id; ?>">
                            <input type="text" class="form-control mb-2" name="links" autocomplete="off" placeholder="Enter links">
                            <button class="btn btn-success" type="submit" name="addBtn">ADD</button>
                            <button class="btn btn-danger"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">CANCEL</a></button>
                        </form>
                        <?php
                        // Check if the form is submitted
                        if (isset($_POST['addBtn'])) {
                            // Get the form data
                            $subText = $_POST['addSubtext'];
                            $links = $_POST['links'];

                            // Create a prepared statement
                            $insert_sql = "INSERT INTO librarypages (pages, mainText, subText, links) VALUES (?, ?, ?, ?)";
                            $stmt = mysqli_prepare($conn, $insert_sql);

                            if ($stmt) {
                                // Bind parameters
                                mysqli_stmt_bind_param($stmt, "ssss", $page, $id, $subText, $links);

                                // Set parameter values
                                $page = $page; // You may want to set $page to a default value or fetch it from somewhere

                                // Execute the statement
                                if (mysqli_stmt_execute($stmt)) {
                                    // Insert successful
                                    echo "Record inserted successfully.";
                                    echo '<script type="text/javascript">setTimeout(function(){ location.href = "../librarypages/links.php"; }, 500);</script>';
                                } else {
                                    // Insert failed
                                    echo "Error: " . mysqli_error($conn);
                                }

                                // Close the statement
                                mysqli_stmt_close($stmt);
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        }
                        ?>
                        <button class="btn d-flex ms-auto btn-info mt-5"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">Go Back</a></button>

                    </div>

                <?php

            } else if($page == 'services') {

                ?>
                    <div class="container p-5">
                        <h1 style="text-transform: uppercase;">Insert New <?php echo $page; ?></h1>
                        <form method="post">
                            <input type="text" class="form-control mb-2" name="addMainText" autocomplete="off" placeholder="Enter the title of <?php echo $page; ?>" require>
                            <textarea class="form-control mb-2" id="addServiceEditor" name="addSubtext"  autocomplete="off" require></textarea>
                            <input class="btn btn-success mt-2" type="submit" name="addBtn" value="ADD">
                            <button class="btn btn-danger mt-2"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">CANCEL</a></button>
                        </form>

                        <?php
                            // Check if the form is submitted
                            if (isset($_POST['addBtn'])) {
                                // Get the form data
                                $mainText = $_POST['addMainText'];
                                $subText = $_POST['addSubtext'];

                                // Define the $page variable
                                $page = "services"; // Replace "your_page_value" with the actual value you want to use

                                // Create a prepared statement
                                $insert_sql = "INSERT INTO librarypages (pages, mainText, subText) VALUES (?, ?, ?)";
                                $stmt = mysqli_prepare($conn, $insert_sql);

                                if ($stmt) {
                                    // Bind parameters
                                    mysqli_stmt_bind_param($stmt, "sss", $page, $mainText, $subText);

                                    // Execute the statement
                                    if (mysqli_stmt_execute($stmt)) {
                                        // Insert successful
                                        echo "Record inserted successfully.";
                                        echo '<script type="text/javascript">setTimeout(function(){ location.href = "../librarypages/services.php"; }, 500);</script>';
                                    } else {
                                        // Insert failed
                                        echo "Error: " . mysqli_error($conn);
                                    }

                                    // Close the statement
                                    mysqli_stmt_close($stmt);
                                } else {
                                    echo "Error: " . mysqli_error($conn);
                                }
                                
                                
                            }
                        ?>

                        <button class="btn d-flex ms-auto btn-info mt-5"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">Go Back</a></button>
                    </div>
                    
                <?php
            }

        ?>


        <script src="../script.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#addServiceEditor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    </body>
</html>