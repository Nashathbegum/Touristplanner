<?php

session_start();

include "../includes/db.php";


if(isset($_POST['login']))
{

$username=$_POST['username'];

$password=$_POST['password'];



$query="

SELECT * FROM admin

WHERE username='$username'

AND password='$password'

";


$result=mysqli_query($conn,$query);



if(mysqli_num_rows($result)>0)

{

$_SESSION['admin']=$username;

header("location:dashboard.php");

}

else

{

$error="Invalid Username or Password";

}


}

?>


<!DOCTYPE html>

<html>

<head>

<title>
Admin Login
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">


</head>



<body class="bg-light">


<div class="container mt-5">


<div class="col-md-5 mx-auto card p-4 shadow">


<h2 class="text-center text-success">

Admin Login

</h2>



<?php

if(isset($error))
echo "<p class='text-danger'>$error</p>";

?>



<form method="POST">


<input type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>



<input type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>




<button name="login"
class="btn btn-success w-100">

Login

</button>



</form>



</div>


</div>


</body>

</html>