<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("location:login.php");
    exit();
}


include "../includes/db.php";



// Add Category

if(isset($_POST['add']))
{

$category_name = $_POST['category_name'];


$sql = "INSERT INTO category(category_name)
VALUES('$category_name')";


if(mysqli_query($conn,$sql))
{
    echo "Added Successfully";
}
else
{
    echo "Error: ".mysqli_error($conn);
}

}




// Delete Category

if(isset($_GET['delete']))
{

$id=$_GET['delete'];


mysqli_query($conn,

"DELETE FROM category WHERE category_id=$id"

);


header("location:manage_categories.php");

}




// Get Categories

$result=mysqli_query($conn,

"SELECT * FROM category"

);



?>



<!DOCTYPE html>

<html>

<head>

<title>Manage Categories</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">

</head>



<body>


<div class="container mt-5">


<h2>

📂 Manage Categories

</h2>




<form method="POST" class="mt-4">


<input type="text"
name="category_name"
class="form-control mb-3"
placeholder="Category Name"
required>



<button name="add"
class="btn btn-success">

Add Category

</button>


</form>




<hr>



<table class="table table-bordered">


<tr>

<th>ID</th>

<th>Category Name</th>

<th>Action</th>

</tr>



<?php

while($row=mysqli_fetch_assoc($result))

{


?>


<tr>


<td>

<?= $row['category_id']; ?>

</td>



<td>

<?= $row['category_name']; ?>

</td>



<td>


<a href="manage_categories.php?delete=<?= $row['category_id']; ?>"
class="btn btn-danger"
onclick="return confirm('Delete this category?')">

Delete

</a>


</td>


</tr>


<?php

}

?>


</table>



<a href="dashboard.php"
class="btn btn-secondary">

Back

</a>



</div>


</body>


</html>