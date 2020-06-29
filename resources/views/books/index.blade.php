<x-master>
    <h2 class="content__title">Meus Livros</h2>

    @if (session('success'))
        <ul class="alert">
            @foreach (session('success') as $message)
                <li>{!! $message !!}</li>
            @endforeach
        </ul>
    @endif

    <div class="toolbar">
        <a class="button button--primary toolbar__item" href="/books/create">Cadastrar</a>
        <form action="/books/batch " method="post" class="toolbar__item">
            @csrf
            <button class="button button--full hidden" id="delete-all">Apagar selecionados</button>
            <input type="hidden" style="display:none;" name="idLivros" id="idLivros">
        </form>
    </div>

    @if (count($books))
    
        <table class="table">
            <thead class="table__header">
                <tr>
                    <th class="table__data-header">
                        <input type="checkbox" id="select-all" />
                    </th>
                    <th class="table__data-header">Capa</th>
                    <th class="table__data-header">Título</th>
                    <th class="table__data-header">Autor</th>
                    <th class="table__data-header">Gênero</th>
                    <th class="table__data-header">Editora</th>
                    <th class="table__data-header">Páginas</th>
                    <th class="table__data-header">Nacional</th>
                    <th class="table__data-header">Descrição</th>
                    <th class="table__data-header">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    
                    <tr class="table__row">
                        <td data-th="Selecione" class="table__data">
                            <input type="checkbox" class="checkDelete" id="{{ $book->id }}" />
                        </td>
                        <td data-th="Capa" class="table__data">
                            <img src="{{ 'storage/' . $book->cover }}" class="table__img">
                        </td>
                        <td data-th="Título" class="table__data">{{ $book->title }}</td>
                        <td data-th="Autor" class="table__data">{{ $book->author }}</td>
                        <td data-th="Gênero" class="table__data">{{ $book->genreInString }}</td>
                        <td data-th="Editora" class="table__data">{{ $book->publisher }}</td>
                        <td data-th="Páginas" class="table__data">{{ $book->pages }}</td>
                        <td data-th="Nacional" class="table__data">{{ $book->nacional == "S" ? "Sim" : "Não" }}</td>
                        <td data-th="Descrição" class="table__data">{{ $book->shortDescription }}</td>
                        <td data-th="Ações" class="table__data  actions">
                            <form action="/books/{{ $book->id }}" method="get">
                                @csrf
                                <button class="button button--small" type="submit">Visualizar</button>
                            </form>

                            <form action="/books/{{ $book->id }}/edit" method="get">
                                @csrf
                                <button class="button button--small" type="submit">Editar</button>
                            </form>

                            <form action="/books/{{ $book->id }}" method="post">
                                @csrf
                                @method('DELETE')
                            <button class="button button--small">Remover</button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach

            </tbody>
        </table>
    
    @else
        <div class="alert alert--error">Não há nenhum livro cadastrado</div>
    @endif

    {{ $books->links() }}

    

    @section('scripts-bottom')
        <script src="/js/delete-all.js" ></script>
    @endsection
</x-master>
