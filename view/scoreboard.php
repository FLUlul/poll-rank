<?php if (isset($_SESSION['session_id'])) {?>
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
    </table>

<?php } else { ?>
    <div>
        <h4>Login to see this page</h4><br>
        <a class="btn" href="<?php  echo HOME ?>">Login</a>
    </div>
<?php } ?>
