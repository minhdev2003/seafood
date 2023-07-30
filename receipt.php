<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Welcome to the Seafood Restaurant</title>
</head>
<body>
<section class="product">
<?php
		$page = "receiptPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");

		echo "<div class ='product-title'><h1>Receipt</h1></div>";
		if (!isset($_GET["db_msg"])) {// not from process_order.php, redirection
			header("location:payment.php");
			exit();
		}
		else { // from process_order.php, display receipt
			echo $_GET["db_msg"];
		}
	?>
</section>
<?php
    include_once("includes/footer.inc");
?>   
</body>
</html>