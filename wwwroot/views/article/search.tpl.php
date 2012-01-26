
<div class="searchForm">
    <form method="GET" action="/article/search">
        <input type="text" name="q" value="" />
        <input type="submit" value="Search" />
    </form>
</div>

<?php $this->RenderBegin(); ?>
<div id="articleSearch">

    <div class="header">
        <div class="title">Search Results</div>
    </div>
    <div class="body">
        <?php 
            $this->dtrArticles->Render(); 
            if($this->dtrArticles->ItemCount > $this->dtrArticles->Paginator->ItemsPerPage) { 
                $this->dtrArticles->Paginator->Render(); 
            } 
        ?>
    </div>

</div>
<?php $this->RenderEnd(); ?>
