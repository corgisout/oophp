<h1>Dice 100</h1>
    <hr>
    <p>You: </p>

    <?php foreach ($totalpoints[0] as $point) :?>
    [ <?= $point ?> ]
    <?php endforeach; ?>
    <p>Total: <b><?= $playertotal ?>
    <?= ($playertotal > 99) ? 'winner' : ''; ?></b></p>

    <p>Computer: </p>

    <?php foreach ($totalpoints[1] as $point) :?>
    [ <?= $point ?> ]
    <?php endforeach; ?>
    <p>Total: <b><?= $computertotal ?>
    <?= ($computertotal > 99) ? '-- WINNER --' : ''; ?></b></p>
    <hr>
    <p>Total points this round: <?= $roundPoints ?></p>

    <?php if ($roll == 1) : ?>
    <p><b>DICES:</b> <?php foreach ($res as $dice) :?>
    [<?= $dice ?> ]
    <?php endforeach; ?>
    </p>
    <?php endif; ?>
    <?php
        $dice = new \sihd\Game\DiceHistogram2();
        $dice->setSerie($_SESSION["values"] ?? array());
        $histogram = new \sihd\Game\Histogram();
        $histogram->injectData($dice);
    ?>
    <pre><?= $histogram->getAsText() ?></pre>

    <form method="POST">
    <?php if ($gamestatus == 'playerturn') : ?>
    <input type="submit" name="roll" value="Roll">
    <input type="submit" name="take" value="Take Points">
    <?php endif; ?>
    <?php if ($gamestatus == 'computerturn') : ?>
    <input type="submit" name="simcomp" value="Simulate computers turn">
    <?php endif; ?>
    <input type="submit" name="reset" value="Reset">
    </form>
<hr>
