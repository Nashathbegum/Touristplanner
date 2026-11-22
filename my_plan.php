<?php

include "includes/header.php";
include "includes/db.php";


$query = "SELECT * FROM visit_plans ORDER BY plan_id DESC";


$result = mysqli_query($conn,$query);

?>


<div class="container mt-5">


<h1 class="text-center">

🗺️ My Trip Plans

</h1>



<div class="row mt-4">



<?php

while($plan=mysqli_fetch_assoc($result))

{


?>


<div class="col-md-6 mb-4">


<div class="card shadow p-3">



<h4 class="text-success">

👤 <?php echo $plan['visitor_name']; ?>

</h4>



<hr>



<p>

<b>📍 Places:</b>

<br>

<?php echo $plan['place_ids']; ?>

</p>



<p>

<b>🚗 Total Distance:</b>

<?php echo $plan['total_distance']; ?>

</p>



<p>

<b>⏰ Travel Time:</b>

<?php echo $plan['travel_time']; ?>

</p>



<p>

<b>📅 Date:</b>

<?php echo $plan['created_date']; ?>

</p>



<button onclick="window.print()"
class="btn btn-primary">

🖨 Print

</button>



</div>


</div>



<?php

}

?>


</div>


</div>


<?php

include "includes/footer.php";

?>