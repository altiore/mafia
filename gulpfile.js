var elixir = require('laravel-elixir');
var elixirTypscript = require('elixir-typescript');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.Чтобы включить программу чтения с экрана, нажмите быстрые клавиши Ctrl+Alt+Z.. Для просмотра списка быстрых клавиш нажмите быстрые клавиши Ctrl+косая черта..
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
});

elixirTypscript(function(mix) {
    mix.typescript('app.ts');
});
