@section("sidebar")

<nav id="side_nav">
			<ul>

				<li>
					<a href="{{ URL::route('user.home')}}"><span class="ion-speedometer"></span> <span class="nav_title">HOME</span></a>
				</li>

			@if(Entrust::can('view_reports'))
				<li class="nav_trigger">
					<a href="#">
						<span class="ion-nuclear"></span>
						<span class="nav_title">REPORTS</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">ALL REPORTS</h4>
							<ul>
							<li>
								<a href="{{ URL::route('event.report')}}">
								<span class="glyphicon glyphicon-list"></span> Activity</a>
							</li>
							<li>
							<a href="{{ URL::route('meetings.report')}}">
								<span class="glyphicon glyphicon-plus-sign"></span> Meeting</a>
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
						<span class="ion-nuclear"></span>
						<span class="nav_title">ACTIVITIES</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">ACTIVITIES REPORTING</h4>
							<ul>
							<li>
								<a href="{{ URL::route('event.index')}}">
								<span class="glyphicon glyphicon-list"></span> List of all Activities</a>
							</li>
							<li>
							<a href="{{ URL::route('event.create')}}">
								<span class="glyphicon glyphicon-plus-sign"></span> New Activity</a>
							</li>

							<li>
								<a href="{{ URL::route('event.eventfilter')}}">
								<span class="glyphicon glyphicon-list"></span> Search / Filter</a>
							</li>
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>


			<li class="nav_trigger">
					<a href="#">
					<!--	<span class="ion-info"></span> -->
					<span class="glyphicon glyphicon-eye-open"></span>
						<span class="nav_title">MEETINGS</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 800px;">
							<h4 class="panel_heading panel_heading_first">MEETING REPORT</h4>
							<ul>
							<li>
								<a href="{{ URL::route('meetings.meeting')}}">
								<span class="glyphicon glyphicon-list"></span> Meeting Register</a>
							</li>
							<li>
							    <a href="{{ URL::route('meetings.meetingindex')}}"> 
								<span class="glyphicon glyphicon-circle-arrow-up"></span> List of meetings</a>
							</li>
							
							<!-- <li>
							    <a href="{{ URL::route('event.create')}}"> 
								<span class="glyphicon glyphicon-play"></span> Ongoing meeting</a>
							</li>
							
							<li>
							    <a href="{{ URL::route('event.create')}}"> 
								<span class="glyphicon glyphicon-circle-arrow-down"></span> Previous meeting</a>
							</li>
							<li>
								<a href="{{ URL::route('event.eventfilter')}}">
								<span class="glyphicon glyphicon-search"></span> Search / Filter</a>
							</li> -->
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>				

			
			<li class="nav_trigger">
					<a href="#">
						<span class="ion-nuclear"></span>
						<span class="nav_title">MEMO</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<h4 class="panel_heading panel_heading_first">MEMO REPORTING</h4>
							<ul>
							
							<li>
								<a href="{{ URL::route('letters.letter')}}">
								<span class="glyphicon glyphicon-eye-open"></span>New Memo</a>
							</li>
							<li>
								<a href="{{ URL::route('letters.letter_index')}}">
								<span class="glyphicon glyphicon-list"></span> List of Memo</a>
							</li>
							<li>
								<a href="{{ URL::route('invitation.invitation')}}">
								<span class="glyphicon glyphicon-eye-open"></span>New Invitation</a>
							</li>
							<li>
								<a href="{{ URL::route('invitation.invitation_index')}}">
								<span class="glyphicon glyphicon-list"></span> List of Invitations</a>
							</li>
								<a href="{{ URL::route('event.eventfilter')}}">
								<span class="glyphicon glyphicon-list"></span> Search / Filter</a>
							</li>
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>
			

			
			@if(Entrust::can('manage_configurations'))
		<li class="nav_trigger">
					<a href="#">
						<span class="ion-nuclear"></span>
						<span class="nav_title">CONFIGURATIONS</span>
					</a>
					<div class="sub_panel" style="left: -220px;">
						<div class="side_inner ps-ready ps-container" style="height: 620px;">
							<ul>
							<li>
								<a href="{{ URL::route('thematicAreas.index')}}">
								<span class="glyphicon glyphicon-list"></span> Thematic Areas</a>
							</li>
							<li>
							<a href="{{ URL::route('healthregion.index')}}">
								<span class="glyphicon glyphicon-plus-sign"></span> Health Region</a>
							</li>
							<li>
								<a href="{{ URL::route('organisers.index')}}">
								<span class="glyphicon glyphicon-list"></span> Organiser</a>
							</li>
							<li>
								<a href="{{ URL::route('funders.index')}}">
								<span class="glyphicon glyphicon-list"></span> Funder</a>
							</li>
							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>
				@endif

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
				
				<li class="nav_trigger">
					<a href="#">
						<span class="ion-key"></span>
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

							</ul>

						<div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px; width: 215px; display: none;"><div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 3px; height: 620px; display: none;"><div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div></div></div>
					</div>
				</li>

			</ul>
		</nav>
@show
