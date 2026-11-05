<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use PDO;
use PDOException;

#[Signature('cms:ensure-database')]
#[Description('Buat database MySQL jika belum tersedia')]
class EnsureDatabase extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $connection = (string) config('database.default');
        $config = config("database.connections.{$connection}", []);
        $driver = $config['driver'] ?? '';

        if (! in_array($driver, ['mysql', 'mariadb'], true)) {
            $this->components->info("Driver [{$driver}] tidak memerlukan pembuatan database otomatis.");

            return self::SUCCESS;
        }

        $database = (string) ($config['database'] ?? '');
        $host = (string) ($config['host'] ?? '127.0.0.1');
        $port = (string) ($config['port'] ?? '3306');
        $username = (string) ($config['username'] ?? '');
        $password = (string) ($config['password'] ?? '');
        $charset = (string) ($config['charset'] ?? 'utf8mb4');
        $collation = (string) ($config['collation'] ?? 'utf8mb4_unicode_ci');

        if ($database === '' || ! preg_match('/^[A-Za-z0-9_]+$/', $database)) {
            $this->components->error('Nama database pada .env tidak valid.');

            return self::FAILURE;
        }

        $dsn = "mysql:host={$host};port={$port};charset={$charset}";

        try {
            new PDO(
                "{$dsn};dbname={$database}",
                $username,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT => 5]
            );

            $this->components->info("Database [{$database}] sudah tersedia.");

            return self::SUCCESS;
        } catch (PDOException $exception) {
            if ((int) ($exception->errorInfo[1] ?? 0) !== 1049) {
                $this->components->error('Gagal terhubung ke MySQL: '.$exception->getMessage());

                return self::FAILURE;
            }
        }

        try {
            $pdo = new PDO(
                $dsn,
                $username,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT => 5]
            );

            $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET {$charset} COLLATE {$collation}");

            $this->components->info("Database [{$database}] berhasil dibuat.");

            return self::SUCCESS;
        } catch (PDOException $exception) {
            $this->components->error('Gagal membuat database: '.$exception->getMessage());

            return self::FAILURE;
        }
    }
}
