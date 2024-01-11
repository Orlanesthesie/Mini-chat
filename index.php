<?php
if (!empty($_POST['pseudo'])){
    setcookie('pseudo', $value, time() + 3600 );      // enregistre la valeur de pseudo dans un cookie
}
?>

<?php
require './partials/header.php';
require_once './config/db_connexion.php';

//Inserer un message et un user_id dans la table message
$preparedRequest = $connexion->prepare(
    "SELECT * FROM `message` INNER JOIN user ON message.user_id = user.id ORDER BY message.date_time ASC"
);
$preparedRequest->execute();
$message = $preparedRequest ->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
$preparedRequest = $connexion->prepare(
    "SELECT pseudo FROM `user`"
);
$preparedRequest->execute();
$pseudo = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
?>


<body class="bg">
    <div class="container border border-2 rounded-5 p-3 mt-5 mb-3 h-auto">
        <h1 class="titre container border rounded-3 border-3 border-light text-center p-3 mb-1">
            <i class="fa-regular fa-heart"></i> Mini chat <i class="fa-regular fa-heart"></i>
        </h1>
            <div class="container border??????? rounded-3 border-light border-3 p-1">
                <div class="row">
                    <div class="col-4">
                        <div class="orange border rounded-3 border-light border-3 p-2 mb-2">
                            <img src="./assets/images/logo.png" class="mx-auto d-block">
                                    <!-- PSEUDO -->
                                <form action="./process/add_user_message.php" method="post"> 
                                    </form>    
                                    <h4 class="pseudo text-center border border-light rounded-pill w-auto"> PSEUDO </h4>
                                </div>
                                <div class="orange border rounded-3 border-light border-3 p-3 text-center bg-opacity-50 ">
                                    <!-- USERS -->
                                    <?php foreach ($pseudo as $key) { ?>
                                    <div class="bg-user border border-light rounded-pill w-auto m-1">
                                        <?= $key['pseudo'];?> 
                                    </div>
                                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-8 row">
                        <div id="scroll" class="d-flex flex-column flex-nowrap align-items-start border rounded-3 border-light border-3 p-1 row mx-auto">
                                    <!-- CONVERSATION -->
                                <?php foreach ($message as $key){?>
                                    <div class="bg-msg border border-light rounded-pill w-auto m-1 
                                        <?= $key['pseudo'] === 'Orlane' ? 'align-self-end' : 'align-self-start'; ?>">
                                        <p class="justify-content "> 
                                                <b><?= $key['pseudo']?></b>: 
                                                <?= $key['date_time'];?>:
                                                <b> <?= $key['content'];?></b> 
                                            </p>
                                    </div>
                                <?php } ?> 
                            </div>
                                <form action="./process/add_user_message.php" method="post"class="container row form orange border rounded-3 border-light border-3 align-items flex-end">
                                    <div class="col">
                                        <div class="input mt-3">
                                            <input type="text" name="pseudo" placeholder="pseudo" class="form-control rounded-pill">
                                        </div>
                                        <div class="input mt-3"> <input type="text" name="content" placeholder="message" class="form-control rounded-pill">
                                            <input type="hidden" name="adress_ip" value="<?= $_SERVER['REMOTE_ADDR']?>">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn col">
                                        <img src="./assets/images/send.png">
                                    </button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
    </div>

<?php require './partials/footer.php' ?>