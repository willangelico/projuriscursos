<?php return array (
  'plugins.importexport.pubIds.displayName' => 'Plugin de identificadores públicos em XML',
  'plugins.importexport.pubIds.description' => 'Importa e exporta identificadores públicos',
  'plugins.importexport.pubIds.cliUsage' => 'Uso: {$scriptName} {$pluginName} [comando] ...
Comandos:
	import [nomeArquivoXML] [caminho_revista] [nome_usuario]
	export [nomeArquivoXML] [caminho_revista] issues [issueId1] [issueId2] ...
	export [nomeArquivoXML] [caminho_revista] issue [issueId]',
  'plugins.importexport.pubIds.export' => 'Exportar identificadores públicos',
  'plugins.importexport.pubIds.export.forIssues' => 'Exportar identificadores públicos',
  'plugins.importexport.pubIds.export.selectIssue' => 'Escolher edição',
  'plugins.importexport.pubIds.export.selectIssue.description' => 'Escolha as edições de cujos objetos deseja exportar identificadores públicos',
  'plugins.importexport.pubIds.import' => 'Importar identificadores públicos',
  'plugins.importexport.pubIds.import.description' => 'Este plugin suporta a importação de identificadores públicos com base na Definição de Tipo de Documento pubIds.dtd.',
  'plugins.importexport.pubIds.import.results' => 'Resultados da importação',
  'plugins.importexport.pubIds.import.errors' => 'Erros da importação',
  'plugins.importexport.pubIds.import.errors.description' => 'Um ou mais erros durante a importação. Certifique-se de que o formato do arquivo importado corresponde corretamente à especificação. Detalhes dos erros estão listados a seguir.',
  'plugins.importexport.pubIds.import.success' => 'Sucesso na importação',
  'plugins.importexport.pubIds.import.success.description' => 'Identificadores públicos importados com sucesso estão listados a seguir.',
  'plugins.importexport.pubIds.cliError' => 'ERRO:',
  'plugins.importexport.pubIds.cliError.unknownJournal' => 'O caminho "{$journalPath}" especificado não existe.',
  'plugins.importexport.pubIds.cliError.unknownUser' => 'O usuário "{$userName}" especificado não existe.',
  'plugins.importexport.pubIds.cliError.issueNotFound' => 'Nenhuma edição correspondente ao ID "{$issueId}".',
  'plugins.importexport.pubIds.cliError.couldNotWrite' => 'Impossível escrever arquivo "{$fileName}".',
  'plugins.importexport.pubIds.import.error.uploadFailed' => 'O envio falhou. Certifique-se de que o envio de arquivos está habilitado no servidor e que o tamanho do arquivo não é superior ao permitido pelas configurações do PHP e do servidor Web.',
  'plugins.importexport.pubIds.import.error.unsupportedRoot' => 'Este plugin não suporta o nodo raíz "{$rootName}". Certifique-se de que a estrutura do arquivo está correta e tente novamente.',
  'plugins.importexport.pubIds.import.error.unknownObjectType' => 'Um tipo de objeto desconhecido "{$pubObjectType}" foi especificado no atributo "pubObjectType" para o elemento de valor "{$pubId}".',
  'plugins.importexport.pubIds.import.error.unknownObject' => 'O objeto "{$pubObjectType}" com ID = {$pubObjectId} especificado no elemento de valor "{$pubId}" não existe neste periódico.',
  'plugins.importexport.pubIds.import.error.pubIdExists' => 'Identificador público do tipo "{$pubIdType}" para o objeto {$pubObjectType} com ID = {$pubObjectId} já existe.',
  'plugins.importexport.pubIds.import.error.duplicatePubId' => 'O identificador público "{$pubId}" já está em uso por outro objeto.',
  'plugins.importexport.pubIds.import.error.unknownPubId' => 'O arquivo de importação contém o tipo de identificador público "{$pubIdType}" que nenhum plugin pubId consegue tratar. Instale e/ou habilite o plugin pubId correspondente antes de tentar importar este dataset.',
); ?>