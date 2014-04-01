<div class="placeRankings view row">
	<div class="actions span2">
		<ul class="nav nav-list">
			<li class="nav-header"><?php echo __('Actions'); ?></li>
					<li><?php echo $this->Html->link(__('Edit Place Ranking'), array('action' => 'edit', $placeRanking['PlaceRanking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Place Ranking'), array('action' => 'delete', $placeRanking['PlaceRanking']['id']), null, __('Are you sure you want to delete # %s?', $placeRanking['PlaceRanking']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Rankings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Ranking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Places'), array('controller' => 'places', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Places'), array('controller' => 'places', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="span10">
		<h2><?php  echo __('Place Ranking');?></h2>
		<dl>
					<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($placeRanking['PlaceRanking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeRanking['User']['id'], array('controller' => 'users', 'action' => 'view', $placeRanking['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Places'); ?></dt>
		<dd>
			<?php echo $this->Html->link($placeRanking['Places']['name'], array('controller' => 'places', 'action' => 'view', $placeRanking['Places']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($placeRanking['PlaceRanking']['rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Review'); ?></dt>
		<dd>
			<?php echo h($placeRanking['PlaceRanking']['review']); ?>
			&nbsp;
		</dd>
		</dl>
	</div>
</div>
