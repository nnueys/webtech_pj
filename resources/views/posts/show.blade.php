
@extends('layouts.main')

@section('content')
    <article class="mx-8 mt-8">
        <h1 class="text-3xl mb-1">
            {{ $post->title }}
        </h1>

        <p class="mt-2">
            <b> โดย </b> @if (!($post->anonymous)) {{ $post->user->name }} @else -ไม่แสดงชื่อผู้ใช้- @endif
        </p>

        <p class="mt-2">
            <b>วันเวลาที่แจ้ง</b> {{ $post->created_at }}
        </p>

        <p class="mt-2">
            <b>ผู้รับผิดชอบ</b> {{ $post->handler }}
        </p>



        <div class="mb-2 mt-2">
            <p class="bg-[#b3d6ac] text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                <svg class="w-6 h-6 inline mr-1" viewBox="0 0 20 20">
                    <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
                </svg>
                {{ $post->view_count }} views
            </p>

            @if($post->status === 'progress')
                <p class="bg-red-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                    ยังไม่ดำเนินการ
                </p>
            @elseif($post->status === 'success')
                <p class="bg-green-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                    ดำเนินการเสร็จสิ้น
                </p>
            @else
                <p class="bg-yellow-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                    อยู่ระหว่างการดำเนินการ
                </p>
            @endif


        <div class="mb-2">
            <b>หมวดหมู่ </b>
            @foreach($post->tags as $tag)
                <a href="{{ route('tags.show', ['tag' => $tag->name]) }}" class="ml-2">
                    <p class="bg-blue-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                        {{ $tag->name }}
                    </p>
                </a>
            @endforeach
        </div>

        <p class="text-gray-900 font-normal p-2 mb-8">
            {{ $post->description }}
        </p>

        <div class="mb-2">
            <b>ช่องทางการติดต่อ </b>
        <p class="text-gray-900 font-normal p-2 mb-8">
            {{ $post->contact }}
        </p>

        @if($post->image != null)
            <div>
                <image src="{{asset("storage/image/".$post->image)}}"/>
            </div>
        @endif


    </article>



    @can('update',$post)
        <section class="mt-8 mx-8">
            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-b border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-gray-500"></span>
                </div>
            </div>

            @can('onlyUser',\App\Models\Post::class)
            <div>
                <a class="app-button" href="{{ route('posts.edit', ['post' => $post->id]) }}">
                    แก้ไขโพสต์นี้
                </a>
            </div>
            @endcan

            @can('appeals',\App\Models\Post::class)
                <div>
                    <a class="app-button" href="{{ route('posts.edit', ['post' => $post->id]) }}">
                        แก้ไขสถานะ
                    </a>
                </div>
            @endcan
        </section>
    @endcan

@endsection
