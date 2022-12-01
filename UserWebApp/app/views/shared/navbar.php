<nav class="navbar navbar-expand-md bg-light">
	<div class="container-xxl">
		<a class="navbar-brand" href="/Dashboard/index">
	      	<span class="display-6">VIP</span>
	      	<span class="fw-light text-secondary display-6">Valet</span>
	    </a>

		<!-- Hamburger menu for small screens aka phones and tablets -->
	    <?php 
	    	if (!isset($_SESSION['user_id'])) { 
	    		echo "Login first to access the application.";
			} else { ?>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>

				<!-- Navbar Links -->
				<div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
					<ul class="navbar-nav ms-auto flex-nowrap">
						<li class="nav-item">
							<a class="nav-link" href="/User/index">Account</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/User/logout">Logout</a>
						</li>
					</ul>
				</div>
	    	<?php } ?>
	</div>
</nav>