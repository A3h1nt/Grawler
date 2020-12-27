






<?php include'functions.php'; page_header(); ?>

<h2>Configure Proxy</a></h2>
<h1 style="color: lightgreen; text-align: right"><a href="index.php">New Scan</a></h1>
<form action="#" method="POST">
  <select style="color:white; background-color: #1e1f23" type="text" name="proxy" required>
  <option value="select" selected>Select a proxy</option>
  <option value="ScraperAPI">Scraper API<br>
  <option value="ScrapingDog">Scraping Dog<br>
  <option value="ZenScrape">Zen Scrape<br>
    <option style="position: left">
  </select>    
  <br> 
  <input style="color:white" type="text" name="api_key" placeholder="Enter the API key">
  <br>      
  <input style="background-color: grey;" type="submit" name="submit" value="submit"> 
</form>
<?php
showproxy();
error_reporting(0);
if($_POST['submit'])
{
      if(!isset($_POST['api_key']))
      {
        echo "API key needed\n";
        exit;
      }
      elseif($_POST['proxy'] == "ScraperAPI")
      {
        $proxy_url = "http://api.scraperapi.com?api_key=".$_POST['api_key']."&url=";
        $test_url = "https://duckduckgo.com";
        $name = "ScraperAPI";
        validating_proxy($proxy_url,$test_url,$name);
        echo $proxy_url;
      }
      elseif($_POST['proxy'] == "ScrapingDog")
      {
        $proxy_url = "https://api.scrapingdog.com/scrape?api_key=".$_POST['api_key']."&url=";
        $test_url = "https://www.scrapingdog.com/";
        $name = "ScrapingDog";
        validating_proxy($proxy_url,$test_url,$name);
        echo $proxy_url;
      }
      elseif($_POST['proxy'] == "ZenScrape")
      {
        $proxy_url = "https://app.zenscrape.com/api/v1/get?apikey=".$_POST['api_key']."&url=";
        $test_url = "https://zenscrape.com/";
        $name = "ZenScrape";
        validating_proxy($proxy_url,$test_url,$name);
        echo $proxy_url;
      }
      else
      {
        echo "No option Selected\n";
        exit;
      }
}
?>
<?php footer(); ?>
