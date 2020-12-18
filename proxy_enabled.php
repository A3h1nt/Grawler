
<?php include 'functions.php'; page_header(); ?>
<h1 style="color: red; text-align: left"><a href="index.php">Disable Proxy</a></h1>
<h1 style="color: lightgreen; text-align: left"><a href="configure.php">Configure Proxy</a></h1>
<h1 style="color: lightgreen; text-align: left"><a href="manual.php">Manual Grawl</a></h1>
<h1 style="color: lightgreen; text-align: right"><a href="miscellaneous.php">Dorks from Scratch</a></h1>
<div class="overlay-content">
 <form action="#" method="POST">
   <input style="background-color:#1e1f23; color: white; " type="text" name="search" placeholder="Enter the domain name">
   <br>
   <select style="background-color:#1e1f23 ; color: white;" type="text" name="search_eng" required>
     <option value="select" selected>Select the search engine</option>
     <option value="https://www.bing.com/search?q=site:">Bing</option>
     <option value="https://www.google.com/search?q=site:">Google (Best Results)</option>
     <option value="https://search.yahoo.com/search?p=site:">Yahoo</option>
   </select>
   <br>
   <select style="background-color:#1e1f23 ; color: white;" type="text" name="dork_type" required>
     <option value="select" selected>Select the dork file</option>
     <option value="dorks/dork_filetype.txt">File Types</option>
     <option value="dorks/dork_login_panel.txt">Login Panels</option>
     <option value="dorks/sql_injection.txt">SQL Injection</option>
     <option value="dorks/my_dorks.txt">My Dorks</option>
   </select>
   <br>
   <input style="background-color:#1e1f23; color: white; " type="text" name="file" placeholder="Enter the file name to be saved">
   <br>
   <input style="background-color: grey" type="submit" name="grawl" value="grawl">    
   <?php
   error_reporting(0);
   if($_POST['grawl'])
   {
    if($_POST['search'] == NULL || $_POST['file'] == NULL )
    {
     echo "<h10><div style='color:#4fe1be'>Please fill out the empty fields</div><h10>";
     exit;
   }
   else
   {
     web_grawl_proxy_en($_POST['search'],$_POST['search_eng'],$_POST['file'],$_POST['dork_type']);
   }
}
?>              
</form>
<?php footer(); ?>
