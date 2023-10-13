<?php 
	include'header.php';
 ?>
	<center>
		<img src="images/picture2.png" height="300px" width="210px" class="mt-3">
			<form>
	 		<table>
	 			<tr>
	 				<td></td>
	 				<center>
	 					<td>
		 					<img src="images/picture.jpg" height="100" width="100" class="ml-5">
		 				</td>
	 				</center>
	 				
	 			</tr>
	 			<tr>
	 				<td></td>
	 				<td>
	 					<center>
	 						<h6 style="color: blue"><b>User Login</b></h6>
	 					</center>
	 				</td>
	 			</tr>
	 			<tr>
	 				<td  style="font-size: 12px;text-align: right;"><b>UserName:</b></td>
	 				<td>
	 					<input type="text" style="font-size: 12px;width: 200px;">
	 				</div>
	 				</td>
	 			</tr>
	 			<tr>
	 				<td  style="font-size: 12px;text-align: right;"><b>Password:</b></td>
	 				<td>
	 					<input type="password" name="" style="font-size: 12px;width: 200px;">
	 				</td>

	 			</tr>
	 			<tr>
	 				<td></td>
	 				<td>
	 					<center>
	 						
	 						<input type="radio" name="gender" value="male" class="mt-2" style="height: 10px;"><span style="font-size:11px;"> Admin</span>
								<input type="radio" name="gender" value="female" style="height: 10px;"><span style="font-size:11px;"> Teacher</span>
	 					</center>
	 					
	 				</td>
	 			</tr>
	 			<tr>
	 				<td></td>
	 				<td>
	 					<center>
				 			<button class="btn btn-success" style="font-size: 10px;width: 80px;">Login</button>
				 			<button class="btn btn-danger"  style="font-size: 10px;width: 80px;">Cancel</button>
				 		</center>
	 				</td>
	 			</tr>
	 		</table>
			
	 		
	 		
	 	</form>
<?php include 'footer.php'; ?>