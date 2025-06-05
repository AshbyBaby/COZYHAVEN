<?php
require_once("../dboperation.php");
$obj = new dboperation();
$countryid=$_POST["id"];
$sqlquery1="select  * from tbl_state where country_id='$countryid' ";
$result1 = $obj->executequery($sqlquery1);

?>
                    <option>Select State</option>
                        <?php
                    
                        while($display=mysqli_fetch_array($result1))
                        {
                          
                          
                          ?>
                         <option value="<?php echo $display['state_id']; ?>"><?php echo $display['state_name']; ?></option>
                        <?php
                        }
                        ?>
                        