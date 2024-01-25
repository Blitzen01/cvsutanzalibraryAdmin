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
                <h1 id="pageHeader">Analytics</h1>
                <div class="container-fluid text-center mb-3">
                    <h2 class="border p-2">MONTH OF <span id="currentMonth"></span></h2>
                    <div class="row text-center">
                        <div class="col-sm-10 col-lg-4"><br>
                            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                                <i class="fa-solid fa-hand-holding fs-1 m-4"></i>
                                <p>Total Borrow Request</p>
                                <span>19</span>
                            </div>
                        </div>
                        <div class="col-sm-10 col-lg-4"><br>
                            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                                <i class="fa-solid fa-hand-holding-hand fs-1 m-4"></i>
                                <p>Total Borrowed Books</p>
                                <span>34</span>
                            </div>
                        </div>
                        <div class="col-sm-10 col-lg-4"><br>
                            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                                <i class="fa-solid fa-hand-holding-dollar fs-1 m-4"></i>
                                <p>Total Fine Collected</p>
                                <span>15</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-10 col-lg-8 text-center"><br>
                            <div id="report" class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                                <h3>Today Reports</h3>
                                <div class="row">
                                    <div class="col">
                                        <p>Borrow Request</p>
                                        <span>2</span>
                                    </div>
                                    <div class="col">
                                        <p>Borrowed Books</p>
                                        <span>7</span>
                                    </div>
                                    <div class="col">
                                        <p>Fine Collected</p>
                                        <span>0</span>
                                    </div>
                                </div>
                                
                            </div>
                            <div id="report" class="m-sm-5 p-sm-5 m-lg-1 p-lg-0"><br>
                                <div class="border">
                                    <h3>Most Borrowed Books</h3>
                                    <div class="col-sm-10 col-lg-8 mx-auto">
                                        <canvas id="barGraph"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col"><br>
                            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-0">
                                <div class="border">
                                    <h3>TOP LIBRARY USERS</h3>
                                    <div id="pieChartBox"class="col-sm-10 col m-1">
                                        <p>(BY COURSES)</p>
                                    <canvas id="myChart"></canvas>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section id="collection">
                <h1 id="pageHeader">Collection</h1>
                <div class="container-fluid text-center">
                    <div class="row">
                        <div class="col-sm-10 col-lg-4"> <br>
                            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                                <i class="fa-solid fa-book fs-1 m-4"></i>
                                <p>Total Print Books</p>
                                <span>7</span>
                            </div>
                        </div>
                        <div class="col-sm-10 col-lg-4"> <br>
                            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                                <i class="fa-solid fa-book-atlas fs-1 m-4"></i>
                                <p>Total E-Books</p>
                                <span>10</span>
                            </div>
                        </div>
                        <div class="col-sm-10 col-lg-4"> <br>
                            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 border">
                                <i class="fa-solid fa-newspaper fs-1 m-4"></i>
                                <p>Total E-Journals</p>
                                <span>15</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="row-sm-10 row-lg-4"> <br>
                            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-3 border">
                                <h3>TOTAL COLLECTION BY COURSE</h3>
                            </div>
                        </div>
                    </div> <br>
                </div>
            </section>
            
            <section id="userSatisfaction">
                <h1 id="pageHeader">Satisfaction Rating</h1>
                <div class="card m-3 ps-3 pe-3">
                    <h3 class="text-center">SUMMARY OF SATISFACTION RATINGS</h3>
                    <table class="table table-sm nowrap table-striped compact table-hover text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>Average Rating</th>
                                <th>Descriptive Rating</th>
                                <th>Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>4.90</td>
                                <td>HIGHLY SATISFIED</td>
                                <td>2023</td>
                            </tr>
                            <tr>
                                <td>4.00</td>
                                <td>SATISFIED</td>
                                <td>2022</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="m-5">
                <table id="satisfactionRating" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Subject</th>
                                <th>Ratings</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>

                        <tbody>
                                <?php
                                    #select data
                                    $select_sql = "SELECT * FROM satisfactionrating";
                                    $select_sql1 = mysqli_query($conn, $select_sql);
                                    if(mysqli_num_rows($select_sql1)) {
                                        while($rows = mysqli_fetch_array($select_sql1)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $rows['Category']?></td>
                                                    <td><?php echo $rows['Subject']?></td>
                                                    <td><?php echo $rows['Ratings']?></td>
                                                    <td><?php echo $rows['Comments']?></td>
                                                    <td><?php echo $rows['Date']?></td>
                                                    <td><?php echo $rows['Time']?></td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                        </tbody>

                    </table>
                </div>
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