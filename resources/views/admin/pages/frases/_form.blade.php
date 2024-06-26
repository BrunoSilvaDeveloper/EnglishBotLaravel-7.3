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
            <th scope="row">Frase</th>
            <td style="padding: 0;"><input class="form-control form1" id="frase" name="frase" value="{{old('frase', $frase->frase)}}" ></td>
        </tr>
        <tr>
            <th scope="row">Tradução</th>
            <td style="padding: 0;"><input class="form-control form2" id="traducao" name="traducao" value="{{old('traducao', $frase->traducao)}}"></td>
        </tr>
        <tr>
            <th scope="row">Nível</th>
            <td style="padding: 0;">
                <select class="btn btn-default select" style="padding:7px; border:none;" id="nivel" name="nivel">
                    @foreach (\App\Models\Frase::NIVEL_FRASE as $key => $value)
                        <option value="{{ $key }}" {{ old('nivel', $frase->nivel) == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        </tbody>
    </table>