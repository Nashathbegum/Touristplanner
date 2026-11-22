<?php

session_start();


if(!isset($_SESSION['admin']))
{
    header("location:login.php");
    exit();
}


include "../includes/db.php";



if(isset($_GET['id']))
{


$id=$_GET['id'];



// Get image name before delete

$image_query = mysqli_query($conn,

"SELECT image FROM places WHERE place_id=$id"

);


$image = mysqli_fetch_assoc($image_query);




// Delete database record

$query = "

DELETE FROM places

WHERE place_id=$id

";



if(mysqli_query($conn,$query))
{


// Delete image file also

if($image['image'] != "")
{

$file="../assets/images/".$image['image'];


if(file_exists($file))
{

unlink($file);

}

}



echo "

<script>

alert('Place Deleted Successfully');

window.location='manage_places.php';

</script>

";


}



else

{

echo mysqli_error($conn);

}



}


?>