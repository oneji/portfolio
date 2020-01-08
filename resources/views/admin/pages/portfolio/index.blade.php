@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary" type="submit">Create new one</a>
        </div>
    </div>
    <div class="row gutter-xs">
        @if (Session::has('success'))
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif
        
        @foreach ($portfolioItems as $portfolioItem)
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">                        
                <div class="card">
                    <div class="card-header">
                        <div class="media">
                            <div class="media-middle media-left">
                                <a href="#">
                                    <img class="media-object img-circle" width="32" height="32" src="{{ asset($portfolioItem['cover_image']) }}" alt="Cover image">
                                </a>
                            </div>
                            <div class="media-middle media-body">
                                <strong>{{ $portfolioItem['title_en'] }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="card-image">
                        <img class="img-responsive" src="{{ asset($portfolioItem['cover_image']) }}" alt="{{ $portfolioItem['title'] }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-l">{{ $portfolioItem['subtitle_en'] }}</h5>
                    </div>
                    <div class="card-footer">
                        <small>
                            <span class="icon icon-globe"></span>
                            <a href="{{ $portfolioItem['link'] }}" target="_blank">{{ $portfolioItem['link'] }}</a>
                        </small>
                    </div>
                    <div class="card-footer">
                        <small>{{ count(json_decode($portfolioItem->screenshots)) }} screenshots</small> 
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{ route('admin.portfolio.edit', $portfolioItem->id) }}" class="btn btn-success btn-block btn-xs" >Edit</a>
                            </div>
                            <div class="col-md-6">
                                <form id="delete-form-{{ $portfolioItem['id'] }}" action="{{ route('admin.portfolio.delete', [ 'id' => $portfolioItem['id'] ]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')                                        
                                    <a 
                                        href="javascript:{}" 
                                        onclick="document.getElementById('delete-form-{{ $portfolioItem['id'] }}').submit();"
                                        class="btn btn-danger btn-block btn-xs"
                                    >
                                        Delete
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection