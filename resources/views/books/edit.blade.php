<x-master>

<h2 class="content__title">Edição de Livros</h2>

@if($errors->all())
    <ul class="alert alert--error">
        @foreach ($errors->all() as $message)
            <li>{!! $message !!}</li>
        @endforeach
    </ul>
@endif

<div class="form">
    <form action="/books/{{ $book->id }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf

        <input type="hidden" name="cover" value="{{ $book->cover }}" />

        <div class="form__group">
            <label class="form__label" for="title">Título</label>
            <div class="form__value">
                <input type="text" class="form__control" name="title" id="title" value="{{ $book->title }}" autofocus />
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="author">Autor(es)</label>
            <div class="form__value">
                <input type="text" class="form__control" name="author" id="author" value="{{ $book->author }}" />
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="pages">Número de páginas</label>
            <div class="form__value">
                <input type="number" pattern="[0-9]*" inputmode="numeric" class="form__control form__control--small" name="pages" id="pages" value="{{ $book->pages }}" />
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="genre" >Gênero</label>
            <div class="form__value">
                <select name="genre[]" class="form__control" id="genre" multiple size="4">
                    @foreach ($genres as $genre)
                        <option value="{{$genre }}" {{ in_array($genre, $book->genreInArray) ? 'selected' : '' }}>{{ $genre }}</option>
                    @endforeach
                </select>
                <div class="form__help">Pressione Ctrl para selecionar mais de um gênero</div>
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="nacional">Publicação Nacional?</label>
            <div class="form__value">
                <?php $checked = $book->nacional == 'S' ? "checked" : "" ?>
                <input type="checkbox" class="form__control check__control" name="nacional" id="nacional" {{ $checked }}  />
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="publisher">Editora</label>
            <div class="form__value">
                <input type="text" class="form__control" name="publisher" id="publisher" value="{{ $book->publisher }}" />
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="description">Descrição</label>
            <div class="form__value">
                <textarea name="description" class="form__control" id="description" cols="30" rows="5" >{{ $book->description }}</textarea>
            </div>
        </div>

        <div class="form__action">
            <input type="reset" class="button" value="Limpar">
            <input type="submit" class="button button--primary" value="Atualizar">
        </div>
    </form>
</div>


</x-master>