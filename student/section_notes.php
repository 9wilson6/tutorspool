<?php
function events($student_id)
{
    global $db;
    $query = "SELECT * FROM notifications where user_id='$student_id' ORDER BY note_num desc LIMIT 5";
    $results = $db->get_results($query);
    if ($db->num_rows > 0) { ?>

<?php foreach ($results as $result): ?>
 <li class="text-center">
<p class="card-text"><?php echo $result->note; ?></p>
 </li>
<?php endforeach;?>
<?php } else {?>
<div class="text-dark">No Activities</div>
<?php }}?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
   
    <div class="card-recent-events">
      
            <div class="recent-items-ctn">
                <div class="recent-items-title text-center">
                    <h2>Recent Events</h2>
                </div>
            </div>
        
        <div class="card-body">
        	    <ul>
<?php events($_SESSION['user_id'])?>
  </ul>
</div><!--card body-->
<?php 
if ($db->num_rows > 0) { ?>
  <div class="text-center">
<a href="notes.php" class="card-footer btn btn-success" style="background: #38ada9">View All</a>
</div>
<?php }

 ?>
</div><!--card-->
</div>