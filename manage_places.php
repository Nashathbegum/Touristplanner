<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("location:login.php");
    exit();
}


include "../includes/db.php";



$query = "SELECT * FROM places";

$result = mysqli_query($conn,$query);



?>


<!DOCTYPE html>

<html>

<head>

<title>Manage Places</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">


</head>


<body>


<div class="container mt-5">


<h2 class="mb-4">

📍 Manage Tourist Places

</h2>



<a href="add_place.php"
class="btn btn-success mb-3">

➕ Add New Place

</a>



<a href="dashboard.php"
class="btn btn-secondary mb-3">

Back

</a>




<table class="table table-bordered table-striped">


<tr>

<th>ID</th>

<th>Image</th>

<th>Place Name</th>

<th>Location</th>

<th>Action</th>

</tr>




<?php


while($row=mysqli_fetch_assoc($result))

{


?>



<tr>


<td>

<?php echo $row['place_id']; ?>

</td>



<td>

<img src="../assets/images/<?php echo $row['image']; ?>"
width="100"
height="70">

</td>



<td>

<?php echo $row['place_name']; ?>

</td>




<td>

<?php echo $row['location']; ?>

</td>




<td>


<a href="edit_place.php?id=<?php echo $row['place_id']; ?>"
class="btn btn-warning">

✏️ Edit

</a>



<a href="delete_place.php?id=<?php echo $row['place_id']; ?>"
class="btn btn-danger"
onclick="return confirm('Delete this place?')">

🗑 Delete

</a>



</td>



</tr>



<?php

}

?>


</table>


</div>


</body>

</html>