<!-- Criação da modal -->
<div class="modal fade text-black" data-bs-backdrop="false" id="modalTipos" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content corzinha">
            <div class="modal-header text-black">
                <h5 class="modal-title" id="exampleModalLabel">Inserir Tipo de Cobrança</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">

                <!-- Formulário de inserção de tipos de cobrança -->
                <form method="POST" action="{{ route('tipo.create') }}" id="form-tipo" name="form-tipo">
                    @csrf

                    <div class="mb-3">
                        <label for="descr" class="form-label">Descrição:</label>
                        <div class="input-group col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-tag"></i>
                            </span>
                            <input placeholder="Informe a descrição do tipo de cobrança" type="text" name="descr"
                                id="descr" class="form-control">
                            <small id="msgDescr" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="preco" class="form-label">Preço:</label>
                        <div class="input-group col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-currency-dollar"></i>
                            </span>
                            <input placeholder="Informe o preço do tipo de cobrança" type="number" step="0.01"
                                name="preco" id="preco" class="form-control">
                            <small id="msgPreco" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
