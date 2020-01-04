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
                <strong>Current education</strong>
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
                            @foreach ($education as $educationItem) 
                                <div class="timeline-item">
                                    <div class="timeline-segment">
                                        <div class="timeline-media bg-primary circle sq-24">
                                            <div class="icon icon-check"></div>
                                        </div>
                                    </div>
                                    <div class="timeline-content">
                                        <div class="timeline-row">
                                            <a href="#">{{ $educationItem['study_place_en'] .', '. $educationItem['country_name'] }}</a>   
                                        </div>
                                        <div class="timeline-row">   
                                            <a href="#">{{ $educationItem['study_place_ru'] .', '. $educationItem['country_name'] }}</a>
                                        </div>
                                        <div class="timeline-row">
                                            <p><small>{{ $educationItem['description_en'] }}</small></p>
                                            <p><small>{{ $educationItem['description_ru'] }}</small></p>
                                            <p>
                                                <form method="POST" action="{{ route('admin.education.delete', $educationItem['id']) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-xs btn-danger" type="submit"><span class="icon icon-trash"></span> Delete</button>
                                                    <button class="btn btn-xs btn-success" type="button">
                                                        @if ($educationItem['finish_date'] !== null)
                                                            <small>
                                                                {{ 
                                                                    Carbon\Carbon::parse($educationItem['start_date'])->toFormattedDateString() .' - '. 
                                                                    Carbon\Carbon::parse($educationItem['finish_date'])->toFormattedDateString()
                                                                }}
                                                            </small>
                                                        @else
                                                            <small>
                                                                {{ 
                                                                    Carbon\Carbon::parse($educationItem['start_date'])->toFormattedDateString() .' - Current'
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
                <strong>Create a new education part</strong>
            </div>
            <div class="card-body">
                <form class="form" method="POST" action="{{ route('admin.education.save') }}" data-toggle="validation">
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
                        <label for="major_en">Major</label>
                        <input name="major_en" id="major_en" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="major_ru">Специальность</label>
                        <input name="major_ru" id="major_ru" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="degree_en">Degree</label>
                        <input name="degree_en" id="degree_en" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="degree_ru">Степень</label>
                        <input name="degree_ru" id="degree_ru" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="study_place_en">Study place</label>
                        <input name="study_place_en" id="study_place_en" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="study_place_ru">Образовательное учреждение</label>
                        <input name="study_place_ru" id="study_place_ru" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="countries" class="form-label">Country</label>
                        <select name="country_id" id="countries" class="form-control">
                            @foreach ($countries as $country)
                                <option value="{{ $country['id'] }}">{{ $country['country_name'] }}</option>                                
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description_en">Description</label>
                        <textarea name="description_en" id="description_en" class="form-control" rows="5" placeholder="You can add a description here"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description_ru">Описание</label>
                        <textarea name="description_ru" id="description_ru" class="form-control" rows="5" placeholder="You can add a description here"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection