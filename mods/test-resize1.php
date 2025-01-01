<?php
// Load the image
$sourcefile = 'res/test/sample1.jpg';
$targetfile = 'res/test/sample1resized.jpg';
$source = imagecreatefromjpeg($sourcefile);
list($width, $height) = getimagesize($sourcefile);

// Define new dimensions (200x200 pixels)
$newWidth = $width/2;
$newHeight = $height/2;

// Create a new image
$thumb = imagecreatetruecolor($newWidth, $newHeight);

// Resize
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

// Save the resized image
imagejpeg($thumb, $targetfile, 100);

die('resized');