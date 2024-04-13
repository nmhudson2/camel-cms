<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public static function changeSiteLogo(Request $request): void
    {
        if (!in_array($request->file('file_upload')->extension(), ['jpeg', 'jpg', 'png'])) {
            return;
        }
        $path = $request->file('file_upload')->storeAs('public/client-logo', $request->file('file_upload')->getClientOriginalName());
        $url = Storage::url($path);
        $writer = new Writer(base_path('.env'));
        $writer
            ->set('SITE_LOGO_PATH', $url)
            ->set('SITE_LOGO_NAME', $request->file('file_upload')->getClientOriginalName())
            ->write();
    }
}
