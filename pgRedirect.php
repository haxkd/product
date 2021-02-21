<?php
require_once 'config.php';
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
?>


<?php
if(isset($_GET['pid']) && !empty($_GET['pid'])){
	$pid = $_GET['pid'];
		$product_query = "SELECT * FROM payment_products WHERE p_id='$pid'";
		$run_query = mysqli_query($conn,$product_query);
		if(mysqli_num_rows($run_query)>0){
            while ($fetch_product = mysqli_fetch_assoc($run_query)) {
				buyProduct($fetch_product['p_id'],$fetch_product['p_price']);
            }
		}
		else{
		echo '<center><h1>Please choose valid product...</h1></center>';
		}
		?>	
	
<?php
}else{
	echo '<center><h1>Please choose valid product...</h1></center>';
}
?>

<?php
function buyProduct($pid, $price) {
  
	$checkSum = "";
	$paramList = array();		
	$ORDER_ID = "ORDS_".$pid.'_'.rand(10000,99999999);
	$CUST_ID = 01;
	$INDUSTRY_TYPE_ID = 'Retail';
	$CHANNEL_ID = 'WEB';
	$TXN_AMOUNT = $price;
	
	// Create an array having all required parameters for creating checksum.
	$paramList["MID"] = PAYTM_MERCHANT_MID;
	$paramList["ORDER_ID"] = $ORDER_ID;
	$paramList["CUST_ID"] = $CUST_ID;
	$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
	$paramList["CHANNEL_ID"] = $CHANNEL_ID;
	$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
	$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
	$paramList["CALLBACK_URL"] = "http://$_SERVER[SERVER_NAME]/tsfgrip/product/pgResponse.php";
	
	/*
	$paramList["CALLBACK_URL"] = "http://localhost/PaytmKit/pgResponse.php";
	$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
	$paramList["EMAIL"] = $EMAIL; //Email ID of customer
	$paramList["VERIFIED_BY"] = "EMAIL"; //
	$paramList["IS_USER_VERIFIED"] = "YES"; //
	*/
	
	//Here checksum string will return by getChecksumFromArray() function.
	$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
	
	?>
	<html>
	<head>
	<title>Merchant Check Out Page</title>
	</head>
	<body>
		<center><h1>Please do not refresh this page...</h1></center>
			<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
			<table>
				<tbody>
				<?php
				foreach($paramList as $name => $value) {
					echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
				}
				?>
				<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
				</tbody>
			</table>
			<script type="text/javascript">
				document.f1.submit();
			</script>
		</form>
	</body>
	</html>
<?php
}
?>
