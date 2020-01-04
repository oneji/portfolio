@extends('admin.layouts.main')

@section('content')
    @if (Session::has('success'))
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif

    {{-- Personal information part --}}
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                <strong>Personal information | English</strong>
                <div class="card-actions">
                    <button type="button" class="card-action card-toggler" aria-expanded="true" title="Collapse"></button>
                </div>
            </div>

            <div class="card-body">
                <form class="form" method="POST" action="{{ route('admin.about.save') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="contact-content-body" style="padding: 0">
                        <div class="contact-avatar">
                            <label class="contact-avatar-btn">
                            <span class="icon icon-camera"></span>
                            <input name="photo" id="photo" class="file-upload-input" type="file">
                            </label>
                            @if ($about['photo'] === null)
                                <img class="img-rounded" width="128" height="128" src="/admin-panel/img/3002121059.jpg" alt="No photo">
                            @else
                                <img class="img-rounded" width="128" height="128" src="{{ asset($about['photo']) }}" alt="Photo">                
                            @endif
                        </div>
                        <div class="contact-info">
                            <h2 class="contact-name">{{ $about['first_name'] .' '. $about['last_name'] }}</h2>
                            <p class="contact-job-title">{{ $about['dev_status'] }}</p>
                        </div>
                        <div class="contact-form" style="text-align: left">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name_en">First name</label>
                                    <input name="first_name_en" id="first_name_en" class="form-control" type="text" value="{{ $about['first_name_en'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name_ru">Имя</label>
                                    <input name="first_name_ru" id="first_name_ru" class="form-control" type="text" value="{{ $about['first_name_ru'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name_en">Last name</label>
                                    <input name="last_name_en" id="last_name_en" class="form-control" type="text" value="{{ $about['last_name_en'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name_ru">Фамилия</label>
                                    <input name="last_name_ru" id="last_name_ru" class="form-control" type="text" value="{{ $about['last_name_ru'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="residence_en">Residence</label>
                                    <input name="residence_en" id="residence_en" class="form-control" type="text" value="{{ $about['residence_en'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="residence_ru">Место проживания</label>
                                    <input name="residence_ru" id="residence_ru" class="form-control" type="text" value="{{ $about['residence_ru'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birthday">Birthday</label>
                                    <input name="birthday" id="birthday" class="form-control" type="text" value="{{ $about['birthday'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input name="email" id="email" class="form-control" type="email" value="{{ $about['email'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" id="phone" class="form-control" type="text" value="{{ $about['phone'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skype">Skype</label>
                                    <input name="skype" id="skype" class="form-control" type="text" value="{{ $about['skype'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wechat">WeChat</label>
                                    <input name="wechat" id="wechat" class="form-control" type="text" value="{{ $about['wechat'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dev_status_en">Dev status</label>
                                    <input name="dev_status_en" id="dev_status_en" class="form-control" type="text" value="{{ $about['dev_status_en'] }}">
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dev_status_ru">Разработчик</label>
                                    <input name="dev_status_ru" id="dev_status_ru" class="form-control" type="text" value="{{ $about['dev_status_ru'] }}">
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">Facebook link</label>
                                    <input name="facebook" id="facebook" class="form-control" type="text" value="{{ $about['facebook'] }}">
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin">LinkedIn link</label>
                                    <input name="linkedin" id="linkedin" class="form-control" type="text" value="{{ $about['linkedin'] }}">
                                </div>
                            </div>                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="github">Github link</label>
                                    <input name="github" id="github" class="form-control" type="text" value="{{ $about['github'] }}">
                                </div>
                            </div>                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_en">Description</label>
                                    <textarea name="description_en" id="description_en" class="form-control" rows="5" placeholder="You can briefly introduce yourself here">{{ $about['description_en'] }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description_ru">Краткое описание</label>
                                    <textarea name="description_ru" id="description_ru" class="form-control" rows="5" placeholder="You can briefly introduce yourself here">{{ $about['description_ru'] }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                                </div>     
                            </div>                           
                        </div>
                    </div>
                </form>
            </div>
        </div>        
    </div>
    {{-- Skills part --}}
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                <strong>Skills</strong>
            </div>

            <div class="card-body">
                <div class="skills-list">
                    @foreach ($skills as $skill)
                        <div class="skill-item">
                            <form method="POST" action="{{ route('admin.skills.delete', $skill['id']) }}">
                                @csrf
                                @method('delete')
                                <button class="skill-item__remove">×</button> {{ $skill['skill_name'] }}
                            </form>
                            
                        </div>                        
                    @endforeach
                    <div class="clearfix"></div>
                </div>
                
                <form class="form" method="POST" action="{{ route('admin.skills.save') }}" data-toggle="validation">
                    @csrf
                    <div class="form-group">
                        <label for="skill_name">Skill name</label>
                        <input name="skill_name" id="skill_name" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
        
        {{-- CV part --}}
        <div class="card">
            <div class="card-header bg-primary">
                <strong>CV</strong>
            </div>

            <div class="card-body">
                <div class="alert {{ $about['cv'] !== null ? 'alert-success' : 'alert-danger' }}">
                    {{ $about['cv'] !== null ? 'CV is uploaded.' : 'CV is not uploaded.' }}
                </div>
                
                <form class="form" method="POST" action="{{ route('admin.cv.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="No file chosen">
                            <span class="input-group-btn">
                                <label class="btn btn-primary file-upload-btn">
                                <input id="cv" class="file-upload-input" type="file" name="cv">
                                <span class="icon icon-paperclip icon-lg"></span>
                                </label>
                            </span>
                        </div>
                        <p class="help-block">
                            <small>Click the button next to the input field and upload a new CV.</small>
                        </p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Upload new</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection