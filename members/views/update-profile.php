

<title>Update Profile</title>
<?php 
include '../partials/navigations.php';
use Auctions\fetch_functions;
$row = fetch_functions\get_row('members','id',$_SESSION['active_user'])[0];
?>




<div class="update-profile">
	
	<h2>Keep Your Profile Up To Date</h2>
	<h3>An honest and organized profile always attracts more people to deal with you</h3>
	
	<form action="../../functions/process-forms.php" method="post" enctype="multipart/form-data">

		<section class="update-image">
			
			<?php if(empty($row->image)) {?>
			<img id="new-img" src="../../images/others/placeholder-image.jpg" alt="THUMBNAIL">
			<?php } else { ?>
			<img id="new-img" src="../<?php echo $row->image;?>" alt="THUMBNAIL">
			<?php } ?>
			<input id="img-inp" type="file" name="file">

		</section>


		

		<section class="left-info">

			<input type="text" name="name" value="<?php echo $row->name;?>" placeholder="State Your Full Name" required>
			<input type="text" name="birthday" value="<?php echo $row->birthday;?>" placeholder="Birthday : DD - MM - YYYY">
			
			<select name="gender" required>
				<option value="">Select Gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
			</select>

			<textarea name="about" class="about-textarea" placeholder="Tell us a little about you. What do you expect from others in this site. What kind of things you are looking for. What kind of things you like. If you have made any kinds of dealings before and so on. A brief and organized description have been proven to be the best way to attract other buyers and clients. You can change this information anytime you want"><?php echo $row->about;?></textarea>
		
		</section>

	


		<section class="right-info">
	
			<input type="text" name="phone" placeholder="Your Contact Number" value="<?php echo $row->phone;?>">
			<input type="email" name="mail" placeholder="E-mail ID Must Be Valid" value="<?php echo $row->mail;?>" required>
			<input type="text" name="interests" placeholder="Things That Interest You" value="<?php echo $row->interests;?>" required>
			<input type="text" name="living-area" placeholder="Where Do You Live In" value="<?php echo $row->living_area;?>">
			<textarea name="area-preference" placeholder="Provide The Areas You Want To Deal in"><?php echo $row->area_preference;?></textarea>
			
			<input type="hidden" name="id" value="<?php echo $_SESSION['active_user'];?>">
			<input type="hidden" name="image" value="<?php echo $row->image;?>">
			<button type="submit" class="custom-btn" name="update-profile">Update</button>
		
		</section>

	</form>



</div> <!-- /update-profile -->









<script>
	
	$("#img-inp").change(function(){
		var input = this;
		if (input.files && input.files[0]){
			var reader = new FileReader();
		    reader.onload = function(e){
		    	$('#new-img').attr('src', e.target.result);
		    }
			reader.readAsDataURL(input.files[0]);
		}
	});

</script>



<?php include '../partials/footer.php';?>