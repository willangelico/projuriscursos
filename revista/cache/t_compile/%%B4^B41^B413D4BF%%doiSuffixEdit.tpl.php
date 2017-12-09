<?php /* Smarty version 2.6.26, created on 2014-03-23 06:24:34
         compiled from file:/home/projuris/public_html/revista/plugins/pubIds/doi/templates/doiSuffixEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'file:/home/projuris/public_html/revista/plugins/pubIds/doi/templates/doiSuffixEdit.tpl', 16, false),array('function', 'fieldLabel', 'file:/home/projuris/public_html/revista/plugins/pubIds/doi/templates/doiSuffixEdit.tpl', 22, false),array('modifier', 'escape', 'file:/home/projuris/public_html/revista/plugins/pubIds/doi/templates/doiSuffixEdit.tpl', 23, false),array('modifier', 'cat', 'file:/home/projuris/public_html/revista/plugins/pubIds/doi/templates/doiSuffixEdit.tpl', 36, false),)), $this); ?>

<?php if ($this->_tpl_vars['pubObject']): ?>
<?php $this->assign('pubObjectType', $this->_tpl_vars['pubIdPlugin']->getPubObjectType($this->_tpl_vars['pubObject'])); ?>
<?php $this->assign('enableObjectDoi', $this->_tpl_vars['pubIdPlugin']->getSetting($this->_tpl_vars['currentJournal']->getId(),"enable".($this->_tpl_vars['pubObjectType'])."Doi")); ?>
<?php if ($this->_tpl_vars['enableObjectDoi']): ?>
	<div id="pub-id::doi">
		<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.pubIds.doi.editor.doi"), $this);?>
</h3>
		<?php $this->assign('storedPubId', $this->_tpl_vars['pubObject']->getStoredPubId($this->_tpl_vars['pubIdPlugin']->getPubIdType())); ?>
		<?php if ($this->_tpl_vars['pubIdPlugin']->getSetting($this->_tpl_vars['currentJournal']->getId(),'doiSuffix') == 'customId' || $this->_tpl_vars['storedPubId']): ?>
			<?php if (empty ( $this->_tpl_vars['storedPubId'] )): ?>
				<table width="100%" class="data">
					<tr valign="top">
						<td rowspan="2" width="10%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'doiSuffix','key' => "plugins.pubIds.doi.manager.settings.doiSuffix"), $this);?>
</td>
						<td rowspan="2" width="10%" align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['pubIdPlugin']->getSetting($this->_tpl_vars['currentJournal']->getId(),'doiPrefix'))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
/</td>
						<td width="80%" class="value"><input type="text" class="textField" name="doiSuffix" id="doiSuffix" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['doiSuffix'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="255" />
					</tr>
					<tr valign="top">
						<td colspan="3"><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.pubIds.doi.manager.settings.doiSuffixDescription"), $this);?>
</span></td>
					</tr>
				</table>
			<?php else: ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['storedPubId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

			<?php endif; ?>
		<?php else: ?>
			<?php echo ((is_array($_tmp=$this->_tpl_vars['pubIdPlugin']->getPubId($this->_tpl_vars['pubObject'],true))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 <br />
			<br />
			<?php ob_start(); ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => ((is_array($_tmp="plugins.pubIds.doi.editor.doiObjectType")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['pubObjectType']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['pubObjectType']))), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('translatedObjectType', ob_get_contents());ob_end_clean(); ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.pubIds.doi.editor.doiNotYetGenerated",'pubObjectType' => $this->_tpl_vars['translatedObjectType']), $this);?>

		<?php endif; ?>
		<br />
	</div>
	<div class="separator"> </div>
<?php endif; ?>
<?php endif; ?>