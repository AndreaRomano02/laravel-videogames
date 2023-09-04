<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $videogame->id }}">
    <i class="fa-solid fa-trash-can"></i>
    @unless ($compact)
        <span class="ms-2">Elimina</span>
        @endif
    </button> --}}

    <!-- Modal -->
    {{-- <div class="modal fade" id="delete-modal-{{ $videogame->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina {{ $videogame->name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare {{ $videogame->name }} creato il {{ $videogame->created_at }}
                </div>
                <div class="modal-footer"> --}}
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    {{-- DELETE FORM --}}
                    {{-- <form action="{{ route('admin.videogames.destroy', $videogame) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Elimina {{ $videogame->name }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
