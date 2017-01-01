<div class="panel <?php echo $panel->getClassPanel()?>">
    <div class="panel-heading box-header">
        <h3 class="panel-title box-title"><?php echo $panel->getTitle()?></h3>
        <?php if ($panel->isBoxToolsCollapse() || $panel->isBoxToolsRemove()): ?>
            <div class="box-tools pull-right">
            <?php if ($panel->isBoxToolsCollapse()): ?>
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <?php endif; ?>
            <?php if ($panel->isBoxToolsRemove()): ?>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="panel-body box-body">
        <?php echo $panel->getBody()?>
    </div>


    <?php if ($panel->getFooter()):?>
    <div class="panel-footer box-footer">
        <?php echo $panel->getFooter()?>
    </div>
    <?php endif?>
</div>