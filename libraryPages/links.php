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
        <title>Quick Links</title>

        <link rel="stylesheet" href="../assets/style/style.css">

    </head>
    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body">
            <section>
                <h1 id="pageHeader">Quick Links</h1>
                <div class="container p-2">
                    <div class="border p-2 mb-3">
                        <h5>ACADEMIC SUBSCRIPTION <button id="btnNewAcademicSubscription" class="btn text-primary border"><a class="nav-link" href="../render/add.php?id=academic%20subscription&page=links"><i class="fa-solid fa-plus"></i></a></button></h5>
                        <?php
                            $select_sql = "SELECT subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'academic subscription'";
                            $result = mysqli_query($conn, $select_sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subText = $row['subText'];
                                    $link = $row['links'];
                                    // Output the hyperlink using the retrieved 'subText' and 'links'.
                                    echo '<ul><a class="nav-link" href="' . $link . '">' . $subText . '</a></ul>';
                                }
                            } else {
                                // Handle query execution errors here.
                                echo 'Error executing the query: ' . mysqli_error($conn);
                            }
                        ?>
                    </div>

                    <div class="border p-2 mb-3">
                        <h5>E-BOOKS <button id="btnNewEbooks" class="btn text-primary border"><a class="nav-link" href="../render/add.php?id=e-books&page=links"><i class="fa-solid fa-plus"></i></a></button></h5>
                        <?php
                            $select_sql = "SELECT subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'e-books'";
                            $result = mysqli_query($conn, $select_sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subText = $row['subText'];
                                    $link = $row['links'];
                                    // Output the hyperlink using the retrieved 'subText' and 'links'.
                                    echo '<ul><a class="nav-link" href="' . $link . '">' . $subText . '</a></ul>';
                                }
                            } else {
                                // Handle query execution errors here.
                                echo 'Error executing the query: ' . mysqli_error($conn);
                            }
                        ?>
                    </div>

                    <div class="border p-2 mb-3">
                        <h5>E-JOURNALS <button id="btnNewEjournals" class="btn text-primary border"><a class="nav-link" href="../render/add.php?id=e-journals&page=links"><i class="fa-solid fa-plus"></i></a></button></h5>
                        <?php
                            $select_sql = "SELECT subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'e-journals'";
                            $result = mysqli_query($conn, $select_sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subText = $row['subText'];
                                    $link = $row['links'];
                                    // Output the hyperlink using the retrieved 'subText' and 'links'.
                                    echo '<ul><a class="nav-link" href="' . $link . '">' . $subText . '</a></ul>';
                                }
                            } else {
                                // Handle query execution errors here.
                                echo 'Error executing the query: ' . mysqli_error($conn);
                            }
                        ?>
                    </div>

                    <div class="border p-2 mb-3">
                        <h5>CVSU-TANZA PAGE <button id="btnNewTanzaPage" class="btn text-primary border"><a class="nav-link" href="../render/add.php?id=cvsu%20tanza%20page&page=links"><i class="fa-solid fa-plus"></i></a></button></h5>
                        <?php
                            $select_sql = "SELECT subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'cvsu tanza page'";
                            $result = mysqli_query($conn, $select_sql);

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subText = $row['subText'];
                                    $link = $row['links'];
                                    // Output the hyperlink using the retrieved 'subText' and 'links'.
                                    echo '<ul><a class="nav-link" href="' . $link . '">' . $subText . '</a></ul>';
                                }
                            } else {
                                // Handle query execution errors here.
                                echo 'Error executing the query: ' . mysqli_error($conn);
                            }
                        ?>
                    </div>
                </div>
            </section>
        </div>

        <script src="../assets/script/script.js"></script>
            
    </body>
</html>