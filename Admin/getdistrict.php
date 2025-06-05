<?php
// include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();

$stateid=$_POST["id"];
 $sqlquery1="select  * from tbl_district where state_id='$stateid'";
$result1 = $obj->executequery($sqlquery1);

?>
<table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Sl.no</th>
                          <th>District Name</th>
                          
                          
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      


                        <?php
                        $i = 1;
                        while($display=mysqli_fetch_array($result1))
                        {
                          
                          
                          ?>
                            <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $display["District_name"];?></td>
                            
                            <td>
                            <a href="districtedit.php?districtid=<?php echo $display["District_id"];?>" onclick="return confirm('Are you sure want to edit???')">
                            <input type="button" class="btn btn-info btn-lg" value="Edit"></a>
                        </td>
                        <td>
                         <a href="districtdelete.php?districtid=<?php echo $display["District_id"];?>"onclick="return confirm('Are you sure want to delete???')">
                         <input type="button" class="btn btn-danger btn-lg" value="Delete"></a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                        
                



                    
                    
                   
                      </tbody>
                    </table>