@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', __("cms-pages.homeworks"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.homeworks") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            @if($homeWorks->count())
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                        <h4>Не проверенные работы</h4>
                    </div>
                    <div class="widget-body">
                        <div class="table-responsive">
                            <table id="sorting-table" class="table mb-0">
                                <thead>
                                <tr>
                                    <th>{{ __("cms-pages.student") }}</th>
                                    <th>{{ __("cms-pages.course") }}</th>
                                    <th>{{ __("cms-pages.comment") }}</th>
                                    <th>{{ __("cms-pages.upload-date") }}</th>
                                    <th>{{ __("cms-pages.grade") }}</th>
                                    <th>{{ __("cms-pages.actions") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($homeWorks as $work)
                                    <tr>
                                        <td>{{ $work->student->getFullName() }}</td>
                                        <td>{{ $work->homeWork->lesson->topic->stage->course->title }}</td>
                                        <td>{{ $work->student_comment }}</td>
                                        <td>{{ $work->upload_date }}</td>
                                        <td style="width: 60px">
                                            <form action="{{route('dashboard.homeworks.change-assessment', $work)}}"
                                                  style="width: 60px">
                                                <select name="assessment" id="assessment" class="form-control">
                                                    <option value="" selected disabled>Не проверено</option>
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <option value="{{$i}}"
                                                                @if($i == $work->assessment) selected @endif>
                                                            {{$i}}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{asset('uploads/'.$work->student_file_path)}}" alt
                                               target="_blank">
                                                Скачать ДЗ
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>Проверенные работы</h4>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.student") }}</th>
                                <th>{{ __("cms-pages.course") }}</th>
                                <th>{{ __("cms-pages.comment") }}</th>
                                <th>{{ __("cms-pages.upload-date") }}</th>
                                <th>{{ __("cms-pages.grade") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allHomeWorks as $work)
                                <tr>
                                    <td>{{ $work->student->getFullName() }}</td>
                                    <td>{{ $work->homeWork->lesson->topic->stage->course->title }}</td>
                                    <td>{{ $work->student_comment }}</td>
                                    <td>{{ $work->upload_date }}</td>
                                    <td>
                                        <form action="{{route('dashboard.homeworks.change-assessment', $work)}}"
                                              style="width: 60px">
                                            <select name="assessment" class="form-control">
                                                <option value="" selected disabled>Не проверено</option>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <option value="{{$i}}" @if($i == $work->assessment) selected @endif>
                                                        {{$i}}
                                                    </option>
                                                @endfor
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{asset('uploads/'.$work->student_file_path)}}" alt target="_blank">
                                            Скачать ДЗ
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-index')
    <script>
        $('select[name="assessment"]').on("change", function () {
            let $this = $(this);

            $.ajax({
                method: "GET",
                url: $this.closest('form').attr("action"),
                data: {
                    assessment: $this.val()
                },
                success: function () {
                    console.log('asd');
                }
            });
        });
    </script>
@endsection