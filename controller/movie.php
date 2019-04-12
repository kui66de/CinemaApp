<?php


function getMovies()
{
    $movies = get_movies();
    return success_json($movies);
}

