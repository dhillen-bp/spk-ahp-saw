@extends('layouts.app')

@section('content')
    <section class="bg-slate-100">
        <div class="relative h-96 w-full bg-cover bg-center py-32"
            style="background-image: url('{{ asset('images/background/karangwuni-bg.jpg') }}');">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-blue-900 opacity-75"></div>
            <h1 class="relative text-center text-3xl font-bold text-white">Profil Desa</h1>
        </div>

        <div class="-mb-16 p-4 md:px-6">
            <div class="relative -top-24 rounded-lg bg-blue-200 p-8 sm:mx-4 md:mx-8">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero debitis assumenda deleniti quaerat nisi illo
                asperiores earum odit, consequatur quasi soluta nesciunt a rerum quos excepturi repudiandae natus eius
                inventore. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum necessitatibus natus amet veniam
                libero ratione maxime laudantium, illum magni eveniet alias est dolore deleniti eos similique deserunt autem
                soluta atque?Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero debitis assumenda deleniti
                quaerat nisi illo
                asperiores earum odit, consequatur quasi soluta nesciunt a rerum quos excepturi repudiandae natus eius
                inventore. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum necessitatibus natus amet veniam
                libero ratione maxime laudantium, illum magni eveniet alias est dolore deleniti eos similique deserunt autem
                soluta atque?
            </div>
        </div>
    </section>
@endsection
