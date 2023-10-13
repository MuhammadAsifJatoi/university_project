<?php
require_once 'header.php';
require_once 'includes/db_connection.php';
// error_reporting(0);
$update=false;
$id='';
$subject='';
$topic='';
$question='';
$options='';
$answer='';
?>
<?php 
$input='';
if(isset($_GET['edit'])){
    $update=true;
    
    $edt=$_GET['edit'];
    
    $qry="SELECT * FROM quiz_option WHERE id='$edt'";
    $run=mysqli_query($connection,$qry);
    $check=mysqli_num_rows($run);
    if($check>0){
        while($lim=mysqli_fetch_assoc($run)){

			//$option = explode('|||',$lim['options']);
			$p = explode('|||', $lim['options']);
           $input='<tr>
					 <td id="detail"><b>ADD OPTIONS:</b></td>
	 				<td class="field_wrapper">'; 
					$counter =0;
			foreach ($p as $k){
				if($counter==0){
					$counter++;
				
$input .= '
                     <input name="options[]" id="input" required="" value="'.$k.'">
					 <button class="add_button">Add</button>';
					 
				}
				else{
					 
                     
                    $input .= '<div class="kk"><input name="options[]" id="input" required="" value="'.$k.'"><button class="remove_button ">Remove</button></div>';
				}
			}
	$input .='</td>
	 			</tr>';

			$id = $lim['id'];
             $subject=$lim['subject'];
             $topic=$lim['topic'];
             $question=$lim['question'];
			 $answer=$lim['answer'];
             $options=$p;
             
             
             
}}   
}
?>
<?php 

	if(isset($_GET["id"])){
		$id = $_GET["id"];

		$query = "DELETE FROM quiz_option WHERE id = $id LIMIT 1";
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

    $option = implode('|||',$_POST["options"]);

	// $name 		 = mysqli_real_escape_string($connection,$_POST["name"]);
	$subject = mysqli_real_escape_string($connection, $_POST["subject"]);
    $topic = mysqli_real_escape_string($connection, $_POST["topic"]);
    $question = mysqli_real_escape_string($connection, $_POST["question"]);
    $options = mysqli_real_escape_string($connection,$option );
	$answer = mysqli_real_escape_string($connection, $_POST["answer"]);

	$add = "INSERT INTO quiz_option(subject,topic,question,options,answer) VALUES ('$subject','$topic','$question','$options','$answer')";
	$add_data = mysqli_query($connection, $add);
	if (!$add_data) {
		die("Database Query Failed...");
	}
}
else if(isset($_POST['id']) && $_POST['id']!=''){

	$option = implode('|||',$_POST["options"]);

	$id=$_POST['id'];
	$subject=$_POST['subject'];
     $topic=$_POST['topic'];
     $question=$_POST['question'];
	 $answer=$_POST['answer'];
     $options=$option;
	
	

$qry="UPDATE quiz_option  SET subject='$subject',topic='$topic',question='$question',options='$options',answer='$answer' WHERE id='$id' ";
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
	 						<h4 style="color: blue"><b>ADD OPTIONAL QUIZ</b></h4>
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

                 
	 				<?php 
					 if($update=='true'){
						
						echo $input;
						echo '';
						
					 }
					 else{
					 ?>
					  <tr>
					 <td id="detail"><b>ADD OPTIONS:</b></td>
	 				<td class="field_wrapper">
                     <input  name="options[]"  id="input" required="" Value="<?php echo $options; ?>" >
					 <button  class="add_button">Add</button>
                      </td>
	 			</tr>


					 
<?php 
					 }
?>
<tr>
					 <td id="detail"><b>ADD Answer:</b></td>
	 				<td>
                     <input  name="answer"  id="input" required="" Value="<?php echo $answer; ?>" >
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
                             <th>Options</th>
							 <th>Answers</th>
							 <th>OPREATIONS</th>
			 				
			 			</tr>
			 		</thead>
			 		<?php
$query = "SELECT * FROM quiz_option ";
$query = "SELECT qo.*, t.topic,c.subject FROM topic t, category c ,quiz_option qo WHERE qo.subject=c.id AND qo.topic=t.id";
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
							 
                             <td><?php echo $data["options"]; ?></td>
							 <td><?php echo $data["answer"]; ?></td>
							 <td><a href="add_quiz_option.php?id=<?php echo urlencode($data["id"]); ?>" ><i class="glyphicon glyphicon-trash" style="color: red;"></i></a>
                             <a style=" margin-left:15px;" href="add_quiz_option.php?edit=<?php echo $data["id"]; ?>"><i class="fa fa-edit text-primary ">	

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<script type="text/javascript">


$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="kk"><input  name="options[]"  id="input" required="" Value=""><button class="remove_button ">Remove</button></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        //alert();
        e.preventDefault();
        $(this).parent('div.kk').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<!-- REQUIRED JS SCRIPTS -->


<?php include 'footer.php';?>