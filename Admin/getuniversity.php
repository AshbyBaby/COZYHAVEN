<?php
// include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();

$cityid=$_POST["id"];
 $sqlquery1="select  * from tbl_university where city_id='$cityid'";
$result1 = $obj->executequery($sqlquery1);

?>
<table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Sl.no</th>
                          <th>UNIVERSITY Name</th>
                          
                          
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
                            <td><?php echo $display["university_name"];?></td>
                            
                            <td>
                            <a href="universityedit.php?uniid=<?php echo $display["university_id"];?>" onclick="return confirm('Are you sure want to edit???')">
                            <input type="button" class="btn btn-info btn-lg" value="Edit"></a>
                        </td>
                        <td>
                         <a href="universitydelete.php?uniid=<?php echo $display["university_id"];?>"onclick="return confirm('Are you sure want to delete???')">
                         <input type="button" class="btn btn-danger btn-lg" value="Delete"></a>
                        </td>
                        </tr>
                        <?php
                        }
                        ?>
                        
                



                    
                    
                   
                      </tbody>
                    </table>