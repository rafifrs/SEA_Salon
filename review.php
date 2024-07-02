<?php
    $fullname = $_POST['fullname'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    //database connection 
    $dbreview = new mysqli('localhost', 'root','','test');
    if($dbreview -> connect_error){
        die('Connection Failed : '. $dbreview ->connect_error);
    }else {
        $stmt = $dbreview->prepare("INSERT INTO review(fullname, rating, feedback) values(?,?,?)");
        $stmt -> bind_param("sis", $fullname, $rating, $feedback);
        $stmt->execute();
        echo "Thank You For The Feedback!";
        $stmt->close();
        $dbreview->close();
    }
?>