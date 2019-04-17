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
function delete_movie($id) {
    global $db;
    $query = "UPDATE movies 
              set is_deleted = 1 
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function add_movie($genre, $title, $director, $year, $price, $runtime) {
    global $db;
    $query = 'INSERT INTO movies
                 (genre, title, director, year, price, runtime)
              VALUES
                 (:genre, :title, :director, :year, :price, :runtime)';
    $statement = $db->prepare($query);
    $statement->bindValue(':genre', $genre);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':director', $director);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':runtime', $runtime);
    $statement->execute();
    $statement->closeCursor();
}

function update_movie($id, $genre, $title, $director,$year, $price) {
    global $db;
    $query = "UPDATE movies 
              set genre = :genre, title = :title, director = :director, year = :year, price = :price 
              WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':genre', $genre);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':director', $director);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':id', $id);
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
