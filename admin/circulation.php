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
        <link rel="stylesheet" href="../assets/style/dataTable.css">
        <link rel="stylesheet" href="datatables.min.css">
        
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
                <?php include '../web_content/bookReservation.php'; ?>
            </section>
            
            <section id="bookBorrowed">
                <?php include '../web_content/bookBorrowed.php'; ?>
            </section>
            
            <section id="bookTransaction">
                <?php include '../web_content/bookTransaction.php'; ?>
            </section>
            
        </div>


        <script src="../assets/script/script.js"></script>
        <script src="../assets/script/datatables.min.js"></script>
        <script src="pdfmake.min.js"></script>
        <script src="vfs_fonts.js"></script>

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
                    scrollX: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });

                dataTableBorrowed.buttons().container().appendTo('#example_wrapper .col-md-6:(0)');

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