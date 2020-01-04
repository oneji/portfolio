@extends('admin.layouts.main')

@section('content')
    @if (Session::has('success'))
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
    {{-- Display erros if any --}}
    @if ($errors->any())
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-success">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                <strong>Current experience</strong>
            </div>
            <div class="card-body">
                <div class="card-search">
                    <div class="card-search-results">
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-segment">
                                <div class="timeline-divider"></div>
                                </div>
                                <div class="timeline-content"></div>
                            </div>
                            @foreach ($experience as $experienceItem) 
                                <div class="timeline-item">
                                    <div class="timeline-segment">
                                    <div class="timeline-media bg-primary circle sq-24">
                                        <div class="icon icon-check"></div>
                                    </div>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-row">
                                            <a href="#">{{ $experienceItem['occupation_en'] .' ('. $experienceItem['company_en'] .')' }}</a>
                                        </div>
                                        <div class="timeline-row">
                                            <a href="#">{{ $experienceItem['occupation_ru'] .' ('. $experienceItem['company_ru'] .')' }}</a>
                                        </div>
                                        <div class="timeline-row">
                                            <p><small>{{ $experienceItem['job_description_en'] }}</small></p>
                                            <p><small>{{ $experienceItem['job_description_ru'] }}</small></p>
                                            <p>
                                                <form method="POST" action="{{ route('admin.experience.delete', $experienceItem['id']) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash"></span> Delete</button>
                                                    <button class="btn btn-xs btn-success" type="button">
                                                        @if ($experienceItem['finish_date'] !== null)
                                                            <small>
                                                                {{ 
                                                                    Carbon\Carbon::parse($experienceItem['start_date'])->toFormattedDateString() .' - '. 
                                                                    Carbon\Carbon::parse($experienceItem['finish_date'])->toFormattedDateString()
                                                                }}
                                                            </small>
                                                        @else
                                                            <small>
                                                                {{ 
                                                                    Carbon\Carbon::parse($experienceItem['start_date'])->toFormattedDateString() .' - Current'
                                                                }}
                                                            </small>                                            
                                                        @endif
                                                    </button>
                                                </form>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                <strong>Create a new experience part</strong>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('admin.experience.save') }}" data-toggle="validation">
                    @csrf
                    <div class="form-group">
                        <label for="start_date">Start date</label>
                        <div class="input-with-icon">
                            <input name="start_date" id="start_date" class="form-control" type="text" data-provide="datepicker" required>
                            <span class="icon icon-calendar input-icon"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="finish_date">Finish date</label>
                        <div class="input-with-icon">
                            <input name="finish_date" id="finish_date" class="form-control" type="text" data-provide="datepicker">
                            <span class="icon icon-calendar input-icon"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="occupation_en">Occupation</label>
                        <input name="occupation_en" id="occupation_en" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="occupation_ru">Должность</label>
                        <input name="occupation_ru" id="occupation_ru" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="company_en">Company</label>
                        <input name="company_en" id="company_en" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="company_ru">Компания</label>
                        <input name="company_ru" id="company_ru" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="job_description_en">Description</label>
                        <textarea name="job_description_en" id="job_description_en" class="form-control" rows="5" placeholder="You can add a description here"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="job_description_ru">Description</label>
                        <textarea name="job_description_ru" id="job_description_ru" class="form-control" rows="5" placeholder="You can add a description here"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection