<?php
$file = $_GET['file'];
$target_file = "uploads/$file";
if (file_exists($target_file)) {
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename($target_file).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
readfile($target_file);
exit;
} else {
echo "File tidak ditemukan.";
}
?>