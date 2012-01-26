<?php $this->RenderBegin(); ?>

<div id="articleView">
    <div class="header">
        <div class="title"><?php echo $this->objArticle->ArticleRevision->Title; ?></div>
        <div class="controls">
            <a href="/article/edit/<?php echo $this->objArticle->Id; ?>">Edit This Article</a>
            <a href="/article/history/<?php echo $this->objArticle->Id; ?>">View Previous Revisions</a>
        </div>
    </div>
    <div class="body">
        <p><?php echo str_replace("\n", '<br />', $this->objArticle->ArticleRevision->ArticleContent->Content); ?></p>
    </div>
</div>

<?php $this->RenderEnd(); ?>
