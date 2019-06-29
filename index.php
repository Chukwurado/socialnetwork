<?php
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");

if(isset($_POST['post'])) {
    echo "Button clicked";
    $post = new Post($con, $userLoggedIn);
    $post->submitPost($_POST['post_text'], 'none');
    header('Location:index.php');
}

?>
<div class="user_details column">
    <a href="<?php echo $userLoggedIn; ?>"><img src="<?php echo $user['profile_pic']?>" alt=""></a>
    <div class="user_details_left_right">
        <a href="<?php echo $userLoggedIn; ?>">
            <?php
            echo $user['first_name']; 
            ?>
        </a>

        <a href="#">
            <?php
            echo "Posts: " . $user['num_post'] . "<br>"; 
            echo "Likes: " . $user['num_likes'] . "<br>"; 
            ?>
        </a>
    </div>

</div>

<div class="main_column column">
    <form action="index.php" class="post_form" method="POST">
        <textarea name="post_text" id="post_text" placeholder="Something to say?"></textarea>
        <input type="submit" name="post" id="post_button" value="Post">
        <hr>
    </form>



    <div class="post_area"></div>

    <img id="loading" src="assets/images/icons/giphy.gif" alt="">

</div>

<script>
var userLoggedIn = '<?php echo $userLoggedIn ?>';

$(document).ready(function() {
    $('#loading').show();

    //Original ajax request for loading first posts
    $.ajax({
        url: "includes/handlers/ajax_load_posts.php",
        type: "POST",
        data: "page=1&userLoggedIn=" + userLoggedIn,
        cache: false,

        success: function(data) {
            $('#loading').hide();
            $('.post_area').html(data);
        }
    });
   
    //var p = 1;
    $(window).scroll(function() {
        var height = $('.post_area').height(); //Dive containing post;
        var scroll_top = $(this).scrollTop();
        var page = $('.post_area').find('.nextPage').val();
        var noMorePosts = $('.post_area').find('.noMorePosts').val();
        //console.log(p);
        if ((document.body.scrollHeight < scroll_top + window.innerHeight) && noMorePosts ==
            'false') {

            $('#loading').show();


            var ajaxReq = $.ajax({
                url: "includes/handlers/ajax_load_posts.php",
                type: "POST",
                data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                cache: false,

                success: function(response) {
                    $('.post_area').find('.nextPage')
                        .remove(); //Removes current .nextpage
                    $('.post_area').find('.noMorePosts')
                        .remove(); //Removes current .nextpage


                    $('#loading').hide();
                    $('.post_area').append(response);
                }
            });

        }

        return false;

    });
})
</script>





</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>

</html>