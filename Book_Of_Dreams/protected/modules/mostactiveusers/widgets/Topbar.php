<?php 
    namespace humhub\modules\mostactiveusers\widgets;

    use humhub\modules\mostactiveusers\models\ActiveUser;
    use humhub\modules\post\models\Post;


class Topbar extends \humhub\components\Widget
    {

        public function run(){
            $posts = ActiveUser::catch();
	    
            //$posts = array_search("posts",$result);
	    //$profile = array_search("profile",$result);
            
            // return $this->render('topbar', array(
            //    'posts' => $posts, 'profile' => $profile
            // ));
	    return $this->render('topbar', array(
               'posts' => $posts
             ));
        }
        

        
    }

    
?>
