






<?php include'functions.php'; page_header(); ?>

              <h2>Configure Proxy</a></h2>
              <pre style="color: red">Works best with <a target="_blank" href="https://www.scraperapi.com">scrapeapi</a></pre>
              <h1 style="color: lightgreen; text-align: right"><a href="index.php">New Scan</a></h1>
              <form action="#" method="POST">
                <input style="color: white" type="text" name="proxy" placeholder="Proxy URL eg: http://scraperapi:b8be80261es10c6277f49b1baf146a1d@proxy-server.scraperapi.com:8001 ">
           <br>
              <input style="background-color: grey;" type="submit" name="submit" value="submit">              
                 </form>
                 <?php
                 showproxy();
                 if(isset($_POST['proxy']))
                 {
                    $proxy_url = $_POST['proxy']; 
                    addproxy($proxy_url);
                 }
                 ?>
<?php footer(); ?>