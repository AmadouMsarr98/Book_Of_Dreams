<?php 
    use yii\helpers\Html;
    use yii\helpers\Url;

    // humhub\modules\topslike\Assets::register($this);
?>
<?php echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >'; ?>

<div class="panel panel-default" id="topslike-panel" style="margin:0;">
    
    <!-- Display panel menu widget -->
    <?php humhub\widgets\PanelMenu::widget(array('id' => 'topslike-panel')); ?>
<table style="padding: 5px; border-spacing: 15px;">
        <thead>
            <div class="panel-head" style="background-color:#495a6f;">
                <td><h4 style="text-align:center; color:#495a6f;"><strong>TOP IDEAS <i class="fa fa-trophy" style="font-size:36px;color:orange"> </i> </strong>  </h4></td>

            </div>
        </thead>
        <tbody>
            <?php
                    // run through the array of users
                    //print_r($posts);
        for ($i=count($posts)-1; $i>count($posts)-4;$i--) {
                ?>
            <tr>
                <td style="padding: 5px; border-spacing: 15px;">
                    <div class="panel-body" style = "border: 2px solid #495a6f; border-radius: 10px" >
                        <?php
                        // run through the  array of users
                            ?> 
			
                            <a href="<?php echo Url::to(['/content/perma', 'id' => $posts[$i]->content->id], true) ?>">
				
                                <p style="color:black;">
                                    <?php echo $posts[$i]->message; echo "<hr />";
                                    ?>
                                   <b> <?php
                                        echo $posts[$i]->nb_like;
                                        if ($posts[$i]->nb_like>1) {echo " votes";}
                                        else {echo " vote";};
                                    ?>
                                    </b>
                                </p>
				            </a>
                          
                        <?php
                        }
            
                        ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
