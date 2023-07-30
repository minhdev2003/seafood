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
		$page = "managerPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
		session_start();
	?>
    <div class ="product-title">
	<h1 >Manager</h1>
	<!-- Search criteria and sort options -->
	<h2 >Order Search</h2>
    </div>
<div class = "enquire-body">
<div class = "form-container">    
	<form method="post" action="manager.php">
		<div  class = "form-group">
			<p class ="heading">Search for a particular order (leave all blank if you want to display all orders)</p>
		</div>	
			<div class = "form-group">
			  <p class = "heading"><label for="firstName">Customer's first name:</label></p>
				<input class ="form-control" type="text" name="firstName" id="firstName">
            </div>
			<div class = "form-group">
			<p class = "heading"><label for="lastName">Customer's last name:</label></p>
				<input class ="form-control" type="text" name="lastName" id="lastName">
            </div>
			<div class = "form-group">
				<p class = "heading">Search for particular course:</p>
            <label class = "only" for="product1">
            	<input class ="input-checkbox" type="checkbox" id="course1" name="courseSearch[]" value="Big Mantis Shrimp">               
				Big Mantis Shrimp

            </label>
            <label class = "only" for="product2">            	              
                <input class ="input-checkbox" type="checkbox" id="course2" name="courseSearch[]" value="Wild Ornate Spiny Lobster">
                Wild Ornate Spiny Lobster
            </label>
            <label class ="only" for="product3">
            	<input class ="input-checkbox" type="checkbox" id="course3" name="courseSearch[]" value="Mud Crab/Mud Crab with Roes">               
				Mud Crab/Mud Crab with Roes
            </label>
            </div>
			<div class ="form-group row">
				<p>Search for pending orders:</p>
            <div class = "category">    
                <label class="only"  for="searchPending">
                    <input class = "input-radio" type="radio" id="searchPending" name="pendingSearch" value="yes">               
                Yes
                </label>
                <label class ="only" for="noSearchPending">
                    <input class = "input-radio" type="radio" id="noSearchPending" name="pendingSearch" value="no" checked>               
                No
                </label>
            </div>
            </div>
			<div class ="form-group row">
				<p>Sort orders by cost:</p>
            <div class = "category">    
                <label class="only"  for="orderSorted">
                    <input class = "input-radio" type="radio" id="orderSorted" name="orderSort" value="yes">               
                Yes
                </label>
                <label class ="only" for="orderUnsorted">
                    <input class = "input-radio" type="radio" id="orderUnsorted" name="orderSort" value="no" checked>               
                No
                </label>
            </div>
            </div>            

			<div class = "form-group">
				<p class = "heading">Sort results by other criteria (choose again to reverse order):</p>
                <select class ="form-control" name="sort" id="sort">
                    <option value="">Select field...</option>
                    <option value="orderIDSort">Order ID</option>
                    <option value="orderDateSort">Order Date</option>
                    <option value="orderStatusSort">Order Status</option>
                    <option value="firstNameSort">First Name</option>
                    <option value="lastNameSort">Last Name</option>
                </select>
            </div>
		<div class = "button">
		<input class="button" type="submit" value="Search" name="Search">
		</div>
	</form>
