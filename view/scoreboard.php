<table>
    <tr>
        <th colspan="2" style="text-align:center; border: none;">
            <?php  echo $controller->challenge?>
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
</table>
<a class="btn" href="<?php  echo HOME ?>">Home</a>
<a class="btn" href="<?php  echo ALLTIME ?>">Totals</a>