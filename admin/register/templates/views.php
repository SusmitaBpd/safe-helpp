<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you customers.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<div class="d-grid gap-2 mb-3">
										<a class='btn btn-google btn-lg' href='index.html'><i class="fab fa-fw fa-google"></i> Sign up with Google</a>
										<a class='btn btn-facebook btn-lg' href='index.html'><i class="fab fa-fw fa-facebook-f"></i> Sign up with Facebook</a>
										<a class='btn btn-microsoft btn-lg' href='index.html'><i class="fab fa-fw fa-microsoft"></i> Sign up with Microsoft</a>
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
									
									<form id="register-form-data"  method="get">
									<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your username" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" id="pass" name="password" placeholder="Enter password" required />
											<div id="passwordError"></div>
										</div>
										<div class="mb-3">
											<label class="form-label">Confirm Password</label>
											<input class="form-control form-control-lg" type="password" id="confirm-pass" name="comfirm_password" placeholder="Re-enter the password" required />
										</div>
										<div id="CheckPasswordMatch"></div>
										<br>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" id="submit" name="submit" class="btn btn-lg btn-primary" disabled>Sign up</button>
											
											
										</div>
									</form>
									
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
						<div id="result_show"></div>
							Already have account? <a href='../login'>Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	

  	
