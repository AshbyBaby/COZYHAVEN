<?php
include_once("header.php");
require_once("../dboperation.php");
$obj = new dboperation();
$sqlquery1="select  * from tbl_country ";
$result1 = $obj->executequery($sqlquery1);

?>
<style>
    /* Ensure the card has proper spacing */
.card {
    margin-bottom: 2rem;
}

/* Table header styling for better readability */
.table thead th {
    background-color: #f1f1f1;
    font-weight: 600;
}

/* Hover effect for table rows */
.table tbody tr:hover {
    background-color: #f9f9f9;
}

/* Center the card content */
.container-fluid {
    padding-left: 1rem;
    padding-right: 1rem;
}

/* Responsive card layout adjustments */
@media (max-width: 768px) {
    .container-fluid {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }
}

</style>



<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm rounded">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">Country Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Country</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        while ($display = mysqli_fetch_array($result1)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo htmlspecialchars($display["country_name"]); ?></td>
                                                <td>
                                                    <a href="countryedit.php?countryid=<?php echo $display["country_id"]; ?>" class="btn btn-info btn-sm" onclick="return confirm('Are you sure you want to edit this country?')">
                                                        Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="countrydelete.php?countryid=<?php echo $display["country_id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this country?')">
                                                        Delete
                                                    </a>
                                                </td>
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
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>
