<?php

// Pages
Route::get('/', ['as'=>'home','uses'=>'PagesController@index']);
Route::get('dekouvri', ['as'=>'discover','uses'=>'PagesController@discover']);
Route::get('dekouvri/mizik', ['as'=>'discover.music','uses'=>'PagesController@discoverMusic']);
Route::get('dekouvri/videyo', ['as'=>'discover.video','uses'=>'PagesController@discoverVideo']);
Route::get('/cheche', ['as' => 'search','uses' => 'SearchController@getIndex']);
Route::get('/kondisyon-itilizasyon', 'PagesController@index');
Route::get('/tem', 'PagesController@index');

// Playlists
Route::get('lis', ['as'=>'playlists','uses' => 'PlaylistsController@index']);
Route::get('lis/kreye', ['as'=>'playlists.create','uses' => 'PlaylistsController@getCreate']);
Route::get('lis/{playlist}/modifye', ['as'=>'playlist.edit','uses' => 'PlaylistsController@edit']);
Route::get('lis/{playlist}/mizik', ['as'=>'playlist.musics','uses' => 'PlaylistsController@listMusics']);
Route::get('lis/{id}/{slug}', ['as'=>'playlist.show','uses' => 'PlaylistsController@show']);
Route::post('lis/kreye', ['as'=>'playlist.create','uses' => 'PlaylistsController@postCreate']);
Route::post('lis/{playlist}/ajoute/{music}', ['as'=>'playlist.add','uses' => 'PlaylistsController@postAddMusic']);
Route::put('lis/{playlist}/modifye', ['as'=>'playlist.update','uses' => 'PlaylistsController@update']);
Route::delete('lis/{playlist}', ['as'=>'playlist.delete','uses' => 'PlaylistsController@destroy']);
Route::delete('lis/{playlist}/{music}', ['as'=>'playlist.removeMusic','uses' => 'PlaylistsController@removeMusic']);

// Registration / Login
Route::get('koneksyon', ['as' => 'login','uses' => 'UsersController@getLogin']);
Route::post('koneksyon', ['as' => 'login','uses' => 'UsersController@postLogin']);
Route::get('koneksyon/facebook', ['as'=>'facebook.login','uses'=>'UsersController@facebookRedirect']);
Route::get('koneksyon/twitter', ['as'=>'twitter.login','uses' => 'UsersController@twitterRedirect']);
Route::get('koneksyon/facebook/callback', 'UsersController@handleFacebookCallback');
Route::get('koneksyon/twitter/callback', 'UsersController@handleTwitterCallback');
Route::get('dekoneksyon', ['as' => 'logout','uses' => 'UsersController@getLogout']);
Route::get('anrejistre', ['as' => 'register','uses' => 'UsersController@getRegister']);
Route::post('anrejistre', ['as'=>'post.register','uses' => 'UsersController@store']);

// Password resets routes
Route::get('modpas/reyinisyalize/{token?}',['as' => 'password.reset.init','uses' => 'Auth\PasswordController@showResetForm']);
Route::post('modpas/imel', ['as' => 'password.reset.email','uses' => 'Auth\PasswordController@sendResetLinkEmail']);
Route::post('modpas/reyinisyalize', ['as' => 'password.reset.process','uses' => 'Auth\PasswordController@reset']);

// Feed routes
Route::get('feed/mizik', ['as' => 'feed.music','uses' => 'FeedController@musics']);
Route::get('feed/videyo', ['as'=>'feed.video','uses' =>'FeedController@videos']);

// Users routes
Route::get('tout-itilizate-yo', ['as' => 'users','uses' => 'UsersController@index']);
Route::group(['prefix' => 'kont','as' =>'user.'], function() {
	Route::get('/', [		'as' => 'index','uses' => 'UsersController@getUser']);
	Route::get('mizik', ['as' => 'musics','uses' => 'UsersController@getUserMusics']);
	Route::get('videyo', ['as' => 'videos','uses' => 'UsersController@getUserVideos']);
	Route::get('lis', ['as' => 'playlists','uses' => 'UsersController@playlists']);
	Route::get('modifye/{user?}', ['as' => 'edit','uses' => 'UsersController@edit']);
	Route::put('modifye/{user?}', ['as' => 'update','uses' => 'UsersController@update']);
	Route::delete('efase/{user}', ['as' => 'delete','uses' => 'UsersController@destroy']);
	Route::get('mizik-mwen-achte', ['as' => 'bought','uses' => 'UsersController@boughtMusics']);
});
Route::get('@{id}', ['as' => 'user.public','uses' => 'UsersController@getUserPublic']);
Route::get('@{username}', ['as' => 'user.public','uses' => 'UsersController@getUserName']);
Route::get('@{id}/mizik', ['as' => 'user.public.musics','uses' => 'UsersController@getUserMusics']);
Route::get('@{username}/mizik', ['as' => 'user.public.musics','uses' => 'UsersController@getUserMusics']);
Route::get('@{id}/videyo', ['as' => 'user.public.videos','uses' => 'UsersController@getUserVideos']);
Route::get('@{username}/videyo', ['as' => 'user.public.videos','uses' => 'UsersController@getUserVideos']);
Route::get('@{id}/lis', ['as' => 'user.public.playlists','uses' => 'UsersController@playlists']);
Route::get('@{username}/lis', ['as' => 'user.public.playlists','uses' => 'UsersController@playlists']);


