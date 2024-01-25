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
        <title>Services</title>

        <link rel="stylesheet" href="../assets/style/style.css">

        <style>       
            .form-control:focus {
                border-color: rgb(0, 190, 25) !important;
                box-shadow: 0 0 0 0.2rem rgb(0,114,5,0.25) !important;
            }
        </style>
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>
        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>
        <div id="admin-body">
            <section>
                <h1 id="pageHeader">Services</h1>
                <label class="ps-3 pt-4 fw-bold fs-4" for="accordionPanelsStay">Library Guide on how to navigate services</label>
                <div class="accordion p-3" id="accordionPanelsStay">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Adding new Service
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <span>In <strong>adding new servces</strong> click the <strong>"+"</strong> button to open the text editor. Input the services in the text box provided.</span>
                                <span>Make sure to input the complete discription of the services before saving.</span>
                                <span>Here is some example of a full description of a service: </span>
                                <br><br>
                                <span>Example. <br><h2>Title of service</h2><span>description of the service.</span> <br> <h4 class="ps-3">Sub heading of the service</h4><span class="ps-5">description of the sub heading.</span> </span>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Editing/Updating Services
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">
                                <span>In <strong>Editing/Updating</strong> services click the <strong>Edit</strong> button above the service you want to edit to make the text box editable. After editing make sure to click the <strong>save</strong> button to make sure that the service will be edited/updated.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid ps-5">
                    <h4>Add new Service <button id="addServiceBtn" class="btn m-3 border"><a class="nav-link" href="../render/add.php?id=0&page=services"><i class="fa-solid fa-plus"></i></a></button></h4>
                    <?php
                        $select_sql = "SELECT subText, mainText FROM librarypages WHERE pages = 'services'";
                        $result = mysqli_query($conn, $select_sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $subText = $row['subText'];

                            // Use prepared statement to avoid SQL injection
                            $select_sql1 = "SELECT mainText FROM librarypages WHERE subText = ?";
                            $stmt = mysqli_prepare($conn, $select_sql1);
                            mysqli_stmt_bind_param($stmt, "s", $subText);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $mainText);

                            while (mysqli_stmt_fetch($stmt)) {
                                ?>
                                <ul class="border mb-5 p-2">
                                    <a class="nav-link text-success" href="../render/edit.php?page=services&id=<?php echo $mainText ?>&subText=<?php echo $subText ?>">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <a class="nav-link text-danger hover" href="../render/delete.php?page=services&id=<?php echo $mainText ?>&subText=<?php echo $subText ?>">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a>

                                    <?php echo $subText; ?>
                                </ul>
                                <?php
                            }

                            mysqli_stmt_close($stmt);
                        }

                        mysqli_close($conn);
                    ?>
                </div>

            </section>
        </div>
        
        <script src="../assets/script/script.js"></script>
        

    </body>
</html>