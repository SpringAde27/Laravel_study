<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index');

Route::resource('articles','ArticlesController');

// DB::listen(function ($query) {
//     dump($query->sql);
// });

Route::get('auth/login', function() {
    $credentials = [
        'email' => 'john@example.com',
        'password' => '111111'
    ];

    if ( ! auth()->attempt($credentials) ) {
        return '로그인 정보가 정확하지 않습니다.';
    }

    return redirect('protected');
});

Route::get('mail', function() {
    $article = \App\Article::with('user')->find(1);

    return Mail::send(
        // ['text' => 'emails.articles.created-text'],
        'emails.articles.created-text',
        compact('article'),
        function ($message) use ($article) {
            $message->to('nayuniee27@gmail.com');
            $message->subject('새글이 등록되었습니다.' . $article->title);
            // $message->attach(storage_path('cat.png'));
        }
    );
});

Route::get('markdown', function() {
    $text =<<< EOT
# 마크다운 예제

이 문서는 [마크다운][1]으로 작성했습니다.
화면에는 HTML로 변환되어 출력됩니다.

## 순서 없는 목록

- 첫 번째 항목
- 두 번째 항목[^1]


[1] : http://daringfireball.net/projects/markdown

[^1] : 두 번째 항목_ http://google.com
EOT;
    return app(ParsedownExtra::class)->text($text);

});

Route::get('protected', ['middleware' => 'auth', function() {
    dump( session()->all() );

    // if( ! auth()->check() ) {
    //     return '누구세요?!';
    // }

    return '어서오세요' . auth()->user()->name. '님';
}]);

Route::get('auth/logout', function() {
    auth()->logout();

    return '또 봐요!';
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// 실전 프로젝트 1 - 마크다운 뷰어
Route::get('_docs/{file?}', 'DocsController@show');

Route::get('_docs/images/{image}', 'DocsController@image')
    ->where('image', '[a-zA-Z0-9._-]+-img-[0-9]{2}.png');