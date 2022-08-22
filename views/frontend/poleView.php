<?php
    $title="New pole";
    ob_start();
?>

<div class="formulaire">
    <form action="index.php ? action=addPole" method="POST">
        <h3>Création d'un Pôle de Priere</h3>
        <table>
            <tr>
                <td>
                    <input type="text" name="poleName" placeholder="Nom du pôle..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="leader" placeholder="Noms et prenoms du leader" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nation" placeholder="Nation">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Créer">
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="list">
    <?php
        $allPole= poleList();
        
        if($allPole!=false){
            $j=count($allPole[0]);
    ?>
            <table>
                <h3>Liste des Poles deja crées</h3>
                <tr>
                    <td>Noms des Poles</td> <td> Leaders</td> <td>Nations</td> <td>Action</td>
                </tr>
                <?php for($i=0; $i<$j; $i++){ ?>
                    <tr>
                        <td><?= $allPole[0][$i]->getPolename()?></td>
                        <td><?= $allPole[0][$i]->getLeader()?></td>
                        <td><?= $allPole[0][$i]->getNation()?></td>
                        <td><a href="# ? iden=<?= $allPole[1][$i]?>">Modifier</a></td>
                    </tr>
                <?php } ?>    
            </table>
                 
    <?php } ?>    

    
</div>

<?php
    $content=ob_get_clean();
    include('poleTemplate.php');
?>