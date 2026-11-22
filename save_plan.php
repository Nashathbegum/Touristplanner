<?php

include "includes/db.php";


if(isset($_POST['places']))
{

$visitor=$_POST['visitor'];

$places=$_POST['places'];

$totalDistance=0;

$placeNames=[];


foreach($places as $id)
{

$query="SELECT * FROM places WHERE place_id=$id";

$result=mysqli_query($conn,$query);

$data=mysqli_fetch_assoc($result);


$distance=preg_replace('/[^0-9.]/','',
$data['distance']);


$totalDistance += $distance;


$placeNames[]=$data['place_name'];

}


$placeList=implode(",",$placeNames);


$travelTime=$totalDistance/40;



$sql="

INSERT INTO visit_plans

(visitor_name,place_ids,total_distance,travel_time,created_date)

VALUES

('$visitor',
'$placeList',
'$totalDistance KM',
'$travelTime Hours',
CURDATE())

";



if(mysqli_query($conn,$sql))
{

?>


<div class="container mt-5 text-center">


<h1 class="text-success">

Your Trip Plan Created Successfully 🎉

</h1>


<h3>
Visitor: <?php echo $visitor; ?>
</h3>


<h4>
Places:
</h4>

<p>
<?php echo $placeList; ?>
</p>


<h4>
Total Distance:
<?php echo $totalDistance; ?> KM
</h4>


<h4>
Estimated Time:
<?php echo round($travelTime,1); ?> Hours
</h4>


<button onclick="window.print()"
class="btn btn-primary">

🖨 Print Plan

</button>


</div>


<?php

}

else

{

echo mysqli_error($conn);

}


}

else

{

echo "Please select places";

}

?>