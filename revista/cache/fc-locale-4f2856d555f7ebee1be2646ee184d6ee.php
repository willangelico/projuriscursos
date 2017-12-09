<?php return array (
  'plugins.importexport.users.displayName' => 'Usuários em XML',
  'plugins.importexport.users.description' => 'Importar e exportar cadastros no formato XML',
  'plugins.importexport.users.cliUsage' => 'Uso: {$scriptName} {$pluginName} [comando] ...
Comandos:
	import [xmlFileName] [journal_path] [flags opcionais]
	export [xmlFileName] [journal_path]
	export [xmlFileName] [journal_path] [role_path1] [role_path2] ...

Flags opcionais:
	continue_on_error: Caso especificado, não interrompe a importação de usuários mesmo ocorrendo erro

	send_notify: Caso especificado, enviar e-mails de notificação contendo login 
		e senha para usuários importados

Exemplos:
	Importar cadastros para MinhaRevista do arquivo meuArquivoImportacao.xml, continuando a importação em caso de erro:
	{$scriptName} {$pluginName} import meuArquivoImportacao.xml MinhaRevista continue_on_error

	Exportar todos os cadastros de MinhaRevista:
	{$scriptName} {$pluginName} export meuArquivoExportacao.xml MinhaRevista

	Exportar todos os cadastros com papel de avaliador, com o papel de avaliador apenas:
	{$scriptName} {$pluginName} export avaliadores.xml MinhaRevista reviewer',
  'plugins.importexport.users.import.importUsers' => 'Importar cadastros',
  'plugins.importexport.users.import.instructions' => 'Escolha um documento XML contendo as informações de cadastro para importação nesta revista. Veja a ajuda do sistema para detalhes sobre o formato do documento.<br /><br />Caso o documento possua logins ou e-mails já cadastrados no sistema, os dados cadastrais não serão importados e quaisquer funções adicionais serão designadas aos cadastros existentes.',
  'plugins.importexport.users.import.failedToImportUser' => 'Falha na importação de cadastro',
  'plugins.importexport.users.import.failedToImportRole' => 'Falha ao designar papel ao cadastro',
  'plugins.importexport.users.import.dataFile' => 'Arquivo de cadastro',
  'plugins.importexport.users.import.sendNotify' => 'Enviar notificação via e-mail para cada cadastro importado, com login e senha respectivo.',
  'plugins.importexport.users.import.continueOnError' => 'Continuar a importação de outros cadastros caso ocorra uma falha.',
  'plugins.importexport.users.import.noFileError' => 'Nenhum arquivo enviado!',
  'plugins.importexport.users.import.usersWereImported' => 'Os seguintes cadastros foram importados com sucesso para o sistema',
  'plugins.importexport.users.import.errorsOccurred' => 'Erros ocorridos durante a importação',
  'plugins.importexport.users.import.confirmUsers' => 'Deseja importar os cadastros listados para o sistema',
  'plugins.importexport.users.unknownJournal' => 'O caminho de publicação especificado "{$journalPath}" é desconhecido.',
  'plugins.importexport.users.export.exportUsers' => 'Exportar cadastros',
  'plugins.importexport.users.export.exportByRole' => 'Exportar por papel',
  'plugins.importexport.users.export.exportAllUsers' => 'Exportar todos',
  'plugins.importexport.users.export.errorsOccurred' => 'Error ocorridos durante a exportação',
  'plugins.importexport.users.export.couldNotWriteFile' => 'Não foi possível escrever para o arquivo "{$fileName}".',
  'plugins.importexport.users.import.warning' => 'Aviso',
  'plugins.importexport.users.import.encryptionMismatch' => 'Não é possível usar senhas criptografadas com o algoritmo {$importHash}; o sistema está configurado para utilizar o algoritmo {$ojsHash}. Caso continue, será necessário recriar todas as senhas de cadastros importados.',
); ?>