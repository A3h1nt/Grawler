<?php

////////////////Function for automatic grawl when proxy is enabled ////////////////////////////

function web_grawl_proxy_en($search,$search_eng,$file,$dork_type,$proxy_name)
{
	$target = $_POST['search'];
	$file = $_POST['file'];
//Opening the file to read the dorks
	$filename = $_POST['dork_type'];
	if($filename == "select")
	{
		echo "<h10><div style='color:#4fe1be'>Please fill out the empty fields</div><h10>";
		exit;
	}
	$fp = fopen($filename, 'r');
	if ($fp) 
	{
	//splitting the file elements into an array on the basis of lines 
	 $dorks = explode("\n", fread($fp, filesize($filename)));
  }
	else
	{
		echo "ERROR IN OPENING FILE ";
		exit;
	}
$ch = curl_init();
$search = urlencode($_POST['search']);
file_put_contents($file,"#################### DORKS FOR ".$_POST['search']." ###############"."\n",FILE_APPEND);
if(strpos($proxy_name,"scrapingdog"))
	{
		curl_setopt($ch, CURLOPT_URL,$url = $proxy_name.$search_eng.$search."+".$dorks[$i-1]."&premium=true");
	}
	else
	{
		curl_setopt($ch, CURLOPT_URL,$url = $proxy_name.$search_eng.$search."+".$dorks[$i-1]);
	}

for($i=1;$i<sizeof($dorks);$i++)
{			

			curl_setopt($ch, CURLOPT_ENCODING,'identity');   //this enables decoding of response eg:identity , deflate,gzip.

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //it will not print directly for that we need .

			curl_setopt($ch, CURLOPT_HEADER, false);         //to ignore the header value in response

			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

			$result = curl_exec($ch);

			if(!$result)
			{
				echo "Could not connect\n";
				exit;
			}
			else
			{

				preg_match_all("!https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)!",$result,$fmatch);

			$value = reset($fmatch); //reset function moves the internal pointer to the first element of the array.//returns the first element of array , since here it was associative array , it pointed us to the first array where our links are stored.
			file_put_contents($file,"\n---------------------------> DORK: ".$dorks[$i-1]." <----------------------------\n\n",FILE_APPEND);
			for($j=1;$j<sizeof($value);$j++) 
			{

				if($value[$j] == "https://www.google.com/recaptcha/api.js")

				{
					file_put_contents($file,"#################### NO DATA AVAILABLE ###############"."\n",FILE_APPEND);
					file_put_contents($file,"#################### CAPTCHA  ! ###############"."\n",FILE_APPEND);
					echo "<div style =color:red> CAPTCHA ! Use Proxy or change your IP </div>";
					exit;
				}
				 /////code to skip unnecessary URL's starts here
					elseif(strpos($value[$j],"microsoft")) //to skip unnecessary URL's when bing is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"bing"))   //to skip unnecessary URL's when bing is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"login.live.com")) //to skip unnecessary URL's when bing is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"schemas.live.com")) //to skip unnecessary URL's when bing is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"storage.live.com")) //to skip unnecessary URL's when bing is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"google")) //to skip unnecessary URL's when google is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"yahoo"))  //to skip unnecessary URL's when yahoo is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"s.yimg")) //to skip unnecessary URL's when yahoo is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"verizon")) //to skip unnecessary URL's when yahoo is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"w3")) //to skip unnecessary URL's when yahoo is selected
					{
						continue;
					}
					elseif(strpos($value[$j],"gstatic")) //to skip unnecessary URL's when yahoo is selected
					{
						continue;
					}

					/////code to skip unnecessary URL's ends here
					else
					{
						 strpos($value[$j],$search);//ignore the links where the search name is not present
						 $value[$j] = urldecode($value[$j]); //url decode before showing
						 $nv[$j] = rtrim($value[$j],"&amp"); //remove & operator present at the end of each link(at the extreme right)
						 file_put_contents($file,$nv[$j]."\n",FILE_APPEND);
						 //echo "<br>"."<a href='".$nv[$j]."' >".$nv[$j]."<br>";//to display links on the webpage itself
					 }
				 }
 }
 sleep(2);
 continue;
}
curl_close($ch);
echo "<h10><div style='color:green'>DONE</div></h10>";
}












////////////////Function grawl in manual mode with proxy enabled ////////////////////////////

function proxy_en_manual_dork($search,$manual,$search_eng,$file,$sub,$proxy_name)
{

	$target = $_POST['search'];
	$manual_dork=$_POST['manual'];
	$file = $_POST['file'];
	$ch = curl_init();
	$search = urlencode($target);


if($search_eng == "https://www.bing.com/search?q=site:")
				{
							if($sub == 1)
							{
								$sub=3;#for one page
							}
							elseif($sub == 2)
							{
								$sub=2;#for two pages
							}
							elseif($sub == 3)
							{
								$sub=1;# for all three pages
							}
							elseif($sub == 4)
							{
							$sub=0;# for all three pages
							}
							else
							{
								$sub=3;
							}
							$array = ['0','11','21','31'];
							$depth = count($array);
							$depth = $depth - $sub;
							file_put_contents($file,"#################### DORKS FOR ".$_POST['search']." ###############"."\n",FILE_APPEND);
							file_put_contents($file,"\n---------------------------> DORK: ".$manual." <----------------------------\n\n",FILE_APPEND);
							if(strpos($proxy_name,"scrapingdog"))
								{
										curl_setopt($ch, CURLOPT_URL,$url = $proxy_name.$search_eng.$search."+".$dorks[$i-1]."&premium=true");
								}
								else
								{
									curl_setopt($ch, CURLOPT_URL,$url = $proxy_name.$search_eng.$search."+".$dorks[$i-1]);
								}
							for($i=0;$i<$depth;$i++)
							{

							curl_setopt($ch, CURLOPT_URL,$url = $search_eng.$search."+".$manual."&first=".$array[$i]);//setting the url
							curl_setopt($ch, CURLOPT_PROXY,$proxy);

							curl_setopt($ch, CURLOPT_ENCODING,'identity');   //this enables decoding of response eg:identity , deflate,gzip.

							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //it will not print directly for that we need .

							curl_setopt($ch, CURLOPT_HEADER, false);         //to ignore the header value in response

							curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

							curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

							$result = curl_exec($ch);

							if(!$result)
							{
								echo "<br>Could not connect\n";
								exit;
							}
							else
							{

								preg_match_all("!https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)!",$result,$fmatch);

								$value = reset($fmatch); //reset function moves the internal pointer to the first element of the array.//returns the first element of array , since here it was associative array , it pointed us to the first array where our links are stored.
								file_put_contents($file,"\n---------------------------> DEPTH: ".$i."<----------------------------\n\n",FILE_APPEND);

								for($j=1;$j<sizeof($value);$j++) 
								{

									if($value[$j] == "https://www.google.com/recaptcha/api.js")

									{
										file_put_contents($file,"#################### NO DATA AVAILABLE ###############"."\n",FILE_APPEND);
										file_put_contents($file,"#################### CAPTCHA  ! ###############"."\n",FILE_APPEND);
										echo "<div style =color:red> CAPTCHA ! Use Proxy or change your IP </div>";
										exit;

									}
					 /////code to skip unnecessary URL's starts here
								elseif(strpos($value[$j],"microsoft")) //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"bing"))   //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"login.live.com")) //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"schemas.live.com")) //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"storage.live.com")) //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"w3")) //to skip unnecessary URL's when yahoo is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"gstatic")) //to skip unnecessary URL's when yahoo is selected
								{
									continue;
								}
									/////code to skip unnecessary URL's ends here

								else
								{
									 strpos($value[$j],$search);//ignore the links where the search name is not present
									 $value[$j] = urldecode($value[$j]); //url decode before showing
									 $nv[$j] = rtrim($value[$j],"&amp"); //remove & operator present at the end of each link(at the extreme right)
									 file_put_contents($file,$nv[$j]."\n",FILE_APPEND);
									 //echo "<br>"."<a href='".$nv[$j]."' >".$nv[$j]."<br>";//to display links on the webpage itself
								 }
							 }
						 }
						 continue;
						 }
						 curl_close($ch);
						 echo "<h10><div style='color:green'>DONE</div></h10>";
						}




elseif ($search_eng == "https://www.google.com/search?q=site:") 
				{
							if($sub == 1)
							{
								$sub=3;#for one page
							}
							elseif($sub == 2)
							{
								$sub=2;#for two pages
							}
							elseif($sub == 3)
							{
								$sub=1;# for all three pages
							}
							elseif($sub == 4)
							{
							$sub=0;# for all three pages
						  }
							else
							{
								$sub=3;
							}
							$array = ['0','10','11','21'];
							$depth = count($array);
							$depth = $depth - $sub;
							file_put_contents($file,"#################### DORKS FOR ".$_POST['search']." ###############"."\n",FILE_APPEND);
							file_put_contents($file,"\n---------------------------> DORK: ".$manual." <----------------------------\n\n",FILE_APPEND);
							if(strpos($proxy_name,"scrapingdog"))
							{
								curl_setopt($ch, CURLOPT_URL,$url = $proxy_name.$search_eng.$search."+".$dorks[$i-1]."&premium=true");
							}
							else
							{
								curl_setopt($ch, CURLOPT_URL,$url = $proxy_name.$search_eng.$search."+".$dorks[$i-1]);
							}
							for($i=0;$i<$depth;$i++)
							{

								curl_setopt($ch, CURLOPT_URL,$url = $search_eng.$search."+".$manual."&start=".$array[$i]);//setting the url
								curl_setopt($ch, CURLOPT_PROXY,$proxy);
								curl_setopt($ch, CURLOPT_ENCODING,'identity');   //this enables decoding of response eg:identity , deflate,gzip.

								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //it will not print directly for that we need .

								curl_setopt($ch, CURLOPT_HEADER, false);         //to ignore the header value in response

								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

								curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

								curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

								$result = curl_exec($ch);

								if(!$result)
								{
									echo "<br>Could not connect\n";
									exit;
								}
								else
								{

								preg_match_all("!https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)!",$result,$fmatch);

								$value = reset($fmatch); //reset function moves the internal pointer to the first element of the array.//returns the first element of array , since here it waaas associative array , it pointed us to the first array where our links are stored.
								file_put_contents($file,"\n---------------------------> DEPTH: ".$i."<----------------------------\n\n",FILE_APPEND);

								for($j=1;$j<sizeof($value);$j++) 
								{

									if($value[$j] == "https://www.google.com/recaptcha/api.js")

									{
										file_put_contents($file,"#################### NO DATA AVAILABLE ###############"."\n",FILE_APPEND);
										file_put_contents($file,"#################### CAPTCHA  ! ###############"."\n",FILE_APPEND);
										echo "<div style =color:red> CAPTCHA ! Use Proxy or change your IP </div>";
										exit;

									}
								 /////code to skip unnecessary URL's starts here
									
									elseif(strpos($value[$j],"google")) //to skip unnecessary URL's when google is selected
									{
										continue;
									}
									elseif(strpos($value[$j],"w3")) //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}
									elseif(strpos($value[$j],"gstatic")) //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}

									/////code to skip unnecessary URL's ends here
									else
									{
										 strpos($value[$j],$search);//ignore the links where the search name is not present
										 $value[$j] = urldecode($value[$j]); //url decode before showing
										 $nv[$j] = rtrim($value[$j],"&amp"); //remove & operator present at the end of each link(at the extreme right)
										 file_put_contents($file,$nv[$j]."\n",FILE_APPEND);
										 //echo "<br>"."<a href='".$nv[$j]."' >".$nv[$j]."<br>";//to display links on the webpage itself
									 }
								 }
							 }
							 continue;
							 }
							 curl_close($ch);
							 echo "<h10><div style='color:green'>DONE</div></h10>";
							}




elseif ($search_eng == "https://search.yahoo.com/search?q=site:")
				{
							if($sub == 1)
							{
								$sub=3;#for one page
							}
							elseif($sub == 2)
							{
								$sub=2;#for two pages
							}
							elseif($sub == 3)
							{
								$sub=1;# for all three pages
							}
							elseif($sub == 4)
							{
							$sub=0;# for all three pages
						  }
							else
							{
								$sub=3;
							}
							$array = ['0','11','21','31'];
							$depth = count($array);
							$depth = $depth - $sub;
							file_put_contents($file,"#################### DORKS FOR ".$_POST['search']." ###############"."\n",FILE_APPEND);
							file_put_contents($file,"\n---------------------------> DORK: ".$manual." <----------------------------\n\n",FILE_APPEND);
							if(strpos($proxy_name,"scrapingdog"))
								{
									curl_setopt($ch, CURLOPT_URL,$url = $proxy_name.$search_eng.$search."+".$dorks[$i-1]."&premium=true");
								}
								else
								{
									curl_setopt($ch, CURLOPT_URL,$url = $proxy_name.$search_eng.$search."+".$dorks[$i-1]);
								}
							for($i=0;$i<$depth;$i++)
							{

								curl_setopt($ch, CURLOPT_URL,$url = $search_eng.$search."+".$manual."&b=".$array[$i]);//setting the url
								curl_setopt($ch, CURLOPT_PROXY,$proxy);
								curl_setopt($ch, CURLOPT_ENCODING,'identity');   //this enables decoding of response eg:identity , deflate,gzip.

								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //it will not print directly for that we need .

								curl_setopt($ch, CURLOPT_HEADER, false);         //to ignore the header value in response

								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

								curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

								curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

								$result = curl_exec($ch);

								if(!$result)
								{
									echo "<br>Could not connect\n";
									exit;
								}
								else
								{

								preg_match_all("!https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)!",$result,$fmatch);

								$value = reset($fmatch); //reset function moves the internal pointer to the first element of the array.//returns the first element of array , since here it waaas associative array , it pointed us to the first array where our links are stored.
								file_put_contents($file,"\n---------------------------> DEPTH: ".$i."<----------------------------\n\n",FILE_APPEND);

								for($j=1;$j<sizeof($value);$j++) 
								{

									if($value[$j] == "https://www.google.com/recaptcha/api.js")

									{
										file_put_contents($file,"#################### NO DATA AVAILABLE ###############"."\n",FILE_APPEND);
										file_put_contents($file,"#################### CAPTCHA  ! ###############"."\n",FILE_APPEND);
										echo "<div style =color:red> CAPTCHA ! Use Proxy or change your IP </div>";
										exit;

									}
								 /////code to skip unnecessary URL's starts here
									elseif(strpos($value[$j],"yahoo"))  //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}
									elseif(strpos($value[$j],"s.yimg")) //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}
									elseif(strpos($value[$j],"verizon")) //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}
									elseif(strpos($value[$j],"w3")) //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}
									elseif(strpos($value[$j],"gstatic")) //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}

									/////code to skip unnecessary URL's ends here
									else
									{
										 strpos($value[$j],$search);//ignore the links where the search name is not present
										 $value[$j] = urldecode($value[$j]); //url decode before showing
										 $nv[$j] = rtrim($value[$j],"&amp"); //remove & operator present at the end of each link(at the extreme right)
										 file_put_contents($file,$nv[$j]."\n",FILE_APPEND);
										 //echo "<br>"."<a href='".$nv[$j]."' >".$nv[$j]."<br>";//to display links on the webpage itself
									 }
								 }
							 }
							 continue;
							 }
							 curl_close($ch);
							 echo "<h10><div style='color:green'>DONE</div></h10>";
				}
}

