<?php

namespace App\Console\Commands;

use App\Models\general\Organisation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use OrganisationStyleHelper;

class CompileOrganisationThemes extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'organisations:compile';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Generate all the organisations stylesheets';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $this->info("Compiling organisations themes.");
    $organisations = Organisation::all();

    $bar = $this->output->createProgressBar(count($organisations));

    foreach ($organisations as $organisation) {
      $output = OrganisationStyleHelper::load($organisation->color);
      Storage::disk('css')->put("organisations/organisation" . $organisation->id . ".css", $output);

      $bar->advance();
    }
    $bar->finish();
//    $bar->clear();
    $this->info("\norganisations themes compiled successfully.");
  }
}
