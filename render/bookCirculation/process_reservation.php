<?php
    include '../../render/connection.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../assets/fonts/fonts.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $libraryId = $_GET['libraryid'];
        $name = $_GET['name'];
        $course = $_GET['course'];
        $email = $_GET['email'];
        $accessNo = $_GET['accessno'];
        $title = $_GET['title'];
        $author = $_GET['author'];
        $pickupDate = $_GET['pickupDate'];
        $returnDate = $_GET['returnDate'];
    }

    // Function to insert data into the booktransaction table
    function insertIntoBookTransaction($conn, $id, $libraryId, $name, $course, $email, $accessNo, $title, $author, $pickupDate, $returnDate)
    {
        $sql = "INSERT INTO bookborrowed (id, libraryid, name, courseSection, email, bookAccessNo, bookTitle, bookAuthor, pickupDate, returnDate) 
                VALUES ('$id', '$libraryId', '$name', '$course', '$email', '$accessNo', '$title', '$author', '$pickupDate', '$returnDate')";

        if ($conn->query($sql) === TRUE) {
            // Delete the record from the bookreserve table
            $deleteSql = "DELETE FROM bookreserve WHERE id = '$id'";
            if ($conn->query($deleteSql) === TRUE) {
                $redirectUrl = "../../admin/circulation.php#bookReservation";
                echo "Record inserted successfully! Record deleted from bookreserve!";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                echo "Error deleting record from bookreserve: " . $conn->error;
            }
        } else {
            echo "Error inserting record into bookborrowed: " . $conn->error;
        }
    }

    if (isset($_POST['insert_button'])) {
        // Insert the data into the booktransaction table when the button is clicked
        insertIntoBookTransaction($conn, $id, $libraryId, $name, $course, $email, $accessNo, $title, $author, $pickupDate, $returnDate);

    }

    // Close the database connection
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Accept Reservation</title>
        
        <link rel="stylesheet" href="../../assets/style/style.css">

    </head>

    <body>
        <div class="container text-center pt-5">
            <h1>Reservation Details</h1>
            <div class="col-sm-10 col-lg-6 text-start border border-secondary rounded ps-5 ms-auto me-auto">
                <div class="text-end p-1">
                    <a class="nav-link p-3" href="../../admin/circulation.php"><i class="fa-solid fa-x"></i></a>
                </div>
                <?php
                    // Display the data
                    echo '<p><strong>Library ID:</strong> ' . $libraryId . '</p>';
                    echo '<p><strong>Name:</strong> ' . $name . '</p>';
                    echo '<p><strong>Course & Section:</strong> ' . $course . '</p>';
                    echo '<p><strong>Email:</strong> ' . $email . '</p>';
                    echo '<p><strong>Book Access No.:</strong> ' . $accessNo . '</p>';
                    echo '<p><strong>Book Title:</strong> ' . $title . '</p>';
                    echo '<p><strong>Book Author:</strong> ' . $author . '</p>';
                    echo '<p><strong>Pickup Date:</strong> ' . $pickupDate . '</p>';
                    echo '<p><strong>Return Date:</strong> ' . $returnDate . '</p>';
                ?>
                <!-- Button to insert data into bookborrowed table -->
                <form method="post" class="text-end">
                    <button type="submit" class="btn btn-success m-3" name="insert_button">PICK UP</button>
                </form>

            </div>
        </div>

    </body>
</html>