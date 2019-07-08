<?php require_once("layout/landing/header.php") ?>
<style>
  body{
    background: #f3f4f7;
   padding-top: 70px;
  }
	.blog{
  position: relative;
  min-height: 60vh;
	}
	.blog>.blog__image{

	width: 100%;
    height: 80vh;
	}
	.blog>.blog__heading{
	color: #fff;
    position: absolute;
    left: 50%;
    top: 50%;
    text-align: center;
   font-family: montserrat;
    background: rgba(14, 14, 14, 0.5);
    border-radius: 10px;
    padding: 20px 10px;
    font-weight: bolder;
    font-size: 30px;
    display: block;
    transform: translate(-50%, -50%);
    min-width: 70%;
	}
  .card{
background: #9dd3a8;
  }
	 @media (max-width: 768px) {
	 	.blog>.blog__image{

	width: 100%;
    height: 300px;
      }
    .container, .card{
padding: 0px;
margin: 0px;


	}
body{
	padding: 0;
	margin: 0;
}
.blog>.blog__heading{
	font-size: 18px;
	 top: 40%;
}


</style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">


    </header>


    <div class="site-blog">

      <div class="container">
       <!-- //////////////////////////////////////////////////////// -->
<?php 
require_once("./inc/global_functions.php");
require_once("./dbconfig/dbconnect.php");
$post_id = convert_uudecode($_REQUEST['token']);
$file_name="./POSTS/default.jpg";
 ImagePath($post_id,4);
$query="SELECT * FROM posts WHERE post_id='$post_id' AND status=1";
$results=$db->get_row($query);
?>
  
    <div class="row">
     <!--  <div class="col-sm-0 col-md-0 col-lg-2"></div> -->
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
         <!--  <div class="card-header">Lorem ipsum dolor sit amet.</div> -->
          <div class="card-body">
          	<?php if ($db->num_rows>0):

          		$count=($results->views + 1);
          		$views_update_query="UPDATE posts set views='$count' WHERE post_id='$results->post_id'";
          		$db->query($views_update_query);
          	 ?>
          		<div class="blog">
          			<h2 class="blog__heading"><?php echo $results->title; ?></h2>
          			<img class="blog__image" src="<?php echo $file_name;  ?>" alt="">
          			
          		</div>
          		<div class="blog__content text-dark text-left">
          				<p class="lead"><?php echo $results->details; ?></p>
          			</div>
          	<?php else: ?>
				<h2 >This post is no longer available</h2>
          	<?php endif ?>
        </div>
      </div>
    </div>
</div>
       <!-- ////////////////////////////////////////////////////////////// -->
      </div>
      <!-- <div class="img-absolute">
        <img src="images/person-transparent-2.png" alt="Image" class="img-fluid">
      </div> -->
    </div>



  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>

</html>