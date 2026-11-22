<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("location:login.php");
    exit();
}


include "../includes/db.php";



if(isset($_POST['add']))
{


$name = $_POST['name'];

$category = $_POST['category'];

$description = $_POST['description'];

$location = $_POST['location'];

$distance = $_POST['distance'];

$open = $_POST['open'];

$close = $_POST['close'];

$tip = $_POST['tip'];

$lat = $_POST['lat'];

$lng = $_POST['lng'];





// Image Upload

$image = $_FILES['image']['name'];

$tmp = $_FILES['image']['tmp_name'];



$upload_path = "../assets/images/".$image;



move_uploaded_file($tmp,$upload_path);





$sql = "

INSERT INTO places

(
category_id,
place_name,
description,
location,
distance,
opening_time,
closing_time,
travel_tips,
latitude,
longitude,
image
)

VALUES

(
'$category',
'$name',
'$description',
'$location',
'$distance',
'$open',
'$close',
'$tip',
'$lat',
'$lng',
'$image'
)

";




$result = mysqli_query($conn,$sql);



if($result)
{

echo "

<script>

alert('Place Added Successfully');

window.location='dashboard.php';

</script>

";

}

else
{

echo "Error : ".mysqli_error($conn);

}


}



?>





<!DOCTYPE html>

<html>

<head>

<title>Add Tourist Place</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">


</head>


<body>



<div class="container mt-5">


<h2 class="mb-4">

➕ Add Tourist Place

</h2>





<form method="POST"
enctype="multipart/form-data">





<input 
name="name"
class="form-control mb-2"
placeholder="Place Name"
required>





<select name="category" class="form-control mb-2" required>

<option value="">
Select Category
</option>


<?php

$cat_query = mysqli_query($conn,
"SELECT * FROM category"
);


while($cat=mysqli_fetch_assoc($cat_query))

{

?>

<option value="<?php echo $cat['category_id']; ?>">

<?php echo $cat['category_name']; ?>

</option>


<?php

}

?>

</select>





<textarea 
name="description"
class="form-control mb-2"
placeholder="Description"></textarea>





<input 
name="location"
class="form-control mb-2"
placeholder="Location">





<input 
name="distance"
class="form-control mb-2"
placeholder="Distance">





<input 
name="open"
class="form-control mb-2"
placeholder="Opening Time">





<input 
name="close"
class="form-control mb-2"
placeholder="Closing Time">





<textarea 
name="tip"
class="form-control mb-2"
placeholder="Travel Tips"></textarea>





<input 
name="lat"
class="form-control mb-2"
placeholder="Latitude">





<input 
name="lng"
class="form-control mb-2"
placeholder="Longitude">





<input 
type="file"
name="image"
class="form-control mb-3"
required>






<button 
name="add"
class="btn btn-success">

Add Place

</button>



<a href="dashboard.php"
class="btn btn-secondary">

Back

</a>




</form>


</div>


</body>

</html>