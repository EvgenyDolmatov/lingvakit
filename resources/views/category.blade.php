@extends('layouts.new-app')

@section('content')
    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>{{$rubric->title}}</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="pagenation_links">
                            <a href="{{route('site.index')}}">Главная</a> <i> / </i> {{$rubric->title}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section-->
    <div class="clearfix"></div>

    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12 bmargin">
                    @if($articles->count())
                        @foreach($articles as $article)
                            <div class="col-md-12 bmargin">
                                <div class="blog-holder-12">
                                    <div class="image-holder">
                                        <img class="img-responsive" alt="" src="{{$article->getImage()}}"></div>
                                </div>
                                <div class="clearfix"></div>
                                <br/>
                                <a href="{{route('site.article', [$rubric->slug, $article->slug])}}">
                                    <h4 class="less-mar1">{{$article->title}}</h4>
                                </a>
                                <div class="blog-post-info">
                                    <span><i class="fa fa-user"></i> By Benjamin</span>
                                    <span><i class="fa fa-comments-o"></i> 15 Comments</span>
                                </div>
                                <br/>
                                {!! $article->content !!}
                                <br/>
                                <a class="btn btn-border light btn-round btn-small"
                                   href="{{route('site.article', [$rubric->slug, $article->slug])}}">Перейти</a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-divider-margin-4"></div>
                        @endforeach
                    @endif
                </div>

                <div class="col-md-4 col-sm-12 col-xs-12 bmargin">
                    @if($allRubrics->count())
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding bmargin">
                            <h5>Рубрики</h5>
                            <ul class="category-links orange-2">
                                @foreach($allRubrics as $r)
                                    <li>
                                        <a href="{{route('site.rubric.articles', $r->slug)}}">
                                            {{$r->title}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                    @else
                        <div class="col-md-12 col-sm-12 col-xs-12 nopadding bmargin">
                            <h3>В этой рубрике новостей пока нет.</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@endsection