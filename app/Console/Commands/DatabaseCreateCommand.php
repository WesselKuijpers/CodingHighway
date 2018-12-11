<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;
use PDOException;

class DatabaseCreateCommand extends Command
{
  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'db:create';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'This command creates a new database';

  /**
   * The console command signature.
   *
   * @var string
   */
  protected $signature = 'db:create';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $database = env('DB_DATABASE', false);

    if (!$database) {
      $this->info('Skipping creation of database as env(DB_DATABASE) is empty');
      return;
    }

    $list = [
      $database,
      "{$database}_course",
      "{$database}_forum",
      "{$database}_general",
    ];

    try {
      $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));

      foreach ($list as $db):
        $pdo->exec(sprintf(
            'CREATE DATABASE IF NOT EXISTS %s ',
            $db)
        );
        $this->info(sprintf('Successfully created %s database', $db));
      endforeach;

    } catch (PDOException $exception) {
      $this->error(sprintf('Failed to create %s database, %s', $database, $exception->getMessage()));
    }
  }

  /**
   * @param  string $host
   * @param  integer $port
   * @param  string $username
   * @param  string $password
   * @return PDO
   */
  private function getPDOConnection($host, $port, $username, $password)
  {
    return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
  }
}