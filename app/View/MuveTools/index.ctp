<?php echo $this->Html->css('muvetools'); ?>

<div class="container">
<div class="muveTools index row-fluid">
<div class="actions span2">
<?php if ($canEdit): ?>
	<ul class="nav nav-list">
        <li class="nav-header"><?php echo __('Actions'); ?></li>
		<li><?php echo $this->Html->link(__('Add MUve Tool'), array('action' => 'add')); ?></li>
	</ul>
<?php endif; ?>
</div>
<div class="span10">
	<h2><?php echo __('Muve Tools');?></h2>
	<dl>
	<?php
	foreach ($muveTools as $muveTool): ?>
		<dt>
			<?php echo $this->Html->link(h($muveTool['MuveTool']['title']),$muveTool['MuveTool']['url'],array('target'=>'_blank'));
				if ($canEdit) {
				echo $this->Html->link(__('(Edit)') , array('action' => 'edit',$muveTool['MuveTool']['id']));
				echo $this->Form->postLink(__('(Delete)'), array('action' => 'delete', $muveTool['MuveTool']['id']), null, __('Are you sure you want to delete # %s?', $muveTool['MuveTool']['id']));
				} ?>
		</dt>
		<dd><?php echo h($muveTool['MuveTool']['description']); ?>&nbsp;</dd>
	<?php endforeach; ?>
	</dl>
	
</div>
</div>
</div>