</div>
</div>

	<?php
		//if search form was submitted
		if (isset($_POST["Search"])){
			$sortQuery = "";
			$condition = "";
			// If sort by cost was chosen
			if ($_POST["orderSort"] == "yes")
				$sortQuery = " ORDER BY order_cost";
			// If sort by other criteria was chosen
			if (isset($_POST["sort"])){
				
				$flag = "";
				//sortFlag used for switching between ascending and descending order
				if (!isset($_SESSION["sortFlag"])){		// If sortFlag has not been set => set it
					$flag = "ASC";
					$_SESSION["sortFlag"] = $flag;
				}
				else{			
					if ($_SESSION["sortFlag"] == "ASC"){		//switch form ascending order from previous sort to descending order for the current sort
						$flag = "DESC";
						$_SESSION["sortFlag"] = $flag;
					}
					else{ 									//switch form descending order to ascending
						$flag = "ASC";
						$_SESSION["sortFlag"] = $flag;
					}		
				}

				if ($_POST["sort"] == "orderIDSort"){
					if ($sortQuery != "")
						$sortQuery .= ", order_id $flag";
					else
						$sortQuery = " ORDER BY order_id $flag";
				}
				if ($_POST["sort"] == "orderDateSort"){
					if ($sortQuery != "")
						$sortQuery .= ", order_date $flag";
					else
						$sortQuery = " ORDER BY order_date $flag";
				}
				if ($_POST["sort"] == "orderStatusSort"){
					if ($sortQuery != "")
						$sortQuery .= ", order_status $flag";
					else
						$sortQuery = " ORDER BY order_status $flag";
				}
				if ($_POST["sort"] == "firstNameSort"){
					if ($sortQuery != "")
						$sortQuery .= ", first_name $flag";
					else
						$sortQuery = " ORDER BY first_name $flag";
				}
				if ($_POST["sort"] == "lastNameSort"){
					if ($sortQuery != "")
						$sortQuery .= ", last_name $flag";
					else
						$sortQuery = " ORDER BY last_name $flag";
				}
			}

			// If at least one search criteria was chosen
			if ( isset($_POST["firstName"]) || isset($_POST["lastName"]) || $_POST["pendingSearch"] == "yes" || isset($_POST['productSearch'])){

				function sanitise_input($data){
					$data = trim($data);				//remove spaces
					$data = stripslashes($data);		//remove backslashes in front of quotes
					$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
					return $data;
				}

				$fname = sanitise_input($_POST["firstName"]);
				$lname = sanitise_input($_POST["lastName"]);
				$pending = $_POST["pendingSearch"];

				require_once('settings.php');		//Acquire connection to database
        		$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        		if (!$conn){
        			echo "<h3 class='align-center'>Unable to connect to the database.</h3>";
        		}
        		else{
        			
        			if ($fname != ""){
        				if ($condition != "")
        					$condition .= " AND ";
        				$condition .= "first_name LIKE '%$fname%'";
        			}
        			if ($lname != ""){
        				if ($condition != "")
        					$condition .= " AND ";
        				$condition .= "last_name LIKE '%$lname%'";
        			}
        			if ($pending == "yes"){
        				if ($condition != "")
        					$condition .= " AND ";
        				$condition .= "order_status LIKE 'PENDING'";
        			}

	        		if (isset($_POST['courseSearch'])){
        				$courses = $_POST["courseSearch"];
        				$course_list = "";
        				if ($condition != "")
        					$condition .= " AND (";
        				else
        					$condition .= " (";
	        			if (in_array('Big Mantis Shrimp', $courses)){
	        				if ($course_list != "")
	        					$condition .= " OR ";
	        				
	        				$condition .= "purchases LIKE '%Big Mantis Shrimp%'";
	        				$course_list .= "Big Mantis Shrimp";
	        			}
	        			if (in_array('Wild Ornate Spiny Lobster', $courses)){
	        				if ($course_list != "")
	        					$condition .= " OR ";
	        				
	        				$condition .= "purchases LIKE '%Wild Ornate Spiny Lobster%'";
	        				$course_list .= "Wild Ornate Spiny Lobster";
	        			}
	        			if (in_array('Mud Crab/Mud Crab with Roes', $courses)){
	        				if ($course_list != "")
	        					$condition .= " OR ";
	        				
	        				$condition .= "purchases LIKE '%Mud Crab/Mud Crab with Roes%'";
	        				$course_list .= "Mud Crab/Mud Crab with Roes";
	        			}
	        			$condition .= ")";
	        		}

        		}
			}

			$condition = ($condition != "") ? " WHERE " . $condition : $condition;

			$query = "SELECT * FROM orders" . $condition . $sortQuery . ";";

			$result = mysqli_query($conn, $query);				//execute the query and store the result into result pointer

			if (!$result){
				echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
			}
			else{
				if (mysqli_num_rows($result) > 0){
					echo "<h2 class='align-center'>Search result</h2>";
					echo "<table>
							<tr id='header'>
								<th>Order ID</th>
								<th>Total cost ($)</th>
								<th>Order date</th>
								<th>Order status</th>
								<th>First name</th>
								<th>Last name</th>
								<th>Purchases</th>
							</tr>";
					while ($record = mysqli_fetch_assoc ($result) ){
						echo "<tr>
								<td>{$record['order_id']}</td>
								<td>{$record['order_cost']}</td>
								<td>{$record['order_date']}</td>
								<td>{$record['order_status']}</td>
								<td>{$record['first_name']}</td>
								<td>{$record['last_name']}</td>
								<td>{$record['purchases']}</td>
							  </tr>";
					}
					echo "</table>";
					mysqli_free_result($result);
				}
				else{
					echo "<h2 class='align-center'>No result matches your search criteria</h2>";
					echo "<p class='align-center'>Your query: $query</p>";
				}
			}
			mysqli_close($conn);
		}
	?>

