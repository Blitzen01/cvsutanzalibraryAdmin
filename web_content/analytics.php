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