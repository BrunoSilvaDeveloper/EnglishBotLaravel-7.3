{{csrf_field()}}

<style>
    input{
        padding: 10px;
        margin:0px;
        width: 95%;
        border: none;
        outline:none;
    }
    tr:hover{
        background-color: white !important;
    }

</style>

<table class="table table-bordered">
        <tbody>
        <tr>
            <th scope="row">Título</th>
            <td style="padding: 0;"><input class="form-control form1" id="titulo" name="titulo" value="{{old('titulo', $aprender->titulo)}}" ></td>
        </tr>
        <tr>
            <th scope="row">Descrição</th>
            <td style="padding: 0;"><input class="form-control form2" id="descricao" name="descricao" value="{{old('descricao', $aprender->descricao)}}"></td>
        </tr>
        <tr>
            <th scope="row">Rota</th>
            <td style="padding: 0;"><input class="form-control form1" id="rota" name="rota" value="{{old('rota', $aprender->rota)}}"></td>
        </tr>
        <tr>
            <th scope="row">Imagem</th>
            <td style="padding: 0;" class="file-img">
                <div class="file-upload">
                    <input type="file" id="imagem" name="imagem" class="file-input">
                    <label for="imagem" class="file-label">Escolher Arquivo</label>
                    <span class="file-name">Nenhum arquivo selecionado</span>
                </div>
            </td>
        </tr>
        
    </div>
        </tbody>
    </table>
    <script>
        document.querySelector('.file-input').addEventListener('change', function() {
            var fileName = this.files.length > 0 ? this.files[0].name : 'Nenhum arquivo selecionado';
            document.querySelector('.file-name').textContent = fileName;
        });
    </script>