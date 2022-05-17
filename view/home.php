<?php

if (isset($_SESSION['session_id'])) { 
    $session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
    $session_id = htmlspecialchars($_SESSION['session_id']);

   /*  printf("Benvenuto %s, il tuo session ID è %s", $session_user, $session_id);
    echo "<br>";
    printf("%s", '<a href="'. AUTH . '/logout' . '">logout</a>'); */
    ?>

    <button class="btn btn-vote">Vote</button>
    <button class="btn btn-scoreboard">Scoreboard</button>
    <a class="btn btn-totals" href="<?php  echo SCOREBOARD . '/alltime' ?>">Totals</a>
    <a class="btn btn-logout" href="<?php  echo AUTH . '/logout' ?>" >Logout</a>
    
    <div class="vote d-none">
        <h4>Select the challenge where you want to vote</h4><br>
        <div id="authUser" data-user='<?php echo $session_user ?>'></div>
    
        <select name="challenges" class="challenges">
            <option value="" disabled selected hidden>Challenge</option>
        </select>
    
        <button id="sendBtn" class="btn">Vote</button>
        <a class="btn" href="<?php  echo HOME ?>">&#xab;</a>
    </div>
    
    <div class="scoreboard d-none">
        <h4>Select the challenge to see the scoreboard</h4><br>
        <select name="challenges" class="challenges">
            <option value="" disabled selected hidden>Challenge</option>
        </select>
    
        <button class="btn btn-view" data-score="<?php echo SCOREBOARD ?>">View</button>
        <a class="btn" href="<?php  echo HOME ?>">&#xab;</a>
    </div>
    
    <div id="form_container" data-home="<?php echo HOME ?>"></div>

<?php
} else { ?>
    <div>
        <h4>Login to use the vote application</h4><br>
        <?php include 'auth.php' ?>
    </div>
<?php
}
?>