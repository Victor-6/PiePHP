<h2>Bienvenue sur ton profil !</h2>

<p><?php echo $_SESSION['id'] ?></p>
<p><?php echo $_SESSION['email'] ?></p>

<h2>Modification de votre profil !</h2>

<form action="show" method="post">
    <label id="email" for="email">
        Votre Email : <input id="email_input" name="email" type="email"/>
    </label><br><br>
    <button>Modification</button>
</form>

<form action="show" method="post">
    <label id="password" for="password">
        Votre Password : <input id="password" name="password" type="password"/>
    </label><br><br>
    <button>Modification</button>
</form>



