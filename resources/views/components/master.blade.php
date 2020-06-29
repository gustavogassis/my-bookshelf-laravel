<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css" />
        @yield('scripts-head')
    </head>
    <body>
        <div class="container">
            <header class="header">
                <h1><a href="/books" class="header__logo">My Bookshelf</a></h1>
            </header>
            <main class="content">
                {{ $slot }}
            </main>
            <footer class="footer footer__dashboard">
                <p class="footer__text">&copy2020 Copyright: mybookshelf.com</p>
            </footer>
        </div>

        @yield('scripts-bottom')
    </body>
</html>