<?php
	require 'C:\Users\kalya\vendor\autoload.php';
        use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	try
		{
			$s3 = S3Client::factory(array(
							    'version' => 'latest',
							    'region'  => 'us-east-1',
							    'credentials' => [
							    'key'    => 'YOUR ACCESS KEY HERE',
							    'secret' => 'YOUR SECRET KEY HERE'
									  ]
							));
		}catch(Exception $e)
			{
			die("Error:".$e->getMessage());

			}
	$result = $s3->listObjects(array('Bucket' =>"BUCKET NAME"));
	$bucket="BUCKET NAME";
	foreach($result['Contents'] as $object)
						{
							#echo $object['Key']."\n";
						}
    
		
?>
<html>
<head>
<title>Download</title>
<body background="download1.jpg">
<link rel ="stylesheet" href="style1.css">
<div align="center">
<div align="center"><h1><font color="#fff">List of Uploaded Files  </font></h1></font></div>
<div class="container">
     <div class="row"> 
<table align="center">
	<tr>
		<th><font color="#000">File</font></th>
		<th align="left"><font color="#000">Download</font></th>
	</tr>
	<tbody>
	<?php foreach($result['Contents'] as $object): ?>
	<tr>
		<td><font color="#000"><?php echo $object['Key']; ?></font></td>
		<td><font color="#000"><a href="<?php echo $s3->getObjectUrl($bucket,$object['Key']);?>" style="text-decoration: none">Download</a></font></td>
	</tr>
	<?php endforeach;?>
	</tbody>
</table>
<div align="center"><font color="#000"><b>Note: Some Of The FIles Are In Encrypted Please Decrypt It To Download</font></div>
<div align="center">
<table>
<tr>
<td style="padding:50px">
<button ><a href="encnew.php" style="text-decoration: none"> <font color="#000">DECODE FILE</font></a></button></div>	
</td>
<td>
<button ><a href="upnew.php" style="text-decoration: none"> <font color="#000">UPLOAD FILE</font></a></button></div>
</td>
</table>	
	</div>
</div>

</body>
