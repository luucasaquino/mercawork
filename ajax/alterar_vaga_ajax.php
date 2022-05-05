<?php
session_start();
require '../vendor/autoload.php';

use App\Bd\EntidadeVaga;

$vaga = new EntidadeVaga;
if ($dados_vaga = $vaga->select("cargo, area, qtd, salario, descricao, dt_fechamento", "WHERE cd_vaga = " . $_POST['alterar'])) {
    $id = $_POST['alterar'];
    $row = $dados_vaga->fetch_object();
?>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Cargo da vaga <input type="text" name="cargo" value="<?php echo $row->cargo; ?>"><br>
    Área de atuação da vaga <input type="text" name="area" value="<?php echo $row->area; ?>"><br>
    Quantidade de vagas <input type="number" name="qtd" value="<?php echo $row->qtd; ?>"><br>
    Salário <input type="number" name="sal" step="100" placeholder="Não obrigatório" value="<?php echo $row->salario; ?>"><br>
    Descrição da vaga <textarea name="desc" cols="30" rows="10" ><?php echo $row->descricao; ?></textarea><br>
    Data de fechamento <input type="date" name="dt_fechamento" value="<?php echo $row->dt_fechamento; ?>"><br>
    <input type="submit" name="alter" value="ALTERAR">
<?php
}
?>