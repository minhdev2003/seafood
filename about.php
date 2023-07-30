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
		$page = "aboutPage";
		include_once("includes/header.inc");
		include_once("includes/nav.inc");
	?>
  <!--Product title-->
  <section class="product">
    <div class="product-title"> <h1 >About Us</h1></div>
    <div class="container">
      
      <!--Flex Card layout-->
      <div class="row">
        <div class="about-card">
          <div class="card-header">
            <img class="img-container about-img" src="images/ngocminh.jpg" alt="profile1">
          </div>
          <div class="card-body content">
            <h2>
              Ngoc Minh Ngo
            </h2>
            <div class="content">
              <p>Student ID: 103496945</p>
              </div>
              <div class="content">
                <p>Course: Bachelor of Computer Science</p>
              </div>
              <div class="content">
                <p> Email: 103496945@student.swin.edu.au</p>
              </div>
            <a href="mailto:103496945@student.swin.edu.au" class="btn">Contact Me</a>
          </div>
        </div>
        <div class="about-card">
          <div class="card-header">
            <img class="img-container about-img" src="images/phamduy.jpg" alt="profile1">
          </div>
          <div class="card-body content">
            <h2>
              Pham Duy Nguyen
            </h2>
            <div class="content">
            <p>Student ID: 104058375</p>
            </div>
            <div class="content">
              <p>Course: Bachelor of Computer Science</p>
            </div>
            <div class="content">
              <p> Email: 104058375@student.swin.edu.au</p>
            </div>
            <a href="mailto:104058375@student.swin.edu.au" class="btn">Contact Me</a>
          </div>
        </div>
        <div class="about-card">
          <div class="card-header">
            <img class="img-container about-img"  src="images/phanbach.jpg" alt="profile1">
          </div>
          <div class="card-body content">
            <h2>
              Thanh Bach Phan
            </h2>
            <div class="content">
              <p>Student ID: 103806557</p> 
            </div>
            <div class="content">
            <p>Course: Bachelor of Computer Science</p> 
          </div>
            <div class="content">
            <p>Email: 103806557@student.swin.edu.au</p>
          </div>
            <a href="mailto:103806557@student.swin.edu.au" class="btn">Contact Me</a>
          </div>
        </div>
        <div class="about-card">
          <div class="card-header">
            <img class="img-container about-img" src="images/ducanh.jpg" alt="profile1">
          </div>
          <div class="card-body ">
            <h2>
              Duc Anh Nguyen
            </h2>
            <div class="content">
              <p>Student ID: 104183510</p>
            </div>
            <div class="content">
              <p>Course: Bachelor of Computer Science</p>
            </div>
            <div class="content">
              <p>
                Email: 104183510@student.swin.edu.au
              </p>
            </div>
            <a href="mailto:104183510@student.swin.edu.au" class="btn">Contact Me</a>
          </div>
        </div>
      </div>
    </div>
    <!--Table section-->
    <div class="table-content">  
      <h1>Academic Timetable    </h1>                                               
      <table>
        <tr id="header">
          <th>Time</th>
          <th>Tuesday</th>
          <th>Thursday</th>
          <th>Saturday</th>
        </tr>
        <tr>
          <td>8h-10h</td>
          <td>INF10003 - Lecture Class</td>
          <td>COS20001 - Lecture Class</td>
          <td>COS10005 - Lecture Class</td>
        </tr>
        <tr>
          <td>10-12h</td>
          <td>INF10003 - Tutorial Class</td>
          <td>COS20001 - Tutorial Class</td>
          <td>COS10005 - Tutorial Class</td>
        </tr>
      </table>
    </div>
  </section>
  
  <!--Footer Section-->
    <?php
        include_once("includes/footer.inc");
    ?>
</body>
</html>