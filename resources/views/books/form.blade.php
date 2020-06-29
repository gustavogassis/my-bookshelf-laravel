<div class="form__group">
    <label class="form__label" for="title">Título</label>
    <div class="form__value">
        <input type="text" class="form__control" name="title" id="title" value="{{ old('title') }}" autofocus />
    </div>
</div>

<div class="form__group">
    <label class="form__label" for="author">Autor(es)</label>
    <div class="form__value">
        <input type="text" class="form__control" name="author" id="author" value="{{ old('author')  }}" />
    </div>
</div>

<div class="form__group">
    <label class="form__label" for="pages">Número de páginas</label>
    <div class="form__value">
        <input type="number" pattern="[0-9]*" inputmode="numeric" class="form__control form__control--small" name="pages" id="pages" value="{{ old('pages')  }}" />
    </div>
</div>

<div class="form__group">
    <label class="form__label" for="genre">Gênero</label>
    <div class="form__value">
        <select name="genre[]" class="form__control" id="genre" multiple size="4">
            @foreach ($genres as $genre)
                <option value="{{ $genre }}" >{{ $genre }}</option>
            @endforeach
        </select>
        <div class="form__help">Pressione Ctrl para selecionar mais de um gênero</div>
    </div>
</div>

<div class="form__group">
    <label class="form__label" for="nacional">Publicação Nacional?</label>
    <div class="form__value">
        <input 
            type="checkbox" 
            class="form__control check__control" 
            name="nacional" id="nacional"
            {{ old('nacional') === "on" ? "checked" : "" }}     
        />
    </div>
</div>

<div class="form__group">
    <span class="form__label">Capa</span>
    <div class="form__value">
        <label class="form__label-file form__control" for="cover">Selecione um arquivo</label>
        <input type="file" class="form__control form__control-file" name="cover" id="cover">
    </div>
</div>

<div class="form__group">
    <label class="form__label" for="publisher">Editora</label>
    <div class="form__value">
        <input type="text" class="form__control" name="publisher" id="publisher" value="{{ old('publisher')  }}" />
    </div>
</div>

<div class="form__group">
    <label class="form__label" for="description">Descrição</label>
    <div class="form__value">
        <textarea name="description" class="form__control" id="description" cols="30" rows="5">{{ old('description')  }}</textarea>
    </div>
</div>

<div class="form__action">
    <input type="reset" class="button" value="Limpar">
    <input type="submit" class="button button--primary" value="Cadastrar">
</div>