<?php $this->RenderBegin(); ?>

<div id="articleNew">
    <div class="header">
        <div class="title">New Article</div>
    </div>
    <div class="body">

        <div class="input"><?php $this->txtTitle->RenderWithError(); ?></div>
        <div class="textarea"><?php $this->txtContent->RenderWithError(); ?></div>
        <div class="input"><?php $this->txtMessage->Render(); ?></div>
        <div class="submit"><?php $this->btnEdit->Render(); ?></div>
    </div>
</div>

<?php $this->RenderEnd(); ?>

