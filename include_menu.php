<?php 
$path = $_SERVER['PHP_SELF'];
$file = basename ($path, "");
?>
	    <div class="index_title_01">
            <div class="logo"><a href="index.php">WATERFROM<br /><span class="small_font">DESIGN</span></a></div>
            <ul>
                <li>
                	<?php if( $file == 'projects.php' or $file == 'projects_02.php' ){ ?>
                    	<a href="projects.php" style="text-decoration:none; color:#231815;">Projects</a>
                    <?php } else { ?>
                    	<a href="projects.php" style="text-decoration:none;">Projects</a>
                    <?php } ?>
                </li>
                <li>
                	<?php if( $file == 'about.php' ){ ?>
                    	<a href="about.php" style="text-decoration:none; color:#231815;">About Us</a>
                    <?php } else { ?>
                    	<a href="about.php" style="text-decoration:none;">About Us</a>
                    <?php } ?>
                </li>
                <li>
                	<?php if( $file == 'issue.php' or $file == 'issue_02.php' ){ ?>
                    	<a href="issue.php" style="text-decoration:none; color:#231815;">Issue</a>
                    <?php } else { ?>
                    	<a href="issue.php" style="text-decoration:none;">Issue</a>
                    <?php } ?>
                </li>
                <li>
                	<?php if( $file == 'press.php' or $file == 'press_02.php' ){ ?>
                    	<a href="press.php" style="text-decoration:none; color:#231815;">Press</a>
                    <?php } else { ?>
                    	<a href="press.php" style="text-decoration:none;">Press</a>
                    <?php } ?>
                </li>
                <li>
                    <a href="#" style="text-decoration:none;" class="contact">Contact</a>
                </li>
            </ul>
        </div>