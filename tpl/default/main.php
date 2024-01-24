
<!DOCTYPE HTML><html lang="en">
<head>
<title>PHPMovieDB</title>
<meta http-equiv="Content-Type"
      content="text/html; charset=utf-8">
<meta name="Generator"
      content="Eclipse">
<meta name="Author"
      content="Ed">
<meta name="Keywords"
      content="">
<meta name="Description"
      content="PHPMovieDB is a movie catalog system">

<link rel="icon"
      href="favicon.ico">
<link rel="stylesheet"
      type="text/css"
      href="<?php echo $w->template_include_dir; ?>css/loader.css">
<link rel="stylesheet"
      type="text/css"
      href="<?php echo $w->template_include_dir; ?>css/episode.css">
<link rel="stylesheet"
      type="text/css"
      href="<?php echo $w->template_include_dir; ?>css/carousel.css">
<link rel="stylesheet"
      type="text/css"
      href="<?php echo $w->template_include_dir; ?>css/style.css">
<link rel="stylesheet"
      type="text/css"
      href="<?php echo $w->template_include_dir; ?>css/addEditUpdate.css">
<link rel="stylesheet"
      type="text/css"
      href="<?php echo $w->template_include_dir; ?>css/lightbox.css">
</head>
<body>
<script src="<?php echo $w->template_include_dir; ?>javascripts/cookies.js"></script>
<script src="<?php echo $w->template_include_dir; ?>javascripts/prototype-1.7.3.js"></script>
<script src="<?php echo $w->template_include_dir; ?>javascripts/ajax_list.js"></script>
<script src="<?php echo $w->template_include_dir; ?>javascripts/display.js"></script>
<script src="<?php echo $w->template_include_dir; ?>javascripts/movie.js"></script>
<script src="<?php echo $w->template_include_dir; ?>javascripts/functions.js"></script>
<div id="loader" class="loading"></div>
<div id="menuBar">
    <div id="menuBarItems">
    <div class="topLogo">
      <img src="<?php echo $w->template_include_dir; ?>images/logo.png"
           alt="PHPMovieDB logo"
           title="PHPMovieDB Logo">
      <div>PHPMovieDB</div>
    </div>

    <a href="./">
      <div id="topMenuSelectHome" class="logo">
        <div>Home</div>
      </div>
    </a>

    <?php if ($w->_tpl_vars["loggedin"] && $User->isEditor()) {
        echo '<a href="./?go=add">
          <div id="topMenuSelectAdd" class="logo">
            <div>Add Movie</div>
          </div>
        </a>';
    }

    if ($w->_tpl_vars["loggedin"]) {
        echo '<a href="./?go=profile">
          <div id="topMenuSelectProfile" class="logo">
            <div>Profile</div>
          </div>
        </a>';
    }

    if ($w->_tpl_vars["loggedin"] && $User->isAdmin()) {
        echo '<a href="./?go=exportform">
          <div id="topMenuSelectExport" class="logo">
            <div>Export</div>
          </div>
        </a>';
    }


    if (!$w->_tpl_vars["loggedin"]) {
        echo '<a href="./?go=login">
          <div id="loggedin">Login</div>
        </a>';
    } else {
        echo '<a href="./?logout=1">
          <div id="loggedin">Logout</div>
        </a>';
    } ?>
    </div>
</div>

<div id="root">
    <div id="main">
    <?php if ($w->_tpl_vars["loggedin"] || $w->_tpl_vars["guestview"]) {
        include_once $w->template_include_dir . $w->_tpl_vars["main"];
    } else {
        echo 'Log in to view the movie database.';
    } ?>
    </div>
</div>
<div id="credits">
    <a href="http://www.riethorst.net/"
       target="_blank">Copyright © 2011-<?php echo date("Y"); ?> Ed</a>
</div>
<script src="<?php echo $w->template_include_dir; ?>javascripts/forms.js"></script>
</body>
</html>