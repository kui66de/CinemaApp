<?php
function get_admin_by_name($adminName) {
    global $db;
    $query = 'SELECT * FROM admin WHERE adminName = :adminName';
    $statement = $db->prepare($query);
    $statement->bindValue(":adminName", $adminName);
    $statement->execute();
    $admin = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $admin;
}
