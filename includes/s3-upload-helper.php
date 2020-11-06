<?php

define('KB', 1024);
define('MB', 1048576);

require '../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

if (!isset($_POST['s3-submit'])) {
    header("Location: ../s3-frontend.php?error=NotUploadings3Image");
    exit();
}

$bucketName = "gardengurus-s3";

$file = $_FILES['s3-image'];
$file_name = $file['name'];
$file_tmp_name = $file['tmp_name'];
$file_error = $file['error'];
$file_size = $file['size'];

$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
$allowed = array('jpg', 'jpeg', 'png', 'svg');

if ($file_error !== 0) {
    header("Location: ../s3-frontend.php?error=UploadError");
    exit();
}

if (!in_array($ext, $allowed)) {
    header("Location: ../s3-frontend.php?error=InvalidImageType");
    exit();
}

if ($file_size > 16 * MB) {
    header("Location: ../s3-frontend.php?error=FileSizeExceeded");
    exit();
}

try {
    $s3Client = new S3Client([
        'version' => 'latest',
        'region' => 'us-east-1',
        'credentials' => [
            'key' => '',
            'secret' => ''
        ]
    ]);

    $result = $s3Client->putObject([
        'Bucket' => $bucketName,
        'Key' => 'test_uploads/' . uniqId('', true) . '.' . $ext,
        'SourceFile' => $file_tmp_name,
        'ACL' => 'public-read'
    ]);

    echo 'Success: Photo URL: ' . $result->get('ObjectURL');

} catch (Aws\S3\Exception\S3Exception $e) {
    die('Error uploading file: ' . $e->getMessage());
}
