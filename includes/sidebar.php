	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 col-md-1 sidebar">
				<ul class="nav nav-sidebar">
					<?php
						foreach ($campuses as $campusId => $campusName) {
							echo '<li><a href="#" class="campusName" id="' . $campusName . '">' . $campusId . '</a></li>';
						}
					?>
				</ul>
			</div>
			<div class="col-sm-3 col-sm-offset-2 col-md-2 col-md-offset-1 sidebar sidebarLinks">
				<ul class="nav nav-sidebar">
					<?php
						foreach ($modules as $moduleId => $moduleName) {
							echo '<li><a href="#" class="sidebarLink" id="' . $moduleId . '">' . $moduleName . '</a></li>';
						}
					?>
				</ul>
			</div>