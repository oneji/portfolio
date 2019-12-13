@extends('admin.layouts.main')

@section('content')
    <div class="row gutter-xs">
        @foreach ($widgets as $alias => $number)
            <div class="col-xs-12 col-md-3">
                <div class="card bg-primary no-border">
                    <div class="card-values">
                    <div class="p-x">
                        <small>{{ $alias }}</small>
                        <h3 class="card-title fw-l">{{ $number }}</h3>
                    </div>
                    </div>
                    <div class="card-chart">
                    <canvas data-chart="line" data-animation="false" data-labels='["Jun 21", "Jun 20", "Jun 19", "Jun 18", "Jun 17", "Jun 16", "Jun 15"]' data-values='[{"backgroundColor": "rgba(255, 255, 255, 0.5)", "borderColor": "#ffffff", "data": [8796, 11317, 8678, 9452, 8453, 11853, 9945]}]' data-scales='{"yAxes": [{ "ticks": {"max": 12742}}]}' data-hide='["legend", "points", "scalesX", "scalesY", "tooltips"]' height="35"></canvas>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection