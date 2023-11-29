<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back!</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									
									<form id="user-login-form">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="user_log_email" placeholder="Enter your email" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="user_log_password" placeholder="Enter your password" required />
											
										</div>
										
										<div class="d-grid gap-2 mt-3">
											<button type="submit" name="submit" id="submit" class="a_btn">Sign in</button>
											
										</div>
									</form>
									<div class="text-center mt-3">
								       <div id="result_show"></div>
									</div>

								
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Don't have an account? <a href='../register'>Sign up</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
