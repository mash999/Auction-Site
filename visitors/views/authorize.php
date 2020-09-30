
<?php include '../partials/header.php';?>


	
	<div class="sign-form sign-up-form">
		
		<h2>Sign up here</h2>
		<form action="../../functions/process-forms.php" method="post">
			
			<section>
				<label>Mail ID</label>
				<input type="email" name="mail" placeholder="Email Address">
			</section>

			<section>
				<label>Password</label>
				<input type="password" name="password" placeholder="Choose Password">
			</section>

			<section>
				<input type="password" name="confirm-password" placeholder="Confirm Password">
			</section>

			<input type="submit" name="register-user" value="Register">

		</form>

	</div> <!-- /sign-up-form -->









	









	<div class="sign-form sign-in-form">
		
		<h2>Already Have an Account? Try Signing in</h2>
		<form action="../../functions/process-forms.php" method="post">
			
			<section>
				<label>E-mail</label>
				<input type="text" name="mail" placeholder="E-mail Address">
			</section>

			<section>
				<label>Password</label>
				<input type="password" name="password" placeholder="Choose Password">
			</section>

			<input type="submit" name="login-user" value="Sign In">
			<a href="#">Forgot Password?</a>

		</form>

	</div> <!-- /sign-in-form -->



















	<div id="login-modal">
		
	</div>






	<footer>&copy; All rights reserved. Developed by NSU CSE</footer>
	



<?php include '../partials/footer.php';?>