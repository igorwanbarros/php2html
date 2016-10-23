<form action="<?php echo $form->getAction(); ?>"
      method="<?php echo $form->getMethod(); ?>"
      <?php echo $form->renderAttributes(); ?>>

    <?php foreach ($form->getFields() as $field) :?>
        <?php if ($field->getType() == 'hidden'):?>

            <?php echo $field;?>

        <?php else:?>

        <div class="form-group">
            <label for="<?php echo $field->getId();?>">
                <?php echo $field->getLabel();?>
            </label>
            <?php $field->addAttribute('class', 'form-control');?>
            <?php echo $field;?>
        </div>

        <?php endif;?>

    <?php endforeach;?>

</form>
