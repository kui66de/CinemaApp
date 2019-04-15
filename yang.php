<?php

require('controller/movie.php');
require('controller/user.php');
require('model/database.php');
require('model/movie_model.php');
require('functions.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_movies';
    }
}

switch ($action) {
    case 'list_movies':
        echo getMovies();
        break;
    case 'user_register':
        echo user_register();
}
