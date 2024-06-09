<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $requiredFields = array("name", "username", "email", "phone", "college", "project_title", "project_description");
    $missingFields = array();
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $missingFields[] = $field;
        }
    }

    if (!empty($missingFields)) {
        echo "The following fields are required: " . implode(", ", $missingFields);
        exit();
    }

  
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $college = $_POST["college"];
    $projectTitle = $_POST["project_title"];
    $projectDescription = $_POST["project_description"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit();
    }

  
    $file = fopen("registrations.csv", "a");
    if (!$file) {
        echo "Unable to open file";
        exit();
    }

  
    $data = array($name, $username, $email, $phone, $college, $projectTitle, $projectDescription);

   
    if (!fputcsv($file, $data)) {
        echo "Error writing to file";
        fclose($file);
        exit();
    }

    fclose($file);


    header("Location: successfullPopup.html");
    exit();
} else {
    echo "Form not submitted";
    exit();
}
?>
