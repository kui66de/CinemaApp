<?php
function get_user_by_name($userName) {
    global $db;
    $query = 'SELECT * FROM users WHERE userName = :userName';
    $statement = $db->prepare($query);
    $statement->bindValue(":userName", $userName);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $user;
}

function add_user($userName, $password) {
    global $db;
    $query = 'INSERT INTO users
                 (userName, userPassword)
              VALUES
                 (:userName, :userPassword)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $userName);
    $statement->bindValue(':userPassword', $password);
    $statement->execute();
    $statement->closeCursor();
}