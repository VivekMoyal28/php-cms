<?php include_once './inc/header.php';
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
include_once 'pages/pageClass.php';
$pageClass=new pagesClass();
?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 main">
          <h1 class="page-header">Dashboard</h1>
          <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Total Pages Added</div>
  <div class="panel-body">
      <h1><?php echo count($pageClass->listPages()); ?></h1>
  </div>
</div>
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>>
  </body>
</html>
