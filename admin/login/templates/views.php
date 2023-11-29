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
									<div class="d-grid gap-2 mb-3">
										<a class='btn btn-google btn-lg' href='index.html'><i class="fab fa-fw fa-google"></i> Sign in with Google</a>
										<a class='btn btn-facebook btn-lg' href='index.html'><i class="fab fa-fw fa-facebook-f"></i> Sign in with Facebook</a>
										<a class='btn btn-microsoft btn-lg' href='index.html'><i class="fab fa-fw fa-microsoft"></i> Sign in with Microsoft</a>
									</div>
									<div class="row">
										<div class="col">
											<hr>
										</div>
										<div class="col-auto text-uppercase d-flex align-items-center">Or</div>
										<div class="col">
											<hr>
										</div>
									</div>
									<form id="login-form">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required />
											<small>
												<a href='pages-reset-password.html'>Forgot password?</a>
											</small>
										</div>
										<div>
											<div class="form-check align-items-center">
												<input id="customControlInline" type="checkbox" class="form-check-input" value="1" name="remember-me"
													checked>
												<label class="form-check-label text-small" for="customControlInline">Remember me</label>
											</div>
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" name="submit" id="submit" class="btn btn-lg btn-primary">Sign in</button>
											
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
