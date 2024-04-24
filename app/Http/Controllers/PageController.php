<?php

namespace App\Http\Controllers;

use App\Http\Resources\PageResource;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class PageController extends Controller {
	/**
	 * Cleans slugs of non-url safe characters
	 * 
	 * @param string $slug
	 *  
	 * @return string $slug
	 */
	public function cleanSlugs( string $slug ): string {
		$slug = str_replace( '/', '', $slug );
		$slug = str_replace( ',', '', $slug );
		$slug = str_replace( '.', '', $slug );
		$slug = str_replace( ' ', '-', $slug );
		e( $slug );

		return $slug;
	}

	/**
	 * Stores new pages in the DB
	 * 
	 * @param Request
	 * 
	 * @return void
	 */
	public function store( Request $request ): void {
		Page::updateOrCreate( [ 
			'page_slug' => $this->cleanSlugs( $request->page_slug ),
		], [ 
			'text_contents' => json_encode( $request->text_contents ),
			'name' => e( $request->name ),
			'author' => auth()->user()->name,
		] );
	}

	/**
	 * Get page contents by slug.
	 * 
	 * @param string
	 * 
	 * @return array
	 */
	public function index( ?string $slug ): array {
		return Page::select( 'name', 'author', 'page_slug', 'text_contents' )->where( 'page_slug', $slug )->get()->toArray();
	}

	/**
	 * Generate content for page views.
	 * 
	 * @param string
	 * 
	 * @return mixed
	 */
	public function generate( ?string $slug ): mixed {
		$resource = new PageResource( Page::findOrFail( $slug ) );
		if ( View::exists( 'index' ) )
		{
			return view( 'index', [ 'page_meta' => [ 
				'name' => $resource['name'],
				'author' => $resource['author'],
			], 'content' => json_decode( $resource['text_contents'], true ) ] );
		}
		$GLOBALS['page'] = [ 'page_meta' => [ 
			'name' => $resource['name'],
			'author' => $resource['author'],
		], 'content' => json_decode( $resource['text_contents'], true ) ];

		return require public_path( 'includes/themes/' . env( 'ACTIVE_THEME' ) . '/index.php' );
	}

	/**
	 * Get all pages for table. 
	 * 
	 * @return LengthAwarePaginator
	 */
	public function getAllPages(): LengthAwarePaginator {
		return Page::select( [ 'name', 'page_slug', 'text_contents', 'author', 'created_at' ] )->paginate( 25 );
	}

	public function deletePage( string $slug ): void {
		Page::select()->where( 'page_slug', $slug )->delete();
	}
}