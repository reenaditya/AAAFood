@extends("admin.layouts.app")
@section('content')
<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-2 mb-xl-3">
						<div class="col-auto d-none d-sm-block">
							<h3>SaaS</h3>
						</div>

						<div class="col-auto ms-auto text-end mt-n1">

							<div class="dropdown me-2 d-inline-block">
								<a class="btn btn-light bg-white shadow-sm dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-display="static">
        <i class="align-middle mt-n1" data-feather="calendar"></i> Today
      </a>

								<div class="dropdown-menu dropdown-menu-end">
									<h6 class="dropdown-header">Settings</h6>
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Separated link</a>
								</div>
							</div>

							<button class="btn btn-primary shadow-sm">
      <i class="align-middle" data-feather="filter">&nbsp;</i>
    </button>
							<button class="btn btn-primary shadow-sm">
      <i class="align-middle" data-feather="refresh-cw">&nbsp;</i>
    </button>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-xxl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Income</h5>
										</div>

										<div class="col-auto">
											<div class="stat stat-sm">
												<i class="align-middle" data-feather="shopping-bag"></i>
											</div>
										</div>
									</div>
									<span class="h1 d-inline-block mt-1 mb-3">$37.500</span>
									<div class="mb-0">
										<span class="badge badge-soft-success me-2"> <i class="mdi mdi-arrow-bottom-right"></i> 6.25% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xxl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Orders</h5>
										</div>

										<div class="col-auto">
											<div class="stat stat-sm">
												<i class="align-middle" data-feather="shopping-cart"></i>
											</div>
										</div>
									</div>
									<span class="h1 d-inline-block mt-1 mb-3">3.282</span>
									<div class="mb-0">
										<span class="badge badge-soft-danger me-2"> <i class="mdi mdi-arrow-bottom-right"></i> -4.65% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xxl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Activity</h5>
										</div>

										<div class="col-auto">
											<div class="stat stat-sm">
												<i class="align-middle" data-feather="activity"></i>
											</div>
										</div>
									</div>
									<span class="h1 d-inline-block mt-1 mb-3">19.312</span>
									<div class="mb-0">
										<span class="badge badge-soft-success me-2"> <i class="mdi mdi-arrow-bottom-right"></i> 8.35% </span>
										<span class="text-muted">Since last week</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xxl-3 d-flex">
							<div class="card illustration flex-fill">
								<div class="card-body p-0 d-flex flex-fill">
									<div class="row g-0 w-100">
										<div class="col-6">
											<div class="illustration-text p-3 m-1">
												<h4 class="illustration-text">Welcome Back, Chris!</h4>
												<p class="mb-0">AppStack Dashboard</p>
											</div>
										</div>
										<div class="col-6 align-self-end text-end">
											<img src="img/illustrations/social.png" alt="Social" class="img-fluid illustration-img">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12 col-lg-4 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-end">
										<div class="dropdown show">
											<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
              <i class="align-middle" data-feather="more-horizontal"></i>
            </a>

											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Sales by State</h5>
								</div>
								<div class="card-body px-4">
									<div id="usa_map" style="height:294px;"></div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-7 col-lg-4 col-xxl-6 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-end">
										<div class="dropdown show">
											<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
              <i class="align-middle" data-feather="more-horizontal"></i>
            </a>

											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Sales / Revenue</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-5 col-lg-4 col-xxl-2 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">
									<div class="card-actions float-end">
										<div class="dropdown show">
											<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
              <i class="align-middle" data-feather="more-horizontal"></i>
            </a>

											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Order Activity</h5>
								</div>
								<div class="card-body">
									<ul class="timeline m-3">
										<li class="timeline-item">
											<strong>Delivered</strong>
											<p class="text-sm">2 hours ago</p>
										</li>
										<li class="timeline-item">
											<strong>Pick Up</strong>
											<p class="text-sm">6 hours ago</p>
										</li>
										<li class="timeline-item">
											<strong>In Transit</strong>
											<p class="text-sm">1 days ago</p>
										</li>
										<li class="timeline-item">
											<strong>Dispatched</strong>
											<p class="text-sm">3 days ago</p>
										</li>
										<li class="timeline-item">
											<strong>Order Received</strong>
											<p class="text-sm">4 days ago</p>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="card flex-fill">
						<div class="card-header">
							<div class="card-actions float-end">
								<div class="dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
          <i class="align-middle" data-feather="more-horizontal"></i>
        </a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</div>
							</div>
							<h5 class="card-title mb-0">Top Selling Products</h5>
						</div>
						<table id="datatables-dashboard-products" class="table table-striped my-0">
							<thead>
								<tr>
									<th>Name</th>
									<th class="d-none d-xl-table-cell">Tech</th>
									<th class="d-none d-xl-table-cell">License</th>
									<th class="d-none d-xl-table-cell">Tickets</th>
									<th>Sales</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>AppStack Theme</td>
									<td><span class="badge bg-success">HTML</span></td>
									<td class="d-none d-xl-table-cell">Single license</td>
									<td class="d-none d-xl-table-cell">50</td>
									<td class="d-none d-xl-table-cell">720</td>
								</tr>
								<tr>
									<td>Spark Theme</td>
									<td><span class="badge bg-danger">Angular</span></td>
									<td class="d-none d-xl-table-cell">Single license</td>
									<td class="d-none d-xl-table-cell">20</td>
									<td class="d-none d-xl-table-cell">540</td>
								</tr>
								<tr>
									<td>Milo Theme</td>
									<td><span class="badge bg-warning">React</span></td>
									<td class="d-none d-xl-table-cell">Single license</td>
									<td class="d-none d-xl-table-cell">40</td>
									<td class="d-none d-xl-table-cell">280</td>
								</tr>
								<tr>
									<td>Ada Theme</td>
									<td><span class="badge bg-info">Vue</span></td>
									<td class="d-none d-xl-table-cell">Single license</td>
									<td class="d-none d-xl-table-cell">60</td>
									<td class="d-none d-xl-table-cell">610</td>
								</tr>
								<tr>
									<td>Abel Theme</td>
									<td><span class="badge bg-danger">Angular</span></td>
									<td class="d-none d-xl-table-cell">Single license</td>
									<td class="d-none d-xl-table-cell">80</td>
									<td class="d-none d-xl-table-cell">150</td>
								</tr>
								<tr>
									<td>Spark Theme</td>
									<td><span class="badge bg-success">HTML</span></td>
									<td class="d-none d-xl-table-cell">Single license</td>
									<td class="d-none d-xl-table-cell">20</td>
									<td class="d-none d-xl-table-cell">480</td>
								</tr>
								<tr>
									<td>Libre Theme</td>
									<td><span class="badge bg-warning">React</span></td>
									<td class="d-none d-xl-table-cell">Single license</td>
									<td class="d-none d-xl-table-cell">30</td>
									<td class="d-none d-xl-table-cell">280</td>
								</tr>
								<tr>
									<td>Von Theme</td>
									<td><span class="badge bg-danger">Angular</span></td>
									<td class="d-none d-xl-table-cell">Single license</td>
									<td class="d-none d-xl-table-cell">50</td>
									<td class="d-none d-xl-table-cell">350</td>
								</tr>
								<tr>
									<td>Material Blog Theme</td>
									<td><span class="badge bg-info">Vue</span></td>
									<td class="d-none d-xl-table-cell">Single license</td>
									<td class="d-none d-xl-table-cell">10</td>
									<td class="d-none d-xl-table-cell">480</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</main>
@endsection