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
		$page = "indexPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
	?>
<!--Home Section-->      
    <div id = "home">
        <div class="text-intro">
            <span class="subheading">Welcome</span>
            <h1 class="intro">We offer gifts from the sea</h1>
            <div class="description">
                <p >The seafood Restaurant has been voted by locals as "Best in the area" year after year. We adore Vietnamese food, and Seafood Restaurant works hard to spread awareness of it and bring it to people around the world</p>
                <a target="_blank" href="https://www.youtube.com/watch?v=iw9_QFhybCw">Click here to jump to our video</a>
            </div>
            <div class="one">
                <a href="about.html">about us</a>
                <a href="product.html">our menu</a>
              </div>
          </div>

    
        </div>
<!--Footer Section-->
    <?php
		include_once("includes/footer.inc");
	?>
</body>
</html>



