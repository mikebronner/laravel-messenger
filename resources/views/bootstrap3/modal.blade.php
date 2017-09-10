@section (config('genealabs-laravel-messenger.javascript-blade-section'))
    <script>
        swal({
            title: '{{ session('genealabs-laravel-messenger.title') }}',
            text: '{{ session('genealabs-laravel-messenger.message') }}',
            icon: ''
        });
    </script>
@endsection
