<?php return array (
  'plugins.importexport.crossref.displayName' => 'Exportação CrossRef em XML',
  'plugins.importexport.crossref.description' => 'Exporta metadados dos artigos no formato CrossRef XML.',
  'plugins.importexport.crossref.export' => 'Exportar dados',
  'plugins.importexport.crossref.export.issues' => 'Exportar edições',
  'plugins.importexport.crossref.export.selectIssue' => 'Escolha uma edição para exportar.',
  'plugins.importexport.crossref.export.articles' => 'Exportar artigos',
  'plugins.importexport.crossref.export.selectArticle' => 'Selecione artigos para exportar.',
  'plugins.importexport.crossref.cliUsage' => 'Uso: 
{$scriptName} {$pluginName} [xmlFileName] [journal_path] articles [articleId1] [articleId2] ...
{$scriptName} {$pluginName} [xmlFileName] [journal_path] issue [issueId]',
  'plugins.importexport.crossref.cliError' => 'ERRO:',
  'plugins.importexport.crossref.export.error.issueNotFound' => 'Nenhuma edição encontrada com o ID "{$issueId}".',
  'plugins.importexport.crossref.export.error.articleNotFound' => 'Nenhum artigo encontrado com o ID "{$articleId}".',
  'plugins.importexport.crossref.errors.noDOIprefix' => 'Um prefixo DOI válido deve ser especificado na configuração da revista para poder usar este plugin.',
); ?>