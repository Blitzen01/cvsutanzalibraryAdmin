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
        <title>OPAC Search</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body">
            <section>
                <h1 id="pageHeader">OPAC Search</h1>
                <div class="container">
                    <div class="row mb-5 text-center border-bottom pb-5">
                        <div class="col">
                            <?php
                                $sql = "SELECT subText FROM librarypages WHERE pages = 'opacSearch' AND mainText = 'background'";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $imageName = $row["subText"];

                                    echo ' <img id="opacBG" src="../render/uploads/images/' . $imageName . '" alt="Image">';
                                    ?>
                                        <div class="text-start">
                                            <a class="btn text-primary" href="../render/updateOpacSearch/updateOpacImage.php?pages=opacSearch&mainText=background&subText=<?php echo $imageName; ?>">Edit</a>
                                        </div>
                                    <?php
                                } else {
                                    echo "No image found in the database.";
                                }
                            ?>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row text-center">
                            <div class="px-3">
                                <h3>LIBRARY TRANSACTIONS</h3>
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-5">
                                <!-- library hours -->
                                <div class="m-1">
                                    <h4>LIBRARY HOURS</h4>
                                    <span><a class="text-primary nav-link" href="../render/editLibraryHours.php">Edit</a></span>
                                    <?php
                                        // Fetch data from the database
                                        $libraryDayQuery = "SELECT mainText, subText FROM librarypages WHERE links = 'libraryHours'";
                                        $resultDay = $conn->query($libraryDayQuery);

                                        // Check if the query was successful
                                        if ($resultDay === false) {
                                            echo "Error: " . $conn->error;
                                        } else {
                                            // Check if there are rows in the result set
                                            if ($resultDay->num_rows > 0) {
                                                // Loop through the rows and display the data
                                                while ($row = $resultDay->fetch_assoc()) {
                                                    echo "<span><h6>" . $row['mainText'] . "</h6></span>";

                                                    // Check if subText exists in the row
                                                    if (isset($row['subText'])) {
                                                        // Split the range into start and end times
                                                        list($startTime, $endTime) = explode(" - ", $row['subText']);

                                                        // Convert start time to 12-hour format with AM/PM
                                                        $formattedStartTime = date("h:i A", strtotime($startTime));

                                                        // Convert end time to 12-hour format with AM/PM
                                                        $formattedEndTime = date("h:i A", strtotime($endTime));

                                                        // Display the formatted range
                                                        echo "<span>" . $formattedStartTime . " - " . $formattedEndTime . "</span>";
                                                    } else {
                                                        echo "<span>No subText data found</span>";
                                                    }
                                                }
                                            } else {
                                                echo "No data found";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 mb-5 text-center">
                                <!-- overdue fines -->
                                <div class="m-1">
                                    <h4>Overdue Fines</h4>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>CLIENT</th>
                                                <th>BOOK TYPE</th>
                                                <th>FINES</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-start">
                                            <tr>
                                                <td>
                                                    Student
                                                </td>
                                                <td>
                                                    <div class="border-bottom pb-4">General Circulation</div>
                                                    <div>Reserve</div>
                                                </td>
                                                <td>
                                                    <div class="border-bottom">
                                                        <?php
                                                            $sgc = "SELECT links FROM librarypages WHERE mainText = 'student' AND subText = 'general circulation'";
                                                            $result = $conn->query($sgc);
                                                            
                                                            if ($result->num_rows > 0) {
                                                                // Fetch the data and store it in the $librarypages variable
                                                                $row = $result->fetch_assoc();
                                                                $librarypages = $row['links'];
                                                                
                                                                echo 'Php ' . $librarypages . "/day*<a class='nav-link text-primary' href='../render/editFines.php?mainText=student&subText=general circulation&links=$librarypages'>Edit</a>";
                                                            } else {
                                                                echo "No results found";
                                                            }
                                                        ?>
                                                    </div>
                                                    <div>
                                                        <?php
                                                            $sgc = "SELECT links FROM librarypages WHERE mainText = 'student' AND subText = 'reserve'";
                                                            $result = $conn->query($sgc);
                                                            
                                                            if ($result->num_rows > 0) {
                                                                // Fetch the data and store it in the $librarypages variable
                                                                $row = $result->fetch_assoc();
                                                                $librarypages = $row['links'];
                                                            
                                                                    
                                                                
                                                                echo 'Php ' . $librarypages . "/day*<a class='nav-link text-primary' href='../render/editFines.php?mainText=student&subText=reserve&links=$librarypages'>Edit</a>";
                                                                
                                                            } else {
                                                                echo "No results found";
                                                            }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Faculty
                                                </td>
                                                <td>
                                                    <div class="border-bottom pb-4">General Circulation</div>
                                                    <div>Reserve</div>
                                                </td>
                                                <td>
                                                    <div class="border-bottom">
                                                        <?php
                                                                $sgc = "SELECT links FROM librarypages WHERE mainText = 'faculty' AND subText = 'general circulation'";
                                                                $result = $conn->query($sgc);
                                                                
                                                                if ($result->num_rows > 0) {
                                                                    // Fetch the data and store it in the $librarypages variable
                                                                    $row = $result->fetch_assoc();
                                                                    $librarypages = $row['links'];
                                                                    
                                                                    echo 'Php ' . $librarypages . "/day*<a class='nav-link text-primary' href='../render/editFines.php?mainText=faculty&subText=general circulation&links=$librarypages'>Edit</a>";
                                                                } else {
                                                                    echo "No results found";
                                                                }
                                                            ?>
                                                    </div>
                                                    <div>
                                                        <?php
                                                                $sgc = "SELECT links FROM librarypages WHERE mainText = 'faculty' AND subText = 'reserve'";
                                                                $result = $conn->query($sgc);
                                                                
                                                                if ($result->num_rows > 0) {
                                                                    // Fetch the data and store it in the $librarypages variable
                                                                    $row = $result->fetch_assoc();
                                                                    $librarypages = $row['links'];
                                                                
                                                                    echo 'Php ' . $librarypages . "/day*<a class='nav-link text-primary' href='../render/editFines.php?mainText=faculty&subText=reserve&links=$librarypages'>Edit</a>";
                                                                } else {
                                                                    echo "No results found";
                                                                }
                                                            ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>







        <script src="../assets/script/script.js"></script>
    </body>
</html>