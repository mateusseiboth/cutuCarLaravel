<?php

use App\Models\Vagas;

$vagasDisponiveis = Vagas::orderBy('id')->get();
?>

<style>
    option.disponivel {
        color: green;
    }

    option.indisponivel {
        color: rgb(240, 151, 151);
    }
</style>

<!-- Criação da modal -->
<div class="modal fade text-black" data-bs-backdrop="false" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog nafrente">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Inserir Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">

                <!-- Formulário de inserção/edição de clientes -->
                <form method="POST" action="/ticket" id="form-client" name="form-client">
                    @csrf
                    <input type="hidden" name="action" value="save_cliente">
                    <input type="hidden" name="id" value="">

                    <div class="mb-3">

                        <label for="placa" class="form-label">Carro:</label>
                        <div class="input-group select-wrapper fit-width col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-car-front"></i>
                            </span>

                            <select class="form-select" id="datalistOptions" name="carro_id">
                                <option selected name="carro_id" value="-1">Selecione um carro</option>
                                @foreach ($carros as $carro)
                                    <option data-tokens="{{ $carro->placa }}" name='carro_id'
                                        value='{{ $carro->id }}'>{{ $carro->placa }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-check mt-2 mb-2 ms-1">
                            <input name="cadastrado" class="form-check-input" type="checkbox" id="placaCheck">
                            <label class="form-check-label text-muted" for="placaCheck">
                                Sem cadastro?
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">

                        <label for="tipo_id" class="form-label">Tipo de estadia</label>
                        <div class="input-group col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-clock"></i>
                            </span>
                            <select name="tipo_id" class="form-select" aria-label="tipo_id">
                                <option selected name='tipo_id' value='-1'>Selecione um tipo</option>
                                @foreach ($tipos as $tipo)
                                    <option name='tipo_id' value='{{ $tipo->id }}'>{{ $tipo->descr }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="tipo_id" class="form-label">Selecione a Vaga</label>
                        <div class="input-group col-mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-p-circle"></i>
                            </span>
                            <select name="vaga_id" class="form-select" id="select_box">
                                <option selected name='vaga_id' value='-1'>Selecione uma vaga</option>
                                @foreach ($vagasDisponiveis as $vaga)
                                    <option name='vaga_id' value='{{ $vaga->id }}'
                                        {{ $vaga->estado ? 'class=disponivel' : 'class=indisponivel' }}
                                        {{ $vaga->estado ? '' : 'disabled' }}>
                                        {{ $vaga->id }}
                                    </option>
                                @endforeach
                            </select>
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

<script>
    document.getElementById("placaCheck").addEventListener("click", function() {
        var select = document.querySelector("select[name='carro_id']");
        var input = document.createElement("input");
        input.setAttribute("type", "text");
        input.setAttribute("name", "placa");
        input.setAttribute("class", "form-control");
        input.setAttribute("placeholder", "");
        input.value = "";
        select.parentNode.replaceChild(input, select);
    });
</script>


<script>
    $(document).ready(function() {
        $("#carro_id").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#carro_id option").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
