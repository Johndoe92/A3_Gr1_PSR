<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/vendor/autoload.php';

$passwordGenerator = new \Web1\StringGenerator\PasswordGenerator();

//echo \Web1\StringGenerator\PasswordGenerator::getRandomString(25, \Web1\StringGenerator\PasswordGenerator::PASSWORD_HARD);


echo \Web1\StringGenerator\PasswordGenerator::getRandomString(50, \Web1\StringGenerator\PasswordGenerator::PASSWORD_EASY);