// Categories routes
Route::group(['prefix' => 'kategori'], function() {
	Route::get('{slug}', [	'as' => 'cat.show','uses' => 'CategoryController@show']);
	Route::get('{slug}/mizik', [	'as' => 'cat.music','uses' => 'CategoryController@musics']);
	Route::get('{slug}/videyo', [	'as' => 'cat.video','uses' => 'CategoryController@videos']);
});

// Musics routes
Route::get('mizik', ['as' => 'music','uses' => 'MusicController@index']);
Route::get('mizik/{music}/modifye',['as' => 'music.edit','uses' => 'MusicController@edit']);
Route::put('mizik/{music}/modifye',['as' => 'music.update','uses' => 'MusicController@update']);
Route::post('mizik/{id}/imel-twit',['as' => 'music.emailAndTweet','uses' => 'MusicController@emailAndTweet']);
Route::get('mizik/{id}/{slug?}',['as' => 'music.show','uses' => 'MusicController@show']);
Route::get('telechaje/mizik/{music}', ['as' => 'music.get','uses' => 'MusicController@getMusic']);
Route::delete('efase/mizik/{music}', ['as' => 'music.delete','uses' => 'MusicController@destroy']);
Route::get('mete/mizik', ['as' => 'music.upload','uses' => 'MusicController@upload']);
Route::get('jwe/mizik/{music}', ['as' => 'music.play','uses' => 'MusicController@play']);
Route::get('achte/mizik', ['as' => 'buy.list', 'uses' => 'MusicController@listBuy']);
Route::get('achte/mizik/{music}', ['as' => 'buy.show', 'uses' => 'MusicController@getBuy']);
Route::post('achte/mizik/{music}', ['as' => 'buy.post','uses' => 'MusicController@postBuy']);
Route::post('mete/mizik', ['as' => 'music.store', 'uses' => 'MusicController@store']);

// Video routes
Route::get('videyo', ['as' => 'video','uses' => 'VideoController@index']);
Route::get('videyo/{video}/modifye',['as' => 'video.edit','uses' => 'VideoController@edit']);
Route::put('videyo/{video}/modifye',['as' => 'video.update','uses' => 'VideoController@update']);
Route::get('videyo/{id}/{slug?}', ['as' => 'video.show','uses' => 'VideoController@show']);
Route::get('telechaje/videyo/{id}', ['as' => 'video.get','uses' => 'VideoController@getVideo']);
Route::delete('efase/videyo/{video}', ['as' => 'video.delete','uses' => 'VideoController@destroy']);
Route::get('mete/videyo', ['as' => 'video.upload','uses' => 'VideoController@upload']);
Route::post('videyo', ['as' => 'video.store','uses' => 'VideoController@store']);

// Admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	Route::get('kategori', ['as' => 'cat','uses' => 'CategoryController@getCreate']);
	Route::post('kategori', [	'as' => 'cat','uses' => 'CategoryController@postCreate']);
	Route::delete('kategori/efase/{id}', [	'as' => 'cat.delete','uses' => 'CategoryController@destroy']);
	Route::get('kategori/{category}/modifye', [	'as' => 'cat.edit','uses' => 'CategoryController@edit'])
;
	Route::put('kategori/{category}/modifye', [	'as' => 'cat.update','uses' => 'CategoryController@update']);
	Route::get('/', [	'as' => 'index','uses' => 'AdminController@index']);
	Route::get('mizik', [	'as' => 'music','uses' => 'AdminController@musics']);
	Route::get('videyo', [	'as' => 'video','uses' => 'AdminController@videos']);
	Route::get('lis', [	'as' => 'playlists','uses' => 'AdminController@playlists']);
	Route::get('itilizate', ['as' => 'users','uses' => 'AdminController@users']);
});

// Route::get('test', function() {
// 	$music = App\Models\Music::find(198);
// 	return $music->load('user');
// });