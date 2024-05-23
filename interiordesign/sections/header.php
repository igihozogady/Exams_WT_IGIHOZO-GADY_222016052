<?php session_start();
 ?><style type="text/css">
    header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
}

.logo {
    font-size: 1.5em;
    font-weight: bold;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin: 0 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 5px 10px;
}

nav ul li a:hover {
    background-color: #555;
    border-radius: 4px;
}

.login-btn {
    background-color: #4CAF50;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.login-btn:hover {
    background-color: #45a049;
}

</style>
<header>
    <div class="logo">Nova Design</div>
    <nav>
        <ul>
            <li><a href="./">Home</a></li>
            <li><a href="./?page=about">About</a></li>
            <li><a href="./?page=service">Services</a></li>
            <li><a href="./?page=portfolio">Portfolio</a></li>
            <li><a href="./?page=contact">Contact</a></li>
            <li><a href="./?page=Appointment">Appointments</a></li>
            <li><a href="./?page=clients">Clients</a></li>
            <li><a href="./?page=consultations">Consultations</a></li>
            <li><a href="./?page=designer">Designer</a></li>
            <li><a href="./?page=moodboard">Moodboard</a></li>
<?php if(!isset($_SESSION['valid'])){ ?>
            <li><a href="logout.php" class="login-btn">LogOUt</a></li>
        <?php }else{ ?>
            <li><a href="loginform.php" class="login-btn">Login</a></li>

    <?php    } ?>
        </ul>
    </nav>
</header>
