<?php
require("config.php");

$query="SELECT c_id, c_name,c_email,c_address,c_zip,c_telephone,c_dob, TIMESTAMPDIFF(YEAR, c_dob, CURDATE()) AS age from customer";
$result= mysqli_query($conn,$query);
$number_of_results = mysqli_num_rows($result);
?>





<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			body {

				border: 5px;
				margin: 10px;
				padding: 20px;
			}
		</style>
		<title>Task</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 
	</head>
	<body>
			<form method="GET">
			  <div class="row">
			  	  <div class="col-lg-3">
					  <div class="form-group">
					  	<input class="form-control input-sm" name="name" type="text" placeholder="Customer Name">
					  </div>
				  </div>
				  <div class="col-lg-3">
					  <div class="input-group">
						  <input type="text" name="email" class="form-control" placeholder="Customer Email Id" aria-describedby="basic-addon2">
						  <span class="input-group-addon" id="basic-addon2">abc@example.com</span>
					  </div>
				  </div>
				  <div class="col-lg-4">
				  	  <select class="dropdown" name="age">
						  <option value="">Select Age</option>
						  <option value="old">More Than 25</option>
						  <option value="young">Less Than 25</option>
					  </select>
					  <button type="submit" class="btn btn-success">Search</button>
				  </div>
				  
				  
			  </div>
			<!--   <input type="text" name="name" placeholder="Type Customer Name">
			  <input type="text" name="email" placeholder="Type Email of Customer">
			  <input type="submit" value="Search"> -->
			  
			</form>

			</br>
			 						<div class="col-md-12 col-sm-12 col-xs-12" id="datatable " style="width: 100%;height:100%x">

	                                        <table class="table table-bordered" id="tab">
	                                            <tr>
	                                                <th width="5%">Customer ID</th>
	                                                <th width="20%">Name</th>
	                                                <th width="20%">Email</th>
	                                                <th width="10%">Address</th>
	                                                <th width="5%">Zip</th>
	                                                <th width="20%">Telephone</th>
	                                                <th width="10%">DOB</th>
	                                                <th width="10%">Age</th>
	                                            </tr>  

	                                            <?php
													if( ( ( isset($_GET['email']) && !empty($_GET['email']) ) || ( isset($_GET['name']) && !empty($_GET['name']) ) ) && ( empty($_GET['age']) ) ) 
													{
														$cemail=$_GET['email'];
														$cname=$_GET['name'];
															$query="SELECT c_id, c_name,c_email,c_address,c_zip,c_telephone,c_dob, TIMESTAMPDIFF(YEAR, c_dob, CURDATE()) AS age from customer where c_name='$cname' OR c_email='$cemail' ";
															
															
													}
													elseif(isset($_GET['age']) && isset($_GET['email']) && isset($_GET['name']) && empty($_GET['name'])  && empty($_GET['email']) && !empty($_GET['age']))
													{
														if($_GET['age'] == 'old')
														{
														$query="SELECT c_id, c_name,c_email,c_address,c_zip,c_telephone,c_dob, TIMESTAMPDIFF(YEAR, c_dob, CURDATE()) AS age FROM customer HAVING age>25 ";
														}
														else 
														{
															$query="SELECT c_id, c_name,c_email,c_address,c_zip,c_telephone,c_dob, TIMESTAMPDIFF(YEAR, c_dob, CURDATE()) AS age FROM customer HAVING age<25 ";
														}
														
													}
													$result= mysqli_query($conn,$query);
													 while($row = $result->fetch_assoc()) {
													      echo "<tr><td>".$row["c_id"]."</td><td>".$row["c_name"]."</td><td> ".$row["c_email"]."</td><td>".$row["c_address"]."</td><td>".$row["c_zip"]."</td><td>".$row["c_telephone"]."</td><td>".$row["c_dob"]."</td><td>".$row["age"]."</td></tr>";
														                                   }
												?>


	                                            <?php
	                                            // ================== PAGINATION ====================
	                                            $result_per_page = 5;
	                                            $number_of_pages = ceil($number_of_results/$result_per_page);

	                                            if (!isset($_GET['page'])) {
	                                            	$page = 1;

	                                            } else {
	                                            	$page = $_GET['page'];
	                                            }
	                                            //
	                                            $this_page_first_result = ($page-1)*$result_per_page;
	                                          
	                                           
	                                            $query = "SELECT c_id, c_name,c_email,c_address,c_zip,c_telephone,c_dob, TIMESTAMPDIFF(YEAR, c_dob, CURDATE()) AS age from customer LIMIT " . $this_page_first_result . ',' . $result_per_page;
	                                         
	                                            /*$result= mysqli_query($conn,$query);*/
	                                            while ($row = mysqli_fetch_array($result)) {
	                                            	echo "<tr><td>".$row["c_id"]."</td><td>".$row["c_name"]."</td><td> ".$row["c_email"]."</td><td>".$row["c_address"]."</td><td>".$row["c_zip"]."</td><td>".$row["c_telephone"]."</td><td>".$row["c_dob"]."</td><td>".$row["age"]."</td></tr>";
	                                                
	                                            }
	                                            //
	                                            /*starting_limit_number = (page_number-1)*result_per_page;*/


	                                            for ($page= 1;$page<=$number_of_pages;$page++) {
	                                            	echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
	                                            }

	                                            // ============== // END OF PAGINATION // ============= //
	                                            $conn->close();
	                                            ?>                 
	                                        </table>
	                                        
	                                    
	                                </div>
	                                
	</body>
</html>
