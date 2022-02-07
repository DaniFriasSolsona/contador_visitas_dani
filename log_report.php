<!DOCTYPE html>
<html>

  <head>
    <title>Site Visits Report</title>
  </head>

  <body>

      <h1>Site Visits Report</h1>

      <table border = '1'>
        <tr>
          <th>No.</th>
          <th>Visitor</th>
          <th>Total Visits</th>
        </tr>

        <?php

            try {

                $redis = new Redis();
                $redis->connect('127.0.0.1', 6379);
                $redis->auth('hola01');

                $siteVisitsMap = 'siteStats';

                $siteStats = $redis->HGETALL($siteVisitsMap);

                $i = 1;

                foreach ($siteStats as $visitor => $totalVisits) {

                    echo "<tr>";
                      echo "<td align = 'left'>"   . $i . "."     . "</td>";
                      echo "<td align = 'left'>"   . $visitor     . "</td>";
                      echo "<td align = 'right'>"  . $totalVisits . "</td>";
                    echo "</tr>";

                    $i++;
                }

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        ?>

      </table>
  </body>

</html>
