<?php include_once './inc/header.php';
define('pageclassconst', TRUE);
include_once 'pages/pageClass.php';
$pageClass=new pagesClass();
include_once 'messages/alertClass.php';
$message=new alertClass();
if(isset($_POST["delete"])){
    $deleteid=$_POST["did"];
    if($deleteid==""){
        
    }
    else
    {
        
        $alert.="<form method=post>";
        $alert.= $message->getAlert("Are you sure you want to delete 
            <input type='hidden' name=cdid value='$deleteid'>
            <input type='submit' name='cdel' class='btn btn-sm btn-danger' value='Yes'> &nbsp; 
            <input type='submit' name='ndel' class='btn btn-sm btn-primary' value='No'>", "warning");
        $alert.= "</form>";
    }
}

if(isset($_POST["cdel"])){
    $confirmId=$_POST["cdid"];
    if(!$confirmId==""){
        $alert=$pageClass->deletePage($confirmId);
    }
}
$pageList=$pageClass->listPages();
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 main">
          <h1 class="page-header">Pages List</h1>
          <?php echo $alert; ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>URL</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $i=1;
                    if(count($pageList)){
                        foreach ($pageList as $value) {
                            echo "<tr>
                                <td>$i</td>
                                <td>$value[PageName]</td>
                                <td>$value[Title]</td>
                                <td>$value[URL]</td>
                                <td><a class='btn btn-warning btn-sm' href='edit-pages.php?eid=$value[id]'>Edit</a>&nbsp;&nbsp;&nbsp;
                  <form action='$_SERVER[PHP_SELF]' method=post>
<input type=hidden value='$value[id]' name='did' id='did'>                      
<input type=submit name=delete value=Delete class='btn btn-danger btn-sm'></form></td>
                                </tr>";
                            $i++;
                        }
                    }
                  ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
