<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use MirazMac\DotEnv\Writer;
use Spatie\DbDumper\Databases\MySql;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SiteSetupController extends Controller {


	/**
	 * Write new app name to env
	 * 
	 * @return void 
	 */
	public function changeAppName( string $name ): void {
		$writer = new Writer( base_path( '.env' ) );
		$writer
			->set( 'APP_NAME', $name )
			->write();
	}

	/**
	 * Write active theme to env
	 * 
	 * @return void 
	 */
	public function changeActiveTheme( string $theme ): void {
		$writer = new Writer( base_path( '.env' ) );
		$writer
			->set( 'ACTIVE_THEME', $theme )
			->write();
	}

	/**
	 * Set homepage redirect
	 * 
	 * @param string 
	 * @return void
	 */
	public static function setActiveRoot( string $slug ): void {
		$writer = new Writer( base_path( '.env' ) );
		$writer
			->set( 'DEFAULT_PAGE', $slug )
			->write();
	}
	/**
	 * Write new user to db
	 * 
	 * @return void 
	 */
	public function addNewUser( array $details ): void {
		User::create( [ 
			'name' => $details['user_name'],
			'email' => $details['user_email'],
			'password' => $details['user_pass']
		] );
	}

	/**
	 * Write new logo path to env.
	 * 
	 * @return void 
	 */
	public static function changeSiteLogo( Request $request ): void {
		if ( ! in_array( $request->file( 'file_upload' )->extension(), [ 'jpeg', 'jpg', 'png' ] ) )
		{
			return;
		}
		$path   = $request->file( 'file_upload' )->storeAs( 'public/client-logo', $request->file( 'file_upload' )->getClientOriginalName() );
		$url    = Storage::url( $path );
		$writer = new Writer( base_path( '.env' ) );
		$writer
			->set( 'SITE_LOGO_PATH', $url )
			->set( 'SITE_LOGO_NAME', $request->file( 'file_upload' )->getClientOriginalName() )
			->write();
	}

	public static function dumpDatabase(): StreamedResponse {
		MySql::create()
			->setDbName( env( "DB_DATABASE", 'Camel_CMS' ) )
			->setUserName( env( 'DB_USERNAME', 'Root' ) )
			->setPassword( env( 'DB_PASSWORD', 'r00t' ) )
			->dumpToFile( storage_path( 'app/public/db_dump.sql' ) );
		return Storage::download( 'db_dump.sql', 'db_dump.sql' );
	}
}