////////////////Function grawl in manual mode with proxy enabled ends here ////////////////////////////















////////////////Function for automatic grawl in standard mode ////////////////////////////

function web_grawl($search,$search_eng,$file,$dork_type)
{
	$target = $_POST['search'];
//Opening the file to read the dorks
	$filename = $_POST['dork_type'];

	if($filename == "select")
	{
		echo "<h10><div style='color:#4fe1be'>Please fill out the empty fields</div><h10>";
		exit;
	}
	$fp = fopen($filename,'r');
	if (!$fp) 
	{
		echo "<div style =color:red> Cannot open file ! </div>";
		exit;
	}
	else
	{
		$dorks = explode("\n", fread($fp, filesize($filename)));
		file_put_contents($file,"#################### DORKS FOR ".$target." ###############"."\n",FILE_APPEND);
		$ch = curl_init();
		$search = urlencode($target);
		for($i=1;$i<sizeof($dorks);$i++)
		{


curl_setopt($ch, CURLOPT_URL,$url = $search_eng.$search."+".$dorks[$i-1]);//setting the url

curl_setopt($ch, CURLOPT_ENCODING,'identity');   //this enables decoding of response eg:identity , deflate,gzip.

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //it will not print directly for that we need .

curl_setopt($ch, CURLOPT_HEADER, false);         //to ignore the header value in response

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

$result = curl_exec($ch);

if(!$result)
{
	echo "\nCould not connect\n";
	exit;
}
else
{

	preg_match_all("!https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)!",$result,$fmatch);

$value = reset($fmatch); //reset function moves the internal pointer to the first element of the array.//returns the first element of array , since here it waaas associative array , it pointed us to the first array where our links are stored.
file_put_contents($file,"\n---------------------------> DORK: ".$dorks[$i-1]." <----------------------------\n\n",FILE_APPEND);
for($j=1;$j<sizeof($value);$j++) 
{

	if($value[$j] == "https://www.google.com/recaptcha/api.js")

	{
		file_put_contents($file,"#################### NO DATA AVAILABLE ###############"."\n",FILE_APPEND);
		file_put_contents($file,"#################### CAPTCHA ! ###############"."\n",FILE_APPEND);
		echo "<div style =color:red> CAPTCHA ! Use Proxy or change your IP </div>";
		exit;
	}
	 /////code to skip unnecessary URL's starts here
		elseif(strpos($value[$j],"microsoft")) //to skip unnecessary URL's when bing is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"bing"))   //to skip unnecessary URL's when bing is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"login.live.com")) //to skip unnecessary URL's when bing is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"schemas.live.com")) //to skip unnecessary URL's when bing is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"storage.live.com")) //to skip unnecessary URL's when bing is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"google")) //to skip unnecessary URL's when google is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"yahoo"))  //to skip unnecessary URL's when yahoo is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"s.yimg")) //to skip unnecessary URL's when yahoo is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"verizon")) //to skip unnecessary URL's when yahoo is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"w3")) //to skip unnecessary URL's when yahoo is selected
		{
			continue;
		}
		elseif(strpos($value[$j],"gstatic")) //to skip unnecessary URL's when yahoo is selected
		{
			continue;
		}
		/////code to skip unnecessary URL's ends here
		else
		{
			 strpos($value[$j],$search);//ignore the links where the search name is not present
			 $value[$j] = urldecode($value[$j]); //url decode before showing
			 $nv[$j] = rtrim($value[$j],"&amp"); //remove & operator present at the end of each link(at the extreme right)
			 file_put_contents($file,$nv[$j]."\n",FILE_APPEND);
			 //echo "<br>"."<a href='".$nv[$j]."' >".$nv[$j]."<br>";//to display links on the webpage itself
		 }
	 }
 }
 sleep(2);
 continue;
}
curl_close($ch);
echo "<h10><div style='color:green'>DONE</div></h10>";
}
}

