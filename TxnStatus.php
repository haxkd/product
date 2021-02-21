<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Check Payment Details</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>
<div class="container" id="checkagain">
	<div class="container bg-warning text-center text-white py-3">
		<h2>Transaction status query</h2>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="post" action="">
			<div class="form-group">
				<label>ORDER_ID::*</label>
				<input id="ORDER_ID" class="form-control" placeholder="Enter Order ID" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
			</div>
			<div class="form-group">
				<input value="Check Status" type="submit" class="btn btn-success form-control"	onclick="">
			</div>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>	
</div>





	
		<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
		<div class="container">
			<div class="container bg-warning text-center text-white py-3">
			<h2>Response of Your status:</h2>
			</div>
			<div class="table-responsive">
			<table class="table table-dark table-hover">
				<tbody>
					<?php
						foreach($responseParamList as $paramName => $paramValue) {
					?>
					<tr >
						<td style="border: 1px solid"><label><?php echo $paramName?></label></td>
						<td style="border: 1px solid"><?php echo $paramValue?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
			</div>
			<a href="#checkagain" class="btn btn-info" >Check Again</a>
		</div>
		<?php
		}
		?>
		<div style="margin:50px 0px"></div>
</body>
</html>