<?php

include "includes/header.php";
include "includes/db.php";


if(isset($_GET['id']))
{

    $id = $_GET['id'];


    $query = "

    SELECT places.*, category.category_name

    FROM places

    LEFT JOIN category

    ON places.category_id = category.category_id

    WHERE places.place_id = $id

    ";


    $result = mysqli_query($conn,$query);


    if(!$result)
    {
        die("SQL Error: " . mysqli_error($conn));
    }


    $place = mysqli_fetch_assoc($result);


    if(!$place)
    {
        die("Place not found");
    }


}
else
{

    die("Invalid Place ID");

}


?>



<div class="container mt-5">


<div class="row">


<!-- Image Section -->

<div class="col-md-6">


<img src="assets/images/<?php echo $place['image']; ?>"
class="img-fluid rounded shadow"
style="width:100%; height:400px; object-fit:cover;">


</div>





<!-- Details Section -->

<div class="col-md-6">


<h1>

<?php echo $place['place_name']; ?>

</h1>



<span class="badge bg-success">

<?php echo $place['category_name']; ?>

</span>



<hr>



<h5>
📍 Location
</h5>

<p>

<?php echo $place['location']; ?>

</p>




<h5>
🚗 Distance
</h5>

<p>

<?php echo $place['distance']; ?>

</p>




<h5>
⏰ Opening Time
</h5>

<p>

<?php echo $place['opening_time']; ?>

-
<?php echo $place['closing_time']; ?>

</p>





<a 

target="_blank"

href="https://www.google.com/maps/dir/?api=1&destination=<?php echo $place['latitude']; ?>,<?php echo $place['longitude']; ?>"

class="btn btn-success">


🗺️ Get Directions


</a>



</div>


</div>





<!-- Description -->


<div class="card mt-5 p-4 shadow">


<h3>

About Place

</h3>


<p>

<?php echo $place['description']; ?>

</p>




<h4>

💡 Travel Tips

</h4>


<p>

<?php echo $place['travel_tips']; ?>

</p>


</div>







<!-- Google Map -->


<div class="mt-5">


<h3>

📍 Location Map

</h3>



<iframe

width="100%"

height="400"

style="border:0; border-radius:15px;"

loading="lazy"

allowfullscreen

src="https://maps.google.com/maps?q=<?php echo $place['latitude']; ?>,<?php echo $place['longitude']; ?>&output=embed">


</iframe>



</div>


<button onclick="addFavourite()"
class="btn btn-warning">

⭐ Add Favourite

</button>

</div>



<?php

include "includes/footer.php";

?>