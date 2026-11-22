<?php
session_start();

include "../includes/db.php";


if(!isset($_SESSION['admin']))
{
    header("location:login.php");
    exit();
}


$page_title = "Admin Dashboard";


include __DIR__ . '/../includes/header.php';


// Count places

// Count Places

$place_count = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM places"
);

$place_data = mysqli_fetch_assoc($place_count);

$total_places = $place_data['total'];


// Count categories

// Count Categories

$category_count = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM category"
);

$category_data = mysqli_fetch_assoc($category_count);

$total_categories = $category_data['total'];

?>



<div class="detail-head">

<div>

<p class="eyebrow">
    Signed in as <?= htmlspecialchars($_SESSION['admin_username'] ?? $_SESSION['admin'] ?? 'Admin') ?>
</p>


<h1>

Admin Dashboard

</h1>


</div>

</div>





<div class="row">


<div class="card">

<h2>
<?= $total_places ?>
</h2>

<p>
Total Tourist Places
</p>

</div>



<div class="card">

<h2>
<?= $total_categories ?>
</h2>

<p>
Total Categories
</p>

</div>


</div>





<div class="admin-buttons">


<a class="btn solid" href="add_place.php">

➕ Add New Place

</a>






<a class="btn" href="manage_places.php">

📍 Manage Places

</a>



<a class="btn" href="manage_categories.php">

📂 Manage Categories

</a>



<a class="btn" href="../index.php">

🌐 View Website

</a>



</div>



<?php

include __DIR__ . '/../includes/footer.php';

?>