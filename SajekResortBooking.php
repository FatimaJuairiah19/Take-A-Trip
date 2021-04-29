<?php 
session_start();
$connect = mysqli_connect("localhost", "rootNew", "Yes", "user");



if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_resort_name'  =>	$_POST["hidden_resortName"],
				'costPerNight'      =>  $_POST["hidden_costPerNight"],
				'costPerday'        =>  $_POST["hidden_costPerday"],
				'costOfVehicle'     =>  $_POST["hidden_costOfVehicle"],
				'otherCost'         =>  $_POST["hidden_otherCost"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_resort_name'  =>	$_POST["hidden_resortName"],
			'costPerNight'      =>  $_POST["hidden_costPerNight"],
			'costPerday'        =>  $_POST["hidden_costPerday"],
			'costOfVehicle'     =>  $_POST["hidden_costOfVehicle"],
			'otherCost'         =>  $_POST["hidden_otherCost"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="index_sajek.php"</script>';
			}
		}
	}
}



     $sql1='SELECT * FROM registration where Id="'.$_SESSION['Id'].'"';

     $result1=mysqli_query($connect,$sql1);
      
     $row1=mysqli_fetch_assoc($result1); 
   



if(isset($_POST['confirm']))
{
  

    $fn = $row1['firstName'];
    $email = $_SESSION['email'];
    $item_resort_name = $_POST["hidden_resortName"];
	$costPerNight = $_POST["hidden_costPerNight"];
	$item_name = $_POST["hidden_name"];
	$costPerday = $_POST["hidden_costPerday"];
	$costOfVehicle = $_POST["hidden_costOfVehicle"];
	$otherCost = $_POST["hidden_otherCost"];
	$total = $_POST["hidden_price"];


$sql2 ="INSERT INTO booking(firstName,email,resortName,costPerNight,package,costPerday,costOfVehicle,otherCost,totalCost) VALUES ('$fn','$email', '$item_resort_name','$costPerNight','$item_name','$costPerday','$costOfVehicle','$otherCost','$total')";

	if($connect->query($sql2)==TRUE){
		echo json_encode("OK");
		

	}else{
		echo json_encode("Failed");
	}



}


?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<br />
			<br />
			<br />
			<h3 align="center"></a></h3><br />
			<br /><br />
			<?php
				$query = "SELECT * FROM sajek ORDER BY Id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="index_sajek.php?action=add&id=<?php echo $row["Id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<h4 class="text-info"><?php echo $row["package"]; ?></h4>

						<h4 class="text-info"><?php echo $row["resortName"]; ?></h4>

						<h4 class="text-info"><?php echo $row["costPerNight"]; ?></h4>

						<h4 class="text-info"><?php echo $row["costPerday"]; ?></h4>

						<h4 class="text-info"><?php echo $row["costOfVehicle"]; ?></h4>

						<h4 class="text-info"><?php echo $row["otherCost"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["totalCost"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["package"]; ?>" />

						<input type="hidden" name="hidden_resortName" value="<?php echo $row["resortName"]; ?>" />

						<input type="hidden" name="hidden_costPerNight" value="<?php echo $row["costPerNight"]; ?>" />

						<input type="hidden" name="hidden_costPerday" value="<?php echo $row["costPerday"]; ?>" />

						<input type="hidden" name="hidden_costOfVehicle" value="<?php echo $row["costOfVehicle"]; ?>" />

						<input type="hidden" name="hidden_otherCost" value="<?php echo $row["otherCost"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["totalCost"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

						<input type="submit" name="confirm" style="margin-top:5px;" class="btn btn-success" value="Confirm" />


					</div>
				</form>
			</div>
			<?php
					}
				}
			?>


			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="10%">Package ID</th>
						<th width="10%">Resort Name</th>
						<th width="10%">Cost Per Night</th>
						<th width="10%">Cost Per Day</th>
						<th width="10%">Cost Of Vehicle</th>
						<th width="10%">Other Costs</th>
						<th width="10%">Quantity</th>
						<th width="10%">Price</th>
						<th width="10%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_resort_name"]; ?></td>
						<td><?php echo $values["costPerNight"]; ?></td>
						<td><?php echo $values["costPerday"]; ?></td>
						<td><?php echo $values["costOfVehicle"]; ?></td>
						<td><?php echo $values["otherCost"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="index_sajek.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="8" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td>
							
						</td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>