<!-- Enable manager to modify orders' status -->
<h2 class="align-center">Update order's status</h2>
<div class = "enquire-body">
<div class = "form-container">
	<form method="post" action="manager.php">
        <div class ="form-group">
			<p class = "heading">Update status of an order:</p>
        </div>
			<div class = "form-group">
                <p class="heading">Order ID:				</p>
                <input class = "form-control" type="number" name="orderID" id="orderID" required="required">

			</div>
            <div class = "form-group">
            	<p class = "heading" for="orderStatus">Order status:</p>
                <select class = "form-control" name="orderStatus" id="orderStatus" required>
                    <option value="">Select Status...</option>
                    <option value="PENDING">PENDING</option>
                    <option value="FULFILLED">FULFILLED</option>
                    <option value="PAID">PAID</option>
                    <option value="ARCHIVED">ARCHIVED</option>
                </select>
            </div>
            <div class ="button"><input class="button" type="submit" value="Update" name="Update"></div>
	</form>
</div>
</div>

	<?php
		//if update form was submitted
		if (isset($_POST["Update"])){

			require_once('settings.php');		//Acquire connection to database
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        	if (!$conn){
        		echo "<h2 class='align-center'>Unable to connect to the database.</h2>";
        	}
        	else{
        		function sanitise_input($data){
					$data = trim($data);				//remove spaces
					$data = stripslashes($data);		//remove backslashes in front of quotes
					$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
					return $data;
				}

				$orderID = sanitise_input($_POST["orderID"]);
        		$status = $_POST["orderStatus"];

        		$query = "UPDATE orders SET order_status='$status' WHERE order_id='$orderID'";

        		$result = mysqli_query($conn, $query);		//execute the query and store the result into result pointer
        		if (!$result){
					echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
				}
				else{
					echo "<h2 class='align-center'>Order status has been updated.</h2>";
				}
				mysqli_close($conn);
        	}
		}
	?>

<!-- Enable manager to delete pending orders -->
	<h2 class="align-center">Delete PENDING order</h2>
<div class = "enquire-body">
<div class = "form-container">	
	<form method="post" action="manager.php">
		<div class = "form-group">
			<p class = "heading">Delete an order (only PENDING orders can be deleted):</p>
		</div>	
			<div class ="form-group">
                <p class = "heading"><label for="orderID2">Order ID:</label></p>
                <input class = "form-control" type="number" name="orderID2" id="orderID2" required="required">
			</div>
		<div class = "button"><input class="button" type="submit" value="Delete" name="Delete"></div>
	</form>
