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
        <title>Edit Library Hours</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    <body class="m-2">
        <div class="container p-3 card mx-auto mt-5">
            <div class="text-end">
                <a class="nav-link pb-3" href="../libraryPages/opacSearch.php"><i class="fa-solid fa-x"></i></a>
            </div>
            <h3 class="text-center">Update Library Hours Schedule</h3>
            <form action="" method="post">
                <!-- select day schedule -->
                <div class="row">
                    <div class="col">
                        <label for="startDay">Select start day:</label>
                        <select id="startDay" name="startDay" class="form-select">
                            <option value="default">Open this select menu</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    </div>
                <div class="col">
                    <label for="endDay">Select end day:</label>
                    <select id="endDay" name="endDay" class="form-select">
                        <option value="default">Open this select menu</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                        <option value="Sunday">Sunday</option>
                    </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <!-- select time schedule -->
                        <label for="startTime">Select start time:</label>
                        <select id="startTime" name="startTime" class="form-select">
                            <!-- Options for hours from 7 AM to 6:30 PM in both 24-hour and 12-hour format -->
                            <<option value="default">Open this select menu</option>
                            <option value="06:00">6:00 AM</option>
                            <option value="06:30">6:30 AM</option>
                            <option value="07:00">7:00 AM</option>
                            <option value="07:30">7:30 AM</option>
                            <option value="08:00">8:00 AM</option>
                            <option value="08:30">8:30 AM</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="09:30">9:30 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="10:30">10:30 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="11:30">11:30 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="12:30">12:30 PM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="13:30">1:30 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="14:30">2:30 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="15:30">3:30 PM</option>
                            <option value="16:00">4:00 PM</option>
                            <option value="16:30">4:30 PM</option>
                            <option value="17:00">5:00 PM</option>
                            <option value="17:30">5:30 PM</option>
                            <option value="18:00">6:00 PM</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="endTime">Select end time:</label>
                        <select id="endTime" name="endTime" class="form-select">
                            <!-- Options for hours from 7 AM to 6:30 PM in both 24-hour and 12-hour format -->
                            <option value="default">Open this select menu</option>
                            <option value="06:00">6:00 AM</option>
                            <option value="06:30">6:30 AM</option>
                            <option value="07:00">7:00 AM</option>
                            <option value="07:30">7:30 AM</option>
                            <option value="08:00">8:00 AM</option>
                            <option value="08:30">8:30 AM</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="09:30">9:30 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="10:30">10:30 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="11:30">11:30 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="12:30">12:30 PM</option>
                            <option value="13:00">1:00 PM</option>
                            <option value="13:30">1:30 PM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="14:30">2:30 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="15:30">3:30 PM</option>
                            <option value="16:00">4:00 PM</option>
                            <option value="16:30">4:30 PM</option>
                            <option value="17:00">5:00 PM</option>
                            <option value="17:30">5:30 PM</option>
                            <option value="18:00">6:00 PM</option>
                        </select>
                    </div>
                </div>

                <div class="text-end">
                    <input class="btn btn-success m-2" type="submit" value="UPDATE">
                </div>

                <?php
                    // Handle form submission
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Get selected values from the form
                        $startDay = $_POST["startDay"];
                        $endDay = $_POST["endDay"];
                        $startTime = $_POST["startTime"];
                        $endTime = $_POST["endTime"];
                    
                        // Check if default values were selected
                        if ($startDay == "default" || $endDay == "default" || $startTime == "default" || $endTime == "default") {
                            echo "<span class='text-danger'>Please select valid values for all fields.</span>";
                        } else {
                            // Construct the update query
                            $updateQuery = "UPDATE librarypages SET mainText = '$startDay - $endDay', subText = '$startTime - $endTime' WHERE links = 'libraryHours'";
                    
                            // Execute the update query
                            if ($conn->query($updateQuery) === TRUE) {
                                $redirectUrl = "../libraryPages/opacSearch.php";
                                echo "Record updated successfully";
                                echo '<script type="text/javascript">';
                                echo 'window.location.href = "' . $redirectUrl . '";';
                                echo '</script>';
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }
                    }
                ?>
            </form>
        </div>

        <script src="../assets/script/script.js"></script>

        <script>
            function updateTable() {
                // Add your logic to update the table based on selected values
                var startDay = document.getElementById("startDay").value;
                var endDay = document.getElementById("endDay").value;
                var startTime = document.getElementById("startTime").value;
                var endTime = document.getElementById("endTime").value;

                // Check if any of the values are still set to "default"
                if (startDay === "default" || endDay === "default" || startTime === "default" || endTime === "default") {
                    alert("Please select values for all fields before updating the table.");
                } else {
                    // Perform table update here
                    console.log("Start Day:", startDay);
                    console.log("End Day:", endDay);
                    console.log("Start Time:", startTime);
                    console.log("End Time:", endTime);
                }
            }
        </script>
    </body>
</html>