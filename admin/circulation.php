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
        <title>Circulation</title>

        <link rel="stylesheet" href="../assets/style/style.css">
        
        <style>
            
/* admin transaction | remarks change of colors */
.text-danger {
    color: red;
}

.text-success {
    color: green;
}

.text-warning {
    color: orange;
}
/* admin transaction | remarks change of colors */


        </style>
    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>

        <div id="admin-body" class="pt-2">
            <section id="bookReservation" class="">
                <h1 id="pageHeader">Book Reservation</h1>
                <div class="p-5">
                    <?php
                        // Fetch data from the bookReservation table
                        $sql = "SELECT * FROM bookreserve";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Output a table header
                            ?>
                                <table id="bookReserveTable" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Library Id</th>
                                        <th>Name</th>
                                        <th>Book Access No.</th>
                                        <th>Book Title</th>
                                        <th>Book Author</th>
                                        <th>Pickup Date</th>
                                        <th>Return Date</th>
                                        <th>Course & Section</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                                <button class="btn btn-success btn-sm accept_request"
                                                        data-id="<?php echo $row["id"]; ?>"
                                                        data-libraryid="<?php echo $row["libraryid"]; ?>"
                                                        data-name="<?php echo $row["name"]; ?>"
                                                        data-course="<?php echo $row["courseSection"]; ?>"
                                                        data-email="<?php echo $row["email"]; ?>"
                                                        data-accessno="<?php echo $row["bookAccessNo"]; ?>"
                                                        data-title="<?php echo $row["bookTitle"]; ?>"
                                                        data-author="<?php echo $row["bookAuthor"]; ?>"
                                                        data-pickup="<?php echo $row["pickupDate"]; ?>"
                                                        data-return="<?php echo $row["returnDate"]; ?>">Pick Up
                                                </button> 
                                                <button class="btn btn-danger btn-sm decline_request"
                                                        data-id="<?php echo $row["id"]; ?>"
                                                        data-libraryid="<?php echo $row["libraryid"]; ?>"
                                                        data-name="<?php echo $row["name"]; ?>"
                                                        data-course="<?php echo $row["courseSection"]; ?>"
                                                        data-email="<?php echo $row["email"]; ?>"
                                                        data-accessno="<?php echo $row["bookAccessNo"]; ?>"
                                                        data-title="<?php echo $row["bookTitle"]; ?>"
                                                        data-author="<?php echo $row["bookAuthor"]; ?>"
                                                        data-pickup="<?php echo $row["pickupDate"]; ?>"
                                                        data-return="<?php echo $row["returnDate"]; ?>">Decline
                                                </button>
                                            </td>
                                            <td><?php echo $row["libraryid"]; ?></td>
                                            <td><?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["bookAccessNo"]; ?></td>
                                            <td><?php echo $row["bookTitle"]; ?></td>
                                            <td><?php echo $row["bookAuthor"]; ?></td>
                                            <td><?php echo $row["pickupDate"]; ?></td>
                                            <td><?php echo $row["returnDate"]; ?></td>
                                            <td><?php echo $row["courseSection"]; ?></td>
                                            <td><?php echo $row["email"]; ?></td>
                                            
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        }
                    ?>
                    
                </div>
            </section>
            
            <section id="bookBorrowed">
                <h1 id="pageHeader">Book Borrowed</h1>
                <div class="p-5">
                    <?php
                        // Fetch data from the bookBorrowed table
                        $sqlBorrowed = "SELECT * FROM bookborrowed";
                        $resultBorrowed = $conn->query($sqlBorrowed);

                        if ($resultBorrowed->num_rows > 0) {
                            // Output a table header
                            ?>
                            <table id="bookBorrowedTable" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Library Id</th>
                                        <th>Name</th>
                                        <th>Book Access No.</th>
                                        <th>Book Title</th>
                                        <th>Book Author</th>
                                        <th>Pickup Date</th>
                                        <th>Return Date</th>
                                        <th>Fine</th>
                                        <th>Course & Section</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Output data of each row
                                    while ($rowBorrowed = $resultBorrowed->fetch_assoc()) {
                                        $id = $rowBorrowed["id"];
                                        ?>
                                        <tr>
                                            <td>
                                                <button class="btn btn-success btn-sm book_returned"
                                                        data-id="<?php echo $rowBorrowed["id"]; ?>"
                                                        data-libraryid="<?php echo $rowBorrowed["libraryid"]; ?>"
                                                        data-name="<?php echo $rowBorrowed["name"]; ?>"
                                                        data-course="<?php echo $rowBorrowed["courseSection"]; ?>"
                                                        data-email="<?php echo $rowBorrowed["email"]; ?>"
                                                        data-accessno="<?php echo $rowBorrowed["bookAccessNo"]; ?>"
                                                        data-title="<?php echo $rowBorrowed["bookTitle"]; ?>"
                                                        data-author="<?php echo $rowBorrowed["bookAuthor"]; ?>"
                                                        data-pickup="<?php echo $rowBorrowed["pickupDate"]; ?>"
                                                        data-return="<?php echo $rowBorrowed["returnDate"]; ?>"
                                                        data-fine="<?php echo $rowBorrowed["fine"]; ?>">Returned
                                                </button> 
                                                <button class="btn btn-warning btn-sm book_missing"
                                                        data-id="<?php echo $rowBorrowed["id"]; ?>"
                                                        data-libraryid="<?php echo $rowBorrowed["libraryid"]; ?>"
                                                        data-name="<?php echo $rowBorrowed["name"]; ?>"
                                                        data-course="<?php echo $rowBorrowed["courseSection"]; ?>"
                                                        data-email="<?php echo $rowBorrowed["email"]; ?>"
                                                        data-accessno="<?php echo $rowBorrowed["bookAccessNo"]; ?>"
                                                        data-title="<?php echo $rowBorrowed["bookTitle"]; ?>"
                                                        data-author="<?php echo $rowBorrowed["bookAuthor"]; ?>"
                                                        data-pickup="<?php echo $rowBorrowed["pickupDate"]; ?>"
                                                        data-return="<?php echo $rowBorrowed["returnDate"]; ?>"
                                                        data-fine="<?php echo $rowBorrowed["fine"]; ?>">Missing
                                                </button> 
                                                <button class="btn btn-danger btn-sm book_damage"
                                                        data-id="<?php echo $rowBorrowed["id"]; ?>"
                                                        data-libraryid="<?php echo $rowBorrowed["libraryid"]; ?>"
                                                        data-name="<?php echo $rowBorrowed["name"]; ?>"
                                                        data-course="<?php echo $rowBorrowed["courseSection"]; ?>"
                                                        data-email="<?php echo $rowBorrowed["email"]; ?>"
                                                        data-accessno="<?php echo $rowBorrowed["bookAccessNo"]; ?>"
                                                        data-title="<?php echo $rowBorrowed["bookTitle"]; ?>"
                                                        data-author="<?php echo $rowBorrowed["bookAuthor"]; ?>"
                                                        data-pickup="<?php echo $rowBorrowed["pickupDate"]; ?>"
                                                        data-return="<?php echo $rowBorrowed["returnDate"]; ?>"
                                                        data-fine="<?php echo $rowBorrowed["fine"]; ?>">Damaged
                                                </button> 
                                            </td>
                                            <td><?php echo $rowBorrowed["libraryid"]; ?></td>
                                            <td><?php echo $rowBorrowed["name"]; ?></td>
                                            <td><?php echo $rowBorrowed["bookAccessNo"]; ?></td>
                                            <td><?php echo $rowBorrowed["bookTitle"]; ?></td>
                                            <td><?php echo $rowBorrowed["bookAuthor"]; ?></td>
                                            <td><?php echo $rowBorrowed["pickupDate"]; ?></td>
                                            <td><?php echo $rowBorrowed["returnDate"]; ?></td>
                                            <td id="bookPenalty">
                                                <?php
                                                    // Get the current date and time
                                                    $currentDate = date("Y-m-d H:i:s");

                                                    // Convert returnDate to a DateTime object
                                                    $returnDate = new DateTime($rowBorrowed["returnDate"]);

                                                    // Convert currentDate to a DateTime object
                                                    $currentDateTime = new DateTime($currentDate);

                                                    // Calculate the difference between returnDate and currentDate
                                                    $dateDiff = $returnDate->diff($currentDateTime);

                                                    // Get the total difference in days
                                                    $daysDifference = $dateDiff->format("%r%a"); // %r includes the sign (- or +)

                                                    // Display the difference in days
                                                    echo abs($daysDifference) . " days "; // Use abs() to get the absolute value

                                                    // Check if the return date is in the past
                                                    if ($dateDiff->invert) {
                                                        // If negative, display "days left"
                                                        echo "left";
                                                    } else {
                                                        // If positive, display the penalty (difference * 5 pesos)
                                                        $fine = $daysDifference * 5;
                                                    }

                                                    // Update the penalty in the database
                                                    $updateQuery = "UPDATE bookborrowed SET fine = ? WHERE id = ?";
                                                    $stmt = $conn->prepare($updateQuery);
                                                    $stmt->bind_param("ii", $fine, $id);
                                                ?>
                                                <?php echo ('₱'), empty($rowBorrowed["fine"]) ? 0 : $rowBorrowed["fine"]; ?>
                                            </td>
                                            <td><?php echo $rowBorrowed["courseSection"]; ?></td>
                                            <td><?php echo $rowBorrowed["email"]; ?></td>
                                            
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "0 results";
                        }

                    ?>
                </div>
            </section>
            
            <section id="bookTransaction">
                <h1 id="pageHeader">Book Transaction</h1>

                <div class="p-5">
                <a href="../render/export.php"> <button class="btn btn-success m-3" type="button" name="button">Export To Excel</button> </a>
                    <?php
                        // Fetch data from the bookBorrowed table
                        $sqlBorrowed = "SELECT * FROM booktransaction";
                        $resultBorrowed = $conn->query($sqlBorrowed);

                        if ($resultBorrowed->num_rows > 0) {
                            // Output a table header
                            ?>
                            <table id="bookTransactionTable" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Remarks</th>
                                        <th>Library ID</th>
                                        <th>Name</th>
                                        <th>Book Access No.</th>
                                        <th>Book Title</th>
                                        <th>Book Author</th>
                                        <th>Pickup Date</th>
                                        <th>Return Date</th>
                                        <th>Fine</th>
                                        <th>Course & Section</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Output data of each row
                                    while ($rowBorrowed = $resultBorrowed->fetch_assoc()) {
                                        $remarksClass = '';
                                    
                                        switch ($rowBorrowed["remarks"]) {
                                            case 'Damaged':
                                                $remarksClass = 'text-danger';
                                                break;
                                            case 'Declined':
                                                $remarksClass = 'text-danger';
                                                break;
                                            case 'Returned':
                                                $remarksClass = 'text-success';
                                                break;
                                            case 'Missing':
                                                $remarksClass = 'text-warning';
                                                break;
                                            default:
                                                $remarksClass = '';
                                                break;
                                        }
                                    
                                        ?>
                                        <tr>
                                            <td class="<?php echo $remarksClass; ?>"><?php echo $rowBorrowed["remarks"]; ?></td>
                                            <td><?php echo $rowBorrowed["libraryid"]; ?></td>
                                            <td><?php echo $rowBorrowed["name"]; ?></td>
                                            <td><?php echo $rowBorrowed["bookAccessNo"]; ?></td>
                                            <td><?php echo $rowBorrowed["bookTitle"]; ?></td>
                                            <td><?php echo $rowBorrowed["bookAuthor"]; ?></td>
                                            <td><?php echo $rowBorrowed["pickupDate"]; ?></td>
                                            <td><?php echo $rowBorrowed["returnDate"]; ?></td>
                                            <td><?php echo ('₱'), empty($rowBorrowed["fine"]) ? 0 : $rowBorrowed["fine"]; ?></td>
                                            <td><?php echo $rowBorrowed["courseSection"]; ?></td>
                                            <td><?php echo $rowBorrowed["email"]; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "0 results";
                        }

                    ?>
                </div>
            </section>
            
        </div>


        <script src="../assets/script/script.js"></script>

        <script>

            // loading datatable | handle circulation
            $(document).ready(function () {
                // DataTable initialization for bookReserveTable
                var dataTableReserve = $('#bookReserveTable').DataTable({
                    scrollX: true
                });

                // DataTable initialization for bookBorrowedTable
                var dataTableBorrowed = $('#bookBorrowedTable').DataTable({
                    scrollX: true
                });

                // DataTable initialization for bookBorrowedTable
                var dataTableBorrowed = $('#bookTransactionTable').DataTable({
                    scrollX: true
                });

                // Handle the click event on the "Accept" button
                $('.accept_request').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');

                    // Redirect to process_reservation.php with data
                    window.location.href = '../render/bookCirculation/process_reservation.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate;
                });

                // Handle the click event on the "Decline" button
                $('.decline_request').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');

                    // Redirect to process_reservation.php with data
                    window.location.href = '../render/bookCirculation/deny_reservation.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate;

                });

                // Handle the click event on the "Return" button
                $('.book_returned').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');
                    var fine = $(this).data('fine');

                    // Redirect to book_return.php with data
                    window.location.href = '../render/bookCirculation/book_return.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate +
                        '&fine=' + fine;
                });

                // Handle the click event on the "Missing" button
                $('.book_missing').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');
                    var fine = $(this).data('fine');

                    // Redirect to book_missing.php with data
                    window.location.href = '../render/bookCirculation/book_missing.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate +
                        '&fine=' + fine;
                });
                
                // Handle the click event on the "Damage" button
                $('.book_damage').click(function () {
                    // Retrieve data attributes
                    var id = $(this).data('id');
                    var libraryId = $(this).data('libraryid');
                    var name = $(this).data('name');
                    var course = $(this).data('course');
                    var email = $(this).data('email');
                    var accessNo = $(this).data('accessno');
                    var title = $(this).data('title');
                    var author = $(this).data('author');
                    var pickupDate = $(this).data('pickup');
                    var returnDate = $(this).data('return');
                    var fine = $(this).data('fine');

                    // Redirect to book_damage.php with data
                    window.location.href = '../render/bookCirculation/book_damage.php?id=' + id + '&libraryid=' + libraryId +
                        '&name=' + name +
                        '&course=' + course +
                        '&email=' + email +
                        '&accessno=' + accessNo +
                        '&title=' + title +
                        '&author=' + author +
                        '&pickupDate=' + pickupDate +
                        '&returnDate=' + returnDate +
                        '&fine=' + fine;
                });
            });
            // loading datatable | handle circulation
 
        </script>
    </body>
</html>