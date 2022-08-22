@extends('layouts.main')

@section('content')
    <section class="mx-8 mt-9">
        <h1 class="text-3xl mb-6">
            แก้ไข
        </h1>

        <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="relative z-0 mb-6 w-full group">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    หัวข้อเรื่อง
                </label>
                @if ($errors->has('title'))
                    <p class="text-red-600">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <input type="text" name="title" id="title"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title', $post->title) }}"
                       placeholder="" required>
            </div>

            <div>
                <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">เลือกหมวดหมู่</label>
                <select name="tags" id="tags" value="{{ old('tags', $post->tag) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @foreach($post->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                    <option selected >
                        @foreach($post->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </option>
                        <option value="รถโดยสารภายในมหาวิทยาลัย">รถโดยสารภายในมหาวิทยาลัย</option>
                        <option value="ทรัพย์สินมหาวิทยาลัยชำรุด">ทรัพย์สินมหาวิทยาลัยชำรุด</option>
                        <option value="มลภาวะทางเสียง">มลภาวะทางเสียง</option>
                        <option value="บุคลากร">บุคลากร</option>
                        <option value="กิจกรรม">กิจกรรม</option>
                        <option value="อินเตอร์เน็ต">อินเตอร์เน็ต</option>
                        <option value="ทางเท้า">ทางเท้า</option>
                        <option value="น้ำท่วม">น้ำท่วม</option>
                        <option value="ความสะอาด">ความสะอาด</option>
                        <option value="สัตว์">สัตว์</option>
                        <option value="อื่น ๆ">อื่น ๆ</option>
                </select>
            </div>

            <div>
                @can('appeals',\App\Models\Post::class)
                    <div class="mt-6">
                        <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">เปลี่ยนสถานะการร้องเรียน</label>
                        <select name="status" id="status" value="{{ old('status', $post->status) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="progress" {{ old('status', $post->status) == 'progress' ? 'selected' : '' }}>ยังไม่ดำเนินการ</option>
                            <option value="inProgress" {{ old('status', $post->status) == 'inProgress' ? 'selected' : '' }}>อยู่ระหว่างการดำเนินการ</option>
                            <option value="success" {{ old('status', $post->status) == 'success' ? 'selected' : '' }}>ดำเนินการเสร็จสิ้น</option>
                        </select>
                    </div>
                @endcan
            </div>


            <div class="mt-6 relative z-0 mb-6 w-full group">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400 mt-2">
                    รายละเอียดของเรื่องที่ต้องการแจ้ง
                </label>
                @error('description')
                <p class="text-red-600">
                    {{ $message }}
                </p>
                @enderror
                <textarea rows="4" type="text" name="description" id="description"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          required >{{ old('description', $post->description) }}</textarea>
            </div>

                <div class="relative z-0 mb-6 mt-6 w-full group">
                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                    กรุณาใส่ช่องทางการติดต่อ
                </label>
                <input type="text" name="contact" id="contact"
                       class="bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('contact' ,$post->contact) }}"
                       placeholder="">

                </div>


                <div class="relative z-0 mb-6 mt-6 w-full group">
                    <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                        ผู้รับผิดชอบ
                    </label>
                    <input type="text" name="handler" id="handler"
                           class="bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ old('handler' ,$post->handler) }}"
                           placeholder="">

                </div>


            <div>
                <button class="app-button mt-2" type="submit">บันทึกการเปลี่ยนแปลง</button>
            </div>

        </form>
    </section>

    <section class="mx-8 mt-16">
        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-red-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-red-500"></span>
            </div>
        </div>

        <div>
            <h3 class="text-red-600 mb-4 text-2xl">
                ต้องการลบโพสต์นี้?
{{--                <p class="text-gray-800 text-xl">--}}
{{--                    Once you delete a post, there is no going back. Please be certain.--}}
{{--                </p>--}}
            </h3>

            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('delete')
                <div class="relative z-0 mb-6 w-full group">
                    <label for="KEY" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        พิมพ์คำว่า "CONFIRM" เพื่อยืนยัน
                    </label>
                    <input type="text" name="KEY" id="KEY"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="" required>
                </div>
                <button class="app-button red" type="submit">ลบโพสต์</button>
            </form>
        </div>
    </section>

@endsection
