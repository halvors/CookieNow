<?php echo $utf8variable;?>
<?php
$pageName = isset($_GET['page']) ? $_GET['page'] : 'general';
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="index.css"/>
    <link rel="stylesheet" type="text/css" href="SiteStyle.css"/>

    
    <title>Coockie Now</title>
    

</head>



<body>
    

   
    <div class="NavDiv">
        
        <a class="NavTextSize" href="index.php?pages=Home">Home</a>
        <a class="NavTextSize" href="index.php?pages=Cases">Cases</a>
        <a class="NavTextSize" href="index.php?pages=FAQ">FAQ</a>

        <div class="NavRight">
            <a class="NavTextSize" href="index.php?pages=Users">Sign In</a>
        </div>
    </div>


    <div class="Wrapp">



        <!--Welcome div
        <div class="divwelcome">
            <h1 class="contentcenter">About Avalanche</h1>
            <p class="contentcenter">This is a website for the game clan called Avalanche</p>
        </div>-->

        <div class="divcenter">
             <?php
	$pageDir = 'pages';
	$fileName = $pageDir . '/' . $pageName . '.php';
	$pageList = glob($fileName);
    
	//if (!isset($pageDir)) {
    if (in_array($fileName, $pageList)) {
	    include $fileName;
        
	} else {
	    echo '<p>Can`t find page!</p>';
	}
	//}
    ?>
        </div>


        <!-- The side panel
        <div class="Players">
            <h1 class="HeadlineClass">Current Clan players</h1>
            <p class="PlayersTextLayout">Winterforce</p>
            <p class="PlayersTextLayout">Plecrow</p>
            <p class="PlayersTextLayout">Falomar</p>
        </div>
            -->

        
    </div>


</body>
</html>