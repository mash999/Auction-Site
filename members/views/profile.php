
<title>Profile</title>
<?php 
require '../partials/navigations.php';
use Auctions\fetch_functions;
$row = fetch_functions\get_row('members','id',$_SESSION['active_user'])[0];
?>


<section class="dp-review">

	<?php if(empty($row->image)) {?>
	<img id="new-img" src="../../image/others/placeholder-image.jpg" alt="THUMBNAIL">
	<?php } else { ?>
	<img id="new-img" src="../<?php echo $row->image;?>" alt="THUMBNAIL">
	<?php } ?>

	<div class="review-info">
		
		<h2><?php echo $row->name;?></h2>
		<h3>Platinum Member</h3>

		


		<h5>Rating 4/5</h5>
		<ul>
			<li><i class="fa fa-star fa-lg" aria-hidden="true"></i></li>
			<li><i class="fa fa-star fa-lg" aria-hidden="true"></i></li>
			<li><i class="fa fa-star fa-lg" aria-hidden="true"></i></li>
			<li><i class="fa fa-star fa-lg" aria-hidden="true"></i></li>
			<li><i class="fa fa-star-o fa-lg" aria-hidden="true"></i></li>
		</ul>

		


		<a href = "allies.php">Allies : 6</a>
		<a href = "#review-user" data-trigger = "view-reviews" class="modal-trigger">View Reviews</a>
		<br>

		


		<span>Purchased : 30</span>
		<span>Sold : 13</span>


	</div> <!-- /review-info -->

</section> <!-- /dp-review -->



















<section class="member-info">
	
	<ul class="member-info-triggers">
		<li data-trigger="general"><i class="fa fa-eye"></i>General Information</li>
		<li data-trigger="log-book"><i class="fa fa-book" aria-hidden="true"></i> Activity Log</li>
		<li><a href="update-profile.php" class="pull-right">Edit Profile</a></li>
	</ul>


	

	<section id="tab-general">

		<section class="contacts">
			
			<div class="digital-contacts">
				<h3>Contact Information</h3>
				<table>
					<tr>
						<th>Phone Number</th>
						<td><?php echo $row->phone;?></td>
					</tr>
					<tr>
						<th>E-mail Address</th>
						<td><?php echo $row->mail;?></td>
					</tr>
				</table>
			</div>
			
	


			<div class="areas">
				<h3>Areas</h3>
				<table>
					<tr>
						<th>Lives In</th>
						<td><?php echo $row->living_area;?></td>
					</tr>
					<tr>
						<th>Area Preference</th>
						<td><?php echo $row->area_preference;?></td>
					</tr>
				</table>
			</div>

		</section> <!--contacts -->



		
		<section class="basic-info">
			
			<h3>Basic Information</h3>
			<table>
				<tr>
					<th>Birth Date</th>
					<td><?php echo $row->birthday;?></td>
				</tr>
				<tr>
					<th>Gender</th>
					<td><?php echo $row->gender;?></td>
				</tr>
				<tr>
					<th>About</th>
					<td><?php echo $row->about;?></td>
				</tr>
				<tr>
					<th>Interests</th>
					<td><?php echo $row->interests;?></td>
				</tr>
			</table>
		
		</section> <!-- /basic -->


	</section> <!-- /general -->



















	<section class="log-book" id="tab-log-book">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-body">
							<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search Transactions"/>
							<p><i class="fa fa-handshake-o" aria-hidden="true"></i> &nbsp;Sold</p>
							<p><i class="fa fa-money" aria-hidden="true"></i> &nbsp;Bought</p>
						</div>
					</div>

					<table class="table" id="dev-table">
						<thead>
							<tr>
								<td>Category</td>
								<td>Product Code</td>
								<td>Transaction With</td>
								<td>Date</td>
								<td>Type</td>
								<td>Review</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Clock</td>
								<td>832243</td>
								<td>Nusrat Jahan</td>
								<td>26-10-2017</td>
								<td><i class="fa fa-handshake-o fa-lg" aria-hidden="true"></i></td>
								<td><a href="#" data-trigger="review-user" class="review-user-button modal-trigger">Review</a></td>
							</tr>
							<tr>
								<td>Coins</td>
								<td>7530256</td>
								<td>Tamanna Elahi</td>
								<td>29-10-2017</td>
								<td><i class="fa fa-money fa-lg" aria-hidden="true"></i></td>
								<td><a href="#" data-trigger="review-user" class="review-user-button modal-trigger">Review</a></td>
							</tr>
							<tr>
								<td>Cars</td>
								<td>456312</td>
								<td>Mahadi Hasan</td>
								<td>02-11-2017</td>
								<td><i class="fa fa-handshake-o fa-lg" aria-hidden="true"></i></td>
								<td><span class="review-user-button">Done</span></td>
							</tr>
							<tr>
								<td>Maps</td>
								<td>110341</td>
								<td>Ruhul Mashbu</td>
								<td>06-11-2017</td>
								<td><i class="fa fa-handshake-o fa-lg" aria-hidden="true"></i></td>
								<td><a href="#" data-trigger="review-user" class="review-user-button modal-trigger">Review</a></td>
							</tr>
							<tr>
								<td>Shoe</td>
								<td>148736</td>
								<td>Karim Mahmud</td>
								<td>11-12-2017</td>
								<td><i class="fa fa-money fa-lg" aria-hidden="true"></i></td>
								<td><span class="review-user-button">Done</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</section> <!-- /log-book -->



</section> <!-- /member-info -->



















<!--================= MODALS ================-->
<!--
<============================================-->

