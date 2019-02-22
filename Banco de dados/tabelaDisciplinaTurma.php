<?PHP
require_once('criaConexãoBD.php');


function Listaturma()
{
  $bd = CriaConexaoBd();
  $sql = $bd->prepare("SELECT * FROM turma ");
  $sql->execute();
  return $sql->FetchAll();
}


function Listadisciplina()
{
  $bd = CriaConexaoBd();
  $sql = $bd->prepare("SELECT * FROM disciplina ");
  $sql->execute();
  return $sql->FetchAll();
}


function BuscaDisciplinasTurma() :array
{
 $bd = CriaConexaoBd();

    $sql = $bd->prepare("SELECT turma.id AS idTurma, disciplina.id, disciplina.nome AS nome FROM disciplina_turma
    						join turma on turma.id = disciplina_turma.turma join disciplina on disciplina.id = disciplina_turma.disciplina
    						");
    $sql->execute();
    return $sql->fetchall(PDO::FETCH_ASSOC);
}

function Busca_id_disciplinaturma($buscaid)
{
  $bd = CriaConexaoBd();
  $sql = $bd->prepare("SELECT id FROM disciplina_turma
                        WHERE disciplina = :disciplina
                        AND turma = :turma");

                        $sql->bindValue(':disciplina', $buscaid['disciplina']);
                      	$sql->bindValue(':turma', $buscaid['turma']);
  $sql->execute();
  return $sql->fetchColumn();
}
/*
function updateOrder(){
turma = document.getElementById("turma").value;
document.getElementById
}
*/

?>
