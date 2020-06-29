<x-master>
    
    @section('scripts-head')
        <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
    @endsection

    <h2 class="content__title">Cadastro de Livros</h2>

    <div class="form">

        @if($errors->all())
            <ul class="alert alert--error">
                @foreach ($errors->all() as $message)
                    <li>{!! $message !!}</li>
                @endforeach
            </ul>
        @endif

        <form action="/books" method="POST" enctype="multipart/form-data">
            @csrf
            
            @include('books.form', [
                'genres' => $genres
            ])

        </form>
        
    </div>

    @section('scripts-bottom')
        <script src="/js/auto-complete.js"></script>
    @endsection

</x-master>