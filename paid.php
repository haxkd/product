<?php
session_start();

?>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Products</title>
</head>
<body>
<?php
if(isset($_SESSION['TXNID']) && !empty($_SESSION['TXNID']) && isset($_SESSION['ORDERID']) && !empty($_SESSION['ORDERID'])){
echo "  
    <div class='container'>
        <div class='container bg-warning text-center text-white py-3'>
            <h1>Transaction is Successfull</h1>
        </div>
        <div class='table-responsive'>
        <table class='table table-bordered'>
        <tr><td>
        <h4>Your Transaction id is </h4></td><td><h5> $_SESSION[TXNID]</h5></tr>
        <tr><td><h4>Your order id is </td><td><h5> $_SESSION[ORDERID]</h5></td></tr>
        <tr><td colspan='2' class='text-center'>        <button onclick='window.print()' class='btn btn-primary'>Print this page</button></td></tr>
        <tr><td colspan='2' class='text-right'>        <a href='index.php' class='btn btn-success'><< Go Back To Home</a></td></tr>
        </table>
        </div>";
}
else{
    echo '<a href="index.php" class="btn btn-primary">PLASE GO BACK TO HOME >></a>';
}
?>
</div>
</body>
</html>
