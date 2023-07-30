<!--Header Section-->    
    <header>
        <nav>
            <input type="checkbox" id="check">
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <a href="index.php"><img class="logo" src="images/logo.png" alt="logo" ></a>
            <ul> 
                <li><a href="index.php" <?php echo ($page == "indexPage") ? "class='active'" : ""; ?>                >Home</a></li>
                <li><a href="product.php" <?php echo ($page == "productPage") ? "class='active'" : ""; ?>            >Menu</a></li>
                <li><a href="about.php" <?php echo ($page == "aboutPage") ? "class='active'" : ""; ?>                >About Us</a></li>
                <li><a href="payment.php" <?php echo ($page == "paymentPage") ? "class='active'" : ""; ?>            >Payment</a></li>
                <li><a href="enhancements.php" <?php echo ($page == "enhancementsPage") ? "class='active'" : ""; ?>  >Enhancements</a></li>
	            <li><a href="manager.php"		<?php echo ($page == "managerPage") ? "class='active'" : ""; ?> 	 >Manager</a></li>

            </ul>
        </nav>
    </header>