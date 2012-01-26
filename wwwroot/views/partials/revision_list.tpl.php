    
<div class="header">
    <div class="title"><?php echo $_ITEM->Title; ?></div>
    <div class="controls">edited by <?php echo $_ITEM->Visitor->Ip; ?> on <?php echo $_ITEM->Created->__toString('hh:mm:ss MMM DD, YYYY'); ?></div> 
 </div>
<div class="body">
    <p class="message">Revision Posted with Message: <span ><?php echo $_ITEM->Message; ?></span></p>
    <p><?php echo str_replace("\n", '<br />', $_ITEM->ArticleContent->Content); ?></p>
</div>

