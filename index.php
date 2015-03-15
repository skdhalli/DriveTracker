<?php
//echo "Start ..";
try
{
 $m = new MongoClient();
 //echo "Open connection";
 $db = $m->selectDB("DriveTracker");
 //echo "Select DB";
 $coll = $db->selectCollection("acceleration");
 $time = $_GET["time"];
 $acceleration_x = $_GET["a_x"];
 $acceleration_y = $_GET["a_y"];
 $acceleration_z = $_GET["a_z"];
 $uid = $_GET["uid"];
 $doc = array("UID"=>$uid, "Time"=>$time, "Acceleration_X"=>$acceleration_x,
              "Acceleration_Y"=>$acceleration_y, "Acceleration_Z"=>$acceleration_z);
 if(isset($_GET["lat"]) && isset($_GET["lng"]))
 {
   $doc["Lat"] = $_GET["lat"];
   $doc["Lng"] = $_GET["lng"];
   $doc["accuracy"] = $_GET["accuracy"];
   $doc["altitude"] = $_GET["altitude"];
   $doc["altitudeAccuracy"] = $_GET["$altitudeAccuracy"];
   $doc["heading"] = $_GET["heading"];
   $doc["speed"] = $_GET["speed"];
    }
 $coll->insert($doc);
 echo "Successfully inserted document: ";
 var_dump($doc);
}catch(Exception $e)
{   
var_dump($e);
}
?>
