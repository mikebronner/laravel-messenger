@if ($message || $title)
    <div class="genealabs-laravel-messenger alert alert-dismissable alert-{{ $level }}" role="alert">
    	<button type="button"
            class="close"
            data-dismiss="alert"
            aria-hidden="true"
        >
            x
        </button>

        @if ($title)
            <h4>{!! $title !!}</h4>
        @endif

        @if ($message)
            <p>{!! $message !!}</p>
        @endif
    </div>
@endif

@section ($section)
    @if ($autoHide)
        <script>
        	window.setTimeout(function() {
        		$(".genealabs-laravel-messenger.alert-success").slideUp(750, function() {
        			$(this).remove();
        		});
                $(".genealabs-laravel-messenger.alert-info").slideUp(750, function() {
        			$(this).remove();
        		});
        	}, 15000);
        </script>
    @endif
@endsection
