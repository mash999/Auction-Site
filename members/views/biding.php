
<title>Auction - ongoing</title>
<?php 
include '../partials/navigations.php';
use Auctions\fetch_functions;

if(isset($_GET['id'])){
	$p_code = htmlspecialchars($_GET['id']);
	$row = fetch_functions\get_row('sell_posts','product_code',$p_code)[0];
	if(!$row){
		header("Location:auctions.php");
	}
	else{
		if(time()+5*60*60>$row->end_time){
			echo "<h1 class=\"expired-header\">Sorry, Time for bidding on this post has expired &nbsp;:(</h1>";
			include '../partials/footer.php';
			die();
		}
		elseif(time()+5*60*60<$row->start_time){
			echo "<h1 class=\"expired-header\">Sorry, Time for bidding on this post has not started yet.<br>starting time : " . date("d-M-Y , h:i A",$row->start_time) . "</h1>";
			include '../partials/footer.php';
			die();
		}
		
	}

}

else{
	header("Location:auctions.php");
}

?>

	
<div class="biding-wrapper">


	<h2>
		Auction Ongoing
		<img src="../../images/others/crown.png" alt="image">
	</h2>
	<h4>Product Code #837212</h4>





	<div class="auction-title">

		<?php $images = explode("{}{{}}}", $row->image);?>

		<a target="_blank" href="../<?php echo $images[0];?>"><img src="../<?php echo $images[0];?>" alt="Image"></a>

		<p>place your bid here. next bid must be greater than $249.00</p>

		<input type="text" name="bid">
		<button type="submit" name="submit">BID IT</button>
		<button name="autobid">Apply Auto biding</button>

	</div> <!-- /auction-title -->


















	
	<div class="auction-info">
		
		<div class="sticky-note">
			
			<p>Start Date : <?php echo date("d-M-Y",$row->start_time);?></p>
			<p>Start Time : <?php echo date("h:i A",$row->start_time);?></p>
			<p>End Date :  <?php echo date("d-M-Y",$row->end_time);?></p>
			<p>End Date :  <?php echo date("h:i A",$row->end_time);?></p>
			<p>Bidding Starts At : $<?php echo $row->starting_price;?></p>
			<p>Total Bid : 5</p>
			<br>
			<?php $name =  fetch_functions\get_row('members','id',$row->seller_id)[0];?>
			<p>Seller Name : <?php echo $name->name;?></p>
			<p>Today :  <?php echo date("d-M-Y",$row->start_time);?></p>
			<p>3 days 23 hours remaining</p>
			<button>View The Post</button>

		</div> <!-- /sticky-note -->



		
		<div class="highest-bid">
			
			<section>
				<h4>Highest Bid</h4>
				<h5>$200.00</h5>
			</section>

			<section>
				<h4>Highest Bidder</h4>
				<h5><a href="#">Tahsin</a></h5>
			</section>

		</div> <!-- /highest-bid -->
 
	</div> <!-- /auction-info -->



















	<table class="table table-bordered biding-table">
		<thead>
			<tr>
				<th>Member</th>
				<th>Bid</th>
				<th>Date</th>
				<th>Time</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td><a href="#">Tahsin</a></td>
				<td>$200.00</td>
				<td>28-10-2017</td>
				<td>05.56pm</td>
			</tr>
			<tr>
				<td><a href="#">Tamanna</a></td>
				<td>$150.00</td>
				<td>27-10-2017 </td>
				<td>11.12am</td>
			</tr>
			<tr>
				<td><a href="#">Mahadi</a></td>
				<td>$100.00</td>
				<td>26-10-2017</td>
				<td>08.20pm</td>
			</tr>
			<tr>
				<td><a href="#">Ruhul</a></td>
				<td>$40.00</td>
				<td>26-10-2017</td>
				<td>07.47pm</td>
			</tr>
		</tbody>
	</table>



</div> <!-- /biding-wrapper -->




<?php include '../partials/footer.php';?>