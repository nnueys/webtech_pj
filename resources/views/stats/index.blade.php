@extends('layouts.main')

@section('content')

    <section>
        <body>
        <h1 class="text-center text-2xl mt-6">เรื่องที่แจ้งเข้ามาในเดือนนี้</h1>
        <div class="flex items-center justify-center">
            <table class="w-3/4 text-sm text-center text-gray-500">
                <thead class="bg-green-200 text-xs text-black uppercase bg-gray-50">
                <tr>
                    <th class="py-3 px-6">หมวดหมู่</th>
                    <th class="py-3 px-6">จำนวน</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($tags as $tag)
                    <tr class="bg-white border-t">
                        <td class="py-4 px-6 text-black hover:text-green-800 active:underline" ><a href="{{ route('tags.show', ['tag' => $tag->name]) }}">
                                {{ $tag->name }}
                            </a>
                        </td>
                        <td class="py-4 px-6 text-black hover:text-green-500">{{ $tags_count[$tag->id] }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        </body>
    </section>

    <section>
        <body>
        <h1 class="text-center text-2xl mt-6">เรื่องที่แจ้งเข้ามาทั้งหมด</h1>
        <div class="flex items-center justify-center">
            <table class="w-3/4 text-sm text-center text-gray-500">
                <thead class="bg-green-200 text-xs text-black uppercase bg-gray-50">
                <tr>
                    <th class="py-3 px-6">หมวดหมู่</th>
                    <th class="py-3 px-6">จำนวน</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tags as $tag)
                    <tr class="bg-white border-t">
                        <td class="py-4 px-6 text-black hover:text-green-800 active:underline" ><a href="{{ route('tags.show', ['tag' => $tag->name]) }}">
                                {{ $tag->name }}
                            </a>
                        </td>
                        <td class="py-4 px-6 text-black hover:text-green-500">{{ $tag->posts->count() }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        </body>
    </section>

@endsection


