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
        <title>About</title>

        <link rel="stylesheet" href="../assets/style/style.css">

    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body">
            <section>
                <h1 id="pageHeader">About</h1>
                <div class="container">
                    <p class="fs-4 fw-bold">UNIVERSITY VISION AND MISSION</p>
                    
                    <div class="mb-5">
                        <span class="fs-5" id="vision">Vision</span>
                        
                        <!-- diplaying vision -->
                        <p class="border p-2 m-2" id="vision">
                        <?php
                               $select_sql = "SELECT subText FROM librarypages WHERE mainText = 'vision'";
                               $select_sql1 = mysqli_query($conn, $select_sql);
                               while($vision = mysqli_fetch_array($select_sql1)) {
                                    ?>
                                        <a class="nav-link" href="../render/edit.php?page=about&id=vision&subText=<?php echo $vision['subText'] ?>"><i class="fa-solid fa-pen-to-square text-success"></i> <?php echo $vision['subText']; ?></a>
                                        
                                    <?php
                               }
                            ?>
                        </p>
                    </div>
                    
                    <div class="mb-5">
                        <span class="fs-5" id="mission">Mission</span>
                        <!-- diplaying mission -->
                        <p class="border p-2 m-2" id="mission">
                            <?php
                               $select_sql = "SELECT subText FROM librarypages WHERE mainText = 'mission'";
                               $select_sql1 = mysqli_query($conn, $select_sql);
                               while($mission = mysqli_fetch_array($select_sql1)) {
                                    ?>
                                        <a class="nav-link" href="../render/edit.php?page=about&id=mission&subText=<?php echo $mission['subText'] ?>"><i class="fa-solid fa-pen-to-square text-success"></i> <?php echo $mission['subText'] ?></a>
                                        
                                    <?php
                               }
                            ?>

                        </p>
                    </div>

                    <p id="objective" class="fs-4 fw-bold">Library Objectives <button class="btn text-primary border" id="btnAddObjectives"><a class="nav-link" href="../render/add.php?id=objective&page=about"><i class="fa-solid fa-plus"></i></a></button></p>
                    
                    <div class="border mb-5 p-2">
                        <?php
                            $select_sql = "SELECT id, subText FROM librarypages WHERE pages = 'about' AND mainText = 'objective'";
                            $result = mysqli_query($conn, $select_sql);

                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <ul>
                                    <a class="nav-link text-success" href="../render/edit.php?page=about&id=<?php echo $row['id']; ?>&subText=<?php echo $row['subText']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <a class="nav-link text-danger" href="../render/delete.php?page=about&id=<?php echo $row['id'] ?>&subText=<?php echo $row['subText']; ?>">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a>
                                    <?php echo $row['subText']; ?>
                                </ul>
                        <?php
                            }
                        ?>
                    </div>


                    <p class="fs-4 fw-bold">Library Rules and Regulations <button class="btn text-primary border" id="btnAddRules"><a class="nav-link" href="../render/add.php?id=rules&page=about"><i class="fa-solid fa-plus"></i></a></button></p>
                    <div class="border mb-5 p-2">
                        <?php
                            $select_sql = "SELECT id, subText FROM librarypages WHERE pages = 'about' AND mainText = 'rules'";
                            $result = mysqli_query($conn, $select_sql);

                            while($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <ul>
                                    <a class="nav-link text-success" href="../render/edit.php?page=about&id=<?php echo $row['id']; ?>&subText=<?php echo $row['subText']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <a class="nav-link text-danger" href="../render/delete.php?page=about&id=<?php echo $row['id'] ?>&subText=<?php echo $row['subText']; ?>">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a>
                                    <?php echo $row['subText']; ?>
                                </ul>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>




        <script src="../assets/script/script.js"></script>

    </body>
</html>