<?php
require_once 'header.php';
require_once 'includes/db_connection.php';
// error_reporting(0);
$update=false;
$id='';
$subject='';
$topic='';
$question='';
$answer='';
?>
<?php 
if(isset($_GET['edit'])){
    $update=true;
    
    $edt=$_GET['edit'];
    
    $qry="SELECT * FROM quiz_one WHERE id='$edt'";
    $run=mysqli_query($connection,$qry);
    $check=mysqli_num_rows($run);
    if($check>0){
        while($lim=mysqli_fetch_assoc($run)){
			$id = $lim['id'];
             $subject=$lim['subject'];
             $topic=$lim['topic'];
             $question=$lim['question'];
             $answer=$lim['answer'];
             
}}   
}
?>
<?php 

	if(isset($_GET["id"])){
		$id = $_GET["id"];

		$query = "DELETE FROM quiz_one WHERE id = $id LIMIT 1";
		$result = mysqli_query($connection,$query);
		if(!$result){
			die("Query Failed.");
		}else{
			$_SESSION["message"] = "Deleted Successfully";
			
			
		}

	}

?>

<?php
if (isset($_POST["id"]) && ( $_POST["id"]=='' )) {

	// $name 		 = mysqli_real_escape_string($connection,$_POST["name"]);
	$subject = mysqli_real_escape_string($connection, $_POST["subject"]);
    $topic = mysqli_real_escape_string($connection, $_POST["topic"]);
    $question = mysqli_real_escape_string($connection, $_POST["question"]);
    $answer = mysqli_real_escape_string($connection, $_POST["answer"]);

	$add = "INSERT INTO quiz_one(subject,topic,question,answer) VALUES ('$subject','$topic','$question','$answer')";
	$add_data = mysqli_query($connection, $add);
	if (!$add_data) {
		die("Database Query Failed...");
	}
}
else if(isset($_POST['id']) && $_POST['id']!=''){
	$id=$_POST['id'];
	$subject=$_POST['subject'];
     $topic=$_POST['topic'];
     $question=$_POST['question'];
     $answer=$_POST['answer'];
	
	

$qry="UPDATE quiz_one  SET subject='$subject',topic='$topic',question='$question',answer='$answer' WHERE id='$id' ";
//echo $qry;
$result=mysqli_query($connection,$qry);
 
 if($result>0){
echo '<div class="alert alert-success" role="alert">
updated
</div>';}
 else{
echo '<div class="alert alert-danger" role="alert">
not
</div>';}
}
?>

 	<center>

 		<form method="POST">
	 		<table>
	 			<tr>
	 				<td></td>
	 				<td>
	 					<center>
	 						<h4 style="color: blue"><b>ADD QUIZ</b></h4>
	 					</center>
	 				</td>
	 			</tr>
	 			<!-- <tr>
	 				<td id="detail"><b>Usertype Name:</b></td>
	 				<td>
	 					<input type="text" name="name" id="input" required>
	 				</td>

	 			</tr> -->
                 <div><input type="hidden" name="id" id="input" value="<?php echo $id; ?>" ></div>
	 			
                 <tr>
                    <td id="detail"><b>SELECT SUBJECT:</b></td>
                     <td>
                     <select name="subject" id="input" required="" value="" style="height: 25px;">
                  <option value="" disabled="" selected="">---Select Please---</option>
    <?php
    
$query = "SELECT * FROM category";
$result = mysqli_query($connection, $query);
if (!$result) {
	die("query failed");
}
while ($data = mysqli_fetch_assoc($result)) {
    $selected = '';
   if($data['id'] == $subject){
    $selected  ='selected="selected"';

   }

	?>

                  <option  <?php echo $selected ;?>  value="<?php echo $data['id']; ?>" ><?php echo $data['subject'];?></option>
    <?php
}
?>
	 			<tr >


                 <tr>
                    <td id="detail"><b>SELECT TOPIC:</b></td>
                     <td>
                     <select name="topic" id="input" required="" value="" style="height: 25px;">
                  <option value="" disabled="" selected="">---Select Please---</option>
    <?php
    
$query = "SELECT * FROM topic";
$result = mysqli_query($connection, $query);
if (!$result) {
	die("query failed");
}
while ($data = mysqli_fetch_assoc($result)) {
    $selected = '';
   if($data['id'] == $topic){
    $selected  ='selected="selected"';

   }

	?>

                  <option  <?php echo $selected ;?>  value="<?php echo $data['id']; ?>" ><?php echo $data['topic'];?></option>
    <?php
}
?>
	 			<tr >
                 <tr>
	 				<td id="detail"><b>ADD QUESTION:</b></td>
	 				<td>
	 					<textarea  name="question"  id="input" required=""> <?php echo $question; ?></textarea>
	 				</td>

	 			</tr>

                 <tr>
	 				<td id="detail"><b>ADD ANSWER:</b></td>
	 				<td>
	 					<textarea  name="answer"  id="input" required=""><?php echo $answer; ?></textarea>
	 				</td>

	 			</tr>

	 			<tr >
	 				<td></td>
	 				<td >
	 					<center>
                         <div>
                    <?php if($update=='true'):?>
                    <button type="submit" name="submit" class="btn btn-success" id="button"><b>Update</b></button>
                    <button class="btn btn-danger" id="button"><b>Cancel</b></button>
                    <?php else:?>
				 			<button type="submit" name="submit" class="btn btn-success" id="button"><b>Save</b></button>
                            
				 			<button class="btn btn-danger" id="button"><b>Cancel</b></button>
                            <?php endif ?>
			</div>
				 		</center>
	 				</td>
	 			</tr>
	 		</table>
	 	</form>
 	</center>
	<hr>
 	<div class="row">
	 		<div class="col-md-12"  style="overflow: auto;height: 300px;">
	 			<table class="table table-bordered table-striped">
	 				
			 		<thead>
			 			<tr  style="background-color: lightblue;">
			 				<th>ID</th>
			 				<!-- <th>Name</th> -->
			 				<th>Subject</th>
                             <th>Topic</th>
                             <th>Question</th>
                             <th>Answer</th>
							 <th>OPREATIONS</th>
			 				
			 			</tr>
			 		</thead>
			 		<?php
//$query = "SELECT * FROM  quiz_one";
$query = "SELECT qo.*, t.topic,c.subject FROM topic t, category c ,quiz_one qo WHERE qo.subject=c.id AND qo.topic=t.id";
$result = mysqli_query($connection, $query);
if (!$result) {
	die("Database Query Failed");
}
if (mysqli_num_rows($result)) {
	while ($data = mysqli_fetch_assoc($result)) {

		?>
			 		<tbody>
			 			<tr>
			 				<td><?php echo $data["id"]; ?></td>
			 				<td><?php echo $data["subject"]; ?></td>
                             <td><?php echo $data["topic"]; ?></td>
                             <td><?php echo $data["question"]; ?></td>
                             <td><?php echo $data["answer"]; ?></td>
							 <td><a href="add_quiz.php?id=<?php echo urlencode($data["id"]); ?>" ><i class="glyphicon glyphicon-trash" style="color: red;"></i></a>
                             <a style=" margin-left:15px;" href="add_quiz.php?edit=<?php echo $data["id"]; ?>"><i class="fa fa-edit text-primary ">	

                             </td>

			 			</tr>
			 		</tbody>
			 		<?php
}
}
?>
			 	</table>
	 		</div>
	 	</div>


	<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- REQUIRED JS SCRIPTS -->


<?php include 'footer.php';?>