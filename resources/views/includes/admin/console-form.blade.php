
@if ($console->exists)
    <h1 class="text-center mt-5">Edit console: {{ $console->label }}</h1>
    <form method="POST" action="{{ route('admin.consoles.update', $videogame) }}"
        class="text-white bg-dark p-5 rounded mt-5" novalidate>
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.consoles.store') }}" class="text-white bg-dark p-5 rounded mt-5" novalidate>
@endif
@csrf





{{-- Label --}}

<form>
    <div class="mb-3 mt-4">
      <label for="console-label" class="form-label">Label</label>
      <input value="{{ old('label', $console->label) }}" type="text" class="form-control" id="console-label" 
        class="@error('label') is-invalid @enderror" name="console-label" required>
        <div class="form-text">Required</div>
        <div class="invalid-feedback">
            {{ $errors->first('label') }}
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-between ">
        <a class="btn btn-secondary" href="{{ route('admin.consoles.index') }}">Go back</a>
        {{-- # Submit --}}
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </form>