<div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="rol text-center">{{ $error }}</div>
        @endforeach
    @endif
</div>

