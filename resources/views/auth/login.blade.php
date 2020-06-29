<!doctype html>
<html lang="pt-br">
    <head>
        <title>My Bookshelf - Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css" />
    </head>
    <body>
        <div class="container">
            <h1 class="login__logo">My Bookshelf</h1>
            <div class="content-login">

                @if($errors->all())
                    <ul class="alert__login alert--error">
                        @foreach ($errors->all() as $message)
                            <li><b>{{ $message }}</b></li>
                        @endforeach
                    </ul>
                @endif

                <div class="login">
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form__group">
                            <label class="form__label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form__control" placeholder="maria@gmail.com" autofocus />
                        </div>


                        <div class="form__group">
                            <label class="form__label" for="senha">Senha</label>
                            <input type="password" name="password" id="senha" class="form__control" />
                        </div>

                        <div class="form__text">
                            <a href="#" class="form__link">Esqueci minha senha</a>
                        </div>

                        <input type="submit" class="button button--primary button--block" value="Entrar" />
                    </form>
                </div>

                <div class="register">
                    <p class="register__text">Ainda não é um usuário?</p>

                    <a class="button button--block" href="#">Cadastre-se</a>
                </div>
            </div>
        </div>
    </body>
</html>