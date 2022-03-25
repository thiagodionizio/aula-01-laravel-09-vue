@if(session()->has('message'))
    <script>
        Swal.fire('Tudo certo','{{ session()->get('message') }}', 'success');

    </script>
@endif

@if(session()->has('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text:  '{{ session()->get('error') }}',
            showConfirmButton: false,
            timer: 5000
        })

    </script>
@endif
