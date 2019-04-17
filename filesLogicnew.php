<?php
	$ALGORITHM = 'AES-128-CBC';
        $IV  = '12dasdq3g5b2434b';
	#define(ACCESS_KEY, "AKIAIXZAWFYJCHPIXCCQ");
       # define(SECRET_KEY, "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");
	require 'C:\Users\kalya\vendor\autoload.php';
        use Aws\S3\S3Client;
        session_start();
	if(isset($_POST['save'])&&$_POST['pass']!='')
			{	
				$filename = $_FILES['myfile']['name'];	
				$password =$_POST['pass'];
				#echo "\nfilename".$filename;

				$extension = pathinfo($filename,PATHINFO_EXTENSION);
				
				#echo "\nExtension".$extension;

				$file = $_FILES['myfile']['tmp_name'];	

				$size = $_FILES['myfile']['size'];
			
				
				if(!in_array($extension,['zip','pdf','docx','png','jpg','txt','crypto','doc','jpeg','csv','ppt','pptx','rar','exe','pdf','odt']))
				{
					echo "Check the File Extension";
				}
				elseif($_FILES['myfile']['size']>200000000)
				{
					echo "Check File Size";
				}
				else
				{	$content = '';
   				        $nomefile  = '';
					$content = file_get_contents($_FILES['myfile']['tmp_name']);
					$filename  = $_FILES['myfile']['tmp_name'];
					$content = openssl_encrypt($content, $ALGORITHM, $password, 0, $IV);
					file_put_contents($_FILES['myfile']['tmp_name'],$content);
					$clientS3 = S3Client::factory(array(
							    'version' => 'latest',
							    'region'  => 'us-east-1',
							    'credentials' => [
							    'key'    => 'AKIAIXZAWFYJCHPIXCCQ',
							    'secret' => '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'
									  ]
							));
					$response = $clientS3->putObject(array(
						    'Bucket' => "abhishekvk",
						    'Key'    => $_FILES['myfile']['name'],
						    'SourceFile' => $_FILES['myfile']['tmp_name'],
						    'ACL' => 'public-read'
						  
						));
				#echo "file \t".$filename. "\t Uploaded Suceesfully On Sharing Cloud ";
				echo "<script type='text/javascript'>alert('file \t".$filename. "\t Uploaded Suceesfully On Sharing Cloud');</script> ";

				}
			}



?>
