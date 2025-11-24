<?php
require_once("../include/initialize.php");

echo "<h3>Database Connection Test</h3>";

// Test connection
global $mydb;
if ($mydb && $mydb->connection) {
    echo "✓ Database connected<br>";
    echo "Database: " . database_name . "<br><br>";
    
    // Test table exists
    $mydb->setQuery("SHOW TABLES LIKE 'useraccounts'");
    $result = $mydb->executeQuery();
    if ($mydb->num_rows($result) > 0) {
        echo "✓ Table 'useraccounts' exists<br><br>";
        
        // Count users
        $mydb->setQuery("SELECT COUNT(*) as cnt FROM useraccounts");
        $count = $mydb->loadSingleResult();
        echo "✓ Total users: " . $count->cnt . "<br><br>";
        
        // Show sample (without passwords)
        $mydb->setQuery("SELECT ACCOUNT_ID, ACCOUNT_USERNAME, ACCOUNT_TYPE FROM useraccounts LIMIT 3");
        $users = $mydb->loadResultList();
        echo "<strong>Sample users:</strong><br>";
        foreach ($users as $u) {
            echo "- ID: {$u->ACCOUNT_ID}, Username: {$u->ACCOUNT_USERNAME}, Type: {$u->ACCOUNT_TYPE}<br>";
        }
    } else {
        echo "✗ Table 'useraccounts' NOT found<br>";
        echo "<br>Checking all tables:<br>";
        $mydb->setQuery("SHOW TABLES");
        $tables = $mydb->loadResultList();
        foreach ($tables as $t) {
            $tableName = array_values((array)$t)[0];
            echo "- {$tableName}<br>";
        }
    }
} else {
    echo "✗ Database connection failed<br>";
    echo "Host: " . server . "<br>";
    echo "User: " . user . "<br>";
    echo "Database: " . database_name . "<br>";
}
?>
