<?php
include "connection.php";
$con = mysqli_connect($server, $username, $password, $database) or die ("Could not connect: ");
if(! $con ) {
            die('Could not connect: ' . mysql_error());
         }
         



$pickup_location=$_POST['pickup'];
$destination=$_POST['destination'];
$courier_name=$_POST['courier_name'];
$trip_cost=$_POST['cost'];
$sender_name=$_POST['sender_name'];
$sender_phone=$_POST['sender_phone'];
$Reciever_Name=$_POST['Reciever_Name'];
$Reciever_phone=$_POST['Reciever_phone'];
$imei=$_POST['imei'];
$clientID=$_POST['courier_id'];
$trip_distance=$_POST['trip_distance'];
$order_payee=$_POST['order_payee'];


$inserts="INSERT INTO requested (pickup_location,destination,courier_name,trip_cost,sender_name,sender_phone,Reciever_Name,Reciever_phone,imei,clientID,trip_distance,order_payee) VALUES ('".addslashes($pickup_location)."','".addslashes($destination)."','".addslashes($courier_name)."','".addslashes($trip_cost)."','".addslashes($sender_name)."','".addslashes($sender_phone)."','".addslashes($Reciever_Name)."','".addslashes($Reciever_phone)."','".addslashes($imei)."','".addslashes($clientID)."','".addslashes($trip_distance)."','".addslashes($order_payee)."')";
$q=mysqli_query($con,$inserts);
if ($q) {
$data=array();
 $s =   mysqli_query($con,"select phone from couriers where clientID = '$clientID' ");
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