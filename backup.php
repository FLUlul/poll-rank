<h1>Poll Score</h1>
    <div class="container">
        <!-- se non esiste la rotta -->
        <?php if(!isset($_GET['route'])) {
            header("location: ". HOME);
        }
        ?>


        <?php if($_GET['route'] === 'home') { ?>
            <div class="login">
                <select name="userNames" id="userNames">
                    <option value="" disabled selected hidden>Tuo Nome</option>
                </select>

                <select name="challenges" id="challenges">
                    <option value="" disabled selected hidden>Challenge</option>
                </select>

                <button id="sendBtn" class="btn">Vota</button>
            </div>

            <div id="form_container"></div>
        <?php } else {?>


            <table>
                <tr>
                    <th colspan="2" style="text-align:center; border: none; padding-top: 5rem;">
                    <?php  echo $challenge?>
                    <a href="<?php  echo HOME ?>">HOME</a>
                    </th>
                </tr>
                <?php foreach ($dashBoard as $key => $value) { ?>
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
        <?php } ?>
    </div>