<?php
session_start();
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Products</title>
</head>
<body>
<style>
.border,img{
	border:1px solid black;
}
</style>
<div class="container my-2">
	<div class="container bg-warning text-center text-white py-3">
	    <h2>All Products</h2>
	</div>	
	<div class="row">
		<!-- All Products -->
		<?php
		$product_query = "SELECT * FROM payment_products";
		$run_query = mysqli_query($conn,$product_query);
		if(mysqli_num_rows($run_query)>0){
			while($fetch_product = mysqli_fetch_assoc($run_query)){
		?>

		<div class="col-md-6 py-5 border">
			<div class="row">
				<div class="col-md-6"><h5>Product ID: <?php echo $fetch_product['p_id'];  ?></h5></div>
				<div class="col-md-6"><h5>Product Name : <?php echo $fetch_product['p_name'];  ?></h5></div>
			</div>		
			<img src="<?php echo $fetch_product['p_img'];  ?>" class="img-fluid rounded" alt="">
			<div class="row">
				<div class="col-md-6"><h5>Price: <?php echo $fetch_product['p_price'];  ?> INR</h5></div>
				<div class="col-md-6"><a href="pgRedirect.php?pid=<?php echo $fetch_product['p_id'];  ?>" class="btn btn-success form-control mt-3">BUY</a></div>
			</div>
		</div>
		<?php
			}
		}
		?>		
	</div>
	<div class="text-right">
		<a href="TxnStatus.php" class="btn btn-dark m-5 btn-lg">CHECK STATUS</a>
	</div>
</div>
<div style="margin:100px;"></div>
</body>
</html>