<section id="review-user">
	
	<section class="review-overlay"></section>
	<section class="review-form">
		
		<h3>Provide a Rating <i class="fa fa-close text-danger pull-right"></i></h3>
		<h5>Rating 4/5</h5>
		
		<form action="" method="POST">
			
			<div class="stars">
				<i class="fa fa-star-o fa-lg" data-count = "1" aria-hidden="true"></i>
				<i class="fa fa-star-o fa-lg" data-count = "2" aria-hidden="true"></i>
				<i class="fa fa-star-o fa-lg" data-count = "3" aria-hidden="true"></i>
				<i class="fa fa-star-o fa-lg" data-count = "4" aria-hidden="true"></i>
				<i class="fa fa-star-o fa-lg" data-count = "5" aria-hidden="true"></i>
			</div>
			
			<textarea name="review" placeholder="Provide a review for this user to help others get to know him"></textarea>
			
			<p><input type="checkbox" name="agreed">I understand that giving fake review will result in membership cancellation.</p>
			
			<input type="submit" name="submit" value="Submit">

		</form>

	</section> <!-- /review-form -->









	<section class="review-contents">
		
		<h3>Take a look what others said about John <i class="fa fa-close text-danger pull-right"></i></h3>
		<div>
			<img src="../../image/dp/dp1.jpg" alt="Thumbnail">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				Incididunt ut labore et dolore magna ipsum dolor sit amet, consectetur.
				<br><br><span>- John Doe</span>
			</p>
		</div>




		<div>
			<img src="../../image/dp/dp1.jpg" alt="Thumbnail">
			<p>
				Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur.
				<br><br><span>- John Doe</span>
			</p>
		</div>

		


		<div>
			<img src="../../image/dp/dp1.jpg" alt="Thumbnail">
			<p>
				Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
				deserunt mollit anim id est laborum.
				<br><br><span>- John Doe</span>
			</p>
		</div>

		


		<div>
			<img src="../../image/dp/dp1.jpg" alt="Thumbnail">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				<br><br><span>- John Doe</span>
			</p>
		</div>

		


		<div>
			<img src="../../image/dp/dp1.jpg" alt="Thumbnail">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				<br><br><span>- John Doe</span>
			</p>
		</div>

		


		<div>
			<img src="../../image/dp/dp1.jpg" alt="Thumbnail">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				<br><br><span>- John Doe</span>
			</p>
		</div>

		


		<div>
			<img src="../../image/dp/dp1.jpg" alt="Thumbnail">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				<br><br><span>- John Doe</span>
			</p>
		</div>

		


		<div>
			<img src="../../image/dp/dp1.jpg" alt="Thumbnail">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
				<br><br><span>- John Doe</span>
			</p>
		</div>




	</section> <!-- /review-contents -->


</section> <!-- /review-user -->




<?php include '../partials/footer.php';?>









<script>
	
	(function(){

		// APPEAR MODAL WHEN CLICKED ON THE MODAL TRIGGERS
		$('a.modal-trigger').on('click',function(e){
			e.preventDefault();
			var $this = $(this);
			$('#review-user').fadeIn();
			if($this.data("trigger")=="review-user")
				$('.review-form').fadeIn();
			if($this.data("trigger")=="view-reviews")
				$('.review-contents').fadeIn();	
			
		});




		// DISAPPEAR MODAL WHEN CLICKED ON THE MODAL OVERLAY
		$('.review-overlay').on('click',function(){
			$('#review-user').fadeOut();
			$('.review-form').fadeOut();
			$('.review-contents').fadeOut();
		});




		// DISAPPEAR MODAL WHEN CLICKED ON THE CROSS SIGN OF THE MODAL
		$('.fa-close').on('click',function(){
			$('#review-user').fadeOut();
			$('.review-form').fadeOut();
			$('.review-contents').fadeOut();
		});




		// COLOR THE NUMBER OF STARS OF THE RATINGS WHEN CLICKED ON A PARTICULAR STAR
		// IF 4TH STAR IS CLICKED, COLOR THE FIRST 4. IF 3RD IS CLICKED, COLOR THE FIRST 3 STARS AND SO ON
		$('.review-form .stars .fa').on('click',function(){
			var count = $(this).data('count'),
				obj = $('div.stars i');

			obj.removeClass('fa-star').addClass('fa-star-o');
			for(var i = 0; i < count; i++){
				obj.eq(i).removeClass('fa-star-o').addClass('fa-star');
			}
		});




		// TRIGGERS GENERAL INFORMATION OR LOG BOOK TAB 
		$('#tab-log-book').hide();
		$('.member-info-triggers li').css('cursor','pointer').eq(0).css('color','#333');
		
		$('.member-info-triggers li').on('click',function(){
		
			// MARK THE LI AS SELECTED
			$(this).css('color','#333').siblings('li').css('color','#0B8389');

			// ENABLE THE CLICKED TAB AND DISABLE THE OTHER TAB
			var tab = "#tab-" + $(this).data("trigger");
			$(tab).fadeIn().siblings('section').hide();
		});




	})();

</script>









<script>

	//BOOTSNIPP 
	(function(){
	    'use strict';
		var $ = jQuery;
		$.fn.extend({
			filterTable: function(){
				return this.each(function(){
					$(this).on('keyup', function(e){
						$('.filterTable_no_results').remove();
						var $this = $(this), 
	                        search = $this.val().toLowerCase(), 
	                        target = $this.attr('data-filters'), 
	                        $target = $(target), 
	                        $rows = $target.find('tbody tr');
	                        
						if(search == '') {
							$rows.show(); 
						} else {
							$rows.each(function(){
								var $this = $(this);
								$this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
							})
							if($target.find('tbody tr:visible').size() === 0) {
								var col_count = $target.find('tr').first().find('td').size();
								var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
								$target.find('tbody').append(no_results);
							}
						}
					});
				});
			}
		});
		$('[data-action="filter"]').filterTable();
	})(jQuery);

</script>