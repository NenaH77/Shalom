<?php
include("../includes/layout/header.php");
?>
<!-- body -->
<div class="headline">
    <h4 class="intro">Give Online</h4>
    <img class="image1" src="image/Tithing.png" alt="tithing" width="655px" height="431px" />
</div>

<div class="wrapper">
    <div class="groups">
        <h2>Why We Give</h2>
        <p>We give out of obedience to Scripture, we give out of a sense of gratitude, and we give in the knowledge that God will use temporary, finite resources to build an eternal, infinite Kingdom.</p>

        <p>God doesn't need our money. What he's truly after is us. Yet, how we use money is a very accurate indicator of where our heart is and what we value. Jesus said, "Where your treasure is, there your heart will be also" (Matthew 6:21). Giving is an act of worship and an act of commitment; to the community of believers, and those in need.</p>

        <div class="paypal">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="C9EBGHUZWTSVU">
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>

    </div>
</div>


<?php
include("../includes/layout/footer.php");
?>