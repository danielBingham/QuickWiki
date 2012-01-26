<?php $this->RenderBegin(); ?>

<div id="articleHistory">
<div class="backlink"><a href="/article/view/<?php echo $this->mixArticleId; ?>">Back to Article</a></div>
<?php 

    $this->dtrRevisions->Render();
    if($this->dtrRevisions->TotalItemCount > $this->dtrRevisions->Paginator->ItemsPerPage) { 
        $this->dtrRevisions->Paginator->Render();
    }
?>

</div>

<?php $this->RenderEnd(); ?>
