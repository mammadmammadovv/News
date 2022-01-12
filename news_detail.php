<?php include 'header.php';
$news_id = $_GET['news_id'];
$newsquery = $db->prepare("SELECT * FROM news WHERE news_id=:news_id");
$newsquery->execute(array('news_id' => $news_id));
$newspull = $newsquery->fetch(PDO::FETCH_ASSOC);

$commentquery = $db->prepare("SELECT * FROM comments WHERE news_id=:news_id");
$commentquery->execute(array('news_id' => $news_id));
$commcount = $commentquery->rowCount();
?>

<script>
    function hideForm(comment_id) {
        var lastCommentId = localStorage.getItem('openedCommentId');

        if (lastCommentId) {
            var tempCommentId = 'reply_comment' + lastCommentId;
            let input = document.getElementById(tempCommentId);
            input.style.display = 'none';
        }

        var currentCommentId = 'reply_comment' + comment_id;
        let inputCurrent = document.getElementById(currentCommentId);
        inputCurrent.style.display = 'block';
        localStorage.setItem('openedCommentId', comment_id);
    }
</script>

<div role="main" class="main">
    <div class="container">
        <div class="row pt-5">

            <div class="col">

                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post">

                        <div class="post-date">
                            <span class="day"><?php $date = strtotime($newspull['news_date']);
                                                echo date('d', $date) ?></span>
                            <span class="month"><?php $date = strtotime($newspull['news_date']);
                                                echo date('M', $date) ?></span>
                        </div>

                        <div class="post-content">

                            <h1><?php echo $newspull['news_title'] ?></h1>

                            <div class="divider divider-primary divider-small mb-4">
                                <hr class="mr-auto">
                            </div>

                            <div class="post-meta">
                                <span><i class="fas fa-user"></i> By <a href="#"><?php echo $newspull['news_author'] ?></a> </span>
                                <span><i class="fas fa-tag"></i> <a href="#"><?php $tags = explode(',', $newspull['news_tag']);
                                                                                foreach ($tags as $key) { ?>
                                            <a href=""><?php echo $key ?></a>
                                        <?php }  ?></a> </span>
                                <span><i class="fas fa-comments"></i> <a href="#comments"><?php echo $commcount . " şərh" ?></a></span>
                            </div>

                            <img src="<?php echo $newspull['news_image'] ?>" class="img-fluid float-left mb-1 mt-2 mr-4" alt="" style="width: 195px;">

                            <p class="lead"><?php echo $newspull['news_subtitle'] ?></p>

                            <p><?php echo $newspull['news_text'] ?></p>



                            <div id="comments" class="post-block post-comments clearfix">
                                <h4 class="mt-4 mb-0">Şərhlər</h4>
                                <div class="divider divider-primary divider-small mb-4">
                                    <hr class="mr-auto">
                                </div>

                                <ul class="comments">
                                    <?php while ($commentpull = $commentquery->fetch(PDO::FETCH_ASSOC)) {
                                        $test = $commentpull['parent_id'];
                                        if ($test == 0) {
                                            $comment_id = $commentpull['id'];
                                            $replycommquery = $db->prepare("SELECT * FROM comments WHERE parent_id = :parent_id");
                                            $replycommquery->execute(array('parent_id' => $comment_id)); ?>


                                            <li id="comment_li">
                                                <input type="hidden" name="main_comment_id" value="<?php echo $commentpull['id'] ?>">
                                                <div class="comment">
                                                    <div class="img-thumbnail d-none d-sm-block">
                                                        <img class="avatar" alt="" src="img/team/team-23.jpg">
                                                    </div>
                                                    <div class="comment-block">
                                                        <div class="comment-arrow"></div>
                                                        <span class="comment-by">
                                                            <strong><?php echo $commentpull['comment_name_surname'] ?></strong>
                                                            <span class="float-right">
                                                                <span> <a onclick="hideForm(<?php echo $commentpull['id'] ?>)"><i class="fas fa-reply"></i> Cavabla</a></span>
                                                            </span>
                                                        </span>
                                                        <p><?php echo $commentpull['comment_text'] ?></p>
                                                        <span class="date float-right"><?php echo $commentpull['comment_date'] ?></span>
                                                    </div>

                                                    <form id="reply_comment<?php echo $commentpull['id'] ?>" style="display: none;" action="control/netting/executer.php" method="POST">
                                                        <input type="hidden" name="news_id" value="<?php echo $news_id ?>" id="">
                                                        <input type="hidden" name="main_comment_id" value="<?php echo $commentpull['id'] ?>">
                                                        <div class="form-row">
                                                            <div class="form-group col-lg-6">
                                                                <label>Ad Soyad *</label>
                                                                <input type="text" value="" maxlength="100" class="form-control" name="comment_name_surname" id="name">
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label>E-poçt *</label>
                                                                <input type="email" value="" maxlength="100" class="form-control" name="comment_email" id="email">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col">
                                                                <label>Şərhiniz *</label>
                                                                <textarea maxlength="5000" rows="10" class="form-control" name="comment_text" id="comment"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col">
                                                                <input type="submit" value="Paylaş" name="sendComment" class="btn btn-primary btn-lg" data-loading-text="Loading...">
                                                            </div>
                                                        </div>
                                                    </form>


                                                </div>

                                                <ul class="comments">
                                                    <?php while ($replypull = $replycommquery->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <li>
                                                            <input type="hidden" name="main_comment_id" value="<?php echo $replypull['id'] ?>">
                                                            <div class="comment">
                                                                <div class="img-thumbnail d-none d-sm-block">
                                                                    <img class="avatar" alt="" src="img/team/team-23.jpg">
                                                                </div>
                                                                <div class="comment-block">
                                                                    <div class="comment-arrow"></div>
                                                                    <span class="comment-by">
                                                                        <strong><?php echo $replypull['comment_name_surname'] ?></strong>
                                                                    </span>
                                                                    <p><?php echo $replypull['comment_text'] ?></p>
                                                                    <span class="date float-right"><?php echo $replypull['comment_date'] ?></span>
                                                                </div>

                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>

                            <div class="post-block post-leave-comment pb-0">
                                <h4 class="mt-2 mb-0">Şərh yazın...</h4>
                                <div class="divider divider-primary divider-small mb-4">
                                    <hr class="mr-auto">
                                </div>

                                <form id="comment_form" action="control/netting/executer.php" method="POST">
                                    <input type="hidden" name="news_id" value="<?php echo $news_id ?>" id="">
                                    <input type="hidden" name="main_comment_id" value="0">
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label>Ad Soyad *</label>
                                            <input type="text" value="" maxlength="100" class="form-control" name="comment_name_surname" id="name">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>E-poçt *</label>
                                            <input type="email" value="" maxlength="100" class="form-control" name="comment_email" id="email">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label>Şərhiniz *</label>
                                            <textarea maxlength="5000" rows="10" class="form-control" name="comment_text" id="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <input type="submit" value="Paylaş" name="sendComment" class="btn btn-primary btn-lg" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </article>

                </div>

            </div>

        </div>

    </div>
</div>

<?php include 'footer.php' ?>