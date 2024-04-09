<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;

class SiteSetupController extends Controller
{
    protected $envFile = base_path('.env');

    public function WriteToEnv(string $key, mixed $value)
    {
        try {
            file_put_contents($this->envFile, str_replace($key.'=', $key.'='.$value, file_get_contents($this->envFile)));
        } catch (FileNotFoundException $e) {
            $e->getMessage();
        }
    }
}
