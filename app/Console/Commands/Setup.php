<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup-camel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Help create your Camel CMS instance.';

    /**
     * This command helps to create a new instance of the Camel CMS. It allows for direct edits to the ".env" file, so it should only be used once.
     */
    public function handle()
    {
        $values = [];
        $this->newLine(3);
        $this->info('Welcome To the Camel CMS setup Tool!');
        $this->newLine(2);
        $site_name = $this->ask('Enter Site Name', "Camel CMS");
        array_push($values, ['site_name' => $site_name]);
        $SUsername = $this->ask("Enter a Super User email: ");
        putenv("SUPER_USER=" . $SUsername);
        $S_password = $this->secret("Enter a Super User password: ");
        putenv("SUPER_PASS=" . $S_password);
        $this->call("db:seed");



    }
}
