<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Daftar ekstensi file yang diizinkan
$allowed_file_types = array("jpg", "jpeg", "png", "gif", "zip", "tar.gz", "pdf", "doc", "docx");

// Check if file type is allowed
if (!in_array($fileType, $allowed_file_types)) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, ZIP, TAR.GZ, PDF, DOC, and DOCX files are allowed.";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size (set to 5MB)
if ($_FILES["file"]["size"] > 5000000) { // ukuran maksimal 5MB
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
