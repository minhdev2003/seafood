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
        else{
			//Include header, navigation bar
			$page = "processPage";
			include_once("includes/header.inc");
			include_once("includes/nav.inc");
			//Print out error message
			session_start();

	    }
    ?>
 <section class="product">
 <?php
		//Prevent accessing directly from URL
		if(!isset($_SERVER['HTTP_REFERER'])){
		    header('location:payment.php');		//redirect to payment.php if attempted to access directly
		    exit;
		}
        else{
			//Print out error message
	    	print_r($_SESSION["errMsg"]);
	    }
    ?>
    <div class="product-title"> <h1 >Payment Details</h1>
    </div>
    <div class="enquire-body">
    <div class="form-container">
    <form id="paymentForm" method="post" action="process_order.php" novalidate="novalidate">		<!-- form to submit to server -->
        <div class="user__details">
          <div class="input__box">
            <!--First name:  type text , maximum of 25 characters, alphabetical only in html form-->
            <label  for="firstName" class="details">First Name</label>
        <input  type="text" id="firstName" name="firstName" value="<?php echo $_SESSION["fname"] ?>" maxlength="25" pattern="[A-Za-z]+" required> <!-- get first name by SESSION -->
          </div>
          <div class="input__box">
            <!--Last name:  type text , maximum of 25 characters, alphabetical only in html form-->
            <label for = "lastName"  class="details">Last Name</label>
    <input type="text" id="lastName" name="lastName" value="<?php echo $_SESSION["lname"] ?>" maxlength="25" pattern="[A-Za-z]+" required> <!-- get last name by SESSION -->
        </div>
          <div class="input__box">
            
          <label for="email" class="details" >Email address:</label>
            <input type="email" id="email" name="email"  value="<?php echo $_SESSION["email"] ?>" required> <!-- get email by SESSION -->
          </div>
          <div class="input__box">
            <!--Phone number maximum 10 digits-->
          <label  for="phoneNumber" class="details">Phone number:</label>
            <input id="phoneNumber" name="phone" type="text" maxlength="10" pattern="\d{1,10}" placeholder="e.g. 1234567890" required value="<?php echo $_SESSION["phone"] ?>"> <!-- get phone by SESSION -->
          </div>
     
    
        </div>
           
            
            <fieldset>
          <legend>
            Address
          </legend>
          <div class="box">
          <label  for="address" >Street Address:</label>
    
        <input type="text" id="address" name="address" value="<?php echo $_SESSION["address"] ?>" maxlength="40" required> <!-- get address by SESSION -->
          </div>
          <div class="box">
            
             <label for="suburb">Suburb/town:</label>
      <input type="text" id="suburb" name="suburb"  value="<?php echo $_SESSION["suburb"] ?>" maxlength="20" required> <!-- get suburb by SESSION -->
          </div>
          
          <div class="box">
            
            <label for="state">State:</label>
      <select id="state" name="state" required>
        			                    <!-- check which state was selected -->
                          <option value="VIC" <?php echo ($_SESSION["state"] == "VIC") ? "selected" : "" ?> >VIC</option>		
			                    <option value="NSW" <?php echo ($_SESSION["state"] == "NSW") ? "selected" : "" ?> >NSW</option>
			                    <option value="QLD" <?php echo ($_SESSION["state"] == "QLD") ? "selected" : "" ?> >QLD</option>
			                    <option value="NT"  <?php echo ($_SESSION["state"] == "NT") ? "selected" : "" ?>  >NT</option>
			                    <option value="WA"  <?php echo ($_SESSION["state"] == "WA") ? "selected" : "" ?>  >WA</option>
			                    <option value="SA"  <?php echo ($_SESSION["state"] == "SA") ? "selected" : "" ?>  >SA</option>
			                    <option value="TAS" <?php echo ($_SESSION["state"] == "TAS") ? "selected" : "" ?> >TAS</option>
			                    <option value="ACT" <?php echo ($_SESSION["state"] == "ACT") ? "selected" : "" ?> >ACT</option>
      </select>
          </div>
          
          <div class="box">
            <!--Postcode: exactly 4 digits -->
       <label for="postcode">Postcode:</label>
      <input type="text" id="postcode" name="postCode"  value="<?php echo $_SESSION["postCode"] ?>"  pattern="^\d{4}$" required> <!-- get post code by SESSION -->
          </div>
     
          
        </fieldset>
    
    
    
    
        
        
        <div class="form-group row">
          <p>Preferred contact          </p>
          <div class="category">
            <label class="only" for = "by_email"><input type="radio" class="input-radio" id="by_email" name="contact"  value="by_email" <?php echo ($_SESSION["contact"] == "by_email") ? "checked" : "" ?>  required="required" >Email</label > <!-- check if email method was selected -->
              <label class="only" for = "by_post"><input type="radio" class="input-radio" id="by_post" name="contact" value="by_post" <?php echo ($_SESSION["contact"] == "by_post") ? "checked" : "" ?>  required="required"  >    Post</label > <!-- check if post method was selected -->
                <label class="only" for= "by_phone" ><input type="radio" class="input-radio" id="by_phone" name="contact" value="by_phone" <?php echo ($_SESSION["contact"] == "by_phone") ? "checked" : "" ?>  required="required" >Phone</label > <!-- check if phone method was selected -->
                </div> 
              </div>
        
        <div class="form-group">
          <p>
            What is your favorite course?
          </p>
          <select id="most-like" name="mostLike" class="form-control" required>
            <option disabled selected value>Select an option</option>
            <option value="Big Mantis Shrimp" <?php echo ($_SESSION["mostLike"] == "menu1") ? "selected" : "" ?>>Big Mantis Shrimp</option> 
            <option value="Wild Ornate Spiny Lobster" <?php echo ($_SESSION["mostLike"] == "menu2") ? "selected" : "" ?>>Wild Ornate Spiny Lobster
    </option>
            <option value="Mud Crab/Mud Crab with Roes" <?php echo ($_SESSION["mostLike"] == "menu3") ? "selected" : "" ?>>Mud Crab/Mud Crab with Roes
    </option>
          </select>
            </div> 
            
            <div class="form-group">
          <p class = "heading">
            What sauce do you want for the food?
          </p>
          <?php
                        		//Split the value stored in $_SESSION["prefer"] into an array of strings
                        		function splitPrefer($string){
                        			return explode(",", $string);
                        		}
                        		$prefer = splitPrefer($_SESSION["prefer"]);
                        		$crabcakesauce = false;
                        		$cilantrosauce = false;
                        		$savoryseafoodsauce = false;
                            $honeygarlicsauce = false;
                        		for ($i = 0; $i < count($prefer); $i++){
                        			if ($prefer[$i] == "Crab cake sauce")
                                $crabcakesauce = true;
                        			if ($prefer[$i] == "Cilantro sauce")
                        				$cilantrosauce = true;
                        			if ($prefer[$i] == "Savory seafood sauce")
                                $savoryseafoodsauce = true;
                        			if ($prefer[$i] == "Honey garlic sauce")
                        				$honeygarlicsauce = true;
                            }
            ?>     
           
          <label class="only" for="pr1"
            ><input
              name="pr[]"
              value="crab_cake_sauce"
              id="pr1"
              <?php echo ($crabcakesauce) ? "checked" : "" ?>
              type="checkbox"
              class="input-checkbox"
            >Crab cake sauce</label
          >
          <label class="only" for="pr2">
            <input
              name="pr[]"
              value="cilantro_sauce"
              id = "pr2"
              <?php echo ($cilantrosauce) ? "checked" : "" ?>
              type="checkbox"
              class="input-checkbox"
            > Cilantro sauce</label
          >
          <label class="only" for="pr3"><input
              name="pr[]"
              value="savory_seafood_sauce"
              id = "pr3"
              <?php echo ($savoryseafoodsauce) ? "checked" : "" ?>
              type="checkbox"
              class="input-checkbox"
            >Savory seafood sauce</label
          >
          <label class="only" for="pr4"
            ><input
              name="pr[]"
              value="honey_garlic_sauce"
              id = "pr4"
              <?php echo ($honeygarlicsauce) ? "checked" : "" ?>
              type="checkbox"
              class="input-checkbox"
            >Honey garlic sauce</label
          >
          
        </div>
            
             <div class="form-group">
          <p> Any comments or suggestions?</p>
          <textarea
            id="comments"
            class="input-textarea"
            name="comment"
            placeholder="Enter your comment here..."
          ><?php echo $_SESSION["comment"] ?></textarea>
        </div>

        <fieldset>
          <legend>
          Purchase courses
          </legend>
          <label class="only"
            ><input
              name="isShrimp"
              value="true"
              <?php echo ($_SESSION["isShrimp"] == "true") ? "checked" : "" ?>
              type="checkbox"
              id = "shrimpCheckbox"
              class="input-checkbox"
            >Big Mantis Shrimp</label
          >
          <div class="box">
            
             <label for="shrimpQuantity">Quantity:</label>
      <input type="text" name="shrimpQuantity" id="shrimpQuantity" placeholder="Please enter quantity here" value="<?php echo $_SESSION["shrimpQuantity"] ?>">
          </div>
          
          <div class="box">
            
            <label for="shrimpSize">size:</label>
      <select id="shrimpSize" name="shrimpSize" required>
        <option value="S" <?php echo ($_SESSION["shrimpSize"] == "S") ? "selected" : "" ?>>S</option>
        <option value="M" <?php echo ($_SESSION["shrimpSize"] == "M") ? "selected" : "" ?>>M</option>
        <option value="L" <?php echo ($_SESSION["shrimpSize"] == "L") ? "selected" : "" ?>>L</option>
      </select>
          </div>
          
          <div class="box">
            <!--Postcode: exactly 4 digits -->
       <label for="shrimpPrice">Price:</label>
      <input type="text" id="shrimpPrice" name="shrimpPrice" value="245$ / each" readonly>
          </div>

          <label class="only"
            ><input
              name="isLobster"
              value="true"
              <?php echo ($_SESSION["isLobster"] == "true") ? "checked" : "" ?>
              type="checkbox"
              id = "lobsterCheckbox"
              class="input-checkbox"
            >Wild Ornate Spiny Lobster
        </label>
          <div class="box">
            
             <label for="lobsterQuantity">Quantity:</label>
      <input type="text" name="lobsterQuantity" id="lobsterQuantity" placeholder="Please enter quantity here" value="<?php echo $_SESSION["lobsterQuantity"] ?>" >
          </div>
          
          <div class="box">
            
            <label for="lobsterSize">size:</label>
      <select id="lobsterSize" name ="lobsterSize" required>
        <option value="S" <?php echo ($_SESSION["lobsterSize"] == "S") ? "selected" : "" ?>>S</option>
        <option value="M" <?php echo ($_SESSION["lobsterSize"] == "M") ? "selected" : "" ?>>M</option>
        <option value="L" <?php echo ($_SESSION["lobsterSize"] == "L") ? "selected" : "" ?>>L</option>
      </select>
          </div>
          
          <div class="box">
            <!--Postcode: exactly 4 digits -->
       <label for="lobsterPrice">Price:</label>
      <input type="text" id="shrimpPrice" name="lobsterPrice" value="120$ / each" readonly>
          </div>
        
          <label class="only"
            ><input
              name="isCrab"
              value="true"
              <?php echo ($_SESSION["isCrab"] == "true") ? "checked" : "" ?>
              type="checkbox"
              id = "crabCheckbox"
              class="input-checkbox"
            >Mud Crab/Mud Crab with Roes
        </label>
          <div class="box">
            
             <label for="crabQuantity">Quantity:</label>
      <input type="text" name="crabQuantity" id="crabQuantity" placeholder="Please enter quantity here" value="<?php echo $_SESSION["crabQuantity"] ?>" >
          </div>
          
          <div class="box">
            
            <label for="crabSize">size:</label>
      <select id="crabSize" name = "crabSize" required>
        <option value="S" <?php echo ($_SESSION["crabSize"] == "S") ? "selected" : "" ?>>S</option>
        <option value="M" <?php echo ($_SESSION["crabSize"] == "M") ? "selected" : "" ?>>M</option>
        <option value="L" <?php echo ($_SESSION["crabSize"] == "L") ? "selected" : "" ?>>L</option>
      </select>
          </div>
          
          <div class="box">
            <!--Postcode: exactly 4 digits -->
       <label for="crabPrice">Price:</label>
      <input type="text" id="crabPrice" name="crabPrice" value="125$ / each" readonly>
          </div>
        </fieldset>
        <fieldset>				<!-- Payment and card details -->
				<legend>Payment details</legend>
				<div class="box">															<!-- Card types -->
					<label for="cardType">Card Type:</label>
					<select name="cardType" id="cardType">
						<option value="none">Please select your card type</option>
						<option value="visa">Visa</option>			
						<option value="master">MasterCard</option>
						<option value="amex">American Express</option>
					</select>
                </div>		
				<div class="box">																<!-- Name on card -->
					<label for="cardName">Name on Card:</label> 
					<input type="text" name= "cardName" id="cardName" >
				</div>
				<div class="box"> 															<!-- Card number -->
					<label for="cardNumber">Card Number:</label> 
					<input type="text" name= "cardNumber" id="cardNumber"  >
                </div>
				<div class="box"> 															<!-- Expiry date -->
					<label for="cardExpiry">Card Expiry date:</label> 
					<input type="text" name= "cardExpiry" id="cardExpiry" placeholder="mm/yy" >
                </div>
				<div class="box"> 
					<label for="cardCVV">Card verification value:</label> 		<!-- Card CVV -->
					<input type="text" name= "cardCVV" id="cardCVV"  >
                </div>
			</fieldset>


      <div class="button">
          <input type="submit" value="Pay Now">   
            </div>


      </form>
    </div>

    
    </div>

    
  </section>

  <?php
    	include_once("includes/footer.inc");
  ?>
</body>
</html>