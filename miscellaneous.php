
<?php include 'functions.php'; page_header(); ?>

<h1 style="color: lightgreen; text-align: right;"><a href="index.php">Home</a></h1>
<h2 style="color: #4666FF">Learn the art of Google Dorks</h2>
<div class="overlay-content">
	<h1 style="text-align: left; color: #ccff00">What is google dorks ?</h1>
	<p style="text-align: left">

		As we all know google operates the most widely used search engine on the planet, Google crawls almost every page of every website and creates a massive database of all the gathered information. This database is used by everyone to find the most relevant results according to the searched keyword, the algorithm looks for the keyword in titles, headers, metadata, etc, and shows the most relevant results. Google has some special operators which allow people to look for information in its database more specifically since not all the websites on the internet are aware of security they leave the critical pages/URL's open for google to crawl and store in it's database which is further searched by hackers, pentesters or security researchers as a part of passive reconnaissance.
		<br>
		So google dorks are basically a list of operators which allows anyone to search for any type of data classified or unclassified, google dorks are not only limited to google they can work with few other search engines as well .
	</p>
	<br>   
	
	<h1 style="text-align: left; color: #ccff00">Some Rules</h1>
	<ul style="text-align: left; color: #f4a0b9" >
		<li>Google Search limits to 32 words .</li>
		<li>Google queries are not case sensitive . </li>
		<li>SYNTAX for dork<br><pre style="color:#f4a0b9 ">
		operator:search_term</pre></li>
		<li>Different operators can be used in combination.</li>
		<li>Bollean operators are allowed ( | [OR], & [AND] )</li>

	</ul>

	<h1 style="text-align: left; color: #ccff00">Some keywords</h1>
	<p style="text-align: left">


		<table border = "1" style="color:#4666FF ">
			<tr style="text-align: left">
				<td style="color:#ccff00;font-size: 16px">Keyword</td>
				<td style="color:#ccff00;font-size: 16px">Description</td>
				<td style="color:#ccff00;font-size: 16px">Usage</td>
			</tr>
			
			<tr style="text-align: left">
				<td style="color:#f4a0b9">site:</td>
				<td>To show results only from a specific site</td>
				<td style="color:#f4a0b9">site:domain_name.com</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">intitle:</td>
				<td>To search in the title of page</td>
				<td style="color:#f4a0b9">intitle:admin login || adminlogin</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">filetype:</td>
				<td>To search for a specific filetype</td>
				<td style="color:#f4a0b9">filetype:xls</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">inurl:</td>
				<td>To search for a keyword in the URL.</td>
				<td style="color:#f4a0b9">inurl:"admin.php"</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">indexof:</td>
				<td>For directory listing</td>
				<td style="color:#f4a0b9">indexof:"hacking"</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">intext:</td>
				<td>To find keyword in text of the page</td>
				<td style="color:#f4a0b9">intext:"how to hack"</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">link:</td>
				<td>To find how what all domains link to the specified URL</td>
				<td style="color:#f4a0b9">link:URL</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">cache:</td>
				<td>Show the cached version of the website</td>
				<td style="color:#f4a0b9">cache:URL</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">info:</td>
				<td>Shows the summary information for a website</td>
				<td style="color:#f4a0b9">info:domain_name.com</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">related:</td>
				<td>Show related sites to a particular site</td>
				<td style="color:#f4a0b9">related:domain_name.com</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">stock:</td>
				<td>Show the stock information</td>
				<td style="color:#f4a0b9">stock:domain_name.com</td>
			</tr>

			<tr style="text-align: left">
				<td style="color:#f4a0b9">define:</td>
				<td>Show the definition of a term</td>
				<td style="color:#f4a0b9">define:keyword</td>
			</tr>
		</table>

		<h1 style="text-align: left; color: #ccff00">Some cool dorks</h1>
		<p style="text-align: left">
			<ul style="text-align: left; color: #f4a0b9" >
				<li>filetype:xls site:gov inurl:contact<pre style="color:#ccff00 ">[Looks for all the xls format sheet containing contacts on the government website]</pre></li>

				<li>filetype:xls inurl:email.xls<pre style="color:#ccff00 ">[Looks for all the xls format sheet with emails]</pre></li>

				<li>inurl:index.php?id=<pre style="color:#ccff00 ">[Looks for website which might be vulnerable to SQL injection]</pre></li>

				<li>intitle:"please log in"<pre style="color:#ccff00 ">[Looks for login pages]</pre></li>

				<li>inurl:admin.php<pre style="color:#ccff00 ">[Looks for admin pages]</pre></li>

				<li>inurl:gov.us filetype:xls<pre style="color:#ccff00 ">[Looks for xls files from US government websites]</pre></li>

				<li>intitle:"confidential" inurl:gov.pk<pre style="color:#ccff00 ">[Looks for confidential keyword in the titles of government websites]</pre></li>

				<li>indexof:/ftp<pre style="color:#ccff00 ">[Shows the ftp directory listing]</pre></li>
				<li>indexof:DCIM<pre style="color:#ccff00 ">[Shows the DCIM directory]</pre></li>
				<li>indexof:Whatsapp<pre style="color:#ccff00 ">[Shows Whatsapp directory]</pre></li>
				<li>site:edu.in filetype:xls inurl:student list<pre style="color:#ccff00 ">[Shows list of students from indian educational institutions]</pre></li>
				<li>intitle:"account" filetype:xls<pre style="color:#ccff00 ">[Looks for xls format files with title as account]</pre></li>
				<li>index of:"harry styles"<pre style="color:#ccff00 ">[Lists all the directory named harry styles, might get free album music]</pre></li>
				<li>intitle:"curriculum vitae" filetype:doc<pre style="color:#ccff00 ">[Find Curriculum vitae(CV), might help in a social engineering attack , can be used with site: keyword as well]</pre></li>
				<li>filetype:sql intext:password | pass<pre style="color:#ccff00 ">[Find the SQL database file with password keyword or pass keyword in text]</pre></li>
			</ul>

			<ul style="text-align: left; color: #f4a0b9">
				<h1 style="text-align: left; color: #ccff00">Find vulnerable cameras</h1>
				<p style="text-align: left">
					<li>inurl:axis-cgi/jpg</li>
					<li>inurl:"MultiCameraFrame?Mode=Motion"</li>
					<li>inurl:/view.shtml</li>
					<li>inurl:/view/index.shtml</li>
					<li>"mywebcamXP server!"</li>
				</ul>
			</p>
			<?php footer(); ?>


























