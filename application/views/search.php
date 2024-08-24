<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="lteplugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="lte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="lte/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="lte/plugins/summernote/summernote-bs4.min.css">
    <title>Search</title>
</head>
<body>
    
    <div class="container">
</br>
       <div class="col"><a href="<?= base_url('index.php/test')?>"class="btn btn-primary"> Kembali</a></div>
        <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id </th>
                    <th scope="col">Nama </th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th> 
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>            
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1; 
                     ?>
                     
                <?php  foreach ($user as $key => $value) { ?>
                    <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value->id ?> </td>
                    <td><?= $value->nama_user ?> </td>
                    <td><?= $value->username ?> </td>
                    <td><?= $value->password ?> </td>
                    <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?=$value->id;?>"> Edit Data </button></td>
                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete<?=$value->id;?>">DELETE</button> </td>
                    </tr>      
            <?php }?>

            
            </tbody>
                </table>
         <!-- modal edit -->
                 
<!-- Modal -->
 <?php foreach ($user as $key => $value) { ?>
   
 
   <div class="modal fade" id="edit<?=$value->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
           <?php echo form_open('test/edit/' . $value->id);?>
           <div class="form-group">
                               <label>Nama</label>
                               <input type="text" name="nama_user" class="form-control" value="<?= $value->nama_user ?>"> 
                           </div> </br>
                           <div class="form-group">
                               <label>Username</label>
                               <input type="text" name="username" class="form-control" value="<?= $value->username ?>">
                           </div> </br>
                           <div class="form-group">
                               <label>Password</label>
                               <input type="text" name="password" class="form-control" value="<?= $value->password ?>">
                           </div> </br>
          
           
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Simpan</button>
         </div>
       </div> <?php echo form_close(); ?>
     </div>  
   </div> <?php } ?>
   
                   <!-- end modal edit -->
   
                   
                   <!-- modal delete -->
                   
                   <?php foreach ($user as $key => $value) { ?>
    
      <div class="modal fade" id="delete<?=$value->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Delete <?= $value->nama_user ?></h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               Anda Yakin Ingin Menghapus Data Ini....
                   </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <a class="btn btn-secondary" href="<?= base_url('index.php/test/delete/'. $value->id )?>">Delete</a>
            </div>
          </div> <
        </div>  
      </div> <?php } ?>
                   <!-- endmodal delete -->
            
    </div>
    
</body>
</html>