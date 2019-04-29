<?php

include "../model/database.php";


function get_movie_list(){
    $movies = [];
    return json_encode($movies);
}

