<?php
declare(strict_types=1);
namespace App\Core;

use PDO;
use PDOException;

/**
 * DB::conn() — retorna uma conexão PDO única (singleton simples).
 * Configurações lidas de config/config.php.
 */
class DB {
    private static ?PDO $pdo = null;

    public static function conn(): PDO {
        if (!self::$pdo) {
            $cfg = require __DIR__ . '/../../config/config.php';
            $dsn = "mysql:host={$cfg['db']['host']};port={$cfg['db']['port']};dbname={$cfg['db']['name']};charset={$cfg['db']['charset']}";
            try {
                self::$pdo = new PDO($dsn, $cfg['db']['user'], $cfg['db']['pass'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]);
            } catch (PDOException $e) {
                http_response_code(500);
                exit('Erro de conexão com o banco: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
