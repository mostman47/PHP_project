<?php
/**
 * Created by PhpStorm.
 * User: pham
 * Date: 2/3/14
 * Time: 10:56 AM
 */
if(strcasecmp(currentPageName(),"index")!= 0)
{

}
?>
<div class="header">
    <ul class="nav nav-pills pull-right" id="topMenu">
        <?php
        for ($i = 0; $i < count($menuBars); $i++) {
            $m = $menuBars[$i];
            $p = $pageNames[$i];
            if (strcasecmp($pageName, $p)==0)// check current tab
            {
                ?>
                <li class="active"><a href="<?php echo $p ?>.php"><?php echo $m ?></a></li>
            <?php
            } else {
                    ?>
                <li><a href="<?php echo $p ?>.php"><?php echo $m ?></a></li>
            <?php
            }
        }
        if(isset($_SESSION["loginUser"]))
        {
            ?>
            <li>
                <form action="controller/login.php" method="post">
                    <button type="submit" class="btn btn-link" id="logout" name="logout" value="logout">
                        <span class="glyphicon glyphicon-lock"></span> Logout
                    </button>
                </form>
            </li>
        <?php
        }
        else{
        ?>
            <script>
                $("#topMenu li").each(function(){
                   $(this).addClass("disabled");
                });
            </script>
        <?php
        }
        ?>

    </ul>
    <h3 class="text-muted">Resume Uploader</h3>
</div>

