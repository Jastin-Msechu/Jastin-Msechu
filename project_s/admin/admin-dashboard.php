
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Online Bus Ticket System</title>
</head>
<body>
    <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Online Bus Ticket System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="./routes-shedules.php">Routes and Schedules *</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="routes-shedules.php">Bus and Route Management *</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="view-booking-history.php">Seat Availability and Booking Management *</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="../view-users.php">User and Customer Management *</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Security and Access Control</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container my-4">
      <h1>Welcome, Administrator!</h1>
      <p>From this dashboard, you can manage all aspects of the online bus ticket system. Use the navigation bar above to access the different modules of the system.</p>
      <div class="card-deck mt-5">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Routes and Schedules</h5>
            <p class="card-text">Manage the bus routes and schedules for the system.</p>
            <a href="routes-shedules.php" class="btn btn-primary">Go to Routes and Schedules</a>

</body>
</html>