<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery1="select  * from tbl_country ";
$result1 = $obj->executequery($sqlquery1);

?> <style>
/* Center the content vertically and horizontally */
.min-vh-100 {
    min-height: 100vh;
}

/* Add a shadow to the card for a lifted effect */
.card.shadow-lg {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Style adjustments for form controls */
.form-control {
    border-radius: 0.375rem;
    padding: 0.75rem 1.25rem;
}

/* Style adjustments for buttons */
.btn-rounded {
    border-radius: 50px;
}

.btn-light {
    color: #495057;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
}

.btn-light:hover {
    color: #212529;
    background-color: #e2e6ea;
    border-color: #dae0e5;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

.btn {
    border-radius: 0.375rem;
    padding: 0.75rem 1.25rem;
}

.card-body {
    padding: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
}

/* Ensure card has a maximum width and is centered */
.card {
    margin: auto;
    border-radius: 0.5rem;
    max-width: 800px; /* Increase max width for larger screens */
    width: 100%;
}

/* Adjust container padding */
.content-wrapper {
    padding: 2rem;
}

/* Align buttons nicely */
.d-flex {
    display: flex;
}

.justify-content-end {
    justify-content: flex-end;
}

.justify-content-between {
    justify-content: space-between;
}
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row justify-content-center min-vh-100">
            <div class="col-md-12">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <h4 class="card-title text-center mb-4">State Details</h4>
                        <p class="card-description text-center mb-4">Select a country to view its states.</p>

                        <!-- Country Select Dropdown -->
                        <div class="form-group">
                            <label for="countryid" class="form-label">Country</label>
                            <select class="form-control" id="countryid">
                                <option value="">-- Select --</option>
                                <?php
                                while ($display = mysqli_fetch_array($result1)) {
                                    echo '<option value="' . $display["country_id"] . '">' . $display["country_name"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Container for States Table -->
                        <div class="table-responsive" id="stateid">
                            <!-- The state table will be loaded here via AJAX -->
                        </div>
                    </div>
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
      // alert('hi');
      $("#countryid").change(function () {
        var countryid = $(this).val();
        // alert(disid);
        $.ajax({
          url: "getstates.php",
          method: "POST",
          data: {
            id: countryid
          },
          success: function (response) {
            $("#stateid").html(response);
          },
          error: function () {
            $("#stateid").html("Error occurred while getting location!");
          }
        });
      });
    });
    </script> 

      