
<title>Favorite</title>

<?php 

include '../partials/navigations.php';
use Auctions\fetch_functions;

$favorites = fetch_functions\get_row('members','id',$_SESSION['active_user'])[0];
$fav_arr = explode(',',$favorites->favorites);
$count = sizeof($fav_arr);
?>









<div class="favorite-top">
	
	<h2>Favorite List</h2>
	<?php if($count == 1){
		echo "<h1 class=\"expired-header\">You have no item in your favorite list</h1>";
	}?>

</div> <!-- /favorite-top -->



















<section class="products-wrapper">
	
	<?php 
	for($i = $count-2; $i>=0; $i--) {
		$row = fetch_functions\get_row('sell_posts','product_code',$fav_arr[$i])[0];		
		$time = time()+5*60*60;
		if($time >= $row->start_time && $time <= $row->end_time) $status = "ongoing";
		elseif($time > $row->end_time) $status = "Expired";
		elseif($time < $row->start_time) $status = "Upcoming";

		$code = ""; 
		$diff = 5 - strlen($row->product_code);
		for ($j=0; $j<$diff; $j++){
			$code = $code."0";
		}
		$code = $code.$row->product_code;

		$images = explode("{}{{}}}", $row->image);
	?>


	<div class="product-container">
		
		<div class="product">
			
			<img src="../<?php echo $images[0];?>" alt="Thumbnail">
			<h3><?php echo $row->title;?></h3>
			
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
						<td>$<?php echo $row->starting_price;?></td>
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
							echo $row->category;
							if(empty($row->category)) echo "Uncategorized";
							?>
						</td>
					</tr>
				</table>

				<a href="biding.php?id=<?php echo $row->product_code;?>">Place Bid</a>
				<a href="product-detail.php?id=<?php echo $row->product_code;?>">Details</a>
				<a href="#" class="add-to-favorite"><i class="fa fa-heart"></i></a>

			</div>

		</div> <!-- /product -->

	</div> <!-- /product-container -->

	<?php } ?>


</section> <!-- /products-wrapper -->









<script>
	

	$('.add-to-favorite').on('click',function(e){

		e.preventDefault();
		var $this = $(this),
			$i = $(this).children('i'),
			val = $(this).parent('div').children('table').first().children('tbody').children('tr').find('td').eq(1).html();
		
		val = parseInt(val.substring(1));

		$.ajax({
			url : '../../functions/process-forms.php',
			method : 'GET',
			data : {memberId : <?php echo $_SESSION['active_user'];?>, productId : val},
			success : function(context){	
				alert(context);	
				$this.closest('.product-container').hide(500);
			}
		});
	


	});


</script>




<?php include '../partials/footer.php';?>

