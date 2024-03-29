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
		$page = "enhancementsPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
  ?>
<section class="product">
        <div class="product-title"> <h1>Enhancements</h1>
            <h2>Features that we used in our website</h2> 
        </div>
 
            <div class="features-content">
                    <ol>
                        <li>Modal box: When clicking on the "Order Now" button in the "Menu" page, it will show the modal box for the more detail ordering. <a href="product.html"><span >Click here to see the implement</span></a></li>
                        <li>Highlighted menu items: The menu items will be highlighed when clicking on each page.  <a href="about.html"><span >Click here to see the implement</span></a></li>
                        <li>Responsive layout on all pages </li>
                        <li>In  webpage Menu, the "aside" tag instead of using float: right we use the flex-shrink property in the content section, therefore it shrinks to 0 to apply 75% width. Besides,
                        the flex-basis property is also used to sets initial width to 75%, so aside tag will be 25% .All in all, this is beneficial for responsive layout.</li>

                    </ol>
            </div>
        <div class = "product-title">
            <h2>Advanced manager reports</h2>  
        </div>    
          <div class="features-content">
          <ol>
            <li><strong>1. Displaying best selling product:</strong> using strpos function to find each individual course in order purchases,then incrementing the corresponding course counter variable. In the end, two temporary variables were used for storing the values for name of the best selling course, together with how many times that course was sold.</li>
            <li><strong>2.Display the customer has the highest bill:</strong> combining the in_array() and array_search() methods, which let the user modify the list of customers and link that list to a list of each customer's expenditures, displays the client with the highest bill. Last but not least, a for loop was activated to identify the consumer with the highest bill using 2 arrays.</li>
            <li><strong>3.Calculate the average profit per transaction:</strong> fetch each record into an associative array, retrieve the order cost, then increase the number of orders to determine the average profit per transaction.Total order cost divided by the number of orders was used to compute average profit per transaction.</li>
            <li><strong>4.Showing the number of orders corresponding to status:</strong> fetch each record into an associative array.Then, after incrementing the appropriate order status and displaying it, fetch each entry into an associative array.</li>
            <li>Click here to view enhancement at the bottom of <a href="manager.php">manager page</a>.</li>
          </ol>
        </div>

        <div class = "product-title">
            <h2>Sort orders by selected field:</h2>  
        </div>    
          <div class="features-content">
          <ol>
            <li>Give users the option to sort tables by a chosen field. If the field is once more chosen, you can choose between ascending and descending order. This is accomplished using a flag that is stored in the session and can change the order across sessions from ascending to descending. In order to combine several sorting needs without committing a syntactic error, the sort query is carefully adjusted.</li>
            <li>Click here to view enhancement in <a href="manager.php">manager page</a>.</li>
          </ol>
        </div>        

</section>
<!--Footer Section-->
<?php
    include_once("includes/footer.inc");
?>   
</body>
</html>