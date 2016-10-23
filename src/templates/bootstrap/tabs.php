<ul class="nav <?php echo $tabs->getClass(); ?>">

    <?php foreach ($tabs->getTitles() as $name => $title) : ?>

        <li class="<?php echo $tabs->getActive() == $name ? 'active' : ''; ?>">
            <a data-toggle="tab" href="#<?php echo $name; ?>">
                <?php echo $title; ?>
            </a>
        </li>

    <?php endforeach; ?>

</ul>

<div class="tab-content">

    <?php foreach ($tabs->getContents() as $titleName => $content) : ?>

    <div id="<?php echo $titleName; ?>"
         class="tab-pane <?php echo $tabs->getActive() == $titleName ? 'active' : ''; ?>">

        <?php echo $content; ?>

    </div>

    <?php endforeach; ?>

</div>
