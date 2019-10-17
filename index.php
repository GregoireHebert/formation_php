<?php require_once 'autoload.php'; ?>
<?php require_once 'game.php'; ?>

<html>
    <head>
        <style>
            body {
                margin: 0;
                padding: 0;
            }
            .nav {
                margin: 0 50%;
                width: 100%;
                top: 100px;
                position: absolute;
                z-index:999;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="styles/components/decor.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="styles/components/die.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="styles/components/eating.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="styles/components/hud.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="styles/components/idle.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="styles/components/run.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="styles/components/sheep.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="styles/components/walk.css" media="all"/>
    </head>
    <body>
        <div id="world">
            <div id="sky">&nbsp;</div>
            <div id="grass_front">&nbsp;</div>
            <div id="hud">
                <div class="heart<?php if (($mouton->getLife() ?? 0) <= 0) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="heart<?php if (($mouton->getLife() ?? 0) <= 2) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="heart<?php if (($mouton->getLife() ?? 0) <= 4) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="heart<?php if (($mouton->getLife() ?? 0) <= 6) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="heart<?php if (($mouton->getLife() ?? 0) <= 8) { echo ' inactive'; } ?>">&nbsp;</div>

                <div class="spacing">&nbsp;</div>

                <div class="hungry <?php if (($mouton->getHunger() ?? 0) <= 0) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="hungry <?php if (($mouton->getHunger() ?? 0) < 2) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="hungry <?php if (($mouton->getHunger() ?? 0) < 4) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="hungry <?php if (($mouton->getHunger() ?? 0) < 6) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="hungry <?php if (($mouton->getHunger() ?? 0) < 8) { echo ' inactive'; } ?>">&nbsp;</div>

                <div class="spacing">&nbsp;</div>

                <div class="playful <?php if (($mouton->getPlayfulness() ?? 0) <= 0) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="playful <?php if (($mouton->getPlayfulness() ?? 0) < 2) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="playful <?php if (($mouton->getPlayfulness() ?? 0) < 4) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="playful <?php if (($mouton->getPlayfulness() ?? 0) < 6) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="playful <?php if (($mouton->getPlayfulness() ?? 0) < 8) { echo ' inactive'; } ?>">&nbsp;</div>

                <div class="spacing">&nbsp;</div>

                <div class="sleep <?php if (($mouton->getSleepiness() ?? 0) <=   0) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="sleep <?php if (($mouton->getSleepiness() ?? 0) < 2) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="sleep <?php if (($mouton->getSleepiness() ?? 0) < 4) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="sleep <?php if (($mouton->getSleepiness() ?? 0) < 6) { echo ' inactive'; } ?>">&nbsp;</div>
                <div class="sleep <?php if (($mouton->getSleepiness() ?? 0) < 8) { echo ' inactive'; } ?>">&nbsp;</div>
            </div>

            <div>
                <div class="nav">
                    <form method="post">
                        <input type="submit" name="action" value="<?php echo \App\Handlers\RunHandler::ACTION; ?>"/>
                        <input type="submit" name="action" value="<?php echo \App\Handlers\SleepHandler::ACTION; ?>"/>
                        <input type="submit" name="action" value="<?php echo \App\Handlers\EatHandler::ACTION; ?>"/>
                        <input type="submit" name="action" value="<?php echo \App\Handlers\DoctorHandler::ACTION; ?>"/>
                        <input type="submit" name="action" value="idle"/>
                    </form>
                </div>

                <div id="sheep" class="idle_right">&nbsp;</div>
            </div>

            <div id="grass_back">&nbsp;</div>
            <div id="treeone">&nbsp;</div>
            <div id="treetwo">&nbsp;</div>
            <div id="rockone">&nbsp;</div>
            <div id="rocktwo">&nbsp;</div>
        </div>
    </body>
</html>
