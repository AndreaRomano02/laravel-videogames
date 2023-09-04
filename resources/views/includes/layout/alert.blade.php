@if (session('alert-message'))
    <div class="my-3 container alert alert-{{ session('alert-type') ?? 'info' }} alert-dismissible fade show"
        role="alert">
        {{ session('alert-message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
