<?php
include "includes/header.php";
include "includes/db.php";
?>


<!-- Hero Slider -->

<div id="homeSlider" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">


<div class="carousel-inner">


<div class="carousel-item active">

<img src="assets/images/maradankadawala1.jpg"
class="d-block w-100 hero-img">


<div class="carousel-caption">

<div id="loader"
class="loader mx-auto mt-5">

</div>


<script>

setTimeout(()=>{

document.getElementById("loader").style.display="none";

},1000);


</script>

<h1>
Explore Maradankadawala
</h1>

<p>
Discover Beautiful Places Around You
</p>


<a href="places.php" class="btn btn-success btn-lg">
Start Planning
</a>

</div>


</div>



<div class="carousel-item">

<img src="assets/images/nature.jpg"
class="d-block w-100 hero-img">


<div class="carousel-caption">

<h1>
Nature & Adventure
</h1>

<p>
Experience Sri Lanka's Hidden Beauty
</p>


</div>

</div>




<div class="carousel-item">

<img src="assets/images/heritage.jpg"
class="d-block w-100 hero-img">


<div class="carousel-caption">

<h1>
History & Culture
</h1>

<p>
Explore Ancient Locations
</p>


</div>


</div>



</div>



<button class="carousel-control-prev"
data-bs-target="#homeSlider"
data-bs-slide="prev">

<span class="carousel-control-prev-icon"></span>

</button>


<button class="carousel-control-next"
data-bs-target="#homeSlider"
data-bs-slide="next">

<span class="carousel-control-next-icon"></span>

</button>



</div>





<!-- Welcome Section -->


<section class="container text-center mt-5">


<h1 class="welcome-title">

Plan Your Perfect One Day Trip

</h1>


<p class="lead">

Find amazing tourist places near Maradankadawala
and create your own travel plan.

</p>


</section>


<section class="container mt-5">


<h2 class="text-center mb-4">

⭐ Top Recommended Places

</h2>



<div class="row">


<?php


$recommend=

mysqli_query($conn,

"SELECT * FROM places ORDER BY place_id DESC LIMIT 3"

);



while($row=mysqli_fetch_assoc($recommend))

{


?>


<div class="col-md-4">


<div class="card">


<img src="assets/images/<?php echo $row['image']; ?>"
class="card-img-top"
height="220">



<div class="card-body">


<h5>

<?php echo $row['place_name']; ?>

</h5>


<a href="place_details.php?id=<?php echo $row['place_id']; ?>"
class="btn btn-success">

Explore

</a>



</div>


</div>


</div>


<?php

}

?>


</div>


</section>


<!-- Statistics -->


<section class="container mt-5">


<div class="row text-center">



<div class="col-md-4">

<div class="stat-card">


<h2>
10+
</h2>


<p>
Tourist Places
</p>


</div>

</div>




<div class="col-md-4">

<div class="stat-card">


<h2>
5
</h2>


<p>
Categories
</p>


</div>

</div>





<div class="col-md-4">

<div class="stat-card">


<h2>
24/7
</h2>


<p>
Travel Planning
</p>


</div>

</div>



</div>


</section>







<!-- Popular Places -->


<section class="container mt-5">


<h2 class="text-center mb-4">

Popular Destinations

</h2>



<div class="row">



<?php


$query =
"SELECT * FROM places LIMIT 3";


$result=mysqli_query($conn,$query);



while($row=mysqli_fetch_assoc($result))

{


?>


<div class="col-md-4">


<div class="card">


<img src="assets/images/<?php echo $row['image']; ?>"
class="card-img-top"
height="250">



<div class="card-body">


<h5 class="card-title">

<?php echo $row['place_name']; ?>

</h5>



<p>

<?php echo substr($row['description'],0,100); ?>

...

</p>



<a href="place_details.php?id=<?php echo $row['place_id']; ?>"
class="btn btn-success">

View Details

</a>



</div>


</div>


</div>


<?php

}

?>



</div>



</section>





<?php

include "includes/footer.php";

?>