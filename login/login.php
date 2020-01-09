<!DOCTYPE HTML>
<html> 
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../ibuy.css" />
	</head>
	<body>
		<h2>Login</h2>
		<form action="/login/" method="post">
			<b>username:</b> <input type="text" name="logUser"><br>      
			<b>Password:</b> <input type="text" name="logPassword"><br>
			<input type="submit" value="login">
			<input type="button" value="Don't have account? Click here to register!" onclick="window.location.href = '/register'">
		</form>
	</body>
</html>