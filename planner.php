<?php

include "includes/header.php";
include "includes/db.php";


$query="SELECT * FROM places";

$result=mysqli_query($conn,$query);


?>


<div class="container mt-5">


<h1 class="text-center">

🗺️ Create Your One Day Trip Plan

</h1>


<p class="text-center">

Select places you want to visit

</p>




<form action="save_plan.php" method="POST">



<div class="row">



<?php


while($place=mysqli_fetch_assoc($result))

{


?>


<div class="col-md-4 mb-4">


<div class="card">


<img src="assets/images/<?php echo $place['image']; ?>"
class="card-img-top"
height="200">



<div class="card-body">


<h5>

<?php echo $place['place_name']; ?>

</h5>



<p>

<?php echo $place['distance']; ?>

</p>



<input type="checkbox"
name="places[]"
value="<?php echo $place['place_id']; ?>"
checked>



</div>


</div>


</div>



<?php

}

?>


</div>




<div class="text-center mt-4">


<input type="text"
name="visitor"
class="form-control mb-3"
placeholder="Enter Your Name"
required>



<button class="btn btn-success btn-lg">

Generate My Plan

</button>


</div>



</form>


</div>




<?php

include "includes/footer.php";

?>