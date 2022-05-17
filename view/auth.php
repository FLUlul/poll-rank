<!-- Register -->
<form method="post" action="index.php?route=auth/register">
    <h2>Registrazione</h2>
    <input type="text" id="username" placeholder="Username" name="username" maxlength="50" required>
    <input type="password" id="password" placeholder="Password" name="password" required>
    <button type="submit" name="register">Registrati</button>
</form>

<!-- Login -->
<form method="post" action="index.php?route=auth/login">
    <h2>Login</h2>
    <input type="text" id="username" placeholder="Username" name="username">
    <input type="password" id="password" placeholder="Password" name="password">
    <button type="submit" name="login">Accedi</button>
</form>
