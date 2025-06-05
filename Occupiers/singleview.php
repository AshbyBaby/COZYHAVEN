<?php
include_once("header.php");

include_once("../dboperation.php");
$obj = new dboperation();
$type=$_GET['type'];
$hid = $_GET['hid'];
 $sql = "SELECT * FROM tbl_homedetails h   inner join tbl_homeowner ho on ho.owner_id=h.owner_id INNER join tbl_city c on c.city_id=ho.city_id where h.home_id='$hid' and type='$type'
       ";

$result = $obj->executequery($sql);
$display = mysqli_fetch_array($result)

	?>

<style>
	hr {
		border-radius: 5px;
		border-top: 1px dashed red;
	}
</style>
<style>
    @charset "UTF-8";


    .star {
        width: 400px;
        /*position: absolute;*/
        top: 50%;
        left: 41%;
        transform: translate(-50%, -50%);
    }

    .star>* {
        float: right;
    }

    .star label {
        height: 50px;
        width: 50px;
        position: relative;
        cursor: pointer;
        padding: 0 10px;
    }

    .star label:nth-of-type(5):after {
        animation-delay: 0.5s;
    }

    .star label:nth-of-type(4):after {
        animation-delay: 0.4s;
    }

    .star label:nth-of-type(3):after {
        animation-delay: 0.3s;
    }

    .star label:nth-of-type(2):after {
        animation-delay: 0.2s;
    }

    .star label:nth-of-type(1):after {
        animation-delay: 0.1s;
    }

    .star label:after {
        transition: all 1s ease-out;
        position: absolute;
        content: "☆";
        color: orange;
        font-size: 65px;
    }

    .star input {
        display: none;
    }

    .star input:checked+label:after,
    .star input:checked~label:after {
        content: "★";
        color: gold;
        text-shadow: 0 0 10px gold;
    }
</style>

<section class="hero-wrap" style="background-image: url('images/bg_1.jpg');height:100px;">
     
    </section>


<br><br><br>
<section class="ftco-section ftco-no-pb ftco-no-pt">
	<div class="container">
		<div class="row">
			<div class="col-6">
			<img src="../upload/<?php echo $display['Image'] ?>"style="width:500px;height:300px;">
			<h3 class="mb-1" >Home Details</h3>
			<p>
						<b>Home Name:&nbsp; </b>


							<?php echo $display['Home_name'] ?>
						</p>
						<p>
						<b>Number of Person:&nbsp; </b>


							<?php echo $display['noofperson'] ?></h4>
						</p>
						<b>Description:&nbsp; </b>


<?php echo $display['description'] ?>
</p>



			</div>
			<div class="col-6">
			<h2 class="mb-1">Home Owner Details</h2>
			<p>
						<b>Owner Name:&nbsp; </b>


							<?php echo $display['housename'] ?>
						</p>
						<p>
<b>Home Name:&nbsp; </b>


	<?php echo $display['housename'] ?>
</p>
<p>
					<b>City:&nbsp; </b>


							<?php echo $display['city_name'] ?>
						</p>
						<p>
						<b>Phone Number:&nbsp; </b>


							<?php echo $display['phone'] ?>
						</p>
						<p>
						<b>Email:&nbsp; </b>


							<?php echo $display['email'] ?>
						</p>
						<p>
						<b>Photo:&nbsp; </b>


							<Img src="../upload/<?php echo $display['image'] ?>">
						</p>





			</div>
			<a href="request.php?id=<?php echo $hid; ?>" class="btn btn-primary">Book Now</a>
		</div>
		<div class="row">
		<div class="col-6">






		
		</div>
		<div class="col-6">
		<b>	Add FeedBack and Rating</b>
		<br>
		<form action="addfeedbackaction.php" method="POST">
                    <p><label for="">Feedback</label><br>
                        <textarea name="feedback" id="" class="form-control"></textarea>
                    </p>
                   
                    <div class="star" >

                        <input type="radio" name="rating" id="r1" value="5">
                        <label for="r1"></label>
                        <input type="radio" name="rating" id="r2" value="4">
                        <label for="r2"></label>
                        <input type="radio" name="rating" id="r3" value="3">
                        <label for="r3"></label>
                        <input type="radio" name="rating" id="r4" value="2">
                        <label for="r4"></label>
                        <input type="radio" name="rating" id="r5" value="1">
                        <label for="r5"></label>

                    </div>
                  <input type="hidden" name="homeid" value="<?php echo $hid;?>">
				  <input type="hidden" name="type" value="<?php echo $type;?>">
                    <br>
                    <p class="mb-0" style="padding-top:100px"><button class="btn btn-primary px-4 py-3" type="submit">Done</button></p>
                    </form>

		</div>

		</div>
	</div>
</section>
<?php
include_once("footer.php");
?>