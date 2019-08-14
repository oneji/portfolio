@extends('admin.layouts.main')

@section('content')
    @if (Session::has('success'))
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif

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
@endsection