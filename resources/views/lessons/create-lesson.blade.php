@extends('layouts.admin-portal')
@section('content')
    <form action="/save-lesson" method="post" enctype="multipart/form-data" >
        @if ($errors->any())
            <div class="alert bg-pink-light text-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="">
            <div class="row">
                <div class="col-lg-6">
              <h4>       {{__('Add lesson')}} {{__('for')}}   {{$course->name}}</h4>

                </div>
                <div class="col-lg-6 text-end d-flex flex-row">
                    <a href="/create-lesson?course_id={{$course->id}}" class="btn btn-info mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0">{{__('Add Lesson')}}</a>

                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-8 mt-lg-0 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">{{__('Lesson Information')}}</h5>
                            <div class="row">

                            </div>

                            <div class="form-group">
                                <label for="lessonTitle" class="form-label">{{__('Lesson Title')}}</label><label class="text-danger">*</label>
                                <input type="text" class="form-control" name="title" value="{{$lesson->title ?? old('title') ?? ''}}" id="lessonTitle">

                            </div>
                            <div class="form-group">
                                <label class="">{{__('Duration')}}</label>
                                <input class="form-control" type="text" name="duration" value="{{$lesson->duration ?? old('duration') ?? ''}}" />
                            </div>
                            <label for="basic-url" for="lessonSlug" class="form-label">{{__('Slug')}}</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text fw-bolder">{{config('app.url')}}/lesson/</span>
                                <input type="text" value="{{$lesson->slug ?? old('slug') ?? ''}}" id="lessonSlug" name="slug" class="form-control ps-1">
                            </div>



                            <label class="">{{__('Description')}}</label>

                            <div class="form-group">
                            <textarea class="form-control" rows="10" id="description"
                                      name="description">@if(!empty($lesson)){!! $lesson->description !!}@endif</textarea>
                            </div>

                            @csrf
                            @if($course)
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                            @endif
                            @if($lesson)
                                <input type="hidden" name="id" value="{{$lesson->id}}">
                            @endif
                            <button type="submit" class="btn btn-info mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">{{__('Save')}}</button>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="font-weight-bolder">{{__('Upload Video')}}</h5>
                            <div class="row">
                                <div class="col-12">

                                    @if(empty($lesson->video))
                                        <img src="{{PUBLIC_DIR}}/img/placeholder.jpeg"
                                             class="w-100 border-radius-lg shadow-lg mt-3">
                                    @else
                                        <iframe class="embed-responsive-item w-100  border-radius-lg shadow-lg mt-3" src="{{PUBLIC_DIR}}/uploads/{{$lesson->video}}" type="video/mp4">

                                        </iframe>

                                    @endif
                                </div>


                                <div class="align-self-center">
                                    <div>
                                        <label for="cover_photo" class="form-label mt-3">{{__('Upload Video')}}</label>
                                        <input class="form-control" name="video" type="file" >
                                    </div>
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="formFileMultiple" class="form-label">{{__('Attach file')}}</label>
                                    <input class="form-control" name="file" type="file" id="formFileMultiple">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </form>


@endsection

@section('script')
    <script>
        $(function () {
            "use strict";
            flatpickr("#start_date", {

                dateFormat: "Y-m-d",
            });

            flatpickr("#end_date", {

                dateFormat: "Y-m-d",
            });

            tinymce.init({
                selector: '#description',


                plugins: 'table,code',

            });

            @if(empty($lesson))

            let lessonTitle = document.getElementById('lessonTitle');

            lessonTitle.addEventListener('keyup', function (event) {
                event.preventDefault();
                let title = lessonTitle.value;
                document.getElementById('lessonSlug').value = title.toLowerCase().split(' ').join('-');
            });

            @endif

        });
    </script>
@endsection
