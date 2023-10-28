<form id="formCadastro">
  @csrf
  <div class="form-row">
    <input type="hidden" id="id" name="id" value="">
    <div class="form-group col-md-6">
      <label for="name">name</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label for="email">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
    </div>
  </div>
</form>