<script src="https://unpkg.com/taos@1.0.5/dist/taos.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="module">
    //TOASTR
    @if (session()->has('success'))

        toastr.success('{{ session('success') }}', 'BERHASIL!');
    @elseif (!empty($errors->all()))
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif

    // NAVBAR
    $(document).ready(function() {
        // Mendeteksi pergerakan scroll
        $(window).scroll(function() {
            // Hitung posisi scroll dalam piksel
            var scrollPosition = $(window).scrollTop();

            $('#topNavbar').removeClass('opacity-100');
            $('#topNavbar').addClass('opacity-70');

            if (scrollPosition >= 384) {
                console.log("Hello 96");
                $('#topNavbar').removeClass('opacity-70');
                $('#topNavbar').addClass('opacity-100');
            }
        });
    });
</script>
