
<?php include 'functions.php'; page_header(); ?>

<h1 style="color: lightgreen; text-align: left"><a href="proxy_enabled_manual.php">Enable Proxy</a></h1>
<h1 style="color: lightgreen; text-align: left"><a href="configure.php">Configure Proxy</a></h1>
<h1 style="color: lightgreen; text-align: left"><a href="index.php">Automatic Grawl</a></h1>
<h1 style="color: lightgreen; text-align: right"><a href="miscellaneous.php">Dorks from Scratch</a></h1>
<div class="overlay-content">
  <form action="#" method="POST">
   <input style="background-color:#1e1f23; color: white; " type="text" name="search" placeholder="Enter the domain name" required>
   <br>
   <input style="color: white" type="text" name="manual" placeholder="Enter Dork" required>
   <br>
   <select style="background-color:#1e1f23 ; color: white;" type="text" name="search_eng" required>
     <option value="select" selected>Select the search engine</option>
     <option value="https://www.bing.com/search?q=site:">Bing</option>
     <option value="https://www.google.com/search?q=site:">Google (Best Results)</option>
     <option value="https://search.yahoo.com/search?p=site:">Yahoo</option>
   </select>
   <br>
   <input style="background-color:#1e1f23; color: white; " type="text" name="file" placeholder="Enter the file name to be saved" required>
   <br>
   <input style="background-color: grey" type="submit" name="grawl" value="grawl">
   
   <?php
   error_reporting(0);
   if($_POST['grawl'])
   {
    if($_POST['manual'] == NULL)
    {
      echo "<h10><div style='color:#4fe1be'>Please enter the dork</div><h10>";
      exit;
    }
    else
    {
      web_grawl_manual($_POST['search'],$_POST['manual'],$_POST['search_eng'],$_POST['file']);
    }
  }
  ?>                
</form>
<?php footer(); ?>