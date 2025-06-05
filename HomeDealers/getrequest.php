<?php
session_start();
require_once("../dboperation.php");
$obj = new dboperation();
$date=$_POST["date"];
$oid=$_SESSION['ownerid'];
 $sqlquery1="select  * from tbl_homerequest h inner join tbl_homedetails n  on h.Home_id=n.Home_id inner join tbl_user u on h.user_id=u.user_id where h.status= 'Requested'and n.owner_id=$oid and h.request_date='$date'";
$result1 = $obj->executequery($sqlquery1);

?>
                
                <?php
                        $i = 1;
                        while($display=mysqli_fetch_array($result1))
                        {
                          
                          
                          ?>
                            <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $display["Home_name"];?></td>
                            <td><?php echo $display["name"];?></td>
                            <td><?php echo $display["from_date"];?></td>
                            <td><?php echo $display["to_date"];?></td>
                            <td><?php echo $display["noofperson"];?></td>
                            <td><?php echo $display["status"];?></td>
                            
                            <td>
                            <a href="viewdetails.php?requestid=<?php echo $display["request_id"];?>">
                            <input type="button" class="btn btn-info btn-lg" value="Viewmore"></a>
                        </td>
                       
                         
                        </tr>
                        <?php
                        }
                        ?>