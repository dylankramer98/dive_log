<?php

/**
 * connects to the database and sets the attribute
 * @param $dbName, the name of the db to connect to
 * @return PDO, the db connection
 */

function connect_to_db($dbName)
{
    $db = new PDO('mysql:host=db;dbname=' . $dbName, 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * using the db connection provided select the items from the db and return as an associative array
 * @param PDO $db, the database to extract from
 *
 * @return array, the associative array of the items
 *
 */

function extract_from_db(PDO $db): array
{
    $query = $db->prepare('SELECT `dive#`, `location`, `depth`, `type`, `activity`, `temperature`, `visability`, `air`, `weight`, `equipment`, `bottom_time`, `level`, `notes`, `photo` FROM `dives` JOIN `locations` ON `dives` `id` = `dive_location`.`id`;');
    $query->execute();
    return $query->fetchAll();
}

/**
 * takes items from an array and returns the values within HTML
 * @param array $dataFromQuery, array of data from database
 *
 * @return string, return an string of html
 *
 */

function addItemToHTML(array $dataFromQuery): string
{
    $result = '';
    foreach ($dataFromQuery as $itemFromQuery) {
        if (
            (isset($itemFromQuery['dive#'])) &&
            (isset($itemFromQuery['location'])) &&
            (isset($itemFromQuery['depth'])) &&
            (isset($itemFromQuery['type'])) &&
            (isset($itemFromQuery['activity'])) &&
            (isset($itemFromQuery['temperature'])) &&
            (isset($itemFromQuery['visability'])) &&
            (isset($itemFromQuery['air'])) &&
            (isset($itemFromQuery['weight'])) &&
            (isset($itemFromQuery['equipment'])) &&
            (isset($itemFromQuery['bottom_time'])) &&
            (isset($itemFromQuery['level'])) &&
            (isset($itemFromQuery['notes'])) &&
            (isset($itemFromQuery['photo']))
        ) {
            $result .=
                '<div class = "itemContainer">
                <h2>Dive#: ' . $itemFromQuery['dive#'] . '</h2>
                <p>Location: ' . $itemFromQuery['location'] . '</p>
                <p>Depth:ft ' . $itemFromQuery['depth'] . '</p>
                <p>Type ' . $itemFromQuery['type'] . '</p>
                <p>Activity ' . $itemFromQuery['activity'] . '</p>
                <p>Temperature:*C ' . $itemFromQuery['temperature'] . '</p>
                <p>Visability:ft ' . $itemFromQuery['visability'] . '</p>
                <p>Air:psi ' . $itemFromQuery['air'] . '</p>
                <p>Weight:lbs ' . $itemFromQuery['weight'] . '</p>
                <p>Equipment ' . $itemFromQuery['equipment'] . '</p>
                <p>Bottom_Time ' . $itemFromQuery['bottom_time'] . '</p>
                <p>Level ' . $itemFromQuery['level'] . '</p>
                <p>Equipment ' . $itemFromQuery['equipment'] . '</p>
                <p>Notes ' . $itemFromQuery['notes'] . '</p>
                <p>Photo <img src="' . $itemFromQuery['photo'] . '" alt="image of diving"></p> </div>';
        }
    }

    return $result;
}

/**
 * extracts the dive_location and  ids from the database and returns them in an associative array
 * @param PDO $db , the database to extract from
 *
 * @return array array of the brands and their ids
 */

function extract_dive_location_from_db(PDO $db): array
{
    $query = $db->prepare('SELECT `id`,`dive_location` FROM `locations`;');
    $query->execute();
    return $query->fetchAll();

}