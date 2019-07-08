<?php
ob_start();
require_once "../inc/sessios.php";
session_student();
ob_flush();
?>
<div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu" style="position: absolute;">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a href="./createpost.php">Post Homework</a>
                                <li><a href="./my-homework.php">My Homework</a></li>
                                <li><a href="./in-progress.php">In Progress</a></li>
                                <li><a href="./delivered.php">Delivered</a></li>
                                <li><a href="editing.php">Under Editting</a></li>
                                <li><a href="./completed.php">Closed</a></li>
                                <li><a href="./messages.php">Messages</a></li>
                                <li><a href="../logout.php">Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area mg-tb-40">
        <div class="">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li <?php if ($page=="create") { ?>
                           class="active"
                        <?php } ?>><a href="../student/createpost.php"><i class="fas fa-upload icon-r" aria-hidden="true"></i> Post Homework</a>
                        </li>
                        <li <?php if ($page=="my-homework") { ?>
                           class="active"
                        <?php } ?>><a href="./my-homework.php"><i class="fas fa-list icon-r" aria-hidden="true"></i>Homework <span class="badge badge-notika ml-3" id="available">0</span></a>
                        </li>
                        <li <?php if ($page=="progress") { ?>
                           class="active"
                        <?php } ?>><a href="./in-progress.php"><i class="fas fa-sync-alt icon-r" aria-hidden="true"></i>Progress <span class="badge badge-notika ml-3" id="in_progress">0</span></a>
                        </li>
                        <li <?php if ($page=="delivered") { ?>
                           class="active"
                        <?php } ?>><a href="./delivered.php"><i class="fas fa-check icon-r" aria-hidden="true"></i> Delivered <span class="badge badge-notika ml-3" id="delivered">0</span></a>
                        </li>
                        <li <?php if ($page=="revision") { ?>
                           class="active"
                        <?php } ?>><a href="editing.php"><i class="fas fa-redo-alt icon-r" aria-hidden="true"></i>Editting<span class="badge badge-notika ml-3" id="on_revision">0</span></a>
                        </li>
                        <li <?php if ($page=="completed") { ?>
                           class="active"
                        <?php } ?>><a href="./completed.php"><i class="far fa-thumbs-up icon-r" aria-hidden="true"></i> Closed <span class="badge badge-notika ml-3" id="closed">0</span></a>
                        </li>
                         <li <?php if ($page=="messages") { ?>
                           class="active"
                        <?php } ?>><a href="./messages.php"><i class="far fa-envelope-open icon-r" aria-hidden="true"></i> Messages <span class="badge badge-notika ml-3" id="messages">0</span></a>
                        </li>
                         <li><a href="../logout.php"><i class="fas fa-sign-out-alt icon-r" aria-hidden="true"></i> Logout</a>
                        </li>
                    </ul>
                    <div class="tab-content custom-menu-content">
                        <div id="Home"  <?php if ($page=="create") { ?>
                           class=" in active"
                        <?php } ?> class="tab-pane   notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown text-center">
                                <li><a href="#">Post Assignment</a>
                                </li>
                            </ul>
                        </div>
                        <div id="mailbox"  <?php if ($page=="my-homework") { ?>
                           class=" in active"
                        <?php } ?> class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul   class="notika-main-menu-dropdown text-center">
                                <li><a href="#">My Homework</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Interface" <?php if ($page=="progress") { ?>
                           class="in active"
                        <?php } ?> class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul   class="notika-main-menu-dropdown text-center">
                                <li><a href="#">In Progress</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Charts"  <?php if ($page=="delivered") { ?>
                           class="in active"
                        <?php } ?> class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul  class="notika-main-menu-dropdown text-center">
                                <li><a href="#">Delivered</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Tables" <?php if ($page=="revision") { ?>
                           class="in active"
                        <?php } ?> class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul  class="notika-main-menu-dropdown text-center">
                                <li><a href="#">Under Editting</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Forms" <?php if ($page=="completed") { ?>
                           class="in active"
                        <?php } ?> class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul  class="notika-main-menu-dropdown text-center">
                                <li><a href="#">Closed</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Appviews"  <?php if ($page=="messages") { ?>
                           class="in active"
                        <?php } ?> class="tab-pane  notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown text-center">
                                <li><a href="#">messages</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         <?php #require_once("../inc/footer_links.php") ?>
         <!-- Left navigation bar -->
         <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
         <script>

          $(function(){
             let user_id= "<?php echo $_SESSION['user_id']; ?>";
             let user_type="<?php echo $_SESSION['user_type']; ?>";

             $("#messages").load("../inc/counters.php", {
              target: "messages",
              user_id: user_id,
              user_type: user_type

            });
             $("#available").load("../inc/counters.php",{
              target: "available",
              user_id: user_id,
              user_type: user_type
            });
             $("#delivered").load("../inc/counters.php", {
              target: "delivered",
              user_id: user_id,
              user_type: user_type

            });

             $("#in_progress").load("../inc/counters.php",
             {
               target: "in_progress",
               user_id: user_id,
               user_type: user_type
             });

             $("#on_revision").load("../inc/counters.php",
             {
               target: "on_revision",
               user_id: user_id,
               user_type: user_type
             });
             $("#closed").load("../inc/counters.php",
             {
               target: "closed",
               user_id: user_id,
               user_type: user_type
             });
         });
       </script>
