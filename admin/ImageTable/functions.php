<?php
$db=mysqli_connect("localhost", "root", "", "phpcrud");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
?>