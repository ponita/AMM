@extends("layout")
@section("content")


    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
          <li><a href="{{ URL::route('leave.index') }}">leave</a></li>
          <!-- <li class="active">New leave</li> -->
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-user"></span>
            Leave
        </div>
        <div class="panel-body">
        <!-- if there are creation errors, they will show here -->
            
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @endif
            



<div class="panel panel-info">
    <div class="panel-heading"><strong>Employee Information</strong></div>
    <div class="panel-body">    
    <div class="panel-default">
        <div class="row view-striped">
            <div class="form-group">
                <strong><span class="col-sm-2">ID #</span></strong><span class="form-control-static col-sm-6" style="color: red">{{ $leave->id }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">Name:</span></strong><span class="form-control-static col-sm-6">{{ $leave->name }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">Department:</span></strong>
                <span class="form-control-static col-sm-6">{{ $leave->department }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">Position:</span></strong>
                <span class="form-control-static col-sm-6">{{ $leave->position }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">Leave type:</span></strong>
                <span class="form-control-static col-sm-6">{{ $leave->leave_type }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">contact:</span></strong>
                <span class="form-control-static col-sm-6">{{ $leave->emp_contact }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">From-To:</span></strong>
                <span class="form-control-static col-sm-6">{{ date('d', strtotime($leave->date_from)) }}-{{ date('d M Y', strtotime($leave->date_to)) }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">Next of Kin:</span></strong>
                <span class="form-control-static col-sm-6">{{ $leave->nok_name }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">NOK Tel number:</span></strong>
                <span class="form-control-static col-sm-6">{{ $leave->nok_contact }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">Destination:</span></strong>
                <span class="form-control-static col-sm-6">{{ $leave->destination }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">Reason:</span></strong>
                <span class="form-control-static col-sm-6">{{ $leave->comment }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-2">Supervisor's mail:</span></strong>
                <span class="form-control-static col-sm-6">{{ $leave->supermail }}</span>
            </div>
        </div>
    </div>
            <div>
               <table class="table table-striped table-hover table-condensed search-table">
            <thead>
                <tr>
                    <th>SN</th>                    
                    <th>Date</th>           
                    
                </tr>
            </thead>
            <tbody>
            @foreach($leave_days as $key => $value)
                <tr  @if(Session::has('activeleave'))
                        {{(Session::get('activeleave') == $value->id)?"class='info'":""}}
                    @endif
                >
                    
                    <td></td>
                    <td>{{ date('l Y-m-d H:i:s', strtotime($value->days)) }}</td> 
                    
                    
                </tr>
            @endforeach
            </tbody>
        </table>     
            </div>
            
    </div>
      
      {{ Form::model($leave, array('files'=>true,'route' => array('leave.updateclearance', $leave->id), 'method' => 'PUT',
                'id' => 'form-edit-leave')) }}

        <div class="form-group">
                <label class="col-sm-2">Approve</label>
                    <label class="radio-inline">
                        <input type="radio" name="hr_approval_status" id="hr_approval_status1" value="Approved" checked>Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="hr_approval_status" id="hr_approval_status2" value="Rejected">No
                    </label>
            </div>

        <div class="form-group">
            {{ Form::hidden('approvedbyhr', Auth::user()->name) }}
            {{ Form::label('hr_comment', 'Comment', array('class' => 'col-sm-2')) }}
            {{ Form::text('hr_comment', Input::old('hr_comment'), array('class' => 'form-control col-sm-4')) }}

        </div>

        <div class="form-group">
            {{ Form::label('supermail', 'Supervisor', array('class' => 'col-sm-2')) }}
            {{ Form::text('supermail', Input::old('supermail'), array('class' => 'form-control col-sm-4', 'placeholder' => 'email address')) }}

        </div>
    
    

                
<div class="form-group actions-row" style="text-align:right;">
        {{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE', 
        ['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
</div>
        
                
{{ Form::close() }}

</div>
</div>
</div>
@stop   
