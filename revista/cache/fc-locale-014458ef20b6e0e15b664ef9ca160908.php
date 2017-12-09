<?php return array (
  'plugins.generic.backup.name' => 'Cópia de segurança',
  'plugins.generic.backup.description' => 'Este plugin gera uma cópia de segurança da instalaçaõ.',
  'plugins.generic.backup.link' => 'Baixar cópia de segurança',
  'plugins.generic.backup.longdescription' => '<p>Os seguintes endereços permitem ao Administrador do sistema baixar uma cópia de segurança completa dos vários componentes da instalação. Uma cópia de segurança completa contém <strong>todos</strong> os seguintes. Verifique a documentação técnica para mais informações sobre o relacionamento entre os componentes.</p>',
  'plugins.generic.backup.db' => 'Base de dados',
  'plugins.generic.backup.files' => 'Arquivos',
  'plugins.generic.backup.code' => 'Código fonte',
  'plugins.generic.backup.db.config' => '{$footNoteNum}. <strong>AVISO:</strong> A ferramenta de dump da base de dados não foi configurada no arquivo config.inc.php. A ferramenta depende da configuração do servidor e do tipo de base de dados em uso. A ferramenta deve ser especificada na seção [cli], nas opções de "dump". Para MySQL, use a ferramenta mysqldump, conforme exemplo:<br/>
<pre>[cli]
dump = "/usr/bin/mysqldump -h %s -u %s -p%s %s"
</pre>
Os parâmetros "%s" serão substituídos, na ordem, por:<ol>
	<li>Servidor da base de dados</li>
	<li>Login da base de dados</li>
	<li>Senha de acesso à base de dados</li>
	<li>Nome da base de dados</li>
</ol>
Note que isto envolve informar dados de acesso à base de dados via linha de comando, o que pode ser considerado um risco de segurança.<br/><br/>',
  'plugins.generic.backup.tar.config' => '{$footNoteNum}. <strong>AVISO:</strong> A ferramenta "tar" não foi configurada no arquivo config.inc.php. A ferramenta depende da configuração do servidor. A ferramenta deve ser especificada na seção [cli], nas opções de "tar", informando o caminho físico para o utilitário "tar", conforme exemplo:<br/>
<pre>[cli]
tar = "/bin/tar"
</pre><br/>',
  'plugins.generic.backup.failure' => '<strong>AVISO: </strong>Pode ter ocorrido um erro durante o processo de criação da cópia de segurança. A causa mais provável é de permissão de arquivo.',
); ?>