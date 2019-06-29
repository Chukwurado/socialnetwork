<?php 

include("../../config/config.php");
include("../classes/User.php");
include("../classes/Post.php");

$limit = 10; //Number of post loaded per call

$post = new Post($con, $_REQUEST['userLoggedIn']);
$post->loadPostsFriends($_REQUEST, $limit);

?>