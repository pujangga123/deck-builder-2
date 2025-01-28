<?php

$uploadOk = 1;

if ($token == "card") {
    $deckId = $_POST["deckId"];
    $cardId = $_POST["cardId"];
    $returnUrl = "?p=card.edit&deckId=$deckId&cardId=$cardId";
    $imageFileType = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));

    $target_dir = PATH_DECKS . "$deckId/$cardId/";
    $target_file = $target_dir . "ori.png";
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
}

if ($token == "back") {
}

if ($token == "frame") {
}

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    unlink($target_file);
}

// Check file size
// if ($_FILES["file"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG & PNG";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {    
    if($imageFileType == "jpg" || $imageFileType == "jpeg") {
        imagepng(imagecreatefromstring(file_get_contents($_FILES["file"]["tmp_name"])), $target_file);
        header("location:$returnUrl");
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            header("location:$returnUrl");
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
}
