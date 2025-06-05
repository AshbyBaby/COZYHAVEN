<?php
require_once("../dboperation.php");
$obj = new dboperation();
$stateid=$_POST["id"];
$sqlquery1="select  * from tbl_district where state_id='$stateid' ";
$result1 = $obj->executequery($sqlquery1);

?>
                    <option>Select District</option>
                        <?php
                    
                        while($display=mysqli_fetch_array($result1))
                        {
                          
                          
                          ?>
                         <option value="<?php echo $display['district_id']; ?>"><?php echo $display['district_name']; ?></option>
                        <?php
                        }
                        ?>
                        
                