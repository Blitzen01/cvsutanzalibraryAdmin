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
        <title>Dashboard</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div class="pt-5">
            <?php include '../adminNavigation/sidebar.php'; ?>
        </div>
        <div id="admin-body">
            <section id="analytics">
                <?php include '../web_content/analytics.php'; ?>
            </section>
            
            <section id="collection">
                <?php include '../web_content/collection.php'; ?>
            </section>
            
            <section id="userSatisfaction">
                <?php include '../web_content/userSatisfaction.php'; ?>
            </section>
        </div>



        <script src="../assets/script/script.js"></script>

        <script>
            $(document).ready(function() {
                var satisfactionTable =  $('#satisfactionRating').DataTable({
                    scrollX: true
                });
            })

            

            // getting the current month for the admin dashboard / ANALYTICS
            // JavaScript code to get the current month
            var currentDate = new Date();
            var currentMonth = currentDate.toLocaleString('default', { month: 'long' }).toUpperCase();

            // Display the current month in the HTML document
            document.getElementById('currentMonth').innerHTML = currentMonth;
            // getting the current month for the admin dashboard / ANALYTICS

            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'pie',
                data: {
                labels: ['BEE', 'BSE', 'BSBM', 'BSHM', 'BSTM', 'BSIT', 'BSP'],
                datasets: [{
                    data: [12, 19, 33, 15, 21, 23, 10],
                    borderWidth: 1,
                        backgroundColor: [
                            'rgba(100, 50, 132, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 205, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(175, 192, 192, 1)',
                            'rgba(54, 62, 135, 1)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgba(175, 192, 192, 1)',
                            'rgba(54, 62, 135, 1)',
                        ]
                }]
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                }
                }
            });

            const ctxa = document.getElementById('barGraph');

            new Chart(ctxa, {
                type: 'bar',
                data: {
                    labels: ['Diverse Fiction', 
                    'Multicultural Tales', 
                    'Automata and Computability', 
                    'A Beginners Guide to Python 4', 
                    'Global Nonfiction'],
                    datasets: [{
                        label: '# of books',
                        data: [32, 19, 43, 35, 62],
                        borderWidth: 1,
                        backgroundColor: [
                            'rgba(100, 50, 132, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 205, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                        ]
                    }]
                },
                options: {
                    scales: {
                        y: {
                        beginAtZero: true
                        }
                    }
                }
            });


        </script>

    </body>
</html>