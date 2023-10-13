<?php
require_once 'header.php';
require_once 'includes/db_connection.php';
error_reporting(0);
?>
<?php
if (isset($_POST["update"])) {
	$id = $_POST["id"];
	$name = mysqli_real_escape_string($connection, $_POST["name"]);
	$cnic = mysqli_real_escape_string($connection, $_POST["cnic"]);
	$password = mysqli_real_escape_string($connection, $_POST["password"]);

	$query = "UPDATE user_signup SET name = '$name', usertype = '$usertype' , cnic = $cnic , password = '$password' WHERE id = $id ";
	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("Database query failed");
	} else {
		header("Refresh:0");
	}
}

?>
<?php

if (isset($_POST["signup"])) {
	$name = mysqli_real_escape_string($connection, $_POST["name"]);
	$cnic = mysqli_real_escape_string($connection, $_POST["cnic"]);
	$password = mysqli_real_escape_string($connection, $_POST["password"]);
	$re_password = mysqli_real_escape_string($connection, $_POST["re_password"]);

	if ($password == $re_password) {
		$add = "INSERT INTO user_signup(name,cnic,usertype,password) VALUES ('$name',$cnic,'$usertype','$password')";
		$add_data = mysqli_query($connection, $add);
		if (!$add_data) {
			die("Database Query Failed...");
		}
	} else {
		$message = "Password not Match";
	}
}

?>
	<center>
		<img src="images/picture2.png" height="65" width="210" class="mt-3">
		<hr>
	 	<form method="POST">
	 		<table>
	 			<tr>
	 				<td></td>
	 				<td>
	 					<center>
	 						<h6 style="color: blue"><b>USER SIGNUP</b></h6>
	 					</center>
	 				</td>
	 			</tr>
	 			<tr>
	 				<td id="detail" ><b>User Name:</b></td>
	 				<td>
	 					<input type="text" name="name" id="input">
	 				</div>
	 				</td>
	 			</tr>
	 			<tr>
	 				<td id="detail" ><b>User CNIC:</b></td>
	 				<td>
	 					<input type="number" name="cnic" id="input">
	 				</div>
	 				</td>
	 			</tr>
	 			<tr>
	 				<td id="detail"><b>User Password:</b></td>
	 				<td>
	 					<input type="password" name="password" id="input">
	 				</td>

	 			</tr>
	 			<tr>
	 				<td id="detail"><b>Re_User Password:</b></td>
	 				<td>
	 					<input type="password" name="re_password" id="input">
	 				</td>
	 			</tr>
<?php
if (isset($message)) {
	echo "<tr>";
	echo "<td></td>";
	echo "<td>";
	echo "<h4 style = \"color:red\">" . $message . "</h4>";
	echo "</td>";
	echo "</tr>";
}
?>
	 			<tr class="mt-3">
	 				<td></td>
	 				<td>
	 					<center>
				 			<button class="btn btn-success" type="submit" name="signup" id="button">SignUp</button>
				 			<button class="btn btn-danger"  id="button">Cancel</button>
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
	 					<tr>
			 				<th colspan="6">
			 					<form style="float: right;">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<div class="input-group-btn">
											<button class="btn btn-default" type="submit">
												<i class="glyphicon glyphicon-search"></i>
											</button>
										</div>
									</div>
								</form>
			 				</th>
			 			</tr>
	 				</thead>
			 		<thead>
			 			<tr  style="background-color: lightblue;">
			 				<th>ID</th>
			 				<th>Name</th>
			 				<th>CNIC</th>
			 				<th>Actions</th>
			 			</tr>
			 		</thead>
			 		<?php
$query = "SELECT * FROM user_signup";
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
			 				<td><?php echo $data["name"]; ?></td>
			 				<td><?php echo $data["cnic"]; ?></td>
			 				<td>
			 					<a href="#" class="icon" data-id ="<?php echo urlencode($data['id']); ?>" id="update" ><i class="glyphicon glyphicon-edit" style="color: blue;"></i></a>
			 					<a href="delete_user_signup.php?id=<?php echo urlencode($data["id"]); ?>" onclick = "return confirm('Are You Sure...!')"><i class="glyphicon glyphicon-trash" style="color: red;"></i></a>
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
	 	<!-- Update Modal Form -->

	 <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		  	<form class="form" id="update-form" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update Record</h4>
					</div>
					<div class="modal-body">

						<div class="form-group">
							<div class="status" ></div>
						</div>
						<div class="form-group">
			        		<input type="hidden" name="id" class="form-control id"  placeholder="Class Name">
			        	</div>
			        	<div class="form-group">
			        		<input type="text" name="name" class="form-control name" placeholder="User Name">
			        	</div>
			        	<div class="form-group">
			        		<input type="number" name="cnic" class="form-control cnic" placeholder="CNIC">
			        	</div>
			        	<div class="form-group">
			        		<input type="password" name="password" class="form-control password" placeholder="Password">
			        	</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" name="update" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i>Update Record</button>
					</div>
				</div>
			</form>
		  </div>
		</div>

 <script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>

	$(function(){
		$('.table').on('click',function(event){

			// event.preventDefault();
			var $anchor = $(event.target).parent('.icon');
			var id = $anchor.attr('data-id');

			if($anchor.hasClass('icon')){
				// console.log($anchor.attr('id'))
				get_record($anchor.attr('id'), id);
			}

		});
	});

	function get_record(actionName , id){
		var $modal = '';
		var $form  = '';
		$.ajax({
			url : 'update_user_signup.php',
			method : 'post',
			data : {id: id},
			success : function(response){

				// console.log(response)
				response = $.parseJSON(response);
				if(response.status == 'success'){

					if(actionName == 'update'){
						var $modal = $('#update-modal');


					}else if(actionName == 'delete'){
						var $modal = $('#delete-modal');
					}
					// console.log($modal.find('.form').html())

					$form = $modal.find('.form');
					$form.find('.id').val( response.id );
					$form.find('.usertype').val( response.usertype );
					// console.log(response.usertype);
					$form.find('.name').val( response.name );
					$form.find('.cnic').val( response.cnic );

					 $modal.modal('show');
				}
			}
		});
	}

</script>

<?php require_once 'footer.php';?>