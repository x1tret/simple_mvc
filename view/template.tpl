<!DOCTYPE html>
<html>
  <head>
    <title>Mercari Homework</title>
    <link rel="stylesheet" type="text/css" media="all" href="/assets/vendor/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="/assets/style.css" />
    <script type="text/javascript" src="/assets/vendor/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/vendor/popper.js"></script>
    <script type="text/javascript" src="/assets/vendor/bootstrap.min.js"></script>
  </head>
  <body>
    <header>
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Banner
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/banner">List</a>
                <a class="dropdown-item" href="/banner/add">Add</a>
              </div>
            </li>
          </ul>
        </div>
        </nav>
      </div>
    </header>

      <div class="main-content">
        <div class="container">
          <?php if(isset($vdata['error'])) { ?>
          <div class="alert alert-danger" role="alert">
            <?php echo implode($vdata['error'], ', '); ?>
          </div>
          <?php } ?>
          <?php if(isset($vdata['success'])) { ?>
          <div class="alert alert-success" role="alert">
            <?php echo $vdata['success']; ?>
          </div>
          <?php } ?>
        <?php if(isset($vcontent)) include $vcontent; ?>
        </div>
      </div>
  </body>
</html>