<?php

$filtered_bees = [];
foreach($bees as $bee) {

    $filtered_bees[$bee->type][] = $bee;

} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bee game</title>
</head>
<body>
    <a href="">

         <button>
            Hit!
        </button>
    </a> <br>
    <div>
        <table>
            <?php foreach($filtered_bees as $type => $grouped_bees) { ?> 

                <th>
                    <?=$type;?>
                </th>

                <tr>
                    <?php foreach($grouped_bees as $bee){ ?> 
                        <td>
                            <?= $bee->name;?>
                            <br>
                            <?= 'HP: ' . $bee->current_hp . '/' . $bee->hp;?>
                            <br>
                            <?= 'Damage taken: ' . $bee->damage;?>
                            <br>
                            <?= $bee->is_dead ? 'Dead' : 'Alive'; ?>
                        </td>
                    <?php }?>
                </tr>
            <?php }?>
        </table>
    </div>
    <div>
        <?php foreach($log as $one_log) {
            echo $one_log;
            echo '<br>';
        }?>
    </div>
    
</body>
</html>