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
  <?php
		//Prevent accessing directly from URL
		if(!isset($_SERVER['HTTP_REFERER'])){
		    header('location:payment.php');		//redirect to payment.php if attempted to access directly
		    exit;
		}      
		//Sanitise input to avoid SQL injection
		function sanitise_input($data){
			$data = trim($data);				//remove spaces
			$data = stripslashes($data);		//remove backslashes in front of quotes
			$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
			return $data;
		}

		$errMsg = "";		//Error message

		//First name validation
		$fname = sanitise_input($_POST["firstName"]);		//sanitise input
		if (!preg_match("/^[a-zA-Z]{1,25}$/", $fname)) {
	        $errMsg .= "<h3 class = 'align-center'>First name must contains only alphabetical characters and in between 1-25 characters length.</h3>\n";
	    }

	    //Last name validation
	    $lname = sanitise_input($_POST["lastName"]);		//sanitise input
		if (!preg_match("/^[a-zA-Z]{1,25}$/", $lname)) {
	        $errMsg .= "<h3 class = 'align-center'>Last name must contains only alphabetical characters and in between 1-25 characters length.</h3>\n";
	    }

	    //Last name validation
	    $email = sanitise_input($_POST["email"]);			//sanitise input
		if (!preg_match("/\S+@\S+\.\S+/", $email)) {
	        $errMsg .= "<h3 class = 'align-center'>Your email must be in the format of something@something.something</h3>\n";
	    }

			    //Phone validation
	    $phone = sanitise_input($_POST["phone"]);			//sanitise input
		if (!preg_match("/^\d{8,12}$/", $phone)) {
	        $errMsg .= "<h3 class = 'align-center'>Your phone number must contains only numbers and in between 8-12 digits length .</h3>\n";
	    }

	    //Address validation
	    $address = sanitise_input($_POST["address"]);		//sanitise input
		if (!preg_match("/^[a-zA-Z0-9 ,.'-]{1,40}$/", $address)) {
	        $errMsg .= "<h3 class = 'align-center'>Your address must contains only alphabetical characters, numbers, commas, dots and hyphens.</h3>\n";
	    }

	    //Suburb validation
	    $suburb = sanitise_input($_POST["suburb"]);			//sanitise input
		if (!preg_match("/^[a-zA-Z]{1,20}$/", $suburb)) {
	        $errMsg .= "<h3 class = 'align-center'>Your suburb must contains only alphabetical characters and in between 1-20 characters length.</h3>\n";
	    }

	    //State validation
	    $state = sanitise_input($_POST["state"]);			//sanitise input
		if ($state == "none"){								//if state has not been selected
			$errMsg .= "<h3 class = 'align-center'>You must select your state.</h3>\n";
		}

		//Postcode validation
		$postCode = sanitise_input($_POST["postCode"]);		//sanitise input
		if (!preg_match("/^\d{4}$/", $postCode)) {
	        $errMsg .= "<h3 class = 'align-center'>Your post code must be a 4-digit number.</h3>\n";
	    }
	    else{
	    	switch ($state){
			case "VIC":
				if ($postCode[0] != "3" && $postCode[0] != "8"){					//VIC post code must start with 3 or 8
					$errMsg .= "<h3 class = 'align-center'>VIC post code must start with 3 or 8.</h3>\n";
				}
				break;
			case "NSW":
				if ($postCode[0] != "1" && $postCode[0] != "2"){					//NSW post code must start with 1 or 2
					$errMsg .= "<h3 class = 'align-center'>NSW post code must start with 1 or 2.</h3>\n";
				}
				break;
			case "QLD":
				if ($postCode[0] != "4" && $postCode[0] != "9"){					//QLD post code must start with 4 or 9
					$errMsg .= "<h3 class = 'align-center'>QLD post code must start with 4 or 9.</h3>\n";
				}
				break;
			case "WA":
				if ($postCode[0] != "6"){										//NA post code must start with 6
					$errMsg .= "<h3 class = 'align-center'>WA post code must start with 6.</h3>\n";
				}
				break;
			case "SA":
				if ($postCode[0] != "5"){										//SA post code must start with 5
					$errMsg += "<h3 class = 'align-center'>SA post code must start with 5.</h3>\n";
				}
				break;
			case "TAS":
				if ($postCode[0] != "7"){										//TAS post code must start with 7
					$errMsg += "<h3 class = 'align-center'>TAS post code must start with 7.</h3>\n";
				}
				break;
			case "NT":
			case "ACT":
				if ($postCode[0] != "0"){										//NT and ACT post code must start with 0
					$errMsg += "<h3 class = 'align-center'>$state post code must start with 0.</h3>\n";
				}
				break;
			}
	    }


	    //Enquiry validation
	    $mostLike = sanitise_input($_POST["mostLike"]);		//sanitise input
	    if ($mostLike == ""){
	    	$errMsg .= "<h3 class = 'align-center'>You must select your favourite course.</h3>\n";
	    }

	    //Quantity validation
	    function checkInt($number){		//return true if number is a positive integer
	    	$number = filter_var($number, FILTER_VALIDATE_INT);
			return ($number !== FALSE && $number > 0);
	    }
	    function validate($quantity){	//return true if either quantity is blank or quantity is a positive integer
	    	if ($quantity == "")
	    		return true;
	    	if ($quantity != "" && checkInt($quantity))
	    		return true;
	    	return false;
	    }
		$shrimpQuantity = sanitise_input($_POST["shrimpQuantity"]);		//sanitise input
	    $lobsterQuantity = sanitise_input($_POST["lobsterQuantity"]);		//sanitise input
	    $crabQuantity = sanitise_input($_POST["crabQuantity"]);		//sanitise input
		if (!validate($shrimpQuantity) || !validate($lobsterQuantity) || !validate($crabQuantity)){		//Validate quantity inputs
			
			$errMsg .= "<h3 class = 'align-center'>Quantity must be a positive integer.\n</h2>";
		}

	    //Courses chosen validation
	    $isShrimp = sanitise_input($_POST["isShrimp"]);
		$isLobster = sanitise_input($_POST["isLobster"]);
	    $isCrab = sanitise_input($_POST["isCrab"]);
	    //At least 1 courses must be chosen to proceed 
	    if (!($isShrimp == "true" || $isLobster == "true" || $isCrab == "true" )){
	    	$errMsg .= "<h3 class = 'align-center'>You have not chosen any course. Please select at least one.</h2>\n";
	    }
	    //Quantities for selected courses must be entered
	    else if (($isShrimp == "true" && $shrimpQuantity == "") || ($isLobster == "true" && $lobsterQuantity == "") || ($isCrab == "true" && $crabQuantity == "") ){
	    	$errMsg .= "<h3 class = 'align-center'>Please enter quantity for all of your selected courses.</h2>\n";
	    }

	    //Card type validation
	    $cardType = sanitise_input($_POST["cardType"]);			//sanitise input
		if ($cardType == "none"){								//if state has not been selected
			$errMsg .= "<h3 class = 'align-center'>You must select your card type.</h2>\n";
		}

		//Card name validation
		$cardName = sanitise_input($_POST["cardName"]);			//sanitise input
		if ($cardName == ""){
			$errMsg .= "<h3 class = 'align-center'>You must enter your name on card.</h2>\n";
		}
		else if (!preg_match("/^[a-zA-Z ]{1,40}$/", $cardName)) {
	        $errMsg .= "<h3 class = 'align-center'>Card name must contains only alphabetical characters and spaces and cannot exceed 40 characters length.</h2>\n";
	    }

	    //Card number validation
	    $cardNumber = sanitise_input($_POST["cardNumber"]);		//sanitise input
		if ($cardNumber == ""){								//if state has not been selected
			$errMsg .= "<h3 class = 'align-center'>You must enter your card number.</h2>\n";
		}
		else{
			switch ($cardType){
			case "visa": 																							//post code check for visa type
				if ($cardNumber[0] != "4"){																			//check if first number is 4
					$errMsg .= "<h3 class = 'align-center'>Visa card number must start with 4.</h2>\n";
				}
				else if (!preg_match("/^\d{16}$/", $cardNumber)){													//check if length is 16 and only contains numbers
					$errMsg .= "<h3 class = 'align-center'>Visa card number must be 16 digits and contains numbers only.</h2>\n";
				}
				break;
			case "master": 																							//post code check for mastercard type
				if (!($cardNumber[0] == "5" && ($cardNumber[1] >= 1 && $cardNumber[1] <= 5))){						//check if first 2 numbers are 51->55
					$errMsg .= "<h3 class = 'align-center'>MasterCard must start with digits \"51\" through to \"55\".</h2>\n";
				}
				else if (!preg_match("/^\d{16}$/", $cardNumber)){													//check if length is 16 and only contains numbers
					$errMsg .= "<h3 class = 'align-center'>MasterCard number must be 16 digits and contains numbers only.</h2>\n";
				}
				break;
			case "amex": 																							//post code check for amex type
				if (!($cardNumber[0] == "3" && ($cardNumber[1] == "4" || $cardNumber[1] == "7"))){					//check if first 2 numbers are 34 or 37
					$errMsg .= "<h3 class = 'align-center'>American Express must start with \"34\" or \"37\".</h2>\n";
				}
				else if (!preg_match("/^\d{15}$/", $cardNumber)){															//check if length is 15 and only contains numbers
					$errMsg .= "<h3 class = 'align-center'>MasterCard number must be 15 digits and contains numbers only.</h2>\n";
				}
				break;
			}
		}

		//Card expiry date validation
		$cardExpiry = sanitise_input($_POST["cardExpiry"]);					//sanitise input
		if ($cardExpiry == ""){
			$errMsg .= "<h3 class = 'align-center'>Card expiry date cannot be left blank.</h2>\n";	//Check if expiry date is left empty
		}
		else if (!preg_match("/^\d{2}\/\d{2}$/", $cardExpiry)){		//Check if expiry date is in the right format
			$errMsg .= "<h3 class = 'align-center'>Please enter expiry in the format of mm/yy.</h2>\n";
		}
		else{		//Check if the card is expired
			$date = explode("/", $cardExpiry);
			$month = $date[0];
		    $year = $date[1];
		    $expires = \DateTime::createFromFormat('my', $month . $year);
		    $now     = new \DateTime();
		    if ($expires < $now) {
		        $errMsg .= "<h3 class = 'align-center'>Card is expired.</h2>\n";
		    }
		}

		//CVV validation
		$cardCVV = sanitise_input($_POST["cardCVV"]);					//sanitise input
		if ($cardCVV == ""){
			$errMsg .= "<h3 class = 'align-center'>Card CVV cannot be left blank.</h2>\n";		//Check if CVV is left empty
		}
		else if (!preg_match("/^\d{3}$/", $cardCVV)){
			$errMsg .= "<h3 class = 'align-center'>CVV must be a 3-digit number.</h2>\n";		//check if CVV is a 3-digit number
		}

		//Store preferred contact radio button
	    $contact = sanitise_input($_POST["contact"]);		//sanitise input


							//for data submitted from payment.php

	        $prefer = "";
			if(!empty($_POST['pr']) && in_array('crab_cake_sauce', $_POST['pr'])){
				if ($prefer != "")
					$prefer .= ",";
				$prefer .= "Crab cake sauce";
			}
			if(!empty($_POST['pr']) && in_array('cilantro_sauce', $_POST['pr'])){
				if ($prefer != "")
					$prefer .= ",";
				$prefer .= "Cilantro sauce";
			}
			if(!empty($_POST['pr']) && in_array('savory_seafood_sauce', $_POST['pr'])){
				if ($prefer != "")
					$prefer .= ",";
				$prefer .= "Savory seafood sauce";
			}
			if(!empty($_POST['pr']) && in_array('honey_garlic_sauce', $_POST['pr'])){
				if ($prefer != "")
					$prefer .= ",";
				$prefer .= "Honey garlic sauce";
			}
		

	    //Store comments
	    $comment = sanitise_input($_POST["comment"]);		//sanitise input

	    //Store total cost
	    $cost = sanitise_input($_POST["cost"]);				//sanitise input

	    //Store items purchased
	    $purchases = sanitise_input($_POST["purchases"]);	//sanitise input

        //If the data is not validated, display error message in fix_order.php
        if ($errMsg != "") {
        	session_start();
		    $_SESSION["errMsg"] = $errMsg;
		    $_SESSION["fname"] = $fname;
		    $_SESSION["lname"] = $lname;
		    $_SESSION["email"] = $email;
			$_SESSION["phone"] = $phone;
		    $_SESSION["address"] = $address;
		    $_SESSION["suburb"] = $suburb;
		    $_SESSION["state"] = $state;
		    $_SESSION["postCode"] = $postCode;
		    $_SESSION["contact"] = $contact;
			$_SESSION["mostLike"] = $mostLike;
		    $_SESSION["prefer"] = $prefer;
		    $_SESSION["comment"] = $comment;
		    $_SESSION["isShrimp"] = $isShrimp;
			$_SESSION["isLobster"] = $isLobster;
		    $_SESSION["isCrab"] = $isCrab;
		    $_SESSION["shrimpQuantity"] = $shrimpQuantity;
			$_SESSION["lobsterQuantity"] = $lobsterQuantity;
		    $_SESSION["crabQuantity"] = $crabQuantity;
			$_SESSION["shrimpSize"] = sanitise_input($_POST["shrimpSize"]);
		    $_SESSION["lobsterSize"] = sanitise_input($_POST["lobsterSize"]);
		    $_SESSION["crabSize"] = sanitise_input($_POST["crabSize"]);

		    header("location:fix_order.php");
		    exit();
        }

        //Store information into database when there are no errors
        $db_msg = "";
        require_once('settings.php');		//Acquire connection to database
        $conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        if ($conn){
    		$sql_table = "orders";	
    		$create_table = "CREATE TABLE IF NOT EXISTS orders (
	                            order_id INT AUTO_INCREMENT PRIMARY KEY,
	                            order_cost INT NOT NULL,
	                            order_date DATETIME NOT NULL,
	                            order_status VARCHAR(10) NOT NULL, /*CHECK (order_status IN ('PENDING','FULFILLED','PAID','ARCHIVED')) DEFAULT 'PENDING',*/
	                            first_name VARCHAR(25) NOT NULL,
	                            last_name VARCHAR(25) NOT NULL,
	                            email VARCHAR(50) NOT NULL,
								phone VARCHAR(15) NOT NULL,
	                            address VARCHAR(40) NOT NULL,
	                            suburb VARCHAR(20) NOT NULL,
	                            state VARCHAR(3) NOT NULL, /*CHECK (state IN ('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'))*/
	                            post_code VARCHAR(4) NOT NULL,
	                            contact VARCHAR(10) NOT NULL, /*CHECK (contact_method IN ('by_email', 'by_phone', 'by_post'))*/
	                            mostLike VARCHAR(20) NOT NULL,
	                            prefer VARCHAR(40),
	                            comment VARCHAR(200),
	                            purchases VARCHAR(100) NOT NULL,
	                            card_type VARCHAR(20) NOT NULL,
	                            card_name VARCHAR(20) NOT NULL,
	                            card_number VARCHAR(20) NOT NULL,
	                            card_expiry VARCHAR(20) NOT NULL,
	                            card_CVV INT NOT NULL
	                            );";
        	$result = mysqli_query($conn, $create_table);				//execute the query and store the result into result pointer
        	if ($result){
	        	//calculating cost
	        	$total_cost = 0;
	        	if ($isShrimp == "true")
	        		$total_cost += 245 * $shrimpQuantity;
				if ($isLobster == "true")
	        		$total_cost += 120 * $lobsterQuantity;					
	        	if ($isCrab == "true")
	        		$total_cost += 125 * $crabQuantity;
	

				$purchases = "";

				$shrimpSize = sanitise_input($_POST["shrimpSize"]);			//sanitise input
				if ($isShrimp == "true" &&($shrimpSize == "S" || $shrimpSize == "M" || $shrimpSize == "L") ){					 
					$name = "Big Mantis Shrimp" ;
					$quantity = $shrimpQuantity;
					$size = $shrimpSize;
					$purchases .= "<p>$name ( Qty: $quantity, Size: $size).</p>";
					}
				$lobsterSize = sanitise_input($_POST["lobsterSize"]);			//sanitise input
				if ($isLobster == "true" &&($lobsterSize == "S" || $lobsterSize == "M" || $lobsterSize == "L" )){								 
					$name = "Wild Ornate Spiny Lobster" ;
					$quantity = $lobsterQuantity;
					$size = $lobsterSize;
					$purchases .= "<p>$name ( Qty: $quantity, Size: $size).</p>";
					}
				$crabSize = sanitise_input($_POST["crabSize"]);			//sanitise input
				if ($isCrab == "true" && ($crabSize == "S" || $crabSize == "M" || $crabSize == "L" )){								 
					$name = "Mud Crab/Mud Crab with Roes" ;
					$quantity = $crabQuantity;
					$size = $crabSize;
					$purchases .= "$name ( Qty: $quantity, Size: $size).";
					}
			
				
			

	        	//order date
	        	$datetime = date('Y-m-d H:i:s');

	        	//insert order query
	        	$add_order = "INSERT INTO orders 
	        	(order_cost, order_date, order_status, first_name, last_name, email, phone, address, suburb, state, post_code, contact, mostLike, prefer, comment, purchases, 
	        	card_type, card_name, card_number, card_expiry, card_CVV) 
	        	VALUES ('$total_cost', '$datetime', 'PENDING', '$fname', '$lname', '$email', '$phone', '$address', '$suburb', '$state', '$postCode', '$contact', '$mostLike', 
	        	'$prefer', '$comment', '$purchases', '$cardType', '$cardName', '$cardNumber', '$cardExpiry', '$cardCVV');";
	        	$execute = mysqli_query($conn, $add_order);

        		if ($execute){
        			$db_msg = "  <h2 class = 'align-center'>Your order is recorded, please check the information below:</h2>"
	        				."<table><tr id='header'><th>ITEM</th><th>VALUE</th></tr>"
	        				."<tr><th>Order ID</th><td>" . mysqli_insert_id($conn) . "</td></tr>"
	        				."<tr><th>Total cost ($)</th><td>$total_cost</td></tr>"
	        				."<tr><th>Order date</th><td>$datetime</td></tr>"
	        				."<tr><th>Order status</th><td>PENDING</td></tr>"
	        				."<tr><th>First name</th><td>$fname</td></tr>"
	        				."<tr><th>Last name</th><td>$lname</td></tr>"
	        				."<tr><th>Email</th><td>$email</td></tr>"
							."<tr><th>Phone number</th><td>$phone</td></tr>"
	        				."<tr><th>Address</th><td>$address</td></tr>"
	        				."<tr><th>Suburb</th><td>$suburb</td></tr>"
	        				."<tr><th>State</th><td>$state</td></tr>"
	        				."<tr><th>Post Code</th><td>$postCode</td></tr>"
	        				."<tr><th>Contact method</th><td>$contact</td></tr>"
	        				."<tr><th>Favourite course</th><td>$mostLike</td></tr>"
	        				."<tr><th>Sauce</th><td>$prefer</td></tr>"
	        				."<tr><th>Comment</th><td>$comment</td></tr>"
	        				."<tr><th>Purchases</th><td>$purchases</td></tr>"
	        				."</table>";
	        	}
	        	else{
	        		$db_msg= "<p>Failed to add order.</p>";
	        	}
        	}
        	else{
        		$db_msg= "<p>Failed to create table.</p>";
        	}
    		mysqli_close($conn);
    	}
    	else{
    		$db_msg= "<h3 class ='align-center'>Unable to connect to the database.</h3>";
    	}
	    header("location:receipt.php?db_msg=$db_msg");
?>
</body>
</html>