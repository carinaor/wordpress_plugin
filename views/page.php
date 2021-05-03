<?php 

$req = new main\Request("https://jsonplaceholder.typicode.com/users");

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST["type"]) && isset($_POST["id"])){
        if($_POST["type"] === "details"){
        $id = $_POST["id"];
        //get data
        
        $users = $req->getJsonData($id);
        echo $users;

        exit;
        }
    }  
}

$users = $req->getData();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users Table</title>
    <link href="<?php echo plugins_url('/css/bootstrap.min.css',__FILE__); ?>" rel="stylesheet">

<meta name="theme-color" content="#7952b3">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .userstbl{
        margin-top: 50px;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo plugins_url('/css/my-plugin.css',__FILE__); ?>" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Users
            </a>
          </li>
        </ul>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="userstbl d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
        </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($users as $u){ ?>
            <tr class="tbl-users" aid="<?php echo $u->id; ?>">
              <td class="clickeable"><a><?php echo $u->id; ?></a></td>
              <td class="clickeable"><a><?php echo $u->name; ?></a></td>
              <td class="clickeable"><a><?php echo $u->username; ?></a></td>
              <td class="clickeable"><a><?php echo $u->email; ?></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
      </div>
      <div class="modal-body">
          
    </div>
    </div>
  </div>
</div>

    <script src="<?php echo plugins_url('/js/bootstrap.bundle.min.js',__FILE__); ?>"></script>
    <script src="<?php echo plugins_url('/js/jquery-3.6.0.min.js',__FILE__); ?>"></script>
    <script src="<?php echo plugins_url('/js/my-plugin.js',__FILE__); ?>"></script>
  </body>
</html>
