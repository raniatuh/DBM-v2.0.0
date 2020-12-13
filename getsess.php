<?php
//getting name form the database and the displaying it through the system
// the session id will select user 
$stmt = $con->prepare('SELECT name FROM users WHERE id = ?');
// In this case we can use the account ID to get the account info.
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();
    $stmt->close();
?>