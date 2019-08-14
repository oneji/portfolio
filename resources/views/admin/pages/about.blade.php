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
                <strong>Personal information</strong>
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
                                <img class="img-rounded" width="128" height="128" src="{{ asset('admin/img/3002121059.jpg') }}" alt="No photo">
                            @else
                                <img class="img-rounded" width="128" height="128" src="{{ asset($about['photo']) }}" alt="Abbey Robinson">                
                            @endif
                        </div>
                        <div class="contact-info">
                            <h2 class="contact-name">{{ $about['first_name'] .' '. $about['last_name'] }}</h2>
                            <p class="contact-job-title">{{ $about['dev_status'] }}</p>
                        </div>
                        <div class="contact-form" style="text-align: left">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input name="first_name" id="first_name" class="form-control" type="text" value="{{ $about['first_name'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Last name</label>
                                    <input name="last_name" id="last_name" class="form-control" type="text" value="{{ $about['last_name'] }}">
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
                                    <label for="residence">Residence</label>
                                    <input name="residence" id="residence" class="form-control" type="text" value="{{ $about['residence'] }}">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="dev_status">Dev status</label>
                                    <input name="dev_status" id="dev_status" class="form-control" type="text" value="{{ $about['dev_status'] }}">
                                </div>
                            </div>                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="You can briefly introduce yourself here">{{ $about['description'] }}</textarea>
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