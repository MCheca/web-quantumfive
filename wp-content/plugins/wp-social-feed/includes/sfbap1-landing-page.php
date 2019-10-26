<script type="text/javascript">

    var fragment = window.location.hash;

    if(fragment.length > 0){

        var tokenArray = fragment.split("&");
        var stateToken = decodeURIComponent(tokenArray[0]).split("=");
        var paramToken = stateToken[1].split("!@@!");

        var postId = paramToken[0];
        var host = paramToken[1];
        if (postId == '') {
        window.location = host+"/wp-admin/post-new.php?post_type=sfbap1_social_feed#" + tokenArray[1];

        }
        else{

        window.location = host+"/wp-admin/post.php?post=" + postId + "&action=edit#" + tokenArray[1];
        }
  
  }


</script>