<x-master>
    <h2 class="content__title">{{ $book->title }}</h2>

    <div class="form">
        <div class="form__group">
            <label class="form__label" for="titulo">Título</label>
            <div class="form__value">
                <div class="form__control form__control--view">
                    {{ $book->title }}
                </div>
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="autor">Autor(es)</label>
            <div class="form__value">
                <div class="form__control form__control--view">
                    {{ $book->author }}
                </div>
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="paginas">Número de páginas</label>
            <div class="form__value">
                <div class="form__control form__control--view">
                    {{ $book->pages }}
                </div>
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="genero" >Gênero</label>
            <div class="form__value">
                <div class="form__control form__control--view">
                    {{ $book->genreInString }}
                </div>
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="nacional">Publicação Nacional?</label>
            <div class="form__value">
                <div class="form__control form__control--view">
                    {{ $book->nacional == 'S' ? 'Sim' : 'Não' }}
                </div>
            </div>
        </div>

        <div class="form__group">
            <span class="form__label">Capa</span>
            <div class="form__value">
                <div class="form__control form__control--view">
                    <img class="table__img" src="{{ '../storage/' . $book->cover }}" />
                </div>
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="editora">Editora</label>
            <div class="form__value">
                <div class="form__control form__control--view">
                    {{ $book->publisher }}
                </div>
            </div>
        </div>

        <div class="form__group">
            <label class="form__label" for="descricao">Descrição</label>
            <div class="form__value">
                <div class="form__control form__control--view">
                    {{ $book->description }}
                </div>
            </div>
        </div>
    </div>
</x-master>

