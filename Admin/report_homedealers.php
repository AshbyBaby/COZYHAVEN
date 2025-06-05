<?php
include("header.php");
?>

<div class="main-panel">
   
        <div class="container">
        <div class="row">
        <div class="col-lg-12 "><br><br>
    <h2 class="text-center mb-4">Home Owner Table</h2></div>
    <form action="REPORT/Excel/excel_homedealer.php" method="post">
        <div class="table-responsive">
            <table class="table  table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Sl.No</th>
                        <th>Home Dealer Name</th> 
                        <th>City</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>House Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if the file exists before including
                    if (file_exists("../dboperation.php")) {
                        include_once("../dboperation.php");
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>dboperation.php not found.</td></tr>";
                        exit;
                    }
                    
                    $obj = new dboperation();
                    $sql = "SELECT * FROM tbl_homeowner h INNER JOIN tbl_city c ON c.city_id = h.city_id";  
                    $res = $obj->executequery($sql);
                    $s = 1;

                    while ($display = mysqli_fetch_array($res)) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $s++; ?></td>
                        <td><?php echo $display["owner_name"]; ?></td>
                        <td><?php echo $display["city_name"]; ?></td>
                        <td><?php echo $display["email"]; ?></td>
                        <td><?php echo $display["phone"]; ?></td>
                        <td><?php echo $display["housename"]; ?></td>
                        
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
                
    

    <?php
include("footer.php");
?>