<?php
?>

<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
  	<script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha256-E/V4cWE4qvAeO5MOhjtGtqDzPndRO1LBk8lJ/PR7CA4=" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha256-eSi1q2PG6J7g7ib17yAaWMcrr5GrtohYChqibrV7PBE=" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">
</head>

<body>
	<div id="app">
		<div class="mt-3 container-fluid">
			<div class="row">
				<div class="col-md-auto">
					<div role="alert" class="alert alert-danger alert-dismissible fade show">
						<button type="button" class="close btn btn-primary">
							<span>×</span>
						</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="card">
						<div class="card-body">
							<h1>Add Item</h1>
							<form id="add-todo">
								<div class="form-group">
									<label for="text" class="form-label">Text</label>
									<input required="" placeholder="Enter text" type="text" id="text" class="form-control">
									<small class="form-text text-muted">Describe what to do</small>
								</div>
								<div class="form-group">
									<label for="count" class="form-label">Count</label>
									<input required="" placeholder="Enter initial count" type="number" id="count" class="form-control">
									<small class="form-text text-muted">The initial count is overridden later</small>
								</div>
								<div class="container-fluid">
									<div class="align-items-center row">
										<div class="col-md-3">
											<button type="submit" class="btn-success btn btn-primary">Add</button>
										</div>
										<div class="col">
											<i class="fa fa-spinner fa-spin fa-2x"></i>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="card-body">
							<h1>Todo Items</h1>
							<div id="todo-items"></div>
						</div>
					</div>
				</div>
				<div class="col"></div>
				<div class="col"></div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/index.js"></script>
</body>
</html>

<?php
?>
