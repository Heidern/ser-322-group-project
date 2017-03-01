<?php 
    function FormTextField ($label, $name, $value) {        
        echo
        "<div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"txt-$name\">$label:</label>
            <div class=\"col-sm-10\">
                <input class=\"form-control\" name=\"$name\" id=\"txt-$name\" type=\"text\" value=\"$value\" />
            </div>
        </div>";
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
<head>    
    <title><?php echo $pageTitle; ?></title>
    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylsheet">
</head>
<body>        
    <div class="container">        
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/cardb.html">CarDB</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li <?php if($pageCategory === "Makes"):?>class="active"<?php endif;?>><a href="/admin/makes.php">Makes</a></li>
                    <li <?php if($pageCategory === "Models"):?>class="active"<?php endif;?>><a href="/admin/models.php">Models</a></li>
                    <li <?php if($pageCategory === "Cars"):?>class="active"<?php endif;?>><a href="/admin/cars.php">Cars</a></li>
                    <li <?php if($pageCategory === "Engines"):?>class="active"<?php endif;?>><a href="/admin/engines.php">Engines</a></li>
                    <li <?php if($pageCategory === "Drive Trains"):?>class="active"<?php endif;?>><a href="/admin/drive-trains.php">Drive Trains</a></li>
                </ul>
            </div>
        </div>
    </nav>
<?php require_once (__DIR__ . "\\..\\views\\$viewName.php"); ?>
    </div>
</body>
