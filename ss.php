<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
        <table border="1">
            <tr>
                <th>S >No</th>
                <th>ff</th>
                <th>dd</th>
                <th>gg</th>
            </tr>
            <?php
                $i=1;
                $qry_select=mysql_query("SELECT * FROM `countdown`");
                while ($row= mysql_fetch_array($qry_select))
                {
                    $time=$row['year'].'-'.$row['month'].'-'.$row['day'].' '.$row['time'];

            ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td>ff</td>
                        <td><?php echo $time ?></td>
                        <td><p id="demo<?php echo $i ?>"></p></td>
                    </tr>
            <?php
                    $i++;
                }
            ?>
        </table>
</body>

<p id="demo5"></p>
        <!-- <p id="demo8"></p>
        <p id="demo10"></p>
        <p id="demo430"></p> -->


<script type="text/javascript">
    function createCountDown(elementId, date) {
    // Set the date we're counting down to
    var countDownDate = new Date(date).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now an the count down date
      var distance = countDownDate - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById(elementId).innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is finished, write some text 
      if (distance < 0) {
        clearInterval(x);
        document.getElementById(elementId).innerHTML = "ORDER EXPIRED";
      }
    }, 1000);
}

// createCountDown('demo1', "2019-07-26 18:00:00")
// createCountDown('demo2', "2018-02-13 14:00:00")
// createCountDown('demo3', "2017-07-27 10:04:30")
// createCountDown('demo4', "2017-07-28 20:10:50")
</script>
<?php
     
    $i=1;
    $qry_select=mysql_query("SELECT * FROM `countdown`");

    while ($row= mysql_fetch_array($qry_select)) 
    {
        $time=$row['year'].'-'.$row['month'].'-'.$row['day'].' '.$row['time'];
?>
    <script type="text/javascript">
        createCountDown('demo<?php echo $i ?>', "<?php echo $time ?>")
    </script>
<?php
        $i++;

    }
?>


</html>

