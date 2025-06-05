<?php
require_once("../dboperation.php");
$obj = new dboperation();
$id=$_POST["id"];
$type=$_POST['type'];
 $sqlquery1="select * from tbl_homedetails h inner join tbl_homeowner o on o.owner_id=h.owner_id where h.Status='confirmed' and type='$type' and id='$id'";
$result1 = $obj->executequery($sqlquery1);


?>

<?php
                    
                    while($display=mysqli_fetch_array($result1))
                    {
                      $sql1 = "SELECT p.*, AVG(f.rating) AS avg_rating 
        FROM tbl_homedetails p 
        LEFT JOIN tbl_feedback f ON p.Home_id = f.Home_id where  f.Home_id=".$display['Home_id'];
$result = $obj->executequery($sql1);
$display1 = mysqli_fetch_array($result);
                      
                      ?>
                        <div class="col-4">
                        <div  >
   <div class="item">
        <div class="property-wrap ">
          <a href="singleview.php?hid=<?php echo $display["Home_id"]?>&type=<?php echo $type?>" class="img" style="background-image: url('../upload/<?php echo $display['Image']; ?>');">
            <div class="rent-sale">
              <span class="sale">Sale</span>
            </div>
            
          </a>
          <div class="text">
            <ul class="property_list">
              <li><span class="flaticon-floor-plan"></span>Price:<?php echo $display['rate']; ?></li>
            </ul>
            <?php
                $avg_rating = $display1['avg_rating'];
                $star_rating = str_repeat('<span class="fa fa-star " style="color:green"></span>', round($avg_rating));
                $empty_rating = str_repeat('<span class="fa fa-star " style="color:#80808054"></span>', 5 - round($avg_rating));
                ?>
                 <p class="mb-3"><?php echo $star_rating . $empty_rating ?> </p>

            <h3>House name: <?php echo $display['Home_name']; ?></h3>
            <div class="list-team d-flex align-items-center mt-2 pt-2 border-top">
              <div class="d-flex align-items-center">
                <div class="img" style="background-image: url(../upload/<?php echo $display['image'] ?>);"></div>

                <h3 class="ml-2"><?php echo $display['owner_name'] ?></h3>
              
                
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>


                    
                
                        <?php
                        }
                        ?>