<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PageRouteController;
use App\Http\Controllers\SiteSetupController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Base route calls the PageRouteController class, which will redirect based on the incomming request.
Route::get( '/{slug?}', function (?string $slug = '') {
	if ( ! $slug )
	{
		$slug = env( 'DEFAULT_PAGE', 'homepage' );
	}
	$controller = new PageRouteController( $slug );
	return $controller->handle();
} );

Route::middleware( [ 
	'auth:sanctum',
	config( 'jetstream.auth_session' ),
	'verified',
] )->group( function () {
	Route::prefix( 'admin' )->group( function () {
		Route::get( '/dashboard', function () {
			return view( 'dashboard' );
		} )->name( 'dashboard' );
		Route::get( '/editor/{page_slug?}', function ($page_slug = null) {
			$controller = new PageController();

			return view( 'editor', [ 'exists' => 'false', 'page_meta' => null, 'page_data' => $controller->index( $page_slug ) ] );
		} )->name( 'editor.page_slug' );
		Route::get( '/settings', function () {
			$templates = array_diff( scandir( app()->environmentPath() . '/includes/themes', SCANDIR_SORT_DESCENDING ), [ '.', '..' ] );
			return view( 'settings', [ 'templates' => $templates ] );
		} )->name( 'settings.index' );
	} );
	Route::prefix( 'actions' )->group( function () {
		Route::post( 'set-app-name', function (Request $request) {
			$controller = new SiteSetupController();
			$controller->changeAppName( $request->app_name );
			return back();
		} )->name( 'actions/set-app-name' );
		Route::post( 'set-active-theme', function (Request $request) {
			$controller = new SiteSetupController();
			$controller->changeActiveTheme( $request->active_theme );
			return back();
		} )->name( 'actions/set-active-theme' );
		Route::post( 'set-site-logo', function (Request $request) {
			SiteSetupController::changeSiteLogo( $request );
			return back();
		} )->name( 'actions/set-site-logo' );
		Route::post( 'create-new-user', function (Request $request) {
			$controller = new SiteSetupController();
			$controller->addNewUser( [ 'user_name' => $request->user_name, 'user_email' => $request->user_email, 'user_pass' => $request->user_pass ] );
			return back();
		} )->name( 'actions/create-new-user' );
		Route::post( 'set-app-root', function (Request $request) {
			SiteSetupController::setActiveRoot( $request->input( 'root' ) );
			return back();
		} )->name( 'actions/set-app-root' );
	} );
	Route::post( '/new-user', function (Request $request) {
		$controller = new UserController;
		$controller->Create( [ 'name' => $request->name, 'email' => $request->new_email, 'password' => $request->new_password ] );
	} )->name( 'new-user' );
	Route::post( '/create-new', [ PageController::class, 'store' ] )->name( 'create-new' );
	Route::delete( '/remove/{slug?}', function (?string $slug = null) {
		$controller = new PageController();
		$controller->deletePage( $slug );
	} );
	Route::prefix( 'tools' )->group( function () {
		Route::get( 'dump-db', function () {
			SiteSetupController::dumpDatabase();
			return back();
		} )->name( 'tools/dump' );
	} );
} );