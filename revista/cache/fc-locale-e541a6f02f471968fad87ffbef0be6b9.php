<?php return array (
  'plugins.pubIds.doi.displayName' => 'DOI',
  'plugins.pubIds.doi.description' => 'Este plugin habilita a atribuição de de Identificadores de Objeto Digital (DOI) a edições, artigos, composições e arquivos suplementares no OJS.',
  'plugins.pubIds.doi.manager.settings.doiSettings' => 'Configurações',
  'plugins.pubIds.doi.manager.settings.description' => 'Configure o plugin DOI para gerenciar e usar DOIs no OJS:',
  'plugins.pubIds.doi.manager.settings.doiObjects' => 'Conteúdo',
  'plugins.pubIds.doi.manager.settings.doiObjectsRequired' => 'Escolha a quais objetos serão atribuídos DOIs.',
  'plugins.pubIds.doi.manager.settings.explainDois' => 'Escolha os objetos publicados que terão Identificadores de Objeto Digital (DOI) atribuídos:',
  'plugins.pubIds.doi.manager.settings.enableIssueDoi' => 'Edições',
  'plugins.pubIds.doi.manager.settings.enableArticleDoi' => 'Artigos',
  'plugins.pubIds.doi.manager.settings.enableGalleyDoi' => 'Composições',
  'plugins.pubIds.doi.manager.settings.enableSuppFileDoi' => 'Arquivos suplementares',
  'plugins.pubIds.doi.manager.settings.doiPrefix' => 'Prefixo DOI',
  'plugins.pubIds.doi.manager.settings.doiPrefixDescription' => 'O prefixo DOI é atribuído por agências de registro (ex.: <a href="http://www.crossref.org" target="_new">CrossRef</a>) e possui o formato 10.xxxx (ex.: 10.1234):',
  'plugins.pubIds.doi.manager.settings.doiPrefixPattern' => 'O prefixo DOI é obrigatório e deve possuir o formato 10.xxxx.',
  'plugins.pubIds.doi.manager.settings.doiSuffix' => 'Sufixo DOI',
  'plugins.pubIds.doi.manager.settings.doiSuffixDescription' => 'O sufixo DOI pode assumir qualquer forma, desde que seja único entre todos todos os objetos publicados com o mesmo prefixo DOI:',
  'plugins.pubIds.doi.manager.settings.doiSuffixPattern' => 'Use o padrão informado a seguir para gerar sufixos DOI. Use %j para iniciais da publicação, %v para o volume, %i a edição, %Y para o ano, %a para o ID do artigo OJS, %g para o ID da composição OJS, %s para o ID do arquivo suplementar OJS e %p para o número da página.',
  'plugins.pubIds.doi.manager.settings.doiSuffixPattern.issues' => 'para edições',
  'plugins.pubIds.doi.manager.settings.doiSuffixPattern.articles' => 'para artigos',
  'plugins.pubIds.doi.manager.settings.doiSuffixPattern.galleys' => 'para composições',
  'plugins.pubIds.doi.manager.settings.doiSuffixPattern.suppFiles' => 'para arquivos suplementares.',
  'plugins.pubIds.doi.manager.settings.doiSuffixPattern.example' => 'Por examplo, vol%viss%ipp%p poderiam criar um DOI com estrutura 10.1234/vol3iss2pp230',
  'plugins.pubIds.doi.manager.settings.doiSuffixDefault' => 'Use os padrões predefinidos.',
  'plugins.pubIds.doi.manager.settings.doiSuffixDefault.description' => '%j.v%vi%i para edições<br />%j.v%vi%i.%a para artigos<br />%j.v%vi%i.%a.g%g para composições<br />%j.v%vi%i.%a.s%s para arquivos suplementares.',
  'plugins.pubIds.doi.manager.settings.doiSuffixPublisherId' => 'Use o "Identificador personalizado" de itens publicados como sufixo DOI (deve estar habilitado no Passo 4 da configuração). Este mesmo identificador será usado para URLs públicos.',
  'plugins.pubIds.doi.manager.settings.doiSuffixCustomIdentifier' => 'Informe um sufixo DOI individual para cada item publicado, independente e distinto do "Identificador personalizado" mencionado na opção anterior. Ficará disponível um campo DOI adicional na página de metadados de cada item.',
  'plugins.pubIds.doi.manager.settings.doiIssueSuffixPatternRequired' => 'Informe o padrão do sufixo DOI para edições.',
  'plugins.pubIds.doi.manager.settings.doiArticleSuffixPatternRequired' => 'Informe o padrão do sufixo DOI para artigos.',
  'plugins.pubIds.doi.manager.settings.doiGalleySuffixPatternRequired' => 'Informe o padrão do sufixo DOI para composições.',
  'plugins.pubIds.doi.manager.settings.doiSuppFileSuffixPatternRequired' => 'Informe o padrão do sufixo DOI para arquivos suplementares.',
  'plugins.pubIds.doi.manager.settings.doiReassign' => 'Atribuir DOIs novamente',
  'plugins.pubIds.doi.manager.settings.doiReassign.description' => 'Caso tenha alterado a configuração de DOI, os números já atribuídos não serão afetados. Uma vez salva a configuração do DOI, use este botão para limpar todos os DOIs existentes para que as novas configurações tenham efeito nos artigos existentes.',
  'plugins.pubIds.doi.manager.settings.doiReassign.confirm' => 'Deseja realmente excluir todos os DOIs existentes?',
  'plugins.pubIds.doi.editor.doi' => 'DOI',
  'plugins.pubIds.doi.editor.doiObjectTypeIssue' => 'edição',
  'plugins.pubIds.doi.editor.doiObjectTypeArticle' => 'artigo',
  'plugins.pubIds.doi.editor.doiObjectTypeGalley' => 'composição',
  'plugins.pubIds.doi.editor.doiObjectTypeSuppFile' => 'arquivos suplementar',
  'plugins.pubIds.doi.editor.doiNotYetGenerated' => 'O DOI não foi gerado ainda. Publicar a edição e visualizando a página pública do objeto {$pubObjectType} gerará automaticamente um DOI único para o objeto {$pubObjectType}.',
  'plugins.pubIds.doi.editor.doiSuffixCustomIdentifierNotUnique' => 'O sufixo DOI informado já está em uso por outro item publicado. Informe um sufixo DOI único para cada item.',
  'plugins.pubIds.doi.manager.settings.explainCrossRefDois' => '<strong>NOTA:</strong> Ao usar DOIs do <a href="http://www.crossref.org" target="_new">CrossRef</a>, é necessário escolher artigos. Artigos são vistos como trabalho, isto é, entidade de conteúdo intelectual e artístico. Logo, artigo é o objeto de publicação no qual está baseados exportação e registro do DOI CrossRef..',
); ?>