</div>
</div>
	<?php
		//if delete form was submitted
		if (isset($_POST["Delete"])){

			require_once('settings.php');		//Acquire connection to database
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        	if (!$conn){
        		echo "<h2 class='align-center'>Unable to connect to the database.</h2>";
        	}
        	else{
        		function sanitise_input($data){
					$data = trim($data);				//remove spaces
					$data = stripslashes($data);		//remove backslashes in front of quotes
					$data = htmlspecialchars($data);	//convert HTML special characters to HTML code
					return $data;
				}

				$orderID2 = sanitise_input($_POST["orderID2"]);
        		
        		$query = "SELECT order_status FROM orders WHERE order_id='$orderID2'";

        		$result = mysqli_query($conn, $query);		//execute the query and store the result into result pointer

        		if (!$result){
					echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
				}
				else{
					$record = mysqli_fetch_assoc ($result);
					if ($record["order_status"] != "PENDING"){
						echo "<h2 class='align-center'>Sorry you cannot delete this order, only existed orders or PENDING orders can be deleted.</h2>";
					}
					else{
						$delete = "DELETE FROM orders WHERE order_id='$orderID2'";
						$execute = mysqli_query($conn, $delete);
						if (!$execute){
							echo "<h2 class='align-center'>Failed to execute query: ", $delete, ".</h2>";
						}
						else{
							echo "<h2 class='align-center'>The order has been deleted.</h2>";
						}
					}
				}
				mysqli_close($conn);
        	}
		}
	?>

<!-- Enhancement -->
	<h2 class="align-center">Advance Report</h2>
<div class = "enquire-body">
<div class = "form-container">	
	<form method="post" action="manager.php">
		<div class = "form-group">
			<p class = "heading">More advanced manager report:</p>
		</div>
			<div class = "form-group row">
				<p>Show best selling course: </p>
				<div class = "category">
                    <label class = "only" for="showBest">
						<input class = "input-radio" type="radio" id="showBest" name="bestSelling" value="yes">               
					Yes
					</label>
				</div>
                <div class = "category">
                    <label class = "only" for="noShowBest">                	
						<input class = "input-radio" type="radio" id="noShowBest" name="bestSelling" value="no" checked>               
					No
				   </label>
				</div>
			</div>

			<div class = "form-group row">
				<p>Show customer has the highest bill: </p>
				<div class = "category">
                    <label class = "only" for="showPerson">
						<input class = "input-radio" type="radio" id="showPerson" name="customerPurchase" value="yes">               
					Yes
					</label>
				</div>
				<div class = "category">
                    <label  class = "only" for="noShowPerson">
						<input  class = "input-radio" type="radio" id="noShowPerson" name="customerPurchase" value="no" checked>               
					No
					</label>
				</div>
			</div>

			<div class ="form-group row">
				<p>Show average profit per transaction: </p>
				<div class = "category">
                    <label class = "only" for="showAvgProfit">
						<input class = "input-radio" type="radio" id="showAvgProfit" name="avgProfit" value="yes">               
					Yes
					</label>
				</div>
                <div class = "category">
                    <label class = "only "for="noShowAvgProfit">
						<input class = "input-radio" type="radio" id="noShowAvgProfit" name="avgProfit" value="no" checked>               
					No
					</label>
				</div>
			</div>

			<div class = "form-group row">
				<p>Show number of PENDING | FULFILLED | PAID | ARCHIVED orders: </p>
				<div class = "category">
                    <label class = "only" for="showStatusNumber">
						<input class = "input-radio" type="radio" id="showStatusNumber" name="statusNumber" value="yes">               
					Yes
					</label>
				</div>
                <div class = "category">
                    <label class = "only" for="noShowStatusNumber">
						<input class = "input-radio" type="radio" id="noShowStatusNumber" name="statusNumber" value="no" checked>               
					No
					</label>
				</div> 
			</div>
		<div class = "button"><input class="button" type="submit" value="Check" name="Check"></div>
	</form>
