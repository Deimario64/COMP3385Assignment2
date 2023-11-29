<!DOCTYPE html>
<html>
<head>
    <title> Research Study Manager Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="gridlvl1">
  <div class="grid-item left med">LOGO</div>
  <div class="grid-item right med">Log Out</div>
</div>

<div class="gridlvl5a">
  <div class="grid-item center ">
  <form method="post" action="index.php?action=login">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="role">Role:</label>

            <select name="role" id="role">
            <option value="Research Study Manager">Research Study Manager</option>
            <option value="Researcher">Researcher</option>
            </select>
<br>
        <button type="submit">Create</button>
    </form>
  </div>  
</div>

<div class="footer">
<h4> Copyright Deimario Callender. All Rights Reserved</h4>
</div>

</body>
</html>