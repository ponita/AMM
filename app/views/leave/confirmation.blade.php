<!--@extends("layout")-->
@section("content")



<div>
    <ol class="breadcrumb">
      <li><a href="{{{URL::route('user.home')}}}">{{trans('messages.home')}}</a></li>
      <li class="active">leave </li>
    </ol>
</div>



@if (Session::has('message'))
    <div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
@endif

<div>
    <i>Please confirm if you would like to retain all these days for leave<br>
    If not, please delete some</i>
</div>

<div class="panel panel-primary">
    <div class="panel-heading ">
        <span class="glyphicon glyphicon-dashboard"></span>
        {{ count($leave_days); }}
        
    </div>
    
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed search-table">
            <thead>
                <tr>
                    <th>SN</th>                    
                    <th>Date</th>           
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($leave_days as $key => $value)
                <tr  @if(Session::has('activeleave'))
                        {{(Session::get('activeleave') == $value->id)?"class='info'":""}}
                    @endif
                >
                    
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->days }}</td> 
                    
                    <td align="center">
                       <a class="btn btn-sm btn-danger"
                                href="{{ URL::route('leave.delete', $value->id) }}"
                                id="view-details-{{$value->id}}-link" 
                                title="Delete list">
                                <span class="glyphicon glyphicon-eye-open"></span>
                                Delete
                            </a>
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ Session::put('SOURCE_URL', URL::full()) }}
        {{ Session::put('TESTS_FILTER_INPUT', Input::except('_token')); }}
    </div>
</div>
<div align="right">
    <a class="btn btn-sm btn-info"
                                href="{{ URL::route('leave.index') }}"
                                >
                                <span class="glyphicon glyphicon-eye-open"></span>
                                Exit
                            </a>
</div>
@stop