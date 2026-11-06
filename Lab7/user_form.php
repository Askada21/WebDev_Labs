
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>

<h2>Add New User</h2>

<form action="add_user.php" method="POST">

    Username:
    <input type="text" name="username" required>
    <br><br>

    Password:
    <input type="password" name="password" required>
    <br><br>

    First Name:
    <input type="text" name="firstname" required>
    <br><br>

    Last Name:
    <input type="text" name="lastname" required>
    <br><br>

    <input type="submit" value="Add User">

</form>

</body>
</html>
