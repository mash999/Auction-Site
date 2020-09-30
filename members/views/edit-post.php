

<title>Edit Post</title>
<?php 
include '../partials/navigations.php';
use Auctions\fetch_functions;

if(isset($_GET['id'])){
	$product_code = htmlspecialchars($_GET['id']);
	$stmt = $con->prepare("SELECT * FROM sell_posts WHERE product_code = :product_code && seller_id = :seller_id");
	$executed = $stmt->execute(array('product_code' => $product_code, 'seller_id' => $_SESSION['active_user']));
	if($stmt->rowCount()>0){	
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		if(time() + 5*60*60 >= $row->start_time){
			echo "<h1 class=\"expired-header\">Sorry, Time for updating this post has expired &nbsp;:(</h1>";
			include '../partials/footer.php';
			die();
		}	
	}
	else{
		header("Location:posts.php");
	}
}
else{
	header("Location:posts.php");
}
?>




<form action="../../functions/process-forms.php" method="post" enctype="multipart/form-data">

	<div class="advertisement-info">
		
		<h2>Edit Post</h2>

		<input type="text" name="title" placeholder="Title of The Advertisement" value ="<?php echo $row->title;?>" required>
		<textarea name="description" placeholder="Describe Your Product" required><?php echo $row->description;?></textarea>
		<input type="checkbox" name="agree" checked required>
		<p>
			I promise that the information provided for the post is 100% accurate. I also 
			understand that any kind of fraud will result in permanent banishment and in 
			serious situation, criminal charge.
		</p>
		<input type="hidden" name="id" value="<?php echo $product_code;?>">
		<input type="hidden" name="seller-id" value="<?php echo $_SESSION['active_user'];?>">
		<input type="submit" name="edit-post" value="Post it">


	</div> <!-- /advertisement-info -->



















	<div class="auction-time">
		
		<a class="view" href="product-detail.php?id=<?php echo $row->product_code;?>">View Post</a>

		<?php $hours = array('12.00','12.30','1:00','1:30','2:00','2:30','3:00','3:30','4:00','4:30','5:00','5:30','6:00','6:30','7:00','7:30','8:00','8:30','9:00','9:30','10:00','10:30','11:00','11:30');?>

		<section>
			<label>Pick a date for the auction</label>
			<?php $start_date = date("m/d/Y",$row->start_time);?>
			<input type="text" name="start-date" id="start-datepicker" placeholder="Starting Date" value="<?php echo $start_date;?>" required>
		</section>




		<section>
			<label>Starts At</label>
			<select name="starts-at" required>
				<?php $start_time = date("h:i A",$row->start_time);?>
				<option value="<?php echo $start_time;?>"><?php echo $start_time;?></option>
				<?php 
					foreach ($hours as $hour){echo '<option value = "' . $hour . 'AM">' . $hour . "AM" . '</option>';}
					foreach ($hours as $hour){echo '<option value = "' . $hour . 'PM">' . $hour . "PM" . '</option>';}
				?>
			</select>
		</section>
	



		<section>
			<label>Ending date for the auction</label>
			<?php $end_date = date("m/d/Y",$row->end_time);?>
			<input type="text" name="end-date" id="end-datepicker" placeholder="End Date" value="<?php echo $end_date;?>" required>
		</section>




		<section>
			<label>Ends At</label>
			<select name="ends-at" required>
				<?php $end_time = date("h:i A",$row->end_time);?>
				<option value="<?php echo $end_time;?>"><?php echo $end_time;?></option>
				<?php 
					foreach ($hours as $hour){echo '<option value = "' . $hour . 'AM">' . $hour . "AM" . '</option>';}
					foreach ($hours as $hour){echo '<option value = "' . $hour . 'PM">' . $hour . "PM" . '</option>';}
				?>
			</select>
		</section>




		<section>
			<label>Bidding Starts From ($usd)</label>
			<input type="text" name="start-price" placeholder="Starting Price" value ="<?php echo $row->starting_price;?>" required>
		</section>




		<section>
			<label>Bidding Interval ($usd)</label>
			<select name="interval" required>
				<option value="<?php echo $row->bid_interval;?>"><?php echo $row->bid_interval;?></option>
				<?php 
				for($i = 50; $i <= 2000; $i=$i+50)
					echo "<option value=".$i.">" . $i . "</option>";
				?>
			</select>
		</section>




		<section>
			<label>
				Upload Product Images<br>
			</label>
			<button type="button" id="load-modal">Upload</button>
		</section>


	</div> <!--  /auction-time -->









	<div class="upload-modal">
		
		<div class="fades-away"></div>

		<div class="modal-content">
			
			<h3>Upload images for your product</h3>
			<h4>Maximum size : 5MB &nbsp;| &nbsp;Maximum number of images : 4</span></h4>

			<?php $images = explode("{}{{}}}", $row->image); $i=0;
			foreach ($images as $image) { ?>
			
			<div class="modal-images">
				<?php if(empty($images[$i])) { 
					echo "<img src=\"../../images/others/placeholder_product.jpg\" alt=\"Thumbnail\">";
				} else { 
					echo "<img src=\"../$images[$i]\" alt=\"Thumbnail\">"; 
				}
				?>
				<input type="file" name="img<?php echo $i+1;?>" class="input-image">
			</div>

			<?php $i++; } ?>

			<button type="button" class="fade-modal custom-btn">I'm Done Here</button>

			<br><br>
			<h5>Good quality images attract more people and increases the odds to get a good price for the product</h5>

			<input type="hidden" name="img1" value="<?php echo $images[0];?>">
			<input type="hidden" name="img2" value="<?php echo $images[1];?>">
			<input type="hidden" name="img3" value="<?php echo $images[2];?>">
			<input type="hidden" name="img4" value="<?php echo $images[3];?>">

		</div> <!-- /modal-content -->

	</div> <!-- /upload-modal -->


</form>



















<div class="guidelines">
	
	<h2>Guideline for choosing parameter of your post</h2>




	<section class="pull-left">
		<h3>Title</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua.
		</p>
	</section>




	<section class="pull-right">
		<h3>Description</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco
		</p>
	</section>




	<section class="pull-left">
		<h3>Picking A Date For Auction</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco
		</p>
	</section>




	<section class="pull-right">
		<h3>Auction Duration</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco
		</p>
	</section>




	<section class="pull-left">
		<h3>Starting Price</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</section>




	<section class="pull-right">
		<h3>Choosing Bid Increase Rate</h3>
		<p>	
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</section>




	<section class="pull-left">
		<h3>About The Image</h3>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur tempor incididunt ut labore
		</p>
	</section>


</div> <!-- /guidelines -->









<script>

	var counter = 0;
	var inserted = [];

	$( "#start-datepicker" ).datepicker({ minDate: 0, maxDate: "+1M" });
	$( "#end-datepicker" ).datepicker({ minDate: 0, maxDate: "+2M" });
	
	$(".input-image").change(function(){
		var input = this;
		if (input.files && input.files[0]){
			var reader = new FileReader();
		    reader.onload = function(e){
		    	$(input).prev('img').attr('src', e.target.result);
		    }
			reader.readAsDataURL(input.files[0]);
		}
	});


	$('#load-modal').on('click',function(){
		$('.upload-modal').fadeIn(500);
	});


	$('.fade-modal').on('click',function(){
		$('.upload-modal').fadeOut(500);
	});


	$('.fades-away').on('click',function(){
		$('.upload-modal').fadeOut(500);
	});

</script>









<?php include '../partials/footer.php';?>