<?php
include "connection.php";
$con = mysqli_connect($server, $username, $password, $database) or die ("Could not connect: ");
if(! $con ) {
            die('Could not connect: ' . mysql_error());
         }
         



$pickup=$_POST['pickup'];
$destination=$_POST['destination'];
$courier_name=$_POST['courier_name'];
$cost=$_POST['cost'];
$sender_name=$_POST['sender_name'];
$sender_phone=$_POST['sender_phone'];
$Reciever_Name=$_POST['Reciever_Name'];
$Reciever_phone=$_POST['Reciever_phone'];
$imei=$_POST['imei'];
$courier_id=$_POST['courier_id'];


$inserts="INSERT INTO requested (pickup,destination,courier_name,cost,sender_name,sender_phone,Reciever_Name,Reciever_phone,imei) VALUES ('".addslashes($pickup)."','".addslashes($destination)."','".addslashes($courier_name)."','".addslashes($cost)."','".addslashes($sender_name)."','".addslashes($sender_phone)."','".addslashes($Reciever_Name)."','".addslashes($Reciever_phone)."','".addslashes($imei)."')";
$q=mysqli_query($con,$inserts);
if ($q) {
$data=array();
 $s =   mysqli_query($con,"select phone from couriers where courier_id = '$courier_id' ");
 while ($row=mysqli_fetch_array($s)){
 $phoneNos=$row['phone'];
 $key = "m2hVknuXeFXfroboNtNR1RJlH";  // Remember to put your own API Key here
$phoneNo = $phoneNos;
$message = "new delivery request from '$sender_name' to confirm this pickup request, visit www.yenkorapp.com/clients/clients.php";
$sender_id = "yenkor"; //11 Characters maximum
$date_time = date( 'Y-m-d H:i:s');

//encode the message
$msg = urlencode($message);

//prepare your url
$url = "https://apps.mnotify.net/smsapi?"
            . "key=$key"
            . "&to=$phoneNo"
            . "&msg=$message"
            . "&sender_id=$sender_id"
            . "&date_time=$date_time";
$response = file_get_contents($url) ;
}
   
} else {
    
    echo "error";
var_dump($q);
}

?>