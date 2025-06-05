<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery1="select  * from tbl_homeowner where status= 'Requested'";
$result1 = $obj->executequery($sqlquery1);

?>

<?php
include_once ("header.php");
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       <div class="d-flex justify-content-end">
                       </div>
                        <div class="table-responsive">
                        
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                           sl.no
                                        </th>
                                        <th>
                                           Name
                                        </th>
                                        <th>
                                            Idproof
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            View Details
                                        </th>
                                        
                                    </tr>
                                </thead>
                                <tbody>

                        
                                <tbody>
                                <?php
                        $i = 1;
                        while($display=mysqli_fetch_array($result1))
                        {
                          
                          
                          ?>
                            <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $display["owner_name"];?></td>
                            <td><img src="../upload/<?php echo $display["idproof"];?>"width="60",height="60"/></td>
                            <td><?php echo $display["status"];?></td>
                            
                            <td>
                            <a href="viewmore.php?ownerid=<?php echo $display["owner_id"];?>">
                            <input type="button" class="btn btn-info btn-lg" value="Viewmore"></a>
                        </td>
                       
                         
                        </tr>
                        <?php
                        }
                        ?>
                        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                      

<?php
include_once ("footer.php");
?>

                                

<?php
include_once ("footer.php");
?>