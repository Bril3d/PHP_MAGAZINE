<?php require_once("header.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Article Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  <!-- Main content -->
  <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><a href="add" class="btn btn-info">Add</a></h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
  <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Update</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <?php foreach($data as $c): ?>
                     
                    <tr>
                      <td><?= $c->title; ?></td>
                      <td><img src="<?= ASSETS ?>img/<?= $c->img; ?>" style="width:100px;" /></td>
                      <td><?= $c->description; ?></td>
                      <td><a href="update/<?= $c->id ?>" class="btn btn-warning">Update</a></td>
                      <td><a href="delete/<?= $c->id ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
  </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">

  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
  

<?php require_once("footer.php"); ?>