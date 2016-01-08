<?php
defined('_JEXEC') or die;
?>
<div class="row" id='polarbook'>
	<?php echo $this->loadTemplate('navbar'); ?>
	<div class="span12">
		<div class="span7" id="chessboard"></div>
		<div class="well span5">
			<div class="movepath" id="movepath"></div>
			<hr />
			<div class="movelist" id="movelist"></div>
		</div>
	</div>
	<hr />
	<div class="span12"><textarea class="span12"readonly="readonly" onchange="textCommentChanged();return false;" id="comment"></textarea></div>
	<div class="span12">
		<div class="span1"><b>Status:</b></div>
		<div class="span1" id="read" align="center"><b>Read</b></div>
		<div class="span1" id="write" align="center"><b>Write</b></div>
		<div class="span7" id="status"></div>
		<div class="span2" id="progressbar"></div>
	</div>
</div>
<?php echo $this->loadTemplate('modals'); ?>