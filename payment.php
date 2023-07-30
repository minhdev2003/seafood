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
  <!--Header section-->
  <?php
		$page = "paymentPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
  ?>
    <!--Title and subtitle-->
  <section class="product">
    <div class="product-title"> <h1 >Payment Details</h1>  <!-- main content starts here -->
    </div>
    <div class="enquire-body">
    <div class="form-container">
    <form id="paymentForm" method="post" action="process_order.php" novalidate="novalidate">		<!-- form to submit to server -->
        <div class="user__details">
          <div class="input__box">
            <!--First name:  type text , maximum of 25 characters, alphabetical only in html form-->
            <label  for="firstName" class="details">First Name</label>
        <input  type="text" id="firstName" name="firstName" maxlength="25" pattern="[A-Za-z]+" required>
          </div>
          <div class="input__box">
            <!--Last name:  type text , maximum of 25 characters, alphabetical only in html form-->
            <label for = "lastName"  class="details">Last Name</label>
    <input type="text" id="lastName" name="lastName" maxlength="25" pattern="[A-Za-z]+" required>
        </div>
          <div class="input__box">
            
          <label for="email" class="details" >Email address:</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="input__box">
            <!--Phone number maximum 10 digits-->
          <label  for="phoneNumber" class="details">Phone number:</label>
            <input id="phoneNumber" name="phone" type="text" maxlength="10" pattern="\d{1,10}" placeholder="e.g. 1234567890" required>
          </div>
     
    
        </div>
           
            
            <fieldset>
          <legend>
            Address
          </legend>
          <div class="box">
          <label  for="address" >Street Address:</label>
    
        <input type="text" id="address" name="address" maxlength="40" required>
          </div>
          <div class="box">
            
             <label for="suburb">Suburb/town:</label>
      <input type="text" id="suburb" name="suburb" maxlength="20" required>
          </div>
          
          <div class="box">
            
            <label for="state">State:</label>
      <select id="state" name="state" required>
        <option value="VIC">VIC</option>
        <option value="NSW">NSW</option>
        <option value="QLD">QLD</option>
        <option value="NT">NT</option>
        <option value="WA">WA</option>
        <option value="SA">SA</option>
        <option value="TAS">TAS</option>
        <option value="ACT">ACT</option>
      </select>
          </div>
          
          <div class="box">
            <!--Postcode: exactly 4 digits -->
       <label for="postcode">Postcode:</label>
      <input type="text" id="postcode" name="postCode"  pattern="^\d{4}$" required>
          </div>
     
          
        </fieldset>
    
    
    
    
        
        
        <div class="form-group row">
          <p>Preferred contact</p>
          <div class="category">
            <label class="only" for = "by_email"><input type="radio" class="input-radio" id="by_email" name="contact"  value="by_email"  required="required" >Email</label >
              <label class="only" for = "by_post"><input type="radio" class="input-radio" id="by_post" name="contact" value="by_post"  required="required" >Post</label >
                <label class="only" for= "by_phone" ><input type="radio" class="input-radio" id="by_phone" name="contact" value="by_phone"  required="required" >Phone</label > 
                </div> 
              </div>
        
        <div class="form-group">
          <p>
            What is your favorite course?
          </p>
          <select id="most-like" name="mostLike" class="form-control" required>
            <option disabled selected value>Select an option</option>
            <option value="Big Mantis Shrimp">Big Mantis Shrimp</option>
            <option value="Wild Ornate Spiny Lobster">Wild Ornate Spiny Lobster
    </option>
            <option value="Mud Crab/Mud Crab with Roes">Mud Crab/Mud Crab with Roes
    </option>
          </select>
            </div> 
            
            <div class="form-group">
          <p class = "heading">
            What sauce do you want for the food?
          </p>
         
           
          <label class="only" for="pr1"
            ><input
              name="pr[]"
              value="crab_cake_sauce"
              id="pr1"
              type="checkbox"
              class="input-checkbox"
            >Crab cake sauce</label
          >
          <label class="only" for="pr2">
            <input
              name="pr[]"
              id="pr2"
              value="cilantro_sauce"
              type="checkbox"
              class="input-checkbox"
            >Cilantro sauce</label
          >
          <label class="only" for="pr3"><input
              name="pr[]"
              id="pr3"
              value="savory_seafood_sauce"
              type="checkbox"
              class="input-checkbox"
            >Savory seafood sauce</label
          >
          <label class="only" for="pr4"
            ><input
              name="pr[]"
              id="pr4"
              value="honey_garlic_sauce"
              type="checkbox"
              class="input-checkbox"
            >Honey garlic sauce</label
          >
        </div>
            
        <div class="form-group">
          <p>Any comments or suggestions?</p>
          <textarea
            id="comments"
            class="input-textarea"
            name="comment"
            placeholder="Enter your comment here..."
          ></textarea>
        </div>

        <fieldset>
          <legend>
          Purchase courses
          </legend>
          <label class="only">          
            <input
              name="isShrimp"
              value="true"
              type="checkbox"
              id = "shrimpCheckbox"
              class="input-checkbox "
            >Big Mantis Shrimp</label>
          <div class="box">
            
             <label for="shrimpQuantity">Quantity:</label>
      <input type="text" name="shrimpQuantity" id="shrimpQuantity" placeholder="Please enter quantity here" >
          </div>
          
          <div class="box">
            
            <label for="shrimpSize">size:</label>
      <select id="shrimpSize" name="shrimpSize" required>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
      </select>
          </div>
          
          <div class="box">
            <!--Postcode: exactly 4 digits -->
       <label for="shrimpPrice">Price:</label>
      <input type="text" id="shrimpPrice" name="shrimpPrice" value="245$ / each" readonly>
          </div>


          <label class="only">          
            <input
              name="isLobster"
              value="true"
              type="checkbox"
              id = "lobsterCheckbox"
              class="input-checkbox "
            >Wild Ornate Spiny Lobster
        </label>
          <div class="box">
            
             <label for="lobsterQuantity">Quantity:</label>
      <input type="text" name="lobsterQuantity" id="lobsterQuantity" placeholder="Please enter quantity here" >
          </div>
          
          <div class="box">
            
            <label for="lobsterSize">size:</label>
      <select id="lobsterSize" name ="lobsterSize" required>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
      </select>
          </div>
          
          <div class="box">
        <label for="lobsterPrice">Price:</label>
      <input type="text" id="shrimpPrice" name="lobsterPrice" value="120$ / each" readonly>
          </div>
          <label class="only">
          <input
              name="isCrab"
              value="true"
              type="checkbox"
              id = "crabCheckbox"
              class="input-checkbox "
            >Mud Crab/Mud Crab with Roes
        </label>
          <div class="box">
            
             <label for="crabQuantity">Quantity:</label>
      <input type="text" name="crabQuantity" id="crabQuantity" placeholder="Please enter quantity here" >
          </div>
          
          <div class="box">
            
            <label for="crabSize">size:</label>
      <select id="crabSize" name="crabSize" required>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
      </select>
          </div>
          
          <div class="box">
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
          <input type="submit" value="Check Out">   
            </div>


      </form>
    </div>

    
    </div>

    
  </section>
<!--Footer Section-->
<?php
    include_once("includes/footer.inc");
?>   
</body>
</html>