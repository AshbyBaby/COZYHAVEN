<?php
require_once("../dboperation.php");
$obj = new dboperation();
$type=$_POST["type"];
$sqlquery1="select  * from tbl_homedetails h inner join tbl_homeowner ho on h.owner_id=ho.owner_id where h.type='$type' and h.Status='Requested' ";
$result1 = $obj->executequery($sqlquery1);

 $i = 1;
 while($display=mysqli_fetch_array($result1))
 {
  
  
  ?>
    <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $display["Home_name"];?></td>
    <td><?php echo $display["rate"];?></td>
    <td><?php echo $display["owner_name"];?></td>
    
    <td><?php echo $display["Status"];?></td>
    
    <td>
    <a href="viewmorep.php?hid=<?php echo $display["Home_id"];?>">
    <input type="button" class="btn btn-info btn-lg" value="Viewmore"></a>
</td>

 
</tr>
<?php
 }
?>