<?php
include("../includes/layout/header.php");

//setup database
$user="root";
$pass="root";
$mysql='mysql:host=localhost;dbname=shalom;port=8889';
$db = new PDO($mysql, $user, $pass);
?>


<!-- body -->
<div class="headline">
    <h4 class="intro">Adult Groups</h4>
    <img class="image1" src="image/grp_c.jpg" alt="small group" width="655px" height="431px" />
</div>


<div class="wrapper">
    <table class='table table-hover'>
        <tr>
            <th>Group</th>
            <th>Day</th>
            <th>Time</th>
            <th>Age</th>
            <th>Location</th>
            <th>Topic</th>

        </tr>

<?php

    if (isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    $stmt = $db->prepare("SELECT * FROM smgrp ORDER BY id");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row){
        echo "<tr><td>" . $row['groups'] . "</td>";
        echo "<td>" . $row['days'] . "</td>";
        echo "<td>" . $row['hrtime'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['topic'] . "</td>";

    }
?>
</table>
 <p>If you find yourself interested in joining one of our groups, please <a href="mailto:apeterson@shalommi.org?subject=Small Groups">Send Email to Amy Peterson</a></p>
</div><!--close wrapper-->


<?php
include("../includes/layout/footer.php");
?>