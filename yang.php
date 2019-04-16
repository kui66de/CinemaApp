<?php

require('controller/movie.php');
require('controller/user.php');
require ('controller/admin.php');
require('model/database.php');
require('model/movie_model.php');
require('model/user_model.php');
require('model/admin_model.php');
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
    case 'get_movie':
        echo get_single_movie();
        break;
    case 'add':
        echo add_new_movie();
        break;
    case 'update':
        echo modify_movie();
        break;
    case 'delete':
        echo del_movie();
        break;
    case 'buy':
        echo buy_movie();
        break;
    case 'user_register':
        echo user_register();
        break;
    case 'user_login':
        echo user_login();
        break;
    case 'user_logout':
        echo user_logout();
        break;
    case 'admin_login':
        echo admin_login();
        break;
    case 'admin_logout':
        echo admin_logout();
        break;
    default:
        echo getMovies();
        break;
}
