<div class="panel <?php echo $panel->getClassPanel()?>">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $panel->getTitle()?></h3>
    </div>

    <div class="panel-body">
        <?php echo $panel->getBody()?>
    </div>


    <?php if ($panel->getFooter()):?>
    <div class="panel-footer">
        <?php echo $panel->getFooter()?>
    </div>
    <?php endif?>
</div>