////////////////Function for automatic grawl in standard mode ends here ////////////////////////////



////////////////Function grawl in manual mode with proxy disabled ////////////////////////////

function web_grawl_manual($search,$manual,$search_eng,$file,$sub)
{

	$target = $_POST['search'];
//Opening the file to read the dorks
	$file = $_POST['file'];
	$manual = $_POST['manual'];
	$dorks = explode("\n", fread($fp, filesize($filename)));
	file_put_contents($file,"#################### DORKS FOR ".$target." ###############"."\n",FILE_APPEND);
	$ch = curl_init();
	$search = urlencode($target);





if($search_eng == "https://www.bing.com/search?q=site:")
				{
							if($sub == 1)
							{
								$sub=3;#for one page
							}
							elseif($sub == 2)
							{
								$sub=2;#for two pages
							}
							elseif($sub == 3)
							{
								$sub=1;# for all three pages
							}
							elseif($sub == 4)
							{
							$sub=0;# for all three pages
							}
							else
							{
								$sub=3;
							}
							$array = ['0','11','21','31'];
							$depth = count($array);
							$depth = $depth - $sub;
							file_put_contents($file,"\n---------------------------> DORK: ".$manual." <----------------------------\n\n",FILE_APPEND);
							for($i=0;$i<$depth;$i++)
							{

							curl_setopt($ch, CURLOPT_URL,$url = $search_eng.$search."+".$manual."&first=".$array[$i]);//setting the url
							curl_setopt($ch, CURLOPT_ENCODING,'identity');   //this enables decoding of response eg:identity , deflate,gzip.

							curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //it will not print directly for that we need .

							curl_setopt($ch, CURLOPT_HEADER, false);         //to ignore the header value in response

							curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

							curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

							curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

							$result = curl_exec($ch);

							if(!$result)
							{
								echo "<br>Could not connect\n";
								exit;
							}
							else
							{

								preg_match_all("!https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)!",$result,$fmatch);

								$value = reset($fmatch); //reset function moves the internal pointer to the first element of the array.//returns the first element of array , since here it waaas associative array , it pointed us to the first array where our links are stored.
								file_put_contents($file,"\n---------------------------> DEPTH: ".$i."<----------------------------\n\n",FILE_APPEND);

								for($j=1;$j<sizeof($value);$j++) 
								{

									if($value[$j] == "https://www.google.com/recaptcha/api.js")

									{
										file_put_contents($file,"#################### NO DATA AVAILABLE ###############"."\n",FILE_APPEND);
										file_put_contents($file,"#################### CAPTCHA  ! ###############"."\n",FILE_APPEND);
										echo "<div style =color:red> CAPTCHA ! Use Proxy or change your IP </div>";
										exit;

									}
					 /////code to skip unnecessary URL's starts here
								elseif(strpos($value[$j],"microsoft")) //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"bing"))   //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"login.live.com")) //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"schemas.live.com")) //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
								elseif(strpos($value[$j],"storage.live.com")) //to skip unnecessary URL's when bing is selected
								{
									continue;
								}
									/////code to skip unnecessary URL's ends here

								else
								{
									 strpos($value[$j],$search);//ignore the links where the search name is not present
									 $value[$j] = urldecode($value[$j]); //url decode before showing
									 $nv[$j] = rtrim($value[$j],"&amp"); //remove & operator present at the end of each link(at the extreme right)
									 file_put_contents($file,$nv[$j]."\n",FILE_APPEND);
									 //echo "<br>"."<a href='".$nv[$j]."' >".$nv[$j]."<br>";//to display links on the webpage itself
								 }
							 }
						 }
						 continue;
						 }
						 curl_close($ch);
						 echo "<h10><div style='color:green'>DONE</div></h10>";
						}




elseif ($search_eng == "https://www.google.com/search?q=site:") 
				{
							if($sub == 1)
							{
								$sub=3;#for one page
							}
							elseif($sub == 2)
							{
								$sub=2;#for two pages
							}
							elseif($sub == 3)
							{
								$sub=1;# for all three pages
							}
							elseif($sub == 4)
							{
							$sub=0;# for all three pages
						  }
							else
							{
								$sub=3;
							}
							$array = ['0','10','11','21'];
							$depth = count($array);
							$depth = $depth - $sub;
							file_put_contents($file,"\n---------------------------> DORK: ".$manual." <----------------------------\n\n",FILE_APPEND);
							for($i=0;$i<$depth;$i++)
							{

								curl_setopt($ch, CURLOPT_URL,$url = $search_eng.$search."+".$manual."&start=".$array[$i]);//setting the url
								curl_setopt($ch, CURLOPT_ENCODING,'identity');   //this enables decoding of response eg:identity , deflate,gzip.

								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //it will not print directly for that we need .

								curl_setopt($ch, CURLOPT_HEADER, false);         //to ignore the header value in response

								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

								curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

								curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

								$result = curl_exec($ch);

								if(!$result)
								{
									echo "<br>Could not connect\n";
									exit;
								}
								else
								{

								preg_match_all("!https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)!",$result,$fmatch);

								$value = reset($fmatch); //reset function moves the internal pointer to the first element of the array.//returns the first element of array , since here it waaas associative array , it pointed us to the first array where our links are stored.
								file_put_contents($file,"\n---------------------------> DEPTH: ".$i."<----------------------------\n\n",FILE_APPEND);

								for($j=1;$j<sizeof($value);$j++) 
								{

									if($value[$j] == "https://www.google.com/recaptcha/api.js")

									{
										file_put_contents($file,"#################### NO DATA AVAILABLE ###############"."\n",FILE_APPEND);
										file_put_contents($file,"#################### CAPTCHA  ! ###############"."\n",FILE_APPEND);
										echo "<div style =color:red> CAPTCHA ! Use Proxy or change your IP </div>";
										exit;

									}
								 /////code to skip unnecessary URL's starts here
									
									elseif(strpos($value[$j],"google")) //to skip unnecessary URL's when google is selected
									{
										continue;
									}

									/////code to skip unnecessary URL's ends here
									else
									{
										 strpos($value[$j],$search);//ignore the links where the search name is not present
										 $value[$j] = urldecode($value[$j]); //url decode before showing
										 $nv[$j] = rtrim($value[$j],"&amp"); //remove & operator present at the end of each link(at the extreme right)
										 file_put_contents($file,$nv[$j]."\n",FILE_APPEND);
										 //echo "<br>"."<a href='".$nv[$j]."' >".$nv[$j]."<br>";//to display links on the webpage itself
									 }
								 }
							 }
							 continue;
							 }
							 curl_close($ch);
							 echo "<h10><div style='color:green'>DONE</div></h10>";
							}




elseif ($search_eng == "https://search.yahoo.com/search?q=site:")
				{
							if($sub == 1)
							{
								$sub=3;#for one page
							}
							elseif($sub == 2)
							{
								$sub=2;#for two pages
							}
							elseif($sub == 3)
							{
								$sub=1;# for all three pages
							}
							elseif($sub == 4)
							{
							$sub=0;# for all three pages
						  }
							else
							{
								$sub=3;
							}
							$array = ['0','11','21','31'];
							$depth = count($array);
							$depth = $depth - $sub;
							file_put_contents($file,"\n---------------------------> DORK: ".$manual." <----------------------------\n\n",FILE_APPEND);
							for($i=0;$i<$depth;$i++)
							{

								curl_setopt($ch, CURLOPT_URL,$url = $search_eng.$search."+".$manual."&b=".$array[$i]);//setting the url
								curl_setopt($ch, CURLOPT_ENCODING,'identity');   //this enables decoding of response eg:identity , deflate,gzip.

								curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //it will not print directly for that we need .

								curl_setopt($ch, CURLOPT_HEADER, false);         //to ignore the header value in response

								curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

								curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

								curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

								curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);

								$result = curl_exec($ch);

								if(!$result)
								{
									echo "<br>Could not connect\n";
									exit;
								}
								else
								{

								preg_match_all("!https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)!",$result,$fmatch);

								$value = reset($fmatch); //reset function moves the internal pointer to the first element of the array.//returns the first element of array , since here it waaas associative array , it pointed us to the first array where our links are stored.
								file_put_contents($file,"\n---------------------------> DEPTH: ".$i."<----------------------------\n\n",FILE_APPEND);

								for($j=1;$j<sizeof($value);$j++) 
								{

									if($value[$j] == "https://www.google.com/recaptcha/api.js")

									{
										file_put_contents($file,"#################### NO DATA AVAILABLE ###############"."\n",FILE_APPEND);
										file_put_contents($file,"#################### CAPTCHA  ! ###############"."\n",FILE_APPEND);
										echo "<div style =color:red> CAPTCHA ! Use Proxy or change your IP </div>";
										exit;

									}
								 /////code to skip unnecessary URL's starts here
									elseif(strpos($value[$j],"yahoo"))  //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}
									elseif(strpos($value[$j],"s.yimg")) //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}
									elseif(strpos($value[$j],"verizon")) //to skip unnecessary URL's when yahoo is selected
									{
										continue;
									}

									/////code to skip unnecessary URL's ends here
									else
									{
										 strpos($value[$j],$search);//ignore the links where the search name is not present
										 $value[$j] = urldecode($value[$j]); //url decode before showing
										 $nv[$j] = rtrim($value[$j],"&amp"); //remove & operator present at the end of each link(at the extreme right)
										 file_put_contents($file,$nv[$j]."\n",FILE_APPEND);
										 //echo "<br>"."<a href='".$nv[$j]."' >".$nv[$j]."<br>";//to display links on the webpage itself
									 }
								 }
							 }
							 continue;
							 }
							 curl_close($ch);
							 echo "<h10><div style='color:green'>DONE</div></h10>";
				}
	
	}


