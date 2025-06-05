<?php
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();

$sqlquery="select * from tbl_payment p inner join tbl_homerequest r on p.request_id=r.request_id 
inner join tbl_user c on r.user_id=c.user_id
inner join tbl_homedetails n on r.Home_id=n.Home_id
inner join tbl_homeowner s on n.owner_id=s.owner_id";
$result = $obj->executequery($sqlquery);
$i=1;

?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-9">

                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Payment details</h4>
            </div>
            <div class=" col-lg-3">
                
            </div>
            <div class="card-body">
                <label for="exampleInputName1">Select date: </label>
                <input type="date" name="date" id="date">
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">

                <div class="table-responsive " id="payment_id">


                <table class="table card-table">
                        <thead>
                            <tr>
                                <th>SI NO:</th>
                                <th>Home Name</th>
                                <th>Required Date</th>
                                <th>rate</th>
                                <th>Initial Amount</th>
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
                                <td><?php echo $display["rate"];?></td>
                                <td><?php echo $display["initial_amount"];?></td>
                               
                            </tr>
                       <?php     
                        }
?>
                        </tbody>
                    </table>



                </div>

            </div>

        </div>
    </div>


</div>




<?php
include_once('footer.php');
?>
<script src="../jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        //alert("a");
        $("#date").change(function () {
            var date = $(this).val(); 
            $.ajax({
                type: "POST",
                url: "datewise.php",
                data: "date=" + date, 
                success: function (data) {
                    $("#payment_id").html(data);
                }
            });
        });
    });
</script>