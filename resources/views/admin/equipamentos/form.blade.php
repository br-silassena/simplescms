<form id="formCadastro">
  @csrf
  <div class="form-row">
    <input type="hidden" id="id" name="id" value="">
    <div class="form-group col-md-6">
      <label for="name">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label for="valor">Valor</label>
      <input type="text" class="form-control" id="valor" name="valor" placeholder="Valor">
    </div>
  </div>
</form>