////////////////Function grawl in manual mode with proxy disabled ends here ////////////////////////////



















////////////////Function to display proxy from files ////////////////////////////

function showproxy()
{
	$array = ['ScraperAPI.txt',"ScrapingDog.txt","ZenScrape.txt"];
	for($i=0;$i<3;$i++)
			{
				$myfile = fopen("Prox/".$array[$i], "r") or die("Unable to open proxy file!");
				$proxy = fgets($myfile);
				if(isset($proxy))
				{
				echo 
				"
				<table>
				<tr>
				<td><div style='color:lightgreen;text-align: left;'>".$array[$i]."</div></td>
				<td><div style='color:lightblue;text-align: right;'>".$proxy."</div></td>
				</tr>
				</table>
				";
			  }
			  else
			  {
			  echo 
				"
				<table>
				<tr>
				<td><div style='color:lightgreen;text-align: left;'>".$array[$i]."</div></td>
				<td><div style='color:lightred;text-align: right;'>Not Available</div></td>
				</tr>
				</table>
				";
			  }
			 }
	fclose($myfile);
}

////////////////Function to display proxy from files ends here ////////////////////////////








////////////////Function to validate and add proxy to file proxy.txt ////////////////////////////

function validating_proxy($proxy_url,$test_url,$name)
  {
        $final_url = $proxy_url.$test_url;
        $ch = curl_init($final_url);
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($httpcode == 200)
        {
        	echo $path;
          echo "<h10><div style='color:green'>\nAPI key validated\n</div></h10>";
          file_put_contents("/Applications/XAMPP/htdocs/grawler/prox/".$name.".txt",$proxy_url."\n");
          header("Location:configure.php");
          exit;
        }
        else
        {
          echo "<h10><div style='color:red'>\nInvalid API key\n</div></h10>";
          exit;
        }

   }
////////////////Function to validate and add proxy to file proxy.txt ends here ////////////////////////////



















////////////////Function for header ////////////////////////////

function page_header()
{?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<title style="color: f90041">Grawler</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style type="text/css">
		</style>
	</head>
	<body>
		<!-- Header -->
<!--
			<header id="header">
				<div class="logo"><a style="color: #83e565" href="#">Grawler</a></div>
			</header>
		-->
		<!-- Main -->
		<section id="main">
			<div class="inner">
				<!-- One -->
				<section id="two" class="wrapper style2">
					<header>
						<h2 style="color: #83e565"><a href="index.php">Grawler</a></h2>
						<h1 style="text-align: center;color: grey"><a 
						 style="color:pink" target="_blank" href="https://twitter.com/A3h1nt">A3h1nt</a></h1>

						 <?php
					 }

////////////////Function for header ends here ////////////////////////////


////////////////Function for footer  ////////////////////////////

					 function footer()
					 {?>
					 </div>

				 </div>
			 </div>
		 </header>
	 </div>
 </div>
</section>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.poptrox.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
<?php
}

////////////////Function for footer ends here  ////////////////////////////

?>
