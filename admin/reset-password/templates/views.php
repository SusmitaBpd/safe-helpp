<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Forget Password</h1>
							<p class="lead">
								Please put a valid Email that you have registered!
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									
								<h6 class="text-center" id="result_message"></h6>
									
									<form id="forget-pass-form-data"  method="post">
									
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your registered email" required />
										</div>
										
										<div class="d-grid gap-2 mt-3">
											<button type="submit" id="submit" name="submit" class="btn btn-lg btn-primary" >Send</button>
											
											
										</div>
									</form>
									<div id="result_message"></div>
									
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
						<div id="result_show"></div>
							Go back to your account? <a href='../login'>Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	

  	
