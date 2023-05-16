<!-- Criação da modal -->
<div class="modal fade text-black" data-bs-backdrop="false" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content corzinha">
            <div class="modal-header text-black">
                <h5 class="modal-title" id="exampleModalLabel ">Inserir Novo Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">

                <!-- Formulário de inserção/edição de clientes -->
                <form method="POST" action="{{ route('criar-cliente') }}" id="form-client" name="form-client">
                    @csrf
                    <input type="hidden" name="action" value="save_cliente">
                    <input type="hidden" name="id" value="">

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <div class="input-group col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-spellcheck"></i>
                            </span>
                            <input placeholder="Informe o nome do cliente" type="text" name="nome" id="nome"
                                class="form-control">
                            <small id="msgNome" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF:</label>
                        <div class="input-group col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-vcard"></i>
                            </span>
                            <input placeholder="Informe o CPF do cliente" type="text" name="cpf" id="cpf"
                                class="form-control">
                            <small id="msgCpf" class="form-text text-danger"></small>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <div class="input-group col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-telephone"></i>
                            </span>
                            <input placeholder="Informe o telefone do cliente" type="text" name="telefone"
                                id="telefone" class="form-control">
                            <small id="msgTelefone" class="form-text text-danger"></small>
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
