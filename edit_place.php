<?php

session_start();

if(!isset($_SESSION['admin']))
{
    header("location:login.php");
    exit();
}


include "../includes/db.php";



$id = $_GET['id'];


// Get Existing Data

$query = "SELECT * FROM places WHERE place_id=$id";

$result = mysqli_query($conn,$query);

$place = mysqli_fetch_assoc($result);





if(isset($_POST['update']))
{


$name=$_POST['name'];

$category=$_POST['category'];

$description=$_POST['description'];

$location=$_POST['location'];

$distance=$_POST['distance'];

$open=$_POST['open'];

$close=$_POST['close'];

$tip=$_POST['tip'];

$lat=$_POST['lat'];

$lng=$_POST['lng'];





// Image update

$image=$_FILES['image']['name'];



if($image!="")
{

move_uploaded_file(
$_FILES['image']['tmp_name'],
"../assets/images/".$image
);


$sql="

UPDATE places SET

category_id='$category',
place_name='$name',
description='$description',
location='$location',
distance='$distance',
opening_time='$open',
closing_time='$close',
travel_tips='$tip',
latitude='$lat',
longitude='$lng',
image='$image'


WHERE place_id=$id


";


}

else

{


$sql="

UPDATE places SET

category_id='$category',
place_name='$name',
description='$description',
location='$location',
distance='$distance',
opening_time='$open',
closing_time='$close',
travel_tips='$tip',
latitude='$lat',
longitude='$lng'


WHERE place_id=$id


";


}




if(mysqli_query($conn,$sql))
{

echo "

<script>

alert('Place Updated Successfully');

window.location='manage_places.php';

</script>

";

}


}



?>




<!DOCTYPE html>

<html>

<head>

<title>Edit Place</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">


</head>


<body>


<div class="container mt-5">


<h2>

✏️ Edit Tourist Place

</h2>



<form method="POST"
enctype="multipart/form-data">



<input name="name"
class="form-control mb-2"
value="<?php echo $place['place_name']; ?>">





<input name="category"
class="form-control mb-2"
value="<?php echo $place['category_id']; ?>">





<textarea name="description"
class="form-control mb-2">

<?php echo $place['description']; ?>

</textarea>





<input name="location"
class="form-control mb-2"
value="<?php echo $place['location']; ?>">





<input name="distance"
class="form-control mb-2"
value="<?php echo $place['distance']; ?>">





<input name="open"
class="form-control mb-2"
value="<?php echo $place['opening_time']; ?>">





<input name="close"
class="form-control mb-2"
value="<?php echo $place['closing_time']; ?>">





<textarea name="tip"
class="form-control mb-2">

<?php echo $place['travel_tips']; ?>

</textarea>





<input name="lat"
class="form-control mb-2"
value="<?php echo $place['latitude']; ?>">





<input name="lng"
class="form-control mb-2"
value="<?php echo $place['longitude']; ?>">





<p>Current Image:</p>


<img src="../assets/images/<?php echo $place['image']; ?>"
width="150"
class="mb-3">





<input type="file"
name="image"
class="form-control mb-3">





<button name="update"
class="btn btn-success">

Update Place

</button>


<a href="manage_places.php"
class="btn btn-secondary">

Back

</a>



</form>


</div>


</body>


</html>