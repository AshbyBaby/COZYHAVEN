<?php
require_once("../dboperation.php");
$obj = new dboperation();
$countryid=$_POST["id"];
$sqlquery1="select  * from tbl_city where country_id='$countryid' ";
$result1 = $obj->executequery($sqlquery1);

?>
                    <option>Select City</option>
                        <?php
                    
                        while($display=mysqli_fetch_array($result1))
                        {
                          
                          
                          ?>
                         <option value="<?php echo $display['city_id']; ?>"><?php echo $display['city_name']; ?></option>
                        <?php
                        }
                        ?>