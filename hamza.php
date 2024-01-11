<!-- code d'Hamza -->
<?php foreach ($messages as $key => $message) {?>
            <p class="<?=$message['pseudo'] === 'Hamza' ? 'text-end' : 'text-start' ?> <?= $key % 2 ? 'text-success' : 'text-danger' ?>">
                <b><?= $message['pseudo']?> : </b>
                <?= $message['content']?>
            </p>
            <?php } ?>

<!-- mon code -->
<?php foreach ($message as $key){
            echo $key['pseudo'];?>, 
            <?= $key['date_time'];?>:
            <?= $key['content']; ?> <br>
        <?php } ?> 


<!-- code qui marche -->
<?php foreach ($message as $key){?>
        <div class="border"><p class="<?= $key['pseudo'] === 'Orlane' ?
         'text-end' : 'text-start'; ?>"> 
        <b><?= $key['pseudo']?> : </b>
        <?= $key['date_time'];?>:
        <b> <?= $key['content']; ?> </b> <br>
    </p></div>
<?php }?> 