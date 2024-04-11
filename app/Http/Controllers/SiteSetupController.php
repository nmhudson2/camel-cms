<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use MirazMac\DotEnv\Writer;

class SiteSetupController extends Controller
{


    public function changeAppName(string $name): void
    {
        $writer = new Writer(base_path('.env'));
        $writer
            ->set('APP_NAME', $name)
            ->write();
    }

    public function changeActiveTheme(string $theme): void
    {
        $writer = new Writer(base_path('.env'));
        $writer
            ->set('ACTIVE_THEME', $theme)
            ->write();
    }

    public function addNewUser(array $details): void
    {
        User::create([
            'name' => $details['user_name'],
            'email' => $details['user_email'],
            'password' => $details['user_pass']
        ]);
    }
}
