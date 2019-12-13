@extends('admin.layouts.main')

@section('content')
<div class="row gutter-xs">
    <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          <div class="card-actions">
            <button type="button" class="card-action card-toggler" title="Collapse"></button>
          </div>
          <strong>Messages from contact form</strong>
        </div>
        <div class="card-body">
            <table id="demo-datatables-1" class="table table-striped table-nowrap dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactMessages as $contactMessage)
                        <tr>
                            <td>{{ $contactMessage['name'] }}</td>
                            <td>{{ $contactMessage['email'] }}</td>
                            <td>{{ $contactMessage['message'] }}</td>
                            <td>
                                {{ Carbon\Carbon::parse($contactMessage['created_at'])->toFormattedDateString() }} -
                                {{ Carbon\Carbon::parse($contactMessage['created_at'])->toTimeString() }}
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <form method="POST" action="{{ route('admin.contact.delete', $contactMessage['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-default btn-danger btn-sm" type="submit">
                                            <span class="icon icon-trash"></span>
                                        </button>
                                    </form>                                    
                                </div>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
@endsection