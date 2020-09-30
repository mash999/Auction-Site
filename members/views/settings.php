
<title>Settings</title>
<?php include '../partials/navigations.php';?>


<div class="settings">
	<h2>Settings</h2>
	<form action="" method="post">
		<ul>
			<li>
				<label>Username</label>
				<input type="text" name="username" placeholder="user name"> 
			</li>
			<li>
				<label>Password</label>
				<input type="password" name="current-password" placeholder="Current Password">
				
			</li>
		</ul>


		<div class="password-inputs">
			<section>
				<input type="password" name="new-password"> 
				<p>New Password</p>
			</section>
			
			<section>
				<input type="password" name="confirm-password"> 
				<p>Confirm Password</p>
			</section>
			
			<input type="submit" name="submit" value="Update">
		</div>

	</form>


</div> <!--/settings -->



<?php include '../partials/footer.php';?>