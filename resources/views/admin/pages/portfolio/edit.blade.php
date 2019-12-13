@extends('admin.layouts.main')

@section('content')
    <div class="row gutter-xs">
        @if (Session::has('success'))
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="media">
                        <div class="media-middle media-left">
                            <a href="#">
                                <img class="media-object img-circle" width="32" height="32" src="{{ asset($portfolioItem['cover_image']) }}" alt="Jessica Brown">
                            </a>
                        </div>
                        <div class="media-middle media-body">
                            <a class="link-muted" href="#">
                                <strong>{{ $portfolioItem['title'] }}</strong>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-image">
                    <img class="img-responsive" src="{{ asset($portfolioItem['cover_image']) }}" alt="{{ $portfolioItem['title'] }}">
                </div>
                <div class="card-body">
                    <h4 class="card-title fw-l">
                        <a class="link-muted" href="#">{{ $portfolioItem['subtitle'] }}</a>
                    </h4>
                    <small>{{ $portfolioItem['description'] }}</small>
                </div>
                <div class="card-footer">
                    <small>
                        <span class="icon icon-globe"></span>
                        {{ $portfolioItem['link'] }}
                    </small>
                </div>
                <div class="card-footer">
                    
                    @if ($portfolioItem['screenshots'] !== null)
                        <ul class="file-list">
                            @foreach(json_decode($portfolioItem['screenshots']) as $screenshot)
                                <li class="file">
                                    <a class="file-link" href="{{ asset($screenshot) }}">
                                        <div class="file-thumbnail" style="background-image: url({{ asset($screenshot) }})"></div>
                                    </a>
                                    <button class="file-delete-btn delete" title="Delete" type="button">
                                        <span class="icon icon-remove"></span>
                                    </button>
                                </li>                            
                            @endforeach                            
                        </ul>
                    @else
                        <small>Screenshots are not provided..</small>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <strong>Create a new portfolio item</strong>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="{{ route('admin.portfolio.edit', [ 'id' => $portfolioItem['id'] ]) }}" data-toggle="validation" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{ $portfolioItem['title'] }}" name="title" id="title" class="form-control" type="text" required placeholder="Enter a title">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input value="{{ $portfolioItem['subtitle'] }}" name="subtitle" id="subtitle" class="form-control" type="text" placeholder="Enter a subtitle">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input value="{{ $portfolioItem['link'] }}" name="link" id="link" class="form-control" type="text" required placeholder="http://www.example.com">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Choose a cover image">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary file-upload-btn">
                                    <input class="file-upload-input" accept="image/*" type="file" name="cover_image">
                                    <span class="icon icon-paperclip icon-lg"></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" placeholder="You can add a description here">{{ $portfolioItem['description'] }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="file" accept="image/*" multiple="multiple" name="files[]">
                        </div>
                        <div class="form-group">
                            <ul class="file-list"></ul>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection