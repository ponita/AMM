@extends("layout")
@section("content")

	<div>
		<ol class="breadcrumb">
		<li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		 <li><a href="{{ URL::route('control.resultsIndex') }}">{{ Lang::choice('messages.controlresults',2) }}</a></li>
		<li class="active">{{trans('messages.control-results-edit')}}</li>
		</ol>
	</div>
	@if (Session::has('message'))
		<div class="alert alert-info">{{ trans(Session::get('message')) }}</div>
	@endif
	<div class="panel panel-primary">
		<div class="panel-heading ">
			<span class="glyphicon glyphicon-edit"></span>
			{{ trans('messages.edit-results') }}
		</div>
		<div class="panel-body">
			@if($errors->all())
				<div class="alert alert-danger">
					{{ HTML::ul($errors->all()) }}
				</div>
			@endif
			
				<div class="container-fluid">
                <div class="row">
                    {{ Form::open(array('route' => array('controlresult.update', $controlTest->id), 'method' => 'POST', 'id' => 'form-edit-control')) }}
                        @foreach($controlTest->control->controlMeasures as $key => $controlMeasure)
                            <div class="form-group">
                                <?php
                                    $ans = "";
                                    foreach ($controlTest->controlResults as $controlResult) {
                                        if($controlResult->control_measure_id == $controlMeasure->id) {
                                            $ans = $controlResult->results;
                                        }
                                    }
                                ?>
                                @if ( $controlMeasure->isNumeric() ) 
                                    {{ Form::label("m_".$controlMeasure->id , $controlMeasure->name) }}
                                    {{ Form::text("m_".$controlMeasure->id, $ans, array(
                                        'class' => 'form-control result-interpretation-trigger'))
                                    }}
                                    <span class='units'>
                                        {{$controlMeasure->controlMeasureRanges->first()->getRangeUnit()}}
                                    </span>
                                @else ( $controlMeasure->isAlphanumeric() ) 
                                    {{ Form::label("m_".$controlMeasure->id , $controlMeasure->name) }}
                                    {{ Form::select("m_".$controlMeasure->id, array(null => '') +$controlMeasure->controlMeasureRanges->lists('alphanumeric', 'alphanumeric'), $ans,
                                        array('class' => 'form-control result-interpretation-trigger',
                                        'data-url' => URL::route('test.resultinterpretation'),
                                        'data-measureid' => $controlMeasure->id
                                        )) 
                                    }}
                                @endif
                            </div>
                        @endforeach
                        <div class="form-group actions-row">
                            {{ Form::button('<span class="glyphicon glyphicon-save">
                                </span> '.trans('messages.save-test-results'),
                                array('class' => 'btn btn-default', 'onclick' => 'submit()')) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
	</div>
@stop