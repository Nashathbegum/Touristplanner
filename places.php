<?php

include "includes/header.php";
include "includes/db.php";


$search = "";

$query = "SELECT * FROM places WHERE 1";



if(isset($_GET['search']) && $_GET['search'] != "")
{

    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $query .= " AND place_name LIKE '%$search%'";

}



if(isset($_GET['category']) && $_GET['category'] != "")
{

    $cat = $_GET['category'];

    $query .= " AND places.category_id = '$cat'";

}



$result = mysqli_query($conn,$query);


?>


<div class="container mt-5">


<h1 class="text-center">

Tourist Places

</h1>



<!-- Search Section -->


<div class="card p-4 mt-4 shadow">


<form method="GET" class="row g-3">



<div class="col-md-5">


<input 

type="text"

name="search"

class="form-control"

placeholder="Search place..."

value="<?php 

echo isset($_GET['search']) ? $_GET['search'] : '';

?>">


</div>




<div class="col-md-4">


<select name="category" class="form-control">


<option value="">

All Categories

</option>



<?php


$cat_query = mysqli_query($conn,

"SELECT * FROM category"

);



while($c=mysqli_fetch_assoc($cat_query))

{


?>


<option value="<?php echo $c['category_id']; ?>"
<?php
if(isset($_GET['category']) && $_GET['category']==$c['category_id'])
{
    echo "selected";
}
?>>


<?php echo $c['category_name']; ?>


</option>


<?php

}

?>


</select>


</div>




<div class="col-md-3">


<button class="btn btn-success w-100">

🔍 Search

</button>


</div>



</form>


</div>






<div class="row mt-5">



<?php


if(mysqli_num_rows($result)>0)

{


while($row=mysqli_fetch_assoc($result))

{


?>


<div class="col-md-4 mb-4">



<div class="card shadow">



<img src="assets/images/<?php echo $row['image']; ?>"

class="card-img-top"

height="250">





<div class="card-body">



<h4>

<?php echo $row['place_name']; ?>

</h4>




<p>

📍 <?php echo $row['location']; ?>

</p>




<p>

🚗 <?php echo $row['distance']; ?>

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


}

else

{


?>


<div class="text-center">


<h4 class="text-danger">

No Places Found

</h4>


</div>


<?php

}

?>



</div>



</div>



<?php

include "includes/footer.php";

?>