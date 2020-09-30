
<title>Posts</title>
<?php 
include '../partials/navigations.php';
use Auctions\fetch_functions;

$rows = fetch_functions\get_row('sell_posts','seller_id',$_SESSION['active_user']);
$pending = 0; $approved = 0; $rejected = 0;
foreach ($rows as $row) {
	if($row->approval == 0) $pending++;
	elseif($row->approval == 1) $approved++;
	if($row->approval == -1) $rejected++;

}

$total = $approved + $pending + $rejected;

?>


<div class="posts">
	
	<h2>
		Your posts 
		<span class="pull-right">Approved Post : <?php echo $approved;?></span>
		<span class="pull-right">Total Post : <?php echo sizeof($rows);?></span>
	</h2>
	
	<h3>
		Showing <?php echo $total;?> posts from you
		<span class="pull-right">Rejected Post : <?php echo $rejected;?></span>
		<span class="pull-right">Pending Post : <?php echo $pending;?></span>
	</h3>








	<?php 
	if($total == 0){
		echo "<h1 class=\"expired-header\">No Posts To display</h1>";
	}
	foreach ($rows as $row) { ?>

	<section>
		
		<div class="posts-contents">
			
			<h3><?php echo $row->title;?></h3>
			<p><?php echo substr($row->description,0,150);?> (.....)</p>
			
			<a href="product-detail.php?id=<?php echo $row->product_code;?>">View Post</a>&nbsp;|&nbsp; 
			<a href="edit-post.php?id=<?php echo $row->product_code;?>">Edit Post</a>&nbsp;|&nbsp; 
			<a onclick = "return confirm ('Are you sure that you want to delete this product?');" href="../../functions/delete.php?delete_product=<?php echo $row->product_code;?>">Delete Post</a>

			<div class="spans">
				<span><i class="fa fa-calendar"></i>Posted on <?php echo $row->posted_on;?></span>
				<span><i class="fa fa-pencil"></i>Last Updated on <?php echo $row->updated_on;?></span>
			</div>

		</div>



		<div class="posts-images">
			<?php 
			$images = explode("{}{{}}}", $row->image);
			foreach ($images as $image) {
				echo "<img src=\"../$image\" alt=\"Thumbnail\">";
			}
			?>
		</div>

	</section>

	<?php } ?> <!-- /foreach -->


</div> <!-- /posts -->



<?php include '../partials/footer.php';?>