<?php
    require 'db.php';
    if (isset($_POST["submit_points"])) {
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        
        $query = "INSERT INTO `markers` (`lat`, `lng`) 
        VALUES ('$latitude', '$longitude')";
        mysqli_query($conn, $query);

        // echo "data added";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location</title>
</head>

<body onload = "getLocation();">
<form method="Post" class= "myForm">
    <input type="text" name="latitude" placeholder="Enter latitude"> <br>
    <input type="text" name="longitude" placeholder="Enter longitude"> <br>
    <input type="submit" name="submit_points">
</form>
<script type= "text/javascript">
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }
    function showPosition(position) {
        document.querySelector('.myForm input[name= "latitude"]').value =position.coords.latitude;
        document.querySelector('.myForm input[name= "longitude"]').value =position.coords.longitude;
    }
</script>
<br>
<?php
$rows = mysqli_query($conn, "SELECT * FROM `markers` ORDER BY id DESC ");
        foreach ($rows as $row) {
            ?>
            <iframe width="100%" height="500px" src="https://maps.google.com/maps?q=
                <?php echo $latitude;?>,
                <?php echo $longitude; ?>&output=embed">
            </iframe>
            <?php
        }
    
?>
</body>
</html>