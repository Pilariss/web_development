<?php
include('layouts/header.php');

$data_nascimento = $_POST['data_nascimento'];
$signos = simplexml_load_file("signos.xml");

function converterData($data)
{
  return DateTime::createFromFormat('d/m', $data);
}

$dataUser = DateTime::createFromFormat('Y-m-d', $data_nascimento);
$signoEncontrado = null;

foreach ($signos->signo as $signo) {
  $dataInicio = converterData((string) $signo->dataInicio);
  $dataFim = converterData((string) $signo->dataFim);

  $dataInicio->setDate($dataUser->format('Y'), $dataInicio->format('m'), $dataInicio->format('d'));
  $dataFim->setDate($dataUser->format('Y'), $dataFim->format('m'), $dataFim->format('d'));

  if ($dataUser >= $dataInicio && $dataUser <= $dataFim) {
    $signoEncontrado = $signo;
    break;
  }
}
?>
<div class="container mt-5">
  <?php if ($signoEncontrado): ?>
    <div class="card shadow-lg border-0">
      <div class="card-header bg-primary text-white text-center">
        <img src="<?= $signoEncontrado->imagem ?>" alt="Imagem do signo <?= $signoEncontrado->signoNome ?>" class="img-fluid mb-3 rounded-circle" style="max-width: 150px; border: 4px solid white;">
        <h2 class="card-title mb-0">Seu Signo: <?= $signoEncontrado->signoNome ?></h2>
      </div>
      <div class="card-body">
        <h4 class="mb-3 text-primary">Descrição</h4>
        <p><?= $signoEncontrado->descricao ?></p>
        <hr>
        <h4 class="mb-3 text-primary">Informações Complementares</h4>
        <ul class="list-unstyled">
          <li><strong>Elemento:</strong> <?= $signoEncontrado->elemento ?></li>
          <li><strong>Planeta Regente:</strong> <?= $signoEncontrado->planeta ?></li>
          <li><strong>Características:</strong> <?= $signoEncontrado->caracteristicas ?></li>
        </ul>
      </div>
      <div class="card-footer text-center">
        <a href="index.php" class="btn btn-secondary">Voltar</a>
      </div>
    </div>
  <?php else: ?>
    <div class="alert alert-warning text-center">
      <p>Não foi possível determinar o signo. Verifique a data de nascimento e tente novamente.</p>
      <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
    </div>
  <?php endif; ?>
</div>
