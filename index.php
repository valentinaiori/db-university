<h1>GLI STUDENTI</h1>

<?php

define("DB_SERVERNAME", "localhost:3306");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db_university"); 

// Connect

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection

if ($conn && $conn->connect_error){
    echo "Connection failed: ". $conn->connect_error;
}else{
    echo "Connection OK!";
}

$sql = "SELECT `name`, `surname` FROM `students`";
$result = $conn->query($sql);

if($result && $result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>
<div>
    <?php
echo $row['name'], " ", $row['surname'];
?>
</div>

<?php   
    }
} else if($result){
    echo "0 results";
} else{
    echo "query error";
}

$conn->close();

?>