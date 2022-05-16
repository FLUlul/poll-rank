<button class="btn btn-vote">Vote</button>
<button class="btn btn-scoreboard">Scoreboard</button>
<a class="btn btn-totals" href="<?php  echo SCOREBOARD . '/alltime' ?>">Totals</a>

<div class="vote d-none">
    <h4>Select the challenge where you want to vote</h4><br>
    <select name="userNames" id="userNames">
        <option value="" disabled selected hidden>Your Name</option>
    </select>

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

<div id="form_container"></div>