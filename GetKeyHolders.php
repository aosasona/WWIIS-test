<?php

$database_user = "root";
$database_password = "";


// Added a try catch block to catch and handle the error if the database connection fails.
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=testdb', $database_user, $database_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM, PDO::ATTR_AUTOCOMMIT => 1, PDO::ATTR_STRINGIFY_FETCHES => 1)); // Changed the host to 127.0.0.1, it was causing an SQLSTATE[HY000] error & preventing the database connection.
} catch (PDOException $e) {
    echo "DB connection failed: " . $e->getMessage();
}

try {
    $query = $pdo->query("SELECT `name`, `key` FROM key_holders WHERE `active` = 1 ORDER BY `order` ASC"); // Added back-ticks - reserved keywords like `order` are used here and are wrongly interpreted causing an SQL error.
    $contacts = $query->fetchAll();

    foreach ($contacts as $contact) {
        // print_r($contact); - to see the actual raw data returned from the database.
        $telephone = $pdo->prepare("SELECT `telephone` FROM `contact_details` WHERE `name` = ?");
        $telephone->execute(array($contact[0])); // It is a multi-dimensional array but the values do not have the field names as keys (as specified in PDO::ATTR_DEFAULT_FETCH_MODE) -- so we need to use the index to access the values.
        $telephone = $telephone->fetchColumn();

        /**
         * Also switched to indexes to access the values - the fields are not used as keys in this case. 
         * print was also used in place of printf; print can only be used with a single argument.
         * printf will not work with \n escape character to display a new line - php won't translate it to a new line on the screen, so I used <br/> instead.
         */
        printf("%s %d %s <br/>", $contact[0], $telephone, $contact[1]);
    }
} catch (Exception $exception) {
    echo "An exception occurred! : " . $exception->getMessage(); // Added this line to display the actual error message instead of a verbose one.
}
