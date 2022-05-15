<table>
    <tr>
        <th colspan="2" style="text-align:center; border: none;">
            <?php  echo $controller->title?>
        </th>
    </tr>

    <?php foreach ($controller->dashBoard as $key => $value) { ?>
        <tr class="partecipant-row">
            <th>
                <?php echo $key ?>
            </th>
            <td>
                <?php echo $value ?>
            </td>
        </tr>
    <?php }?>

    <?php if(!isset($controller->dashBoard)) { ?>
    <tr>
        <td>
        Non ha votato ancora nessuno!!!!
        </td>
    </tr>
    <?php }?>
    </table>
<a class="btn" href="<?php  echo HOME ?>">Home</a>
<?php if($controller->title !== 'Total Score') { ?>
<a class="btn" href="<?php  echo SCOREBOARD . '/alltime' ?>">Totals</a>
<?php }?>