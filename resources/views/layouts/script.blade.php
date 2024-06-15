{{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script> --}}

<script type="module">
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
