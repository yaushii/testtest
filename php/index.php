<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/calendar.css">
</head>

<body>

    <nav class="navbar navbar-dark bg-primary mb-3">
        <a href="/index.php" class="navbar-brand">Calendrier Apprenti</a>
    </nav>

    <?php
    require '../src/date/month.php';
    /* <?php try {

        $month = new App\Date\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
    } catch (\Exception $e) {
        $month = new App\Date\Month();
    } ?>*/

    $month = new App\Date\Month($_GET['month'] ?? null, $_GET['year'] ?? null);
    $start = $month->getStartDay()->modify('last monday');
    ?>


    <h1><?= $month->toString(); ?></h1>



    <table class="calendarTable calendarTable--<?= $month->getWeeks(); ?>weeks">
        <?php
        for ($i = 0; $i < $month->getWeeks(); $i++): ?>
            <tr>
                <?php 
                foreach ($month->days as $k => $day) : 
                    $date = (clone $start)->modify(" + " . ($k + $i * 7) ." days") ;?>

                    <td class="calendar__<?= $month->withinMonth($date);?> othermonth">

                        <div class="calendar__weekday"> <?= $day; ?></div>
                        <div class="calendar__day"><?= $date->format('d'); ?></div>

                    </td>
                <?php endforeach ?>

            </tr>
        <?php  endfor ?>





    </table>



</body>

</html>