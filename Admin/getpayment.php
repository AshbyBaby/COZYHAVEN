<?php
require_once("../dboperation.php");
$obj=new dboperation();
 $date=$_POST["date"];
 $sqlquery="select * from tbl_payment p inner join tbl_homerequest r on p.request_id=r.request_id 
inner join tbl_user c on r.user_id=c.user_id
inner join tbl_homedetails n on r.Home_id=n.Home_id
inner join tbl_homeowner s on n.owner_id=s.owner_id  where  p.payment_date='$date'";
$result = $obj->executequery($sqlquery);
$i=1;
$t=0;
?>
<table class="table card-table">
                        <thead>
                            <tr>
                                <th>SI NO:</th>
                                <th>Home Name</th>
                                <th>Required Date</th>
                                <th>Initial Amount</th>
                                <th>rate</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        <?php
                         while($display=mysqli_fetch_array($result))
                        {
                        ?>
                            <tr>   
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $display["Home_name"];?></td>    
                                <td><?php echo $display["from_date"];?></td>
                                <td><?php echo $display["initial_amount"];?></td>
                                <?php $t+= $display["rate"];?>
                            </tr>
                       <?php     
                        }
?>
                        </tbody>
                    </table>
                    <h1>TOTAL:<?php echo $t ?></h1>