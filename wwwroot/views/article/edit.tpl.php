
<?php $this->RenderBegin(); ?>
<div id="articleEdit">
    <div class="header">
        <div class="title">Editting Article: <?php echo $this->objArticle->ArticleRevision->Title; ?></div>
    </div>
    <div class="body">

        <div class="input"><?php $this->txtTitle->Render(); ?></div>
        <div class="textarea"><?php $this->txtContent->Render(); ?></div>
        <div class="input"><?php $this->txtMessage->Render(); ?></div> 
        <div class="submit"><?php $this->btnEdit->Render(); ?></div>
    </div>
</div>

<?php $this->RenderEnd(); ?>
