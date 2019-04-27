<?php
function get_movies() {
    global $db;
    $query = 'SELECT * FROM movies WHERE is_deleted = 0
              ORDER BY id';
    $statement = $db->prepare($query);
    $statement->execute();
    $movies = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $movies;
}

function get_movies_by_genre($genre) {
    global $db;
    $query = 'SELECT * FROM movies
              WHERE movies.genre = :genre AND is_deleted = 0
              ORDER BY id';
    $statement = $db->prepare($query);
    $statement->bindValue(":genre", $genre);
    $statement->execute();
    $movies = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $movies;
}
function get_movie($id) {
    global $db;
    $query = 'SELECT * FROM movies
              WHERE id = :id AND is_deleted = 0';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $movie = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $movie;
}

/**
 * use soft delete
 * @param $id
 */
function delete_movie($id, $admin_id) {
    global $db;
    $query = "UPDATE movies 
              set is_deleted = 1, admin_id = :adminID 
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue('adminID', $admin_id);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function add_movie($genre, $title, $director, $year, $price, $runtime, $admin_id) {
    global $db;
    $query = 'INSERT INTO movies
                 (genre, title, director, year, price, runtime, admin_id)
              VALUES
                 (:genre, :title, :director, :year, :price, :runtime, :adminID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre', $genre);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':director', $director);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':runtime', $runtime);
    $statement->bindValue(':adminID', $admin_id);
    $statement->execute();
    $statement->closeCursor();
}

function update_movie($id, $genre, $title, $director,$year, $price, $admin_id) {
    global $db;
    $query = "UPDATE movies 
              set genre = :genre, title = :title, director = :director, year = :year, price = :price, admin_id = :adminID 
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':genre', $genre);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':director', $director);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':adminID', $admin_id);
    $statement->execute();
    $statement->closeCursor();
}

function purchase_movie($user_id, $movie_id)
{
    global $db;
    $query = 'INSERT INTO user_movie_rlt
                 (userID, movieID, buy_time)
              VALUES
                 (:user_id, :movie_id, :buy_time)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':movie_id', $movie_id);
    $statement->bindValue(':buy_time', date('Y-m-d H:i:s', time()));
    $statement->execute();
    $statement->closeCursor();
}

function get_user_bought_movies($user_id)
{
    global $db;
    $query = 'SELECT * FROM `user_movie_rlt` left join movies on movieID=movies.id
              where userID = :user_id and is_deleted = 0';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $movies = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $movies;
}
