<?php
/**
 * Apollo CMS - Database Connection
 * DB: apollotech | User: root | Pass: (none)
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'apollotech');
define('DB_USER', 'root');          // XAMPP local — sửa trên server qua SSH
define('DB_PASS', '');              // XAMPP local — sửa trên server qua SSH

define('DB_CHARSET', 'utf8mb4');

function get_db(): ?PDO
{
    static $pdo = null;
    if ($pdo !== null)
        return $pdo;
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }
    catch (PDOException $e) {
        // Silently fail — CMS will fallback to JSON
        $pdo = null;
    }
    return $pdo;
}
?>
