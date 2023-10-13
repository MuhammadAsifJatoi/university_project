<?php include "hdr.php" ?>


<div class="container">


<div class="col-md-4 float-left my-3">

<div>
    <h4>
        TOPICS
    </h4>
</div>

<?php 
$topic='';
$edt='';
//print_r($_GET);
$catid=$_GET['cat'];

$qry="SELECT * FROM topic WHERE subject='$catid'";
    $run=mysqli_query($connection,$qry);
    $check=mysqli_num_rows($run);
    if($check>0){
        while($lim=mysqli_fetch_assoc($run)){
          $id = $lim['id'];
             $topic=$lim['topic'];
             
             echo '
             <div class="col-md-12 p-0">
             <a class="col-md-12 float-left border p-2 text-dark nav-link " href="topic.php?cat='.$catid.'&&topic='.$id.'">'.$topic.'</a>
             </div>';
			  
}}

?>

</div>
<div class="col-md-8 float-left my-3">

<div>
    <h4>
        MCQ's
    </h4>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Simple</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Optional</button>
  </li>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <?php 
$topic='';
$edt='';

//print_r($_GET);
$id=$_GET['cat'];

$qry="SELECT * FROM quiz_one WHERE subject='$id' LIMIT 15 ";
    $run=mysqli_query($connection,$qry);
    $check=mysqli_num_rows($run);
    if($check>0){
$i=0;
        while($lim=mysqli_fetch_assoc($run)){
           $i++;
          $id = $lim['id'];
             $question=$lim['question'];
             $answer=$lim['answer'];
             
             echo '
             <div class="col-md-12 float-left border mb-1 p-2">
             <h6 class=" text-dark nav-link m-0" >('.$i.') '.$question.'</h6>
             <p class=" text-dark nav-link m-0" >Ans. '.$answer.'</p>
             
             </div>';
			  
}}

?>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <?php 
$subject='';

$edt='';

//print_r($_GET);
$id=$_GET['cat'];

$qry="SELECT * FROM quiz_option WHERE subject='$id' LIMIT 15 ";
    $run=mysqli_query($connection,$qry);
    $check=mysqli_num_rows($run);
    if($check>0){
$i=0;
        while($lim=mysqli_fetch_assoc($run)){
            $option='';
           $i++;
          $id = $lim['id'];
             $question=$lim['question'];
             $answer=$lim['answer'];
             $p = explode('|||', $lim['options']);
             $counter =0;
        
			foreach ($p as $k){
                //echo $k;
					$counter++;

$option .= '<p class=" text-dark nav-link m-0 p-0 " >'.$k.'</p>';
             } 
             
             echo '<div class="col-md-12 float-left border mb-1 p-2">
             <h6 class=" text-dark nav-link m-0 p-0 py-2" >('.$i.') '.$question.'</h6>
             '.$option.'

             <p class=" text-dark nav-link m-0 p-0 pt-3" >Ans. '.$answer.'</p>
             </div>';
			  
}}

?>
  </div>
</div>





</div>






</div>



<?php include "footer.php" ?>