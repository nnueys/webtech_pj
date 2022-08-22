@extends('layouts.main')

@section('content')
    <section class="mt-9 mx-8">
        <h1 class="text-3xl mb-6">
            เพิ่มเรื่องร้องเรียนใหม่
        </h1>

        <h4 class="text-red-600 text-xl mb-6">
            *หากเป็นปัญหาเล็กๆ เช่น ถังขยะเต็ม, น้ำหก, สายเชื่อมต่อมีปัญหา หรือ ส้วมตัน สามารถติดต่อพนักงานดูแลประจำตึกได้เลย*
        </h4>

        <form action="{{ route('posts.store') }}" method="post" enctype='multipart/form-data'>
            @csrf

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
                       class="bg-gray-50 border @error('title') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title') }}"
                       placeholder="" required>
            </div>

            <div>
                <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">เลือกหมวดหมู่</label>

                @error('tags')
                <p class="text-red-600">
                    {{ $message }}
                </p>
                @enderror

                <select name="tags" id="tags"
                        class="bg-gray-50 border @error('tags') border-red-600 @else border-gray-400 @enderror border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         required>
                    <option value ="">หมวดหมู่ที่ต้องการร้องเรียน</option>
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


            <div class="relative z-0 mb-6 mt-6 w-full group">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                    รายละเอียดของเรื่องที่ต้องการแจ้ง
                </label>
                @error('description')
                    <p class="text-red-600">
                        {{ $message }}
                    </p>
                @enderror
                <textarea rows="4" type="text" name="description" id="description"
                       class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          required >{{ old('description') }}</textarea>
            </div>
            <div class="relative z-0 mb-6 mt-6 w-full group">
                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                   กรุณาใส่ช่องทางการติดต่อ
                </label>
                <input type="text" name="contact" id="contact"
                       class="bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('contact') }}"
                       placeholder="">

            </div>

            <div class="form-group">
{{--                <label for="exampleFormControllerFlie1">เพิ่มรูปภาพ</label>--}}
                <input type="file" name="image" class="form-control-file" id="exampleFormControllerFlie1">
            </div>

            <div class="flex items-center mb-6 mt-6">
                <input id="default-checkbox" type="checkbox" name="anonymous" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm ">ไม่ต้องแสดงชื่อผู้ใช้</label>
            </div>

            <div>
                <button class="app-button" type="submit">ฉันจะแจ้ง!</button>
            </div>

        </form>
    </section>

@endsection
