<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simpsons Archives</title>
    <link rel="stylesheet" href="style.css">
</head> 
    <header id="masthead" class="site-header layout-container">
        <a href="/">
            <img class="site-header__logo" src="images/logo.svg" alt="Logo">
        </a>
    </header>

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <div id="main" class="site-main">
<?php

// Read JSON, and convert to array
$characters_json = file_get_contents('characters.json');
$characters = json_decode($characters_json, true);

function clickable($click){
   if(!isset($_GET[$click])){
       return 'unchecked';
   }else{
       return 'checked';
   }

}
?>
                  <div class="form__container layout-container">
                    <div class="form__row layout-row">
                        <div class="form__itemsContainer">

                            <div class="form__imageContainer">
                                <img src="images/simpsons.jpg" alt="Simpsons" class="form__image">
                            </div>

                            <div class="form__card">

                                <h3 class="form__heading">
                                    Select characters to show
                                </h3>

                                <form action="index.php" method="get">

                                    <ul class="form__items">
                                      

<?php                                        
foreach($characters as $char){         
?>
<li class="form__item">
<label for=<?=$char["first_name"]?>>
<?=$char["first_name"]?> <?=$char["last_name"] ?> </label>
<input id=<?=$char["first_name"] ?> type="checkbox" name =<?=$char["first_name"]?> <?= clickable($char['first_name'])?> >                              
</li>
<?php
  }
   // end foreach
?>
<?php



?>
 </ul>
<input class="form__button" type="submit" value="Show Characters" onclick="clickable()">
</form>
</div>
</div>
</div>
</div>
<?php
function displaychar($characters){
  ?>
  <div class="characters__container layout-container">
                    <div class="characters__row layout-row">
                        <ul class="characters__items">
                          <?php
                        foreach($characters as $character){
                            if(clickable($character["first_name"])==="checked")
                            {                           
                            ?>
                        
                        <li class="characters__itemContainer">
                                        <div class="characters__item">
                                          <img src="<?=$character["image_url"]?>" alt="<?=$character["first_name"]?>"
                                                class="characters__image">
                                                <div class="characters__info">

                                                   <h3 class="characters__name">
                                                    <?=$character["first_name"]?> <?=$character["last_name"]?>
                                                     </h3>
                                                <div class="characters__age characters__attribute">
                                                    <b>Age:</b> <?=$character["age"]?>                          
                                                    </div> <div class="characters__occupation characters__attribute">
                                                     <?php
                                                    if($character["first_name"] != "Maggie"){
                                                                                                   
                                                    ?>
                                                        <b>Occupation:</b>  <?=$character["occupation"]?> 
                                                        </div>  
                                                        <div class="characters__voicedBy characters__attribute">
                                                        <?php
                                                    if($character["first_name"] != "Moe"){
                                                                                                   
                                                    ?>
                                                        
                                                        <b>Voiced by:</b> <?=$character["voiced_by"]?>          </div> 
                                                      </div>
                                           </div>
                                    </li>
                                    <?php 
                        }}}}?>
                                 </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
     }
    displaychar($characters);

?>

