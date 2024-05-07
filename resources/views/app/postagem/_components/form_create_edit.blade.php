<form method="POST" action="{{ route('healthy.postagem.store') }}">
    @csrf
    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo.</label>
        <input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control" id="titulo" placeholder="Titulo da postagem">
        <p class="text-center">{{ $errors->has('titulo') ? $errors->first('titulo') : '' }}</p>
    </div>
    <div class="mb-3">
        <label for="conteudo" class="form-label">Conteúdo.</label>
        <input type="text" name="conteudo" value="{{ old('conteudo') }}" class="form-control" id="conteudo" placeholder="conteúdo da postagem">
        <p class="text-center">{{ $errors->has('conteudo') ? $errors->first('conteudo') : '' }}</p>
    </div>
    <div class="mb-3">
        <label for="url_img" class="form-label">Imagem.</label>
        <input type="text" name="url_img" value="{{ old('url_img') }}" class="form-control" id="url_img" placeholder="URL da imagem da postagem">
        <p class="text-center">{{ $errors->has('url_img') ? $errors->first('url_img') : '' }}</p>
    </div>
    <div class="mb-3 text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
