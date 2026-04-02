<?php
/**
 * Apollo CMS - Database Connection
 * LOCAL:  DB=apollotech, user=root, pass=(empty)
 * SERVER: DB=demo_apollotech, user=demo_demoa3433, pass=Abc.1234
 */

// Detect environment: localhost vs production
$is_local = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1'])
         || ($_SERVER['HTTP_HOST'] ?? '') === 'localhost'
         || strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost') !== false;

if ($is_local) {
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'apollotech');
    define('DB_USER', 'root');
    define('DB_PASS', '');
} else {
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'demo_apollotech');
    define('DB_USER', 'demo_demoa3433');
    define('DB_PASS', 'Abc.1234');
}
define('DB_CHARSET', 'utf8mb4');

function get_db(): ?PDO {
    static $pdo = null;
    if ($pdo !== null) return $pdo;
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    } catch (PDOException $e) {
        // Silently fail — CMS will fallback to JSON
        $pdo = null;
    }
    return $pdo;
}
?>
