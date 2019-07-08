 <?php
  require_once("./layout/landing/header.php") ?>
 <head>
<style>

.x{
   background: #f3f4f7;
   padding-top: 70px;
   min-height: 70vh;
}
  .site-blog{
    padding-top: 100px;
    background: #caccd1;
    margin-top: -17px;
  }
  .blog-image {
   
    height: 300px;
    text-align: center;
}
.image{
  width: 80%;
  height: 100%;
}
.blog-title {
  font-size: 20px;
  text-align: center;
  margin-bottom: 13px;
  color: #000;
  font-weight: bolder;
}
.blog-details {
color: #718093;;
}
.text-center{
	text-align: center;
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

      <div class="container">
        <div class="row align-items-center position-relative">
          <div class="toggle-button d-inline-block d-lg-none"><a href="#"
              class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>

    </header>


    <div class="site-blog">

      <div class="container x">
       <!-- //////////////////////////////////////////////////////// -->
       <div class="row">
        <?php 
        require_once("dbconfig/dbconnect.php");
       require_once("inc/global_functions.php");
        $query="SELECT * FROM posts where status=1 order by post_id desc";
        $results=$db->get_results($query);
        
         ?>
         <?php if ($db->num_rows==0): ?>
          <div class="text-center"><h3>No posts</h3></div>
            <?php else: ?>
    <?php foreach ($results as $result):
       $file_name="./POSTS/default.jpg";
        ImagePath($result->post_id, 1);
     ?>
        <div class="col-12 col-md-6 col-lg-6">
          <div class="blog-image"><img class="image img-thumbnail img-fluid" src="<?php echo $file_name ?>" alt="blog image"></div>
          <div class="blog-title"><?php echo $result->title; ?></div>
          <div class="blog-details"><?php echo  substr($result->details, 0, 215)."....." ?>
          <a href="post-details.php?token=<?php echo urlencode(convert_uuencode($result->post_id)) ?>">Read more</a> </div>
        </div>
    <?php endforeach ?>
         <?php endif ?>

        </div>
       <!-- ////////////////////////////////////////////////////////////// -->
      </div>
      <!-- <div class="img-absolute">
        <img src="images/person-transparent-2.png" alt="Image" class="img-fluid">
      </div> -->
    </div>



  </div>

 <?php require_once("./layout/landing/footer.php") ?>