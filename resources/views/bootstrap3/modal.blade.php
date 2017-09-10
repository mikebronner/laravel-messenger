@if ($message || $title)
    <div class="genealabs-laravel-messenger modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="overflow: hidden">

                @if ($title)
                    <div class="modal-header alert-{{ $level }}">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{!! $title !!}</h4>
                    </div>
                @endif

                @if ($message)
                    <div class="modal-body">
                        <p>{{ $message }}</p>
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
