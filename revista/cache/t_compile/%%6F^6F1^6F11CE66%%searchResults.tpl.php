<?php /* Smarty version 2.6.26, created on 2014-02-27 13:35:29
         compiled from core:help/searchResults.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_help_id', 'core:help/searchResults.tpl', 22, false),array('function', 'translate', 'core:help/searchResults.tpl', 22, false),array('function', 'url', 'core:help/searchResults.tpl', 38, false),array('function', 'eval', 'core:help/searchResults.tpl', 39, false),array('modifier', 'escape', 'core:help/searchResults.tpl', 28, false),array('modifier', 'count', 'core:help/searchResults.tpl', 31, false),array('modifier', 'explode', 'core:help/searchResults.tpl', 38, false),array('modifier', 'strip_tags', 'core:help/searchResults.tpl', 39, false),array('modifier', 'truncate', 'core:help/searchResults.tpl', 39, false),array('modifier', 'to_array', 'core:help/searchResults.tpl', 41, false),)), $this); ?>
<?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<div id="main" style="margin: 0; width: 660px;">

	<h4><?php echo $this->_tpl_vars['applicationHelpTranslated']; ?>
</h4>

	<div class="thickSeparator"></div>

	<div id="breadcrumb">
		<a href="<?php echo $this->_plugins['function']['get_help_id'][0][0]->smartyGetHelpId(array('key' => "index.index",'url' => 'true'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "navigation.home"), $this);?>
</a>
	</div>

	<h2><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "help.searchResults"), $this);?>
</h2>

	<div id="content">
		<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "help.searchResultsFor"), $this);?>
 "<?php echo ((is_array($_tmp=$this->_tpl_vars['helpSearchKeyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"</h4>
		<div id="search">
		<?php if (count ( $this->_tpl_vars['searchResults'] ) > 0): ?>
			<h5><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "help.matchesFound",'matches' => count($this->_tpl_vars['searchResults'])), $this);?>
</h5>
			<ul>
			<?php $this->assign('resultNum', 0); ?>
			<?php $_from = $this->_tpl_vars['searchResults']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['results'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['results']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['result']):
        $this->_foreach['results']['iteration']++;
?>
				<?php $this->assign('sections', $this->_tpl_vars['result']['topic']->getSections()); ?>
				<?php $this->assign('resultNum', $this->_tpl_vars['resultNum']+1); ?>
				<li id="result-<?php echo $this->_tpl_vars['resultNum']; ?>
">
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'view','path' => ((is_array($_tmp=$this->_tpl_vars['result']['topic']->getId())) ? $this->_run_mod_handler('explode', true, $_tmp, "/") : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, "/")),'keyword' => ((is_array($_tmp=$this->_tpl_vars['helpSearchKeyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)),'result' => $this->_tpl_vars['resultNum']), $this);?>
"><?php echo $this->_tpl_vars['result']['topic']->getTitle(); ?>
</a>
					<?php echo smarty_function_eval(array('var' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sections'][0]->getContent())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200) : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 200))), $this);?>

					<div class="searchBreadcrumb">
						<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'view','path' => ((is_array($_tmp='index')) ? $this->_run_mod_handler('to_array', true, $_tmp, 'topic', '000000') : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, 'topic', '000000'))), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "navigation.home"), $this);?>
</a>
						<?php $_from = $this->_tpl_vars['result']['toc']->getBreadcrumbs(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['breadcrumbs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['breadcrumbs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['breadcrumb']):
        $this->_foreach['breadcrumbs']['iteration']++;
?>
							<?php if ($this->_tpl_vars['breadcrumb'] != $this->_tpl_vars['result']['topic']->getId()): ?>
							 &gt; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'view','path' => ((is_array($_tmp=$this->_tpl_vars['breadcrumb'])) ? $this->_run_mod_handler('explode', true, $_tmp, "/") : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, "/"))), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
						<?php if ($this->_tpl_vars['result']['topic']->getId() != "index/topic/000000"): ?>
						&gt; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'view','path' => ((is_array($_tmp=$this->_tpl_vars['result']['topic']->getId())) ? $this->_run_mod_handler('explode', true, $_tmp, "/") : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, "/")),'keyword' => ((is_array($_tmp=$this->_tpl_vars['helpSearchKeyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)),'result' => $this->_tpl_vars['resultNum']), $this);?>
" class="current"><?php echo $this->_tpl_vars['result']['topic']->getTitle(); ?>
</a>
						<?php endif; ?>
					</div>
				</li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		<?php else: ?>
			<em><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "help.noMatchingTopics"), $this);?>
</em>
		<?php endif; ?>
		</div>

		<div class="separator"></div>

		<div id="helpSearch">
			<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "help.search"), $this);?>
</h4>
			<form action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'search'), $this);?>
" method="post" style="display: inline">
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "help.searchFor"), $this);?>
&nbsp;&nbsp;<input type="text" name="keyword" size="30" maxlength="60" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['helpSearchKeyword'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" class="textField" />
			<input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.search"), $this);?>
" class="button" />
			</form>
		</div>
	</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>