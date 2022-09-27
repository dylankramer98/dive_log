<?php
require_once '../functions.php';

use PHPUnit\Framework\TestCase;

// Need this to use PHPUnit

class Functions extends TestCase
{

    //Success test
    public function test_location_GivenValidArrayReturnHTML()
    {
        $input = [];
        $input['dive#'] = 1;
        $input['location'] = 'here';
        $input['depth'] = 20;
        $input['type'] = 'coast';
        $input['activity'] = 'dive';
        $input['temperature'] = 20;
        $input['visability'] = 20;
        $input['air'] = 3;
        $input['weight'] = 2;
        $input['equipment'] = 'bag';
        $input['bottom_time'] = '45';
        $input['level'] = 'advanced';
        $input['notes'] = 'fun';
        $input['photo'] = 'url';
        $actual = [$input];
        $expected =   '<div class = "itemContainer">
                <h2>Dive#: ' . $input['dive#'] . '</h2>
                <p>Location: ' . $input['location'] . '</p>
                <p>Depth:ft ' . $input['depth'] . '</p>
                <p>Type ' . $input['type'] . '</p>
                <p>Activity ' . $input['activity'] . '</p>
                <p>Temperature:*C ' . $input['temperature'] . '</p>
                <p>Visability:ft ' . $input['visability'] . '</p>
                <p>Air:psi ' . $input['air'] . '</p>
                <p>Weight:lbs ' . $input['weight'] . '</p>
                <p>Equipment ' . $input['equipment'] . '</p>
                <p>Bottom_Time ' . $input['bottom_time'] . '</p>
                <p>Level ' . $input['level'] . '</p>
                <p>Equipment ' . $input['equipment'] . '</p>
                <p>Notes ' . $input['notes'] . '</p>
                <p>Photo ' . $input['photo'] . '</p> </div>';

        $result = addItemToHTML($actual);
        $this->assertEquals($expected, $result);
    }

    // Failure tests

    public function test_location_GivenEmptyArrayReturnEmptyString()
    {
        // Arrange
        $input = [];
        $expected = '';
        // Act
        $result = addItemToHTML($input);
        // Assert
        $this->assertEquals($expected, $result);
    }

// Malformed tests

    public function test_location_GivenStringThrowError()
    {
        //Arrange
        $input = 'five';
        $this->expectException(TypeError::class);

        //Act
        $result = addItemToHTML($input);
    }

}