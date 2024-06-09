<?php
// Read CSV file
$csv_file = 'registrations.csv';
if (!file_exists($csv_file)) {
    echo "<p>No data available.</p>";
    exit();
}

$file = fopen($csv_file, 'r');

$data = array();
$headers = fgetcsv($file); // Read the first row as headers

while (($row = fgetcsv($file)) !== FALSE) {
    $row_data = array();
    foreach ($row as $key => $value) {
        $row_data[$headers[$key]] = $value;
    }
    $data[] = $row_data;
}

fclose($file);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-table">
        <div class="title">Admin Page - Registered Users</div>
        <div class="content">
            <?php foreach ($data as $userData): ?>
                <?php include 'UserDataComponent.php'; ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
