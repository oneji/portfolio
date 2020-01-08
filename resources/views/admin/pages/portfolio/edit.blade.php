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
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <strong>Screenshots</strong>
                </div>
                <div class="card-body">
                    @if ($portfolioItem['screenshots'] !== null)
                        <ul class="file-list">
                            @foreach(json_decode($portfolioItem['screenshots']) as $screenshot)
                                <li class="file">
                                    <a class="file-link" href="{{ asset($screenshot->link) }}">
                                        <div class="file-thumbnail" style="background-image: url({{ asset($screenshot->link) }})"></div>
                                    </a>
                                    <form
                                        id="{{ $screenshot->id }}"
                                        action="{{ route('admin.portfolio.deleteScreenshot', [ 'id' => $portfolioItem['id'], 'screenshotId' => $screenshot->id ]) }}" 
                                        method="POST"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <a 
                                            href="javascript:{}"
                                            onclick="document.getElementById('{{ $screenshot->id }}').submit();"
                                            class="file-delete-btn delete"
                                        >
                                            <span class="icon icon-remove"></span>
                                        </a>
                                    </form>
                                </li>                            
                            @endforeach                            
                        </ul>
                    @else
                        <small>Screenshots are not provided..</small>
                    @endif
                </div>
            </div>            
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <strong>Update a new portfolio item</strong>
                </div>
                <div class="card-body">
                    <form class="form" method="POST" action="{{ route('admin.portfolio.edit', [ 'id' => $portfolioItem['id'] ]) }}" data-toggle="validation" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_en">Title</label>
                                    <input name="title_en" id="title_en" value="{{ $portfolioItem->title_en }}" class="form-control" type="text" required placeholder="Enter a title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_ru">Заголовок</label>
                                    <input name="title_ru" id="title_ru" value="{{ $portfolioItem->title_ru }}" class="form-control" type="text" required placeholder="Enter a title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subtitle_en">Subtitle</label>
                                    <input name="subtitle_en" id="subtitle_en" value="{{ $portfolioItem->subtitle_en }}" class="form-control" type="text" placeholder="Enter a subtitle">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subtitle_ru">Подзаголовок</label>
                                    <input name="subtitle_ru" id="subtitle_ru" value="{{ $portfolioItem->subtitle_ru }}" class="form-control" type="text" placeholder="Enter a subtitle">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input name="link" id="link" value="{{ $portfolioItem->link }}" class="form-control" type="text" required placeholder="http://www.example.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cover_image">Cover image</label>
                                    <input accept="image/*" type="file" name="cover_image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_en">Description</label>
                                    <textarea name="description_en" id="description_en" class="form-control" rows="5" placeholder="You can add a description here">{!! $portfolioItem->description_en !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_ru">Описание</label>
                                    <textarea name="description_ru" id="description_ru" class="form-control" rows="5" placeholder="You can add a description here">{!! $portfolioItem->description_ru !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="files[]">Screenshots</label>
                                    <input type="file" accept="image/*" multiple="multiple" name="files[]">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin-panel/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description_en');
        CKEDITOR.replace('description_ru');
    </script>
@endsection