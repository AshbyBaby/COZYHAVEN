<?php
include_once("header.php");
include("../dboperation.php");
$obj = new dboperation();
?>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <!-- Website Audience Metrics -->
            <div class="col-12 col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $query = "SELECT count(*) as ownercount,de.status FROM tbl_homeowner de group by de.status";
                        $result = $obj->executequery($query);
                        ?>

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load('current', { 'packages': ['corechart'] });
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Owner', 'Number'],
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "['" . $row["status"] . "', " . $row["ownercount"] . "],";
                                    }
                                    ?>
                                ]);
                                var options = {
                                    title: 'Verified Owners Count',
                                    pieHole: 0.4
                                };
                                var chart = new google.visualization.PieChart(document.getElementById('ownerChart'));
                                chart.draw(data, options);
                            }
                        </script>
                        <div class="text-center" style="margin-top: 20px;">
                            <h4>Pie Chart showing the Count of Verified Owners</h4>
                            <div id="ownerChart" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Home Count -->
            <div class="col-12 col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $query = "SELECT count(*) as homecount,de.status FROM tbl_homedetails de INNER JOIN tbl_homeowner d ON de.owner_id=d.owner_id GROUP BY de.status";
                        $result = $obj->executequery($query);
                        ?>
                        <script type="text/javascript">
                            google.charts.load('current', { 'packages': ['corechart'] });
                            google.charts.setOnLoadCallback(drawHomeChart);
                            function drawHomeChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Home', 'Number'],
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "['" . $row["status"] . "', " . $row["homecount"] . "],";
                                    }
                                    ?>
                                ]);
                                var options = {
                                    title: 'Home Status Count',
                                    pieHole: 0.4
                                };
                                var chart = new google.visualization.PieChart(document.getElementById('homeChart'));
                                chart.draw(data, options);
                            }
                        </script>
                        <div class="text-center" style="margin-top: 20px;">
                            <h4>Pie Chart showing the Count of Homes</h4>
                            <div id="homeChart" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Booking Table -->
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Total Booking Table</h4>
                        <form action="REPORT/Excel/excel_totalbooking.php" method="post">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>House Name</th>
                                            <th>Check-in Date</th>
                                            <th>Check-out Date</th>
                                            <th>No. of Persons</th>
                                            <th>Amount</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tbl_homerequest 
                                                INNER JOIN tbl_payment ON tbl_homerequest.request_id = tbl_payment.request_id 
                                                INNER JOIN tbl_homedetails ON tbl_homerequest.Home_id = tbl_homedetails.Home_id";
                                        $res = $obj->executequery($sql);
                                        $s = 1;

                                        while ($display = mysqli_fetch_array($res)) {
                                            ?>
                                            <tr>
                                            <td class="text-center"><?php echo $s++; ?></td>
                                            <td><?php echo $display["Home_name"]; ?></td>
                                            <td><?php echo $display["from_date"]; ?></td>
                                            <td><?php echo $display["to_date"]; ?></td>
                                            <td><?php echo $display["noofperson"]; ?></td>
                                            <td><?php echo $display["rate"]; ?></td>
                                            <td><img src="../upload/<?php echo $display["Image"]; ?>"
                                                    width="70" height="70"></td>
                                        </tr>
                                        <?php
                    }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <input type="submit" name="addnew" value="Export" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<!-- partial:./partials/_footer.html -->
<?php
include_once("footer.php");
?>
