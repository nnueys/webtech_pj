{{-- resources/views/tags/index.blade.php --}}
@extends('layouts.main')

@section('content')

    <section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            หมวดหมู่ที่มีการร้องเรียนทั้งหมด
        </h1>
        <div class="my-1 px-8 py-2 flex flex-wrap justify-start ">
            @foreach($tags as $tag)
                <a href="{{ route('tags.show', ['tag' => $tag->name]) }}"
                   class="block p-6  m-2 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ $tag->name }}
                    </h5>
                    <p class="bg-[#f8db8d] text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                        <svg class="w-6 h-6 inline mr-1" viewBox="0 0 20 20">
                            <path d="M18.344,16.174l-7.98-12.856c-0.172-0.288-0.586-0.288-0.758,0L1.627,16.217c0.339-0.543-0.603,0.668,0.384,0.682h15.991C18.893,16.891,18.167,15.961,18.344,16.174 M2.789,16.008l7.196-11.6l7.224,11.6H2.789z M10.455,7.552v3.561c0,0.244-0.199,0.445-0.443,0.445s-0.443-0.201-0.443-0.445V7.552c0-0.245,0.199-0.445,0.443-0.445S10.455,7.307,10.455,7.552M10.012,12.439c-0.733,0-1.33,0.6-1.33,1.336s0.597,1.336,1.33,1.336c0.734,0,1.33-0.6,1.33-1.336S10.746,12.439,10.012,12.439M10.012,14.221c-0.244,0-0.443-0.199-0.443-0.445c0-0.244,0.199-0.445,0.443-0.445s0.443,0.201,0.443,0.445C10.455,14.021,10.256,14.221,10.012,14.221"></path>
                        </svg>
                        {{ $tag->posts->count() }} ครั้ง
                    </p>


                </a>
            @endforeach
        </div>
    </section>

@endsection


