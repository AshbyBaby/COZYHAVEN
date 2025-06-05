<?php
include_once ("header.php");
require_once ("../dboperation.php");

$obj = new dboperation();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Form</title>
    <script src="../jquery-3.6.0.min.js"></script>
    <style>
        input.size {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
<section class="hero-wrap" style="background-image: url('images/bg_1.jpg'); height:80px;" data-stellar-background-ratio="0.5"></section>

<section class="ftco-section">
    <form action="searchaction.php" method="POST">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <center>
                        City <input type="radio" name="searchType" class="size" id="txtcityid" value="city" required pattern="^[A-Z][a-zA-Z]*$"
                        title="Must start with capital letter followed by upper or lowercase letters">
                        University <input type="radio" name="searchType" class="size" id="txtuniid" value="university" required pattern="^[A-Z][a-zA-Z]*$"
                        title="Must start with capital letter followed by upper or lowercase letters">
                    </center>

                    <?php
                    $sqlquery = "SELECT * FROM tbl_country";
                    $result = $obj->executequery($sqlquery);
                    ?>

                    <div class="form-group row" id="r1">
                        <label for="countryid" class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" name="ddlcountry" id="countryid">
                                <option value="0">--SELECT--</option>
                                <?php while ($display = mysqli_fetch_array($result)): ?>
                                    <option value="<?php echo $display["country_id"]; ?>">
                                        <?php echo $display["country_name"]; ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="r2">
                        <label for="cityid" class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" name="txtcityname" id="cityid">
                                <option value="0">--SELECT--</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="r3">
                        <label for="uniid" class="col-sm-3 col-form-label">University</label>
                        <div class="col-sm-9">
                            <select class="form-control form-control-sm" name="txtuniname" id="uniid">
                                <option value="0">--SELECT--</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <h2 class="mb-2">Featured Properties</h2>
    <div class="row" id="details"></div>
</section>

<?php include_once ("footer.php"); ?>

<script>$(document).ready(function () {
    $("#r1, #r2, #r3").hide();

    $("input[name='searchType']").change(function () {
        const type = $(this).val();

        // Clear dropdowns
        $("#countryid").val("0").trigger("change");
        $("#cityid").val("0").trigger("change");
        $("#uniid").val("0").trigger("change");
        $("#details").empty();

        if (type === 'city') {
            $("#r1, #r2").show();
            $("#r3").hide();
        } else if (type === 'university') {
            $("#r1, #r2, #r3").show();
        }
    });

    $("#countryid").change(function () {
        const countryid = $(this).val();
        $.ajax({
            url: "getcities.php",
            method: "POST",
            data: { id: countryid },
            success: function (response) {
                $("#cityid").html(response);
            },
            error: function () {
                $("#cityid").html("Error occurred while getting cities!");
            }
        });
    });

    $("#cityid").change(function () {
        const cityid = $(this).val();
        const type = $("input[name='searchType']:checked").val();

        if (type === 'city') {
            $.ajax({
                url: "getproperty.php",
                method: "POST",
                data: { id: cityid, type: type },
                success: function (response) {
                    $("#details").html(response);
                },
                error: function () {
                    $("#details").html("Error occurred while getting properties!");
                }
            });
        } else if (type === 'university') {
            $.ajax({
                url: "getuniversity.php",
                method: "POST",
                data: { cityid: cityid },
                success: function (response) {
                    $("#uniid").html(response);
                },
                error: function () {
                    $("#uniid").html("Error occurred while getting universities!");
                }
            });
        }
    });

    $("#uniid").change(function () {
        const uniid = $(this).val();
        const type = $("input[name='searchType']:checked").val();
        $.ajax({
            url: "getproperty.php",
            method: "POST",
            data: { id: uniid,
                type:type
             },
            success: function (response) {
                $("#details").html(response);
            },
            error: function () {
                $("#details").html("Error occurred while getting cities!");
            }
        });
    });
});

</script>
</body>
</html>