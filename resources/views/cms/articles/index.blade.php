@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', "Новости")
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">Новости</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.filter") }}</h4>
                    <div class="form-group">
                        <a href="{{ route('articles.create') }}" type="button"
                           class="btn btn-success mr-1 mb-2">{{ __("cms-pages.add") }}</a>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.image") }}</th>
                                <th>Новость</th>
                                <th>Рубрика</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td style="width: 100px;">
                                        <div class="table-img">
                                            <img src="{{ $article->getImage() }}" width="100" alt>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="">
                                            {{ $article->title }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            {{ $article->title }}
                                        </a>
                                    </td>
                                    <td class="td-actions">
                                        <a href="{{route('articles.edit', $article)}}"><i class="la la-edit edit"></i></a>
                                        <form style="display: inline-block" method="POST"
                                              action="{{route('articles.destroy', $article)}}">
                                            @csrf @method('DELETE')

                                            <a href="#"
                                               onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                                <i class="la la-close delete"></i>
                                            </a>
                                        </form>
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
@endsection
