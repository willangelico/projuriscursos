&Agenda=<?
require_once("administracao/conexao.php");
// DADOS //
$sql2 = "select * from site_agenda ORDER by str_to_date(Data, '%d/%m/%Y') DESC";
$query2 = mysql_query($sql2);
while($sql2 = mysql_fetch_array($query2)){
echo "$sql2[Data]<br>Cidade: $sql2[Cidade]<br>Evento:$sql2[Evento]<br>$sql2[Detalhes]<br><br>";
}
?>