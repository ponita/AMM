@section("sidebar")

<nav id="side_nav">
			<ul>

				<li>
					<a href="{{ URL::route('user.home')}}"><span class="ion-speedometer"></span> <span class="nav_title">HOME</span></a>
				</li>

			@if(Entrust::can('view_reports'))
				<li class="nav_trigger">
					<a href="#">
					<span class="glyphicon glyphicon-signal"></span>
						<span class="nav_title">REPORTS</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">REPORTS</h4>
							<ul>
							<li>
							<a href="{{ URL::route('meetings.report')}}">
								<span class="glyphicon glyphicon-tag"></span>Events</a>
							</li>
							<li>
								<a href="{{ URL::route('letters.report')}}">
								<span class="glyphicon glyphicon-tag"></span>Outgoing Letters</a>
							</li>
							<li>
								<a href="{{ URL::route('leave.report')}}">
								<span class="glyphicon glyphicon-tag"></span>Leave List</a>
							</li>
							<li>
								<a href="{{ URL::route('event.report')}}">
								<span class="glyphicon glyphicon-tag"></span> UNHLS Workplan Summary</a>
							</li>
							
							
						</ul>

							<h4 class="panel_heading panel_heading_first">FILTERS</h4>
							<ul>
							<li>
							<a href="{{ URL::route('reports.department')}}">
								<span class="glyphicon glyphicon-tag"></span>Activities</a>
							</li>
							<!-- <li>
							<a href="{{ URL::route('reports.meetingreport')}}">
								<span class="glyphicon glyphicon-tag"></span>Meetings</a>
							</li> -->
							<li>
							<a href="{{ URL::route('reports.detailed')}}">
								<span class="glyphicon glyphicon-tag"></span>Detailed</a>
							</li>
							<!-- <li>
								<a href="#">
								<a href="{{ URL::route('event.strategicPlan')}}">
								<span class="glyphicon glyphicon-tag"></span>UNHLS WOKPLAN</a>
							</li> -->
							<li>
							<a href="{{ URL::route('reports.download')}}">
								<span class="glyphicon glyphicon-tag"></span>Download</a>
							</li>
							<li>
							<a href="#">
								<span class="glyphicon glyphicon-tag"></span>User Statistics</a>
							</li>
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>
				@endif
				<li>
					<a href="{{ URL::route('event.team')}}"><span class="glyphicon glyphicon-user"></span> <span class="nav_title">TEAM</span></a>
				</li>

				<li class="nav_trigger">
					<a href="#">
					<span class="glyphicon glyphicon-link"></span>
					
						<span class="nav_title">ACTIVITIES</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">ACTIVITY INFORMATION</h4>
							<ul>
							
							<li>
								<a href="{{ URL::route('event.index')}}">
								<span class="glyphicon glyphicon-list"></span> List of Activities</a>
							</li>
							<li>
     				 @if(Auth::user()->can('manage_activities'))
							
							<a href="{{ URL::route('event.create')}}">
								<span class="glyphicon glyphicon-plus-sign"></span> New Activity</a>
							</li>
					@endif
							<li>
								<a href="{{ URL::route('event.Unapproved')}}">
								<span class="glyphicon glyphicon-list"></span>Not approved </a>
							</li>
							<li>
								<a href="{{ URL::route('event.pending')}}">
								<span class="glyphicon glyphicon-list"></span>Pending</a>
							</li>
							
							<li>
								<a href="{{ URL::route('event.complete')}}">
								<span class="glyphicon glyphicon-list"></span>Complete</a>
							</li>
							<li>
								<a href="{{ URL::route('event.unattached')}}">
								<span class="glyphicon glyphicon-list"></span>Unattached reports</a>
							</li>
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>


			<li class="nav_trigger">
					<a href="#">
					<!--	<span class="ion-info"></span> -->
					<span class="glyphicon glyphicon-book"></span>
						<span class="nav_title">MEETINGS</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 800px;">
							<h4 class="panel_heading panel_heading_first">MEETING INFORMATION</h4>
							<ul>
							
       @if(Auth::user()->can('manage_meeting'))
							<li>
								<a href="{{ URL::route('meetings.meeting')}}">
								<span class="glyphicon glyphicon-plus-sign"></span>Register Meeting</a>
							</li>
							@endif
							<li>
							    <a href="{{ URL::route('meetings.meetingindex')}}"> 
								<span class="glyphicon glyphicon-list"></span> List of meetings</a>
							</li>
							<li>
							    <a href="{{ URL::route('meeting.internal', ['type'=> 'Internal'])}}"> 
								<span class="glyphicon glyphicon-list"></span>Internal Unapproved</a>
							</li>
							<li>
							    <a href="{{ URL::route('meeting.external', ['type'=> 'External'])}}"> 
								<span class="glyphicon glyphicon-list"></span>External Unapproved</a>
							</li>
							<li>
							    <a href="{{ URL::route('meeting.pending', ['action' => '1'])}}"> 
								<span class="glyphicon glyphicon-list"></span>Pending</a>
							</li>
							
							<li>
							    <a href="{{ URL::route('meeting.comp', ['status' => '2' ,'action' => '2'])}}"> 
								<span class="glyphicon glyphicon-list"></span> Complete</a>
							</li>
							<li>
							    <a href="{{ URL::route('meeting.unattached', ['status' => '1'])}}"> 
								<span class="glyphicon glyphicon-list"></span>Unattached Minutes</a>
							</li>
							
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>				

			
			<li class="nav_trigger">
					<a href="#">
					<span class="glyphicon glyphicon-send"></span>
						
						<span class="nav_title">MEMO</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">MEMO & INVITATIONS</h4>
							<ul>
        @if(Auth::user()->can('manage_memo'))
							
							<li>
								<a href="{{ URL::route('letters.letter')}}">
								<span class="glyphicon glyphicon-plus-sign"></span>New Memo</a>
							</li>
							
							<li>
								<a href="{{ URL::route('letters.letter_index')}}">
								<span class="glyphicon glyphicon-list"></span> List of Memo</a>
							</li>
							@endif
							<li>
								<a href="{{ URL::route('invitation.invitation')}}">
								<span class="glyphicon glyphicon-plus-sign"></span>New Invitation</a>
							</li>
							
    @if(Auth::user()->can('manage_invitation'))
							
							<li>
								<a href="{{ URL::route('invitation.invitation_index')}}">
								<span class="glyphicon glyphicon-list"></span> List of Invitations</a>
							
							</li>
							@endif
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>

				<li class="nav_trigger">
					<a href="#">
					<span class="glyphicon glyphicon-send"></span>
						
						<span class="nav_title">LEAVE FORM</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">LEAVE </h4>
							<ul>
        @if(Auth::user()->can('view_leave_form'))
							
							<li>
								<a href="{{ URL::route('leave.create')}}">
								<span class="glyphicon glyphicon-plus-sign"></span>Leave form</a>
							</li>
							
							<li>
								<a href="{{ URL::route('leave.index')}}">
								<span class="glyphicon glyphicon-list"></span> Leave List</a>
							</li>
							@endif
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>
			

			
			@if(Entrust::can('manage_configurations'))
		<li class="nav_trigger">
					<a href="#">
					<span class="glyphicon glyphicon-paperclip"></span>
						
						<span class="nav_title">CONFIGURATIONS</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">CONFIGURATIONS</h4>
							<ul>
							<li>
								<a href="{{ URL::route('thematicAreas.index')}}">
								<span class="glyphicon glyphicon-tag"></span> Thematic Areas</a>
							</li>
							<li>
								<a href="{{ URL::route('unhlsWorkplan.index')}}">
								<span class="glyphicon glyphicon-tag"></span> UNHLS Workplan</a>
							</li>
							<li>
							<a href="{{ URL::route('healthregion.index')}}">
								<span class="glyphicon glyphicon-tag"></span> Health Region</a>
							</li>
							<li>
								<a href="{{ URL::route('organisers.index')}}">
								<span class="glyphicon glyphicon-tag"></span> Organiser</a>
							</li>
							<li>
								<a href="{{ URL::route('funders.index')}}">
								<span class="glyphicon glyphicon-tag"></span> Funder</a>
							</li>
							<li>
								<a href="{{ URL::route('hubs.index')}}">
								<span class="glyphicon glyphicon-tag"></span> Hubs</a>
							</li>
							<li>
								<a href="{{ URL::route('action.index')}}">
								<span class="glyphicon glyphicon-tag"></span> Action Points</a>
							</li>

							<li>
								<a href="{{ URL::route('template.index')}}">
								<span class="glyphicon glyphicon-tag"></span>Report Templates</a>
							</li>
							<!-- <li>
								<a href="{{ URL::route('maction.index')}}">
								<span class="glyphicon glyphicon-tag"></span>  meeting Action Points</a>
							</li> -->
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>
				@endif

			@if(Entrust::can('manage_users'))
				<li class="nav_trigger">
					<a href="#">
						<span class="ion-key"></span>
						<span class="nav_title">ACCESS CONTROL</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">Access Control</h4>
							<ul>
					<li>
						<div>
							<a href="{{ (Entrust::can('manage_users')) ? URL::route('user.index') : URL::to('user/'.Auth::user()->id.'/edit') }}">
								<span class="glyphicon glyphicon-tag"></span> {{trans('messages.user-accounts')}}</a>
						</div>
					</li>
					<li>
						<div>
							<a href="{{ URL::route("permission.index")}}">
								<span class="glyphicon glyphicon-tag"></span> {{ Lang::choice('messages.permission', 2)}}</a>
						</div>
					</li>
					<li>
						<div>
							<a href="{{ URL::route("role.index")}}">
								<span class="glyphicon glyphicon-tag"></span> {{ Lang::choice('messages.role', 2)}}</a>
						</div>
					</li>
					<li>
						<div>
							<a href="{{ URL::route("role.assign")}}">
								<span class="glyphicon glyphicon-tag"></span> {{trans('messages.assign-roles')}}</a>
						</div>
					</li>
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>
				@endif
				
				<li class="nav_trigger">
					<a href="#">
					<span class="glyphicon glyphicon-globe"></span>
						
						<span class="nav_title">OTHER SYSTEMS</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">Other systems</h4>
							<ul>
								<li>
									<div>
										<a href="http://www.cphluganda.org/" target="blank">
											<span class="glyphicon glyphicon-tag"></span> EID</a>
									</div>
								</li>
								<li>
									<div>
										<a href="http://www.cphluganda.org/" target="blank">
											<span class="glyphicon glyphicon-tag"></span> Viral Load</a>
									</div>
								</li>
								<li>
									<div>
										<a href="http://www.cphl.go.ug/" target="blank">
											<span class="glyphicon glyphicon-tag"></span>CPHL Website</a>
									</div>
								</li>
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>

			</ul>
		</nav>
@show
