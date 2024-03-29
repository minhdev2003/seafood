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
  <!--Header Section-->
  <?php
		$page = "productPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
  ?>
  <!--Product Section-->
  <section class = "product">
    <div class="product-title"> <h1 >MENU</h1>
      <h2> check our tasty menu</h2> 
    </div>
    <div class="container">
      <!--Responsive card layout Section--> 
      <div class="row">
        <div class="card">
          <div class="card-header">
            <img class="img-container" height="223" width="411" src="images/mantis.jpg" alt="menu3">
            <h2>Big Mantis Shrimp</h2>
          </div>
          <div class="card-body">
            <p>
              Roasted with Tamarind sauce / Steamed with Lemongrass and Chilli / Steamed with Lemongrass and Chilli / Fried with Butter and Garlic
            </p>
            <!-- Checkbox has a certain id and name that can be triggered by labels -->          
            <input type="checkbox" class="modal-control" id="modal-1" name="modal-1" >
            <!-- Button to open modal, can be replaced with other elements -->
            <label  for="modal-1"><a class="btn">Order Now</a></label>
            <!-- Dark background for modal -->
            <label for="modal-1" class="modal-background "></label>
            <!-- Main modal -->
            <div class="modal">
              <div class="modal-header">
                <h2>Order Details</h2>
                <label for="modal-1" class="cursor-pointer squishy only"> X </label>
              </div>
              <!-- Form inside modal -->          
              <form class="order-form"> 
                <div class="form-group"> 
                  <p>How many of you are dining?</p> 
                  <select id="dropdown" name="role" class="form-control" required> 
                    <option disabled selected value>Select group size</option> 
                    <option value="individual">Individual (one person)</option> 
                    <option value="couple">Couple</option>
                    <option value="smallgroup">Small Group (3-4 people)</option>
                    <option value="largegroup">Large Group (more than 4 people)</option> 
                    <option value="prefernot">Prefer Not to say</option> 
                  </select> 
                </div> 
                <div class="form-group ">
                  <p>How would you like to take your order?</p>
                  <!--style input radio for responsive layout -->          
                  <div class="category">
                    <label class="only"> <input name="user-recommend" value="definitely" type="radio" class="input-radio" checked >Dine-in</label >
                      <label class="only"> <input name="user-recommend" value="maybe" type="radio" class="input-radio" >Take-away</label >
                        <label class="only" ><input name="user-recommend" value="not-sure" type="radio" class="input-radio" >Delivery</label > 
                        </div>
                      </div>
                      <div class="form-group"> 
                        <p> Please choose the size: </p> 
                        <select id="most-like" name="mostLike" class="form-control" required>
                          <option disabled selected value>Select an option</option>
                          <option value="food">S</option>
                          <option value="service">M</option>
                          <option value="prices">L</option> </select> 
                        </div> 
                        <div class="form-group"> 
                          <p> What would you like to drink? </p>
                          <div class="only-container">
                            <label class="only" ><input name="prefer" value="Food" type="checkbox" class="input-checkbox" >Soda</label >
                              <label class="only"> <input name="prefer" value="Ambience" type="checkbox" class="input-checkbox" >Beer</label >
                                <label class="only" ><input name="prefer" value="Service Time" type="checkbox" class="input-checkbox" >Wine</label >
                                  <label class="only" ><input name="prefer" value="Service Staff Quality" type="checkbox" class="input-checkbox" >Water</label >
                                  </div>        
                                </div> 
                                <div class="form-group">
                                  <button type="submit" id="submit" class="submit-button"> Submit </button>
                                </div>
                              </form>
                            </div>             
                          </div>
                        </div>
                        
                        <!-- The following code also applied the same with the above code -->          
                        <div class="card">
                          <div class="card-header">
                            <img class="img-container" height="223" width="411" src="images/lobster.jpg" alt="menu2">
                            <h2>Wild Ornate Spiny Lobster</h2>
                          </div>
                          <div class="card-body">
                            <p>
                              Blood Pudding / Baked with Cheese / Roasted with Salt / Tamarind sauce / Sashimi / Grilled on Charcoal
                            </p>
                            <input type="checkbox" class="modal-control" id="modal-2" name="modal-1" >
                            <label  for="modal-1"><a class="btn">Order Now</a></label>
                            <label for="modal-1" class="modal-background "></label>
                            <div class="modal">
                              <div class="modal-header">
                                <h2>Order Details</h2>
                                <label for="modal-1" class="cursor-pointer squishy only"> X </label>
                              </div>
                              <form class="order-form"> 
                                <div class="form-group"> 
                                  <p>How many of you are dining?</p> 
                                  <select id="dropdown-2" name="role" class="form-control" required> 
                                    <option disabled selected value>Select group size</option> 
                                    <option value="individual">Individual (one person)</option> 
                                    <option value="couple">Couple</option>
                                    <option value="smallgroup">Small Group (3-4 people)</option>
                                    <option value="largegroup">Large Group (more than 4 people)</option> 
                                    <option value="prefernot">Prefer Not to say</option> 
                                  </select> 
                                </div> 
                                <div class="form-group ">
                                  <p>How would you like to take your order?</p>
                                  <div class="category">
                                    <label class="only"> <input name="user-recommend" value="definitely" type="radio" class="input-radio" checked >Dine-in</label >
                                      <label class="only"> <input name="user-recommend" value="maybe" type="radio" class="input-radio" >Take-away</label >
                                        <label class="only" ><input name="user-recommend" value="not-sure" type="radio" class="input-radio" >Delivery</label > 
                                        </div> 
                                      </div>
                                      <div class="form-group"> 
                                        <p> Please choose the size: </p> 
                                        <select id="most-like2" name="mostLike" class="form-control" required>
                                          <option disabled selected value>Select an option</option>
                                          <option value="food">S</option>
                                          <option value="service">M</option>
                                          <option value="prices">L</option> </select> 
                                        </div> 
                                        <div class="form-group"> 
                                          <p> What would you like to drink? </p>
                                          <div class="only-container">
                                            <label class="only" ><input name="prefer" value="Food" type="checkbox" class="input-checkbox" >Soda</label >
                                              <label class="only"> <input name="prefer" value="Ambience" type="checkbox" class="input-checkbox" >Beer</label >
                                                <label class="only" ><input name="prefer" value="Service Time" type="checkbox" class="input-checkbox" >Wine</label >
                                                  <label class="only" ><input name="prefer" value="Service Staff Quality" type="checkbox" class="input-checkbox" >Water</label >
                                                  </div>                                                  
                                                </div> 
                                                <div class="form-group">
                                                  <button type="submit" id="submit2" class="submit-button"> Submit </button>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="card">
                                          <div class="card-header">
                                            <img class="img-container" height="223" width="411" src="images/crab.jpg" alt="menu3">
                                            <h2>Mud Crab/Mud Crab with Roes</h2>
                                          </div>
                                          
                                          <div class="card-body">
                                            <p>
                                              Steamed / Roasted with Salt / Roasted with Tamarind sauce
                                            </p>
                                            <input type="checkbox" class="modal-control" id="modal-3" name="modal-1" >
                                            <label  for="modal-1"><a class="btn">Order Now</a></label>
                                            <label for="modal-1" class="modal-background only"></label>
                                            <div class="modal">
                                              <div class="modal-header">
                                                <h2>Order Details</h2>
                                                <label for="modal-1" class="cursor-pointer squishy "> X </label>
                                              </div>
                                              <form class="order-form"> 
                                                <div class="form-group"> 
                                                  <p>How many of you are dining?</p> 
                                                  <select id="dropdown-3" name="role" class="form-control" required> 
                                                    <option disabled selected value>Select group size</option> 
                                                    <option value="individual">Individual (one person)</option> 
                                                    <option value="couple">Couple</option>
                                                    <option value="smallgroup">Small Group (3-4 people)</option>
                                                    <option value="largegroup">Large Group (more than 4 people)</option> 
                                                    <option value="prefernot">Prefer Not to say</option> 
                                                  </select> 
                                                </div> 
                                                <div class="form-group ">
                                                  <p>How would you like to take your order?</p>
                                                  <div class="category">
                                                    <label class="only"> <input name="user-recommend" value="definitely" type="radio" class="input-radio" checked >Dine-in</label >
                                                      <label class="only"> <input name="user-recommend" value="maybe" type="radio" class="input-radio" >Take-away</label >
                                                        <label class="only" ><input name="user-recommend" value="not-sure" type="radio" class="input-radio" >Delivery</label > 
                                                        </div> 
                                                      </div>
                                                      <div class="form-group"> 
                                                        <p> Please choose the size: </p> 
                                                        <select id="most-like3" name="mostLike" class="form-control" required>
                                                          <option disabled selected value>Select an option</option>
                                                          <option value="food">S</option>
                                                          <option value="service">M</option>
                                                          <option value="prices">L</option> </select> 
                                                        </div> 
                                                        <div class="form-group"> 
                                                          <p> What would you like to drink? </p>
                                                          <div class="only-container">
                                                            <label class="only" ><input name="prefer" value="Food" type="checkbox" class="input-checkbox" >Soda</label >
                                                              <label class="only"> <input name="prefer" value="Ambience" type="checkbox" class="input-checkbox" >Beer</label >
                                                                <label class="only" ><input name="prefer" value="Service Time" type="checkbox" class="input-checkbox" >Wine</label >
                                                                  <label class="only" ><input name="prefer" value="Service Staff Quality" type="checkbox" class="input-checkbox" >Water</label >
                                                                  </div>   
                                                                </div> 
                                                                <div class="form-group">
                                                                  <button type="submit" id="submit3" class="submit-button"> Submit </button>
                                                                </div>
                                                              </form>
                                                            </div>             
                                                          </div>
                                                        </div>   
                                                      </div> 
                                                    </div>
                                                    
                                                    <!--Table section-->
                                                    
                                                    <div class="table-content">  
                                                      <h1>calories in food    </h1>                                               
                                                      <table>
                                                        <tr id="header">
                                                          <th>Food	</th>
                                                          <th>Serving size (gam)</th>
                                                          <th>Calories</th>  
                                                        </tr>
                                                        <tr>
                                                          <td>Big Mantis Shrimp	 </td>
                                                          <td>150 </td>
                                                          <td>180 </td>    
                                                        </tr>
                                                        <tr>
                                                          <td>Mud Crab/Mud Crab with Roes		 </td>
                                                          <td>236 </td>
                                                          <td>196 </td>
                                                        </tr>
                                                        <tr>
                                                          <td>Wild Ornate Spiny Lobster		 </td>
                                                          <td>170 </td>
                                                          <td>244 </td>
                                                        </tr>
                                                      </table>
                                                    </div>
                                                  </section>
                                                  <section id="second">
                                                    <div class="box-container">
                                                      <div class="column-1 box">
                                                        <h1>why choose our Restaurant</h1>
                                                        
                                                        <div class="list">        
                                                          <ol>
                                                            <li>The atmosphere
                                                              <ul>
                                                                <li>All restaurants are designed with a consistent theme “Bring in the sea”. Customers will experience a unique and refreshing atmosphere with green architecture that will make them feel as though they are on actual beaches.</li>
                                                              </ul>
                                                            </li>
                                                            <li>Wide range of quality food
                                                              <ul>
                                                                <li>We provide more than 100 distinct varieties of quality fresh seafood, delivered from various parts of the nation. All fish are kept in glass tanks and are regularly inspected by our professionals</li>
                                                                <li>Together with delectable and carefully prepared food, a varied menu will satisfy you without a doubt</li>
                                                              </ul>
                                                            </li>
                                                            <li>The Chefs
                                                              <ul>
                                                                <li>The chefs at Keithston Seafood Restaurant view each meal as a work of art. They are enthusiastic about each dish and imaginative in every way. With more than 20 years of expertise, they are familiar with their clients, the resources they employ, and the finest practices for producing first-rate food </li>
                                                                <li>Not only are our chefs skilled at casting "magic spells" with seafood, but they also have a crucial duty to preserve and advance Vietnamese cuisine. Each of our dishes is prepared with care, starting with the choice of ingredients, processing, presentation, and serving style, and occasionally even the cultural background of the dish. Combining all of the things will result in an ideal and exquisite dining experience </li>
                                                              </ul>
                                                            </ol>
                                                          </div>
                                                        </div>
                                                        
                                                        <aside class="column-2 box">
                                                          
                                                          <h1>hello</h1>
                                                          <div class="box-image"><img height="440" width="839" src="images/restaurant.jpg" alt="logo"></div>
                                                          <h2>Your are warmly welcome!</h2>
                                                        </aside>
                                                      </div>
                                                    </section>
                                                    <!--Footer Section-->                                                  
                                                    <?php
                                                        include_once("includes/footer.inc");
                                                    ?>                         
                                                  </body>
                                                  </html>