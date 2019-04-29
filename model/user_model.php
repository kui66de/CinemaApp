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

function add_user($userName, $password, $nick_name) {
    global $db;
    $query = 'INSERT INTO users
                 (userName, userPassword, nickName)
              VALUES
                 (:userName, :userPassword, :nickName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $userName);
    $statement->bindValue(':userPassword', $password);
    $statement->bindValue(':nickName', $nick_name);
    $statement->execute();
    $statement->closeCursor();
}