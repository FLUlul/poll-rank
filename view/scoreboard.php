<table>
    <tr>
        <th colspan="2" style="text-align:center; border: none; padding-top: 5rem;">
        <?php  echo $controller->challenge?>
        <a href="<?php  echo HOME ?>">HOME</a>
        </th>
    </tr>
    <?php foreach ($controller->dashBoard as $key => $value) { ?>
        <tr>
            <th>
                <?php echo $key ?>
            </th>
            <td>
            <?php echo $value ?>
            </td>
        </tr>
    <?php }?>
</table>