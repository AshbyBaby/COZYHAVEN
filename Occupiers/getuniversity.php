<?php
require_once("../dboperation.php");
$obj = new dboperation();
$cityid=$_POST["cityid"];
$sqlquery1="select  * from tbl_university where city_id='$cityid' ";
$result1 = $obj->executequery($sqlquery1);

?>
                    <option>Select university</option>
                        <?php
                    
                        while($display=mysqli_fetch_array($result1))
                        {
                          
                          
                          ?>
                         <option value="<?php echo $display['university_id']; ?>"><?php echo $display['university_name']; ?></option>
                        <?php
                        }
                        ?>