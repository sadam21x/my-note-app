@extends('layout')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('/css/home.css') }}">
@endsection

@section('content')
<div class="date-bar">
    <h5 class="mt-1">@php echo date('D, d F Y'); @endphp</h5>

    <button class="btn circle-button new-note-button" rel="tooltip" data-toggle="modal" data-target="#new-note-modal" data-placement="left" title="New Note">
        <i class="fas fa-pencil-alt"></i>
    </button>
</div>

<div class="row mt-4">
    <div class="col-md-12 card-container">

        @foreach ($note as $note)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $note->title }}</h5>
                <p class="card-text">
                    @php
                        $preview = DB::table('notes')->where('id', $note->id)->value('content');
                        echo substr($preview, 0, 100) . ". . .";
                    @endphp
                </p>
                <a href="#" class="card-link note-detail-button" data-toggle="modal" data-target="#note-detail-modal"
                    data-id="{{ $note->id }}">
                    Details
                </a>
            </div>
        </div>
        @endforeach

    </div>
</div>

{{-- Start New Note Modal --}}
<div class="modal fade" id="new-note-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark d-flex justify-content-center">
                <h5 class="modal-title text-white">New Note</h5>
                {{-- <button type="button" class="btn circle-button-sm bg-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <form action="{{ url('/notes') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="note_title" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="note_content" rows="5" class="form-control" placeholder="Write your note here . . ." required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-sm btn-primary">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End New Note Modal --}}

{{-- Start Note Detail Modal --}}
<div class="modal fade" id="note-detail-modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark d-flex justify-content-center">
                <h5 class="modal-title text-white detail-note-title" style="text-align: center;"></h5>
                {{-- <button type="button" class="btn circle-button-sm bg-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <div class="container">
                    <p class="detail-note-content"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
{{-- End Note Detail Modal --}}
@endsection

@section('extra-script')
<script src="{{ asset('/js/home.js') }}"></script>
@endsection