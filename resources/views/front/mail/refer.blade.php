<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email Template</title>
</head>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Poppins:400, 700" rel="stylesheet">
<body style="margin:0px; padding:0px">
	<div style="background:#292834;height:632px;width:544px;margin: 0px auto;">
		<div style="text-align:center;maring:0px;padding:0px"><h1 style="font-family: 'Montserrat', sans-serif;color:#e1a70b;font-size:28px; font-weight: 700; padding-top:45px;margin:0px;">Rover Expedition</h1></div>
		<p style="color:#fff;font-family: 'Poppins', sans-serif;font-size:14px;font-weight:700; margin-top:6px; margin-bottom:35px;padding:0px; text-align: center;">Friend Request To View Trip Information</p>
		<div style="font-family: 'Poppins', sans-serif;font-size:16px;height:445px;width:494px;background:#e7e7e7;padding-left:50px;padding-top:20px;color:#7c7c7c;">
			<p>Your Friend {{$your_email}} has requested you to view the following Trip Information. Please click the link below to view the respective Trip.</p>
		    <p><a href="{{$trip_url}}">{{$trip_url}}</a></p>
			<br>
			<br>
			<br>
			Thanks,<br>
			Developer
		</div>
		
	</div>
	
</body>
</html>

