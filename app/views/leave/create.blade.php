@extends("layout")
@section("content")

<div>
        <ol class="breadcrumb">
          <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
          <li><a href="{{ URL::route('leave.index') }}">Leave Form</a></li>
          <li class="active">Leave Form</li>
        </ol>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading ">
            <span class="glyphicon glyphicon-user"></span>
        
        </div>
        <div class="panel-body">
        <!-- if there are creation errors, they will show here -->
            
            @if($errors->all())
                <div class="alert alert-danger">
                    {{ HTML::ul($errors->all()) }}
                </div>
            @endif
            
{{ Form::open(array('url' => 'leave', 'id' => 'form-create-event','files'=>true, 'autocomplete' => 'off')) }}

           <!--to be removed function for csrf_token -->

<div class="panel panel-info">
    <div class="panel-heading"><strong>INFORMATION TO BE FILLED IN BY APPLICANT</strong></div>
    <div class="panel-body">
<div class="row">
        <form role="form">
                <div class="form-group">
                <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Leave type</button> -->
                <label>Leave type</label>
            <div class="col-md-5">
                <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="1" value="Annual" checked>Annual
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="2" value="Sick">Sick
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="3" value="Study">Study
                    </label>
                </div>
                 <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="4" value="Maternity">Maternity
                    </label>
                </div>
                 <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="5" value="Paternity">Paternity
                    </label>
                </div>
                 <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="6" value="Compassionate">Compassionate
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="7" value="Domestic problems">Domestic problems
                    </label>
                </div>
            </div>
        </div>
            <div class="form-group">
            {{ Form::label('department', 'Section', array('class' => 'col-sm-2')) }}
            {{ Form::select('department', [
                    '0' =>'---Select Section---',
                     'Finance & Accounts' => 'Finance & Accounts', 'Data' => 'Data','Sample Reception' => 'Sample Reception', 'Logistics/Stores' => 'Logistics/Stores', 'EID Lab' => 'EID Lab', 'Viral Load' => 'Viral Load', 'SickleCell' =>'SickleCell', 'Hep B' =>'Hep B', 'Microbiology' => 'Microbiology','Executive Director' => 'Executive Director', 'ICT' =>'ICT', 'QA' =>'QA', 'Results QC' =>'Results QC', 'Records' =>'Records', 'Research' =>'Research','Engineering' =>'Engineering', 'Bio Repository' =>'Bio Repository', 'Customer Care' =>'Customer Care', 'Management' =>'Management', 'All' =>'All'], 
                    Input::old('department'), array('class' => 'form-control col-sm-4')) }}
            </div>
            
            <div class="form-group">
                 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                {{ Form::label('name', 'Your Name', array('class' => 'col-sm-2' )) }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('position', 'Your position', array('class' => 'col-sm-2' )) }}
            {{ Form::text('position', Input::old('position'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email', array('class' => 'col-sm-2' )) }}
            {{ Form::text('email', Input::old('email'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('emp_contact', 'Employee Contact', array('class' => 'col-sm-2' )) }}
            {{ Form::text('emp_contact', Input::old('emp_contact'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('days', 'Number of Days', array('class' => 'col-sm-2' )) }}
            {{ Form::text('days', Input::old('days'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                 {{ Form::label('date_from', 'From', array('class' => 'col-sm-2 required')) }}
                {{ Form::text('date_from', Input::old('date_from'), array('class' => 'form-control standard-datepicker col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('date_to', 'To', array('class' => 'col-sm-2 required')) }}
            {{ Form::text('date_to', Input::old('date_to'), array('class' => 'form-control standard-datepicker col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('destination', 'Destination', array('class' => 'col-sm-2' )) }}
            {{ Form::text('destination', Input::old('destination'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('nok_name', 'Next of Kin', array('class' => 'col-sm-2' )) }}
            {{ Form::text('nok_name', Input::old('nok_name'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('nok_contact', 'Next of Kin Tel', array('class' => 'col-sm-2' )) }}
            {{ Form::text('nok_contact', Input::old('nok_contact'), array('class' => 'form-control col-sm-8')) }}
            </div> 
           <div class="form-group">
                {{ Form::label('supermail', 'Supervisor email', array('class' => 'col-sm-2' )) }}
            {{ Form::text('supermail', Input::old('supermail'), array('class' => 'form-control col-sm-8')) }}
            </div>
            
            <div class="form-group">
                {{ Form::label('comment', 'Reason', array('class' => 'col-sm-2' )) }}
            {{ Form::textarea('comment', Input::old('comment'), array('class' => 'form-control col-sm-8')) }}
            </div>

            <button type="submit" class="btn btn-default">Submit Button</button>
    
  <!--  Modal
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
       Modal content
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Choose the type</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-4">
                <label  class="radio-inline">            
                    {{ Form::radio('leave_type', 'Annual', (Input::old('leave_type') == 'Annual'), array('id'=>'annual', 'class'=>'radio')) }}     
                    Annual
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">              
                <label  class="radio-inline">            
                    {{ Form::radio('leave_type', 'Sick', (Input::old('leave_type') == 'Sick'), array('id'=>'sick', 'class'=>'radio')) }}     
                    Sick
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">              
                <label  class="radio-inline">            
                    {{ Form::radio('leave_type', 'Study', (Input::old('leave_type') == 'Study'), array('id'=>'study', 'class'=>'radio')) }}     
                    Study
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label  class="radio-inline">            
                    {{ Form::radio('leave_type', 'Maternity', (Input::old('leave_type') == 'maternity'), array('id'=>'maternity', 'class'=>'radio')) }}     
                    Maternity
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">              
                <label  class="radio-inline">            
                    {{ Form::radio('leave_type', 'Paternity', (Input::old('leave_type') == 'Paternity'), array('id'=>'paternity', 'class'=>'radio')) }}     
                    Paternity
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">              
                <label  class="radio-inline">            
                    {{ Form::radio('leave_type', 'Compassionate', (Input::old('leave_type') == 'Compassionate'), array('id'=>'compassionate', 'class'=>'radio')) }}     
                    Compassionate
                </label>
            </div>
        </div>


        <div id="A_options" class="form-group hidden">
<hr>
                <div class="row">
                    <div class="col-sm-4">
                         <label class="control-label">From</label>  
                    </div>
                

                    <div class="col-sm-8">
                            {{ Form::text('number', '1', (Input::old('number') == '1'), array('id'=>'from_warehouse', 'class'=>'form-control col-sm-4')) }}     
                            Facility
                    </div>
                </div>
        </div>

      

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">submit</button>
        </div>
      </div>
      
    </div>
  </div>
</div> -->
</form>
</div>
</div>
    {{ Form::close() }}
    </div>
@stop