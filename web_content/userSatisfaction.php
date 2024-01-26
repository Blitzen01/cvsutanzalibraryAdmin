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