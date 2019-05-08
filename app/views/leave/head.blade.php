@extends("layout")
@section("content")


    <div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
          <li><a href="{{ URL::route('leave.index') }}">leave</a></li>
          <!-- <li class="active">New leave</li> -->
        </ol>
    </div>
    
            



<div class="panel panel-info">
    <div class="panel-heading"><strong>Leave Information</strong></div>
    <div class="panel-body"> 
 
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @endif

            <div class="col-md-5">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                            
                                <div class="col-xs-9 text-right">
                                    <div>Employee Information</div>
                                </div>
                            </div>
                        </div>
                    <div class="panel-footer">
            <div class="form-group">
                <strong><span class="col-sm-4">Name:</span></strong><span class="form-control-static col-sm-6 col-sm-offset-1">{{ $leave->name }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">Department:</span></strong>
                <span class="form-control-static col-sm-6 col-sm-offset-1">{{ $leave->department }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">Position:</span></strong>
                <span class="form-control-static col-sm-6 col-sm-offset-1">{{ $leave->position }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">Leave type:</span></strong>
                <span class="form-control-static col-sm-6 col-sm-offset-1">{{ $leave->leave_type }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">contact:</span></strong>
                <span class="form-control-static col-sm-6 col-sm-offset-1">{{ $leave->emp_contact }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">Next of Kin:</span></strong>
                <span class="form-control-static col-sm-6 col-sm-offset-1">{{ $leave->nok_name }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">NOK Tel number:</span></strong>
                <span class="form-control-static col-sm-6 col-sm-offset-1">{{ $leave->nok_contact }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">Destination:</span></strong>
                <span class="form-control-static col-sm-6 col-sm-offset-1">{{ $leave->destination }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">Reason</span></strong>
                <span class="form-control-static col-sm-6 col-sm-offset-1">{{ $leave->comment }}</span>
            </div>
                                <div class="clearfix"></div>
                            </div>
                    </div>
            </div>
                <div class="col-md-4 col-md-offset-2">
                   <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-right">
                                    <div>Supervisor info</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
             <div class="form-group">
                <strong><span class="col-sm-4">Name</span></strong><span class="form-control-static col-sm-10">{{ $leave->approvedbys }}</span>
            </div>
             <div class="form-group">
                <strong><span class="col-sm-4">Status</span></strong><span class="form-control-static col-sm-10">{{ $leave->s_approval_status }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">Comment</span></strong>
                <span class="form-control-static col-sm-10">{{ $leave->s_comment }}</span>
            </div>
            
                                <div class="clearfix"></div>
                            </div>
                    </div>

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-9 text-right">
                                    <div>Manager info</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
             <div class="form-group">
                <strong><span class="col-sm-4">Name</span></strong><span class="form-control-static col-sm-10">{{ $leave->approvedbym }}</span>
            </div>
             <div class="form-group">
                <strong><span class="col-sm-4">Status</span></strong><span class="form-control-static col-sm-10">{{ $leave->m_approval_status }}</span>
            </div>
            <div class="form-group">
                <strong><span class="col-sm-4">Comment</span></strong>
                <span class="form-control-static col-sm-10">{{ $leave->m_comment }}</span>
            </div>
            
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                </div>
      
      {{ Form::model($leave, array('files'=>true,'route' => array('leave.updatehead', $leave->id), 'method' => 'PUT',
                'id' => 'form-edit-leave')) }}

    <div class="col-md-12">
        <div class="form-group">
                <label class="col-sm-2">Approve</label>
                    <label class="radio-inline">
                        <input type="radio" name="h_approval_status" id="h_approval_status1" value="Approved" checked>Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="h_approval_status" id="h_approval_status2" value="Rejected">No
                    </label>
            </div>

        <div class="form-group">
            {{ Form::hidden('approvedbyh', Auth::user()->name) }}
            {{ Form::label('h_comment', 'Comment', array('class' => 'col-sm-2')) }}
            {{ Form::textarea('h_comment', Input::old('h_comment'), array('class' => 'form-control col-sm-10')) }}

        </div>
        <div class="form-group">
            {{ Form::label('section', 'Reply', array('class' => 'col-sm-2')) }}
            {{ Form::textarea('section', Input::old('section'), array('class' => 'form-control col-sm-10', 'placeholder' => 'reply to the employee')) }}

        </div>
        <div class="form-group">
            {{ Form::hidden('email', Input::old('email'), array('class' => 'form-control col-sm-10')) }}
        </div>
        <div class="form-group">
            {{ Form::hidden('name', Input::old('name'), array('class' => 'form-control col-sm-10')) }}
        </div>
    
    </div>
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
