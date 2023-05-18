<!-- Criação da modal -->
<div class="modal fade text-black" data-bs-backdrop="false" id="modalUsuarios" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content corzinha">
            <div class="modal-header text-black">
                <h5 class="modal-title" id="exampleModalLabel">Inserir Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <!-- Formulário de cadastro de usuário -->
                    <form method="POST" action="{{ route('criar-usuario') }}" id="form-usuario"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">Nome de Usuário:</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Informe o nome de usuário" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Senha:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Informe a senha" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Imagem:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <!-- Exibição da imagem -->
                        <div class="mb-3" id="image-preview-container" style="display: none;">
                            <label for="image-preview" class="form-label">Pré-visualização da Imagem:</label>
                            <img id="image-preview" src="#" alt="Pré-visualização da Imagem"
                                style="max-width: 100%; height: auto;">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Exibir pré-visualização da imagem ao selecionar um arquivo
    function showPreview(event) {
        var input = event.target;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function() {
                var imagePreview = document.getElementById('image-preview');
                imagePreview.src = reader.result;
                document.getElementById('image-preview-container').style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            document.getElementById('image-preview-container').style.display = 'none';
        }
    }

    // Vincular evento de alteração do input de arquivo
    var fileInput = document.getElementById('image');
    fileInput.addEventListener('change', showPreview);
</script>
