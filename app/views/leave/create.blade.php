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
                <!-- <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="3" value="Study">Study
                    </label>
                </div> -->
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
                        <input type="radio" name="leave_type" id="6" value="Bereavement">Bereavement Leave 
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="7" value="Administrative">Administrative Leave
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="8" value="Leave without pay">Leave without pay
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="leave_type" id="9" value="Make up Holiday">Make up Holiday
                    </label>
                </div>
            </div>
        </div>
            <div class="form-group">
            {{ Form::label('department', 'Section', array('class' => 'col-sm-2')) }}
            {{ Form::select('department', [
                    '0' =>'---Select Section---',
                     'Finance & Accounts' => 'Finance & Accounts', 'Data' => 'Data','Sample Reception' => 'Sample Reception', 'Logistics/Stores' => 'Logistics/Stores', 'EID Lab' => 'EID Lab', 'Viral Load' => 'Viral Load', 'SickleCell' =>'SickleCell', 'Hep B' =>'Hep B', 'Microbiology' => 'Microbiology', 'M&E' =>'M&E', 'Pathology/Cancer' =>'Pathology/Cancer', 'Executive Director' => 'Executive Director', 'ICT' =>'ICT', 'QA' =>'QA', 'Results QC' =>'Results QC', 'Records' =>'Records', 'Research' =>'Research','Engineering' =>'Engineering', 'Bio Repository' =>'Bio Repository', 'Customer Care' =>'Customer Care', 'Management' =>'Management', 'All' =>'All'], 
                    Input::old('department'), array('class' => 'form-control col-sm-4')) }}
            </div>
            
            <div class="form-group">
                 <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                 <input type="hidden" name="name" value="{{ Auth::user()->name }}">
            </div>
            <div class="form-group">
                {{ Form::label('position', 'Your position', array('class' => 'col-sm-2' )) }}
            {{ Form::text('position', Auth::user()->designation, Input::old('position'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email', array('class' => 'col-sm-2' )) }}
            {{ Form::text('email', Auth::user()->email, Input::old('email'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                {{ Form::label('emp_contact', 'Employee Contact', array('class' => 'col-sm-2' )) }}
            {{ Form::text('emp_contact', Input::old('emp_contact'), array('class' => 'form-control col-sm-8')) }}
            </div>
            <div class="form-group">
                 {{ Form::label('date_from', 'From', array('class' => 'col-sm-2 required')) }}
                {{ Form::text('date_from', Input::old('date_from'), array('class' => 'form-control datepicker col-sm-8', 'id'=>'date_from')) }}
            </div>
            <div class="form-group">
                {{ Form::label('date_to', 'To', array('class' => 'col-sm-2 required')) }}
            {{ Form::text('date_to', Input::old('date_to'), array('class' => 'form-control datepicker col-sm-8', 'id'=>'date_to')) }}
            </div>
            <div class="form-group">
                {{ Form::label('days', 'Number of Days', array('class' => 'col-sm-2' )) }}
            {{ Form::text('days', Input::old('days'), array('class' => 'form-control col-sm-8 read-only' ,'id' =>'NumberofDays')) }}
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
                {{ Form::label('delegate', 'Work delegated to', array('class' => 'col-sm-2' )) }}
            {{ Form::text('delegate', Input::old('delegate'), array('class' => 'form-control col-sm-8')) }}
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
    
    <script language="javascript">

        $("#date_to").change(function(){
            var date_from = $('#date_from').val();
            var date_to = $('#date_to').val();

            var numberofdays = addNumbers(date_from, date_to);
            $('#NumberofDays').val(numberofdays);          
        });
        
        
         function addNumbers(date1,date2)
        {
                            
             var date1 = new Date(date1); 
             var date2 = new Date(date2);
             var n = 0;

            while(date1<=date2){
            if( date1.getDay() >0 && date1.getDay() <6) n++;
            date1.setDate(date1.getDate()+1) ;
            }
            return n;

        }
    </script>
</form>
</div>
</div>
    {{ Form::close() }}
    </div>
@stop