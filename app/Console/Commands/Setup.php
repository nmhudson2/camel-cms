<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

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
        $this->call('config:clear');
        $writer = new \MirazMac\DotEnv\Writer(app()->environmentFilePath());
        $values = [];
        $this->newLine(3);
        $this->info('Welcome To the Camel CMS setup Tool!');
        $this->info('This Tool will walk you through setting important environment variables.');
        $this->warn('Running this CLI again may cause irreversible damage to your site. If you need to reset, all databases must be dropped first.');
        $this->warn('These actions are irreversible.');
        $this->error('Do not leave this tool incomplete.');
        $this->newLine(2);
        $site_name = $this->ask('Enter Site Name', "Camel CMS");
        $writer->set('APP_NAME', $site_name);
        $db_name = $this->ask('Enter Database Name (leave blank to copy site name): ', $site_name);
        $writer->set('DB_DATABASE', $db_name);
        array_push($values, ['site_name' => $site_name]);
        $this->info('You will now create a Super User. This username and password will be your initial account, through which all other accounts can be made.');
        $SUsername = $this->ask("Enter a Super User username: ");
        putenv("SUPER_USER=" . $SUsername);
        $this->info('Your Username is: ' . $SUsername . '@app.com. Do not share it with anyone.');
        $S_password = $this->secret("Enter a Super User password: ");
        putenv("SUPER_PASS=" . $S_password);


        $writer->write();

        $this->info('Creating Database . . . ');
        $this->call('migrate');
        $this->info('Creating User . . . ');
        $this->call("db:seed");
        $this->info('Super User created!');
    }
}
