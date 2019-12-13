@extends('admin.layouts.main')

@section('content')
<div class="row gutter-xs">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-actions">
                <button type="button" class="card-action card-toggler" title="Collapse"></button>
                </div>
                <strong>Portfolio Items</strong>
            </div>
            <div class="card-body">
                <ul class="media-list">
                    @if (count($portfolioItems) === 0)
                        <li class="alert alert-success">
                            No items added yet...
                        </li>
                    @endif
                    
                    @foreach ($portfolioItems as $portfolioItem)
                        <li class="media">
                            <div class="media-middle media-left">
                                <a href="product.html">
                                    <img class="img-circle" width="48" height="48" src="{{ asset($portfolioItem['cover_image']) }}" alt="{{ $portfolioItem['title'] }}">
                                </a>
                            </div>
                            <div class="media-middle media-body">
                                <h5 class="media-heading">
                                    <a href="#">{{ $portfolioItem['title'] }}</a>
                                    <small>{{ $portfolioItem['link'] }}</small>
                                </h5>
                                <small>{{ $portfolioItem['subtitle'] }}</small>
                            </div>
                        </li>
                    @endforeach
                    
                    
                </ul>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header bg-primary">
                    <strong>Create a new portfolio item</strong>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="{{ route('admin.portfolio.save') }}" data-toggle="validation" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input name="title" id="title" class="form-control" type="text" required placeholder="Enter a title">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input name="subtitle" id="subtitle" class="form-control" type="text" placeholder="Enter a subtitle">
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input name="link" id="link" class="form-control" type="text" required placeholder="http://www.example.com">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Choose a cover image">
                                <span class="input-group-btn">
                                    <label class="btn btn-primary file-upload-btn">
                                    <input id="cover_image" class="file-upload-input" type="file" name="cover_image">
                                    <span class="icon icon-paperclip icon-lg"></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="5" placeholder="You can add a description here"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection