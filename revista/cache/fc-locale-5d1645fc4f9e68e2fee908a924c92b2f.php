<?php return array (
  'plugins.importexport.duracloud.displayName' => 'Importação/Exportação DuraCloud',
  'plugins.importexport.duracloud.description' => 'Arquiva e restaura edições usando um serviço de armazenamento externo DuraCloud',
  'plugins.importexport.duracloud.configuration' => 'Configuração',
  'plugins.importexport.duracloud.configuration.unconfigured.description' => 'Atualmente não conectado ao serviço DuraCloud. Informe suas credenciais a seguir. As credenciais não serão armazenadas além da sessão atual.',
  'plugins.importexport.duracloud.configuration.configured.description' => 'Atualmente conectado ao serviço DuraCloud at <a href="{$url}">{$escapedUrl}</a> com o login "{$username}". As credenciais não serão armazenadas além da sessão atual. Para limpar as credenciais imediatamente, clique em <a href="{$logoutUrl}">sair</a> do DuraCloud.',
  'plugins.importexport.duracloud.configuration.urlRequired' => 'Um URL base do DuraCloud é obrigatório.',
  'plugins.importexport.duracloud.configuration.usernameRequired' => 'O login DuraCloud é obrigatório.',
  'plugins.importexport.duracloud.configuration.passwordRequired' => 'A senha DuraCloud é obrigatória.',
  'plugins.importexport.duracloud.configuration.credentialsInvalid' => 'Não foi possível conectar à instância DuraCloud especificada com as credenciais informadas. Verifique as credenciais e tente novamente.',
  'plugins.importexport.duracloud.configuration.space' => 'Espaço',
  'plugins.importexport.duracloud.cliUsage' => 'Uso: {$scriptName} {$pluginName}
	[base_url] [username] [password]
	[ojs_journal_path] [duracloud_space_id] [command] ...
Comandos:
	importIssues [user_name] [issueId1] [issueId2] ...
	exportIssues [issueId1] [issueId2] ...
Exemplo:
	php {$scriptName} {$pluginName} \\
		https://pkp.duracloud.org meuLogin minhaSenha\\
		demojournal testspace \\
		exportIssues 1',
  'plugins.importexport.duracloud.export' => 'Exportar dados',
  'plugins.importexport.duracloud.export.issues' => 'Exportar edições',
  'plugins.importexport.duracloud.export.results' => 'Resultados da exportação',
  'plugins.importexport.duracloud.export.results.description' => 'Seguem os resultados da ação de exportação para cada edição escolhida.',
  'plugins.importexport.duracloud.export.results.success' => '{$issueIdentification} exportada com sucesso para <a href="{$targetLocation}">{$targetLocationEscaped}</a>.',
  'plugins.importexport.duracloud.export.results.failure' => '{$issueIdentification} não foi exportada.',
  'plugins.importexport.duracloud.import.results' => 'Resultados da importação',
  'plugins.importexport.duracloud.import.results.description' => 'Seguem os resultados da ação de importação para cada edição escolhida.',
  'plugins.importexport.duracloud.import.results.success' => '{$issueIdentification} importada com sucesso de "{$contentId}".',
  'plugins.importexport.duracloud.import.results.failure' => '{$contentId} não foi importada.',
  'plugins.importexport.duracloud.selectIssue' => 'Escolher edição',
  'plugins.importexport.duracloud.import.issues' => 'Importar edições',
  'plugins.importexport.duracloud.import.description' => 'Este plugin suporta a importação de dados baseados na Definição de Tipo de Documento native.dtd. Nodos raíz suportados são &lt;article&gt;, &lt;articles&gt;, &lt;issue&gt;, e &lt;issues&gt;.',
  'plugins.importexport.duracloud.import.error' => 'Erro na importação',
  'plugins.importexport.duracloud.import.error.description' => 'Um ou mais erros ocorreram durante a importação. Certifique-se de que o formato do arquivo de importação está de acordo com a especificação. Detalhes específicos dos erros de importação estão listados a seguir.',
  'plugins.importexport.duracloud.cliError' => 'ERRO:',
  'plugins.importexport.duracloud.export.error.couldNotWrite' => 'Impossível escrever no arquivo "{$fileName}".',
  'plugins.importexport.duracloud.import.success' => 'Importação realizada com sucesso',
  'plugins.importexport.duracloud.import.success.description' => 'Importação realizada com sucesso. Itens importados com sucesso estão listados a seguir.',
); ?>