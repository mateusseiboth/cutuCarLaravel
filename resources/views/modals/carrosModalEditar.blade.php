<!-- Criação da modal -->
<div class="modal fade text-black" data-bs-backdrop="false" id="modalEditar" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content corzinha">
            <div class="modal-header text-black">
                <h5 class="modal-title" id="exampleModalLabel">Editar Carro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">

                <!-- Formulário de edição de carros -->
                <form method="POST" action="{{ route('carros.editar', ['id' => $carro->id]) }}" id="form-carro"
                    name="form-carro">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="carro_id" value="{{ $carro->id }}">

                    <div class="mb-3">
                        <label for="placa" class="form-label">Placa:</label>
                        <div class="input-group col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-spellcheck"></i>
                            </span>
                            <input placeholder="Informe a placa do carro" type="text" name="placa" id="placa"
                                class="form-control" value="{{ $carro->placa }}">
                            <small id="msgPlaca" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="cliente_id" class="form-label">Cliente:</label>
                        <div class="input-group col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-vcard"></i>
                            </span>
                            <select name="cliente_id" class="form-select" aria-label="cliente_id">
                                <option selected value="-1">Selecione um cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"
                                        {{ $cliente->id == $carro->cliente_id ? 'selected' : '' }}>
                                        {{ $cliente->nome }}</option>
                                @endforeach
                            </select>
                            <small id="msgCliente" class="form-text text-danger"></small>
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