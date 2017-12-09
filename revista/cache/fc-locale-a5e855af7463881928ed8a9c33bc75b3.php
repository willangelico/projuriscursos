<?php return array (
  'plugins.importexport.datacite.displayName' => 'Exportação/Registro DataCite',
  'plugins.importexport.datacite.description' => 'Exporte ou registre metadados de edições, artigos, composições e arquivos suplementares no DataCite.',
  'plugins.importexport.datacite.intro' => 'Caso deseje registrar DOIs no DataCite, entre em contato com o Gerente por meio da <a href="http://datacite.org/contact" target="_blank">página do DataCite</a>, que irá encaminá-lo ao seu Representante DataCite local. Uma vez estabelecido o relacionamento com a organização representante, será providenciado o acesso ao serviço  DataCite para a cunhagem de identificadores persistente (DOIs) e registro de metadados associados. Mesmo que não possua um login e senha, será possível exportar dados no formato XML  DataCite, porém não poderá registrar seus DOIs no DataCite por meio do OJS. Note que a senha será gravada como texto puro, isto é, não encriptada, devido aos requisitos de registro do serviço DataCite.',
  'plugins.importexport.datacite.settings.description' => '<a href="{$settingsUrl}">Configure</a> o plugin DataCite antes de usá-lo pela primeira vez.',
  'plugins.importexport.datacite.settings.form.description' => 'Configure o plugin de exportação DataCite:',
  'plugins.importexport.datacite.settings.form.username' => 'Login (símbolo)',
  'plugins.importexport.datacite.settings.form.usernameRequired' => 'Informe seu login (símbolo) recebido do DataCite. O login não pode conter dois pontos (:).',
  'plugins.importexport.datacite.export.suppFiles' => 'Exportar arquivos suplementares específicos',
  'plugins.importexport.datacite.export.selectSuppFile' => 'Escolher arquivos suplementares',
  'plugins.importexport.datacite.export.noSuppFiles' => 'Nenhum arquivo suplementar possui DOI.',
  'plugins.importexport.datacite.export.error.suppFileNotFound' => 'Nenhum arquivo suplementar corresponde ao ID: {$param}.',
  'plugins.importexport.datacite.cliUsage' => 'Uso: 
{$scriptName} {$pluginName} export xmlFileName journal_path {issues|articles|galleys|suppfiles} objectId1 [objectId2] ...
{$scriptName} {$pluginName} register journal_path {issues|articles|galleys|suppfiles} objectId1 [objectId2] ...',
); ?>