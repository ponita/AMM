@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
	  <li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
	  <li class="active">Index</li>
	</ol>
</div>
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="panel panel-primary">
	<div class="panel-heading ">
		<span class="glyphicon glyphicon-templates"></span>
		 Template Lists
		<div class="panel-btn">
			<a class="btn btn-sm btn-info" href="{{ URL::to("template/create") }}" >
				<span class="glyphicon glyphicon-plus-sign"></span>
				Add New
			</a>
		</div>
	</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-condensed search-table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Attachment</th>
					
				</tr>
			</thead>
			<tbody>
			@foreach($template as $template)
				<tr @if(Session::has('activetemplate'))
                            {{(Session::get('activetemplate') == $template->id)?"class='info'":""}}
                        @endif
                        >

					<td>{{ $template->t_name }}</td>
					<td>@if ($template->doc)
          <a href="{{ URL::to( 'attachment1/' . $template->doc) }}"
            target="_blank">{{ $template->doc }}</a>
          @else
          Pending
          @endif</td>
					

					<td>
						@if(Auth::user()->can('manage_templates'))
						<button class="btn btn-sm btn-danger delete-item-link {{($template == Templte::getAdmintemplates()) ? 'disabled': ''}}"
							data-toggle="modal" data-target=".confirm-delete-modal"	
							data-id='{{ URL::to("template/" . $template->id . "/delete") }}'>
							<span class="glyphicon glyphicon-trash"></span>
							{{ trans('messages.delete') }}
						</button>
						@endif
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		{{ Session::put('SOURCE_URL', URL::full()) }}
	</div>
</div>
@stop