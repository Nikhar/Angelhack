<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['title'])) {
 
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $city = $_POST['city'];
    $tag_1 = $_POST['tag_1'];
    $tag_2 = $_POST['tag_2'];
    $tag_3 = $_POST['tag_3'];
    $votes = 0;
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO causes (`id`, `title`, `description`, `image`, `city`, `tag_1`, `tag_2`, `tag_3`, `votes`, `timestamp`) VALUES (NULL, '$title', '$description', '$image', '$city', '$tag_1', '$tag_2', '$tag_3', '$votes', CURRENT_TIMESTAMP);");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>
