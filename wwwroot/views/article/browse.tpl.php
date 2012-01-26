<?php $this->RenderBegin(); ?>

<div id="articleBrowse">
    <div class="header">
        <div class="title">Browse All Wiki Articles</div>
    </div>
    <div class="body"> 
    <?php 
        
        $this->dtrArticles->Render(); 
        if($this->dtrArticles->TotalItemCount > $this->dtrArticles->ItemsPerPage) {
            $this->dtrArticles->Paginator->Render(); 
        }
    ?>
    </div>
</div>

<?php $this->RenderEnd(); ?>
