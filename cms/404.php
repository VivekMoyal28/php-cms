<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);
define('pageclassconst', TRUE);
include_once 'admin/pages/pageClass.php';
$pageClass=new pagesClass();
$pageList=$pageClass->listPages();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../favicon.ico">
    <title>404 - vivekmoyal.in</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
            <?php
                  $i=1;
                    if(count($pageList)){
                        foreach ($pageList as $value) {
                            echo '<a class="blog-nav-item" href="'.$value[URL].'">'.$value[PageName].'</a>';
                        }
                    }
            ?>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">&nbsp;</h1>
      </div>

      <div class="row">

        <div class="col-sm-12 blog-main">

          <div class="blog-post">
            <h1 class="blog-post-title">4040 - Page Not Found</h1>
          </div>
        </div>

      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