</div>
</div>

	<?php
		//if enhancement form was submitted
		if (isset($_POST["Check"])){
			require_once('settings.php');		//Acquire connection to database
        	$conn = @mysqli_connect($host,$user,$pwd,$sql_db);	//connect to database

        	if (!$conn){
        		echo "<h2 class='align-center'>Unable to connect to the database.</h2>";
        	}
        	else{
        		if ($_POST["bestSelling"] == "yes" || $_POST["customerPurchase"] == "yes" || $_POST["avgProfit"] == "yes" || $_POST["statusNumber"] == "yes"){
        			$query = "SELECT * FROM orders";
        			$result = mysqli_query($conn, $query);				//execute the query and store the result into result pointer
        			if (!$result) {
        				echo "<h2 class='align-center'>Failed to execute query: ", $query, ".</h2>";
        			}
        			else{
        				$shrimpCount = 0; $lobsterCount = 0; $crabCount = 0;	//for best selling product
        				$customers = array();   $customerBills = array_fill(0, 100, 0);		//for customer with the highest bill
        				$sum = 0; $numberOfOrders = 0;
        				$pendingCount = 0; $fulfilledCount = 0; $paidCount = 0; $archivedCount = 0;

        				while ($record = mysqli_fetch_assoc ($result) ){					//fetch all the records
        					// if showing best selling product was chosen
        					if ($_POST["bestSelling"] == "yes"){
		        				if (strpos($record["purchases"], "Big Mantis Shrimp") !== false)		//if shrimp is selected
		        					$shrimpCount++;
		        				if (strpos($record["purchases"], "Wild Ornate Spiny Lobster") !== false)			//if lobster is selected
		        					$lobsterCount++;
		        				if (strpos($record["purchases"], "Mud Crab/Mud Crab with Roes") !== false)			//if bmw is selected
		        					$crabCount++;
	
			        		}
			        		// if showing customer with the highest bill was chosen
			        		if ($_POST["customerPurchase"] == "yes"){
			        			if (!in_array($record["last_name"], $customers)){
			        				$customers[] = $record["last_name"];		//add customer name into array
			        			}
			        			$index = array_search($record["last_name"], $customers);
			        			$customerBills[$index] += $record["order_cost"];
			        		}
			        		// if showing average profit per transaction was chosen
			        		if ($_POST["avgProfit"] == "yes"){
			        			$numberOfOrders++;
			        			$sum += $record["order_cost"];
			        		}
			        		// if showing average profit per transaction was chosen
			        		if ($_POST["statusNumber"] == "yes"){
			        			if ($record["order_status"] == "PENDING")
			        				$pendingCount++;
			        			if ($record["order_status"] == "FULFILLED")
			        				$fulfilledCount++;
			        			if ($record["order_status"] == "PAID")
			        				$paidCount++;
			        			if ($record["order_status"] == "ARCHIVED")
			        				$archivedCount++;
			        		}
        				}
        				echo "<h2 class='align-center'>Advance report result</h2>";
        				if ($_POST["bestSelling"] == "yes"){
        					$max = $shrimpCount; $name = "Big Mantis Shrimp";
        					if ($lobsterCount > $max){
        						$max = $lobsterCount;
        						$name = "Wild Ornate Spiny Lobster";
        					}
        					if ($crabCount > $max){
        						$max = $crabCount;
        						$name = "Mud Crab/Mud Crab with Roes";
        					}

        					echo "<p class='align-center'>Best selling product is: $name, purchased by $max customer(s).</p>";
        				}

        				if ($_POST["customerPurchase"] == "yes"){
        					$max = $customerBills[0];
        					$index = 0;
        					for ($i = 1; $i < count($customers); $i++){
        						if ($customerBills[$i] > $max){
        							$max = $customerBills[$i];
        							$index = $i;
        						}
        					}
        					echo "<p class='align-center'>Customer with the highest bill is: $customers[$index], total amount spent is $max$.</p>";
        				}

        				if ($_POST["avgProfit"] == "yes"){
        					$avg = $sum / (float)$numberOfOrders;
        					echo "<p class='align-center'>The average profit per transaction is: ", number_format((float) $avg, 3, '.', ''), "$.</p>";
        				}

        				if ($_POST["statusNumber"] == "yes"){
        					echo "<p class='align-center'>The number of each order status:</p>";
        					echo "<p class='align-center'>PENDING: $pendingCount order(s)</p>";
        					echo "<p class='align-center'>FULFILLED: $fulfilledCount order(s)</p>";
        					echo "<p class='align-center'>PAID: $paidCount order(s)</p>";
        					echo "<p class='align-center'>ARCHIVED: $archivedCount order(s)</p>";
        				}
	        		}
        		}
        		mysqli_close($conn);
        	}
		}
	?>
	<?php
		include_once("includes/footer.inc");
	?>
</body>
</html>