<?php
// Read CSV file
$csv_file = 'registrations.csv';
if (!file_exists($csv_file)) {
    echo "<p>No data available.</p>";
    exit();
}

$file = fopen($csv_file, 'r');

// Display data in a table
echo '<table style="border-collapse: collapse; ">';
echo '<thead><tr><th style="border: 1px solid black;padding:5px">Name</th><th style="border: 1px solid black;padding:5px">Username</th><th style="border: 1px solid black;padding:5px">Email</th><th style="border: 1px solid black;padding:5px">Phone</th><th style="border: 1px solid black;padding:5px">College</th><th style="border: 1px solid black;padding:5px">Project Title</th><th style="border: 1px solid black;padding:5px">Project Description</th></tr></thead>';
echo '<tbody>';

while (($data = fgetcsv($file)) !== FALSE) {
    echo '<tr>';
    foreach ($data as $value) {
        echo '<td style="border: 1px solid black;padding:5px">' . $value . '</td>';
    }
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

fclose($file);
?>
