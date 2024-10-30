<?php include('layouts/header.php'); ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
    <h2 class="text-center mb-4">Descubra Seu Signo</h2>
    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
      <div class="mb-3">
        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Consultar Signo</button>
    </form>
  </div>
</div>