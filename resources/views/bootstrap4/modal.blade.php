@if ($message || $title)
    <div class="genealabs-laravel-messenger modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="overflow: hidden;">

                @if ($title)
                    <div class="modal-header alert-{{ $level }}">
                        <h4 class="modal-title">{!! $title !!}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if ($message)
                    <div class="modal-body">
                        <p>{!! $message !!}</p>
                    </div>
                @endif

                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-{{ $level }}" data-dismiss="modal">I Understand</button>
                </div>
            </div>
        </div>
    </div>
@endif

@section ($section)
    <script>
        $(document).ready(function () {
            $('.genealabs-laravel-messenger.modal').modal('show');
        });
    </script>
@endsection
