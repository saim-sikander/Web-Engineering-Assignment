<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Medium</title>
         <?php
        include "includes/head.php";
        ?>

        </head>
    <body class="sb-nav-fixed">
        <?php
        include "includes/header.php";
        ?>
        <div id="layoutSidenav">
        <?php
        include "includes/sidebar.php";
        ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Medium</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Medium Information</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Medium Information
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                      <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button" role="tab" aria-controls="add" aria-selected="true">Add Medium</button>
                                      </li>
                                      <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="view-tab" data-bs-toggle="tab" data-bs-target="#view" type="button" role="tab" aria-controls="view" aria-selected="false">View Medium</button>
                                      </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                  <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="add-tab">
                            <br>    <div class="container-fluid">    
                                        <div class="card-header">
                                            <h5 class="modal-title">Add Medium</h5>
                                        </div> 
                                        <div class="card-body">   
                                            <form class="addMedium">
                                                <div class="mb-3">
                                                  <label for="exampleFormControlInput1" class="form-label">Medium Title</label>
                                                  <input type="text" class="form-control" name="medium" data-validation="required">
                                                </div>
                            <br>
                                                <div class="modal-footer pull-right">
                                                    <div class="input-group flex-nowrap">
                                                      <input type="submit" class="btn btn-success" value="Add">  
                                                    </div>
                                                </div>
                                            </form>
                                        </div>    
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="view-tab">
                         <br>         <div class="container-fluid">    
                                         <div class="card-header">
                                            <h5 class="modal-title">View Medium</h5>
                                        </div> 
                                        <div class="card-body">
                                            <div class="viewMedium"></div>
                                        </div>    
                                      </div>          
                                  </div>
                                </div>
                    </div>
                </div>
            </main>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Record</h5>
                <button type="button" class="close" onclick='closeModel()' aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form class="editMedium">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Medium Title</label>
                      <input type="text" class="form-control" name="title" data-validation='required'>
                    </div>
<br>
                    <div class="modal-footer pull-right">
                        <div class="input-group flex-nowrap">
                          <button type="button" class="btn btn-secondary"  onclick='closeModel()'>Close</button>  
                          <input type="submit" class="btn btn-success" value="Update">
                        </div>
                    </div>
                </form>
              </div>             
            </div>
          </div>
        </div>

        <?php
        include "includes/scripts.php";
        ?>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
        <script type="text/javascript" src="assets/js/validation.js"></script>
        <script type="text/javascript" src="assets/js/Medium.js"></script>
        <script>
          $.validate({
            lang:"en"
          })
        </script>
    </body>
</html>
