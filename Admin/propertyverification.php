<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery1 = "select  * from tbl_homedetails h inner join tbl_homeowner n on h.owner_id=n.owner_id where h.status= 'Requested'";
$result1 = $obj->executequery($sqlquery1);

?>
<html>

<head>
  <style>
    input.size {
      width: 20px;
      height: 20px;
    }
  </style>
</head>

</html>

<?php
include_once("header.php");
?>
<div>

  <br><br>

    City <input type="radio" name="txtname" class="size" id="txtcityid" value="city">
    University <input type="radio" name="txtname" class="size" id="txtuniid" value="university">
</div>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-end">
            </div>
            <div class="table-responsive">

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      sl.no
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Rate
                    </th>
                    <th>
                      Owner name
                    </th>
                    <th>
                      Status
                    </th>


                  </tr>
                </thead>
                <tbody>


                <tbody id="details">



                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>




    <?php
    include_once("footer.php");
    ?>
    <script src="../jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function () {


        alert('hi');
        $("#txtcityid").click(function () {
          var type = $(this).val();
          alert(type);
          $.ajax({
            url: "getcityrequest.php",
            method: "POST",
            data: {
              type: type
            },
            success: function (response) {
              $("#details").html(response);
            },
            error: function () {
              $("#details").html("Error occurred while getting location!");
            }
          });
        });


        $("#txtuniid").click(function () {
          var type = $(this).val();
          alert(type);
          $.ajax({
            url: "getuniversityrequest.php",
            method: "POST",
            data: {
              type: type
            },
            success: function (response) {
              $("#details").html(response);
            },
            error: function () {
              $("#details").html("Error occurred while getting location!");
            }
          });
        });

      });
    </script>