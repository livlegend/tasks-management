<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
	<div class="logo d-flex justify-content-between">
		<a href="{{ url('tasks') }}"><h4 class="text-primary">Tasks Manage</h4></a>
		<div class="sidebar_close_icon d-lg-none">
			<i class="ti-close"></i>
		</div>
	</div>
	<ul id="sidebar_menu">
		<li>
			<a  href="{{ url('tasks') }}">
				<div class="icon_menu text-center">
					<i class="ti-agenda"></i>
				</div>
				<span>Tasks</span>
			</a>
		</li>
		<li>
			<a  href="{{ url('projects') }}">
				<div class="icon_menu text-center">
					<i class="ti-harddrives"></i>
				</div>
				<span>Projects</span>
			</a>
		</li>
	</ul>
	
</nav>