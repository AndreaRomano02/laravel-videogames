@if ($publisher->exists)
    <h1 class="text-center mt-5">Edit publisher: {{ $publisher->label }}</h1>
    <form method="POST" action="{{ route('admin.publishers.update', $publisher) }}"
        class="text-white bg-dark p-5 rounded mt-5" novalidate>
        @method('PUT')
    @else
        <form method="POST" action="{{ route('admin.publishers.store') }}" class="text-white bg-dark p-5 rounded mt-5"
            novalidate>
@endif
@csrf

<div class="row">
    {{-- # Label --}}
    <div class="mb-3 col-6">
        <label for="label" class="form-label">Label</label>
        <input value="{{ old('label', $publisher->label) }}" type="text"
            class="form-control @error('label') is-invalid @enderror" id="label" aria-describedby="labelHelp"
            name="label" required>
        <div class="form-text">Required</div>
        <div class="invalid-feedback">
            {{ $errors->first('label') }}
        </div>
    </div>

</div>
