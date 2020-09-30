
<title>Auctions</title>

<?php 
include '../partials/navigations.php';
use Auctions\fetch_functions;

$category=""; $title=""; $seller="";
if(isset($_POST['search-in-auctions'])){
	$category = htmlspecialchars($_POST['category']);
	$title = htmlspecialchars($_POST['title']);
	$seller = htmlspecialchars($_POST['seller']);
	$rows = fetch_functions\search_in_auctions($category,$title,$seller);
}
else{
	$rows = fetch_functions\get_rows('sell_posts');
}
$count = sizeof($rows);

$favorites = fetch_functions\get_row('members','id',$_SESSION['active_user']);
$fav_arr = explode(',', $favorites[0]->favorites);

// if(isset($_GET['page'])){
// 	$page = htmlspecialchars($_GET['page']);
// }

// start = 12 x page - 11 
// end = 12 x page 
// page needed = floor(total/12) + 1
// page = 1; start = 1 ; end = 12
// page = 2; start = 13 ; end = 24
// page = 3; start = 25 ; end = 36

?>



<div class="auctions-top">

	
	<h2>Auctions</h2>
	<ul class="auctions-status-triggers">
		<li>Ongoing</li>
		<li>Upcoming</li>
		<li class="trigger-clicked">View All</li>
	</ul>



	<form action="" method="POST" id="search-auctions">
		<input type="text" name="category" placeholder="Search by Category" value="<?php echo $category;?>">
		<input type="text" name="title" placeholder="Search by Title" value="<?php echo $title;?>">
		<input type="text" name="seller" placeholder="Search by Seller" value="<?php echo $seller;?>">
		<input type="submit" id="search-in-auctions" name="search-in-auctions" value="Search">
	</form>




	<div class="sort-bar">
		
		<h4>Displaying Recent Auctions</h4>
		<h4>Place Bid on Products You Love</h4>
		<h4>Be A True Collector <span class="pull-right">Start Now</span></h4>

	</div> <!-- /sort-bar -->


</div> <!-- /auctions-top -->



















<section class="products-wrapper">
	
	<?php 
	for($i = $count-1; $i>=0; $i--) { 
		$time = time()+5*60*60;
		if($time >= $rows[$i]->start_time && $time <= $rows[$i]->end_time) $status = "ongoing";
		elseif($time > $rows[$i]->end_time) $status = "Expired";
		elseif($time < $rows[$i]->start_time) $status = "Upcoming";

		$code = ""; 
		$diff = 5 - strlen($rows[$i]->product_code);
		for ($j=0; $j<$diff; $j++){
			$code = $code."0";
		}
		$code = $code.$rows[$i]->product_code;

		$images = explode("{}{{}}}", $rows[$i]->image);
	?>

	<div class="product-container">
		
		<div class="product">
			
			<img src="../<?php echo $images[0];?>" alt="Thumbnail">
			<h3><?php echo $rows[$i]->title;?></h3>
			
			<div class="product-short-detail">
				
				<table>
					<tr>
						<th>Product</th>
						<td>:</td>
						<td>#<?php echo $code;?></td>
					</tr>
					<tr>
						<th>Price</th>
						<td>:</td>
						<td>$<?php echo $rows[$i]->starting_price;?></td>
					</tr>
					<tr>
						<th>Auction</th>
						<td>:</td>
						<td class="auction-status"><?php echo $status;?></td>
					</tr>
					<tr>
						<th>Category</th>
						<td>:</td>
						<td>
							<?php 
							echo $rows[$i]->category;
							if(empty($rows[$i]->category)) echo "Uncategorized";
							?>
						</td>
					</tr>
				</table>

				<a href="biding.php?id=<?php echo $rows[$i]->product_code;?>">Place Bid</a>
				<a href="product-detail.php?id=<?php echo $rows[$i]->product_code;?>">Details</a>
				<?php 
				$found = false;
				foreach ($fav_arr as $fav_item) {
					if($rows[$i]->product_code == $fav_item){
						$found = true;
						break;
					}
					else{
						$found = false;
					}
				}
				if($found){
					echo "<a href=\"#\" class=\"add-to-favorite\"><i class=\"fa fa-heart\"></i></a>";
				}
				else{
					echo "<a href=\"#\" class=\"add-to-favorite\"><i class=\"fa fa-heart-o\"></i></a>";
				}
				?>

			</div>

		</div> <!-- /product -->

	</div> <!-- /product-container -->

	<?php } ?>



<!-- 	<div class="pagination">
		<ul>
			<li><a href="#"><i class="fa fa-caret-left"></i><i class="fa fa-caret-left"></i></a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#"><i class="fa fa-caret-right"></i><i class="fa fa-caret-right"></i></a></li>
		</ul>
	</div> -->


</section> <!-- /products-wrapper -->









<script>

(function(){

	var triggers = $('.auctions-status-triggers li'),
		productContainer = $('.product-container');

	triggers.css('cursor','pointer');

	triggers.on('click',function(){
		$(this).addClass('trigger-clicked').siblings('li').removeClass('trigger-clicked');
		var target = $(this).text();

		if(target.toLowerCase()=="view all"){
			productContainer.show(300);	
		}
		else{
			$('.auction-status').each(function(){
				if($(this).text().toLowerCase()==target.toLowerCase()){
					$(this).closest(productContainer).show(300);
				}
				else{
					$(this).closest(productContainer).hide(300);
				}
			});
		}
	});


	$('.add-to-favorite').on('click',function(e){

		e.preventDefault();
		var $this = $(this),
			$i = $(this).children('i'),
			val = $(this).parent('div').children('table').first().children('tbody').children('tr').find('td').eq(1).html();
		
		val = parseInt(val.substring(1));
		
		if($i.hasClass('fa-heart-o')){
			$.ajax({
				url : '../../functions/process-forms.php',
				method : 'GET',
				data : {memberId : <?php echo $_SESSION['active_user'];?>, productCode : val},
				success : function(context){
					$i.addClass('fa-heart').removeClass('fa-heart-o');
					alert(context);	
				}
			});
		}

		else if($i.hasClass('fa-heart')){
			$.ajax({
				url : '../../functions/process-forms.php',
				method : 'GET',
				data : {memberId : <?php echo $_SESSION['active_user'];?>, productId : val},
				success : function(context){	
					$i.addClass('fa-heart-o').removeClass('fa-heart');
					alert(context);	
				}
			});
		}


	});



})();

</script>





<?php include '../partials/footer.php';?>









