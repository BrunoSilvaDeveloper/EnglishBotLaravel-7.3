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
            <th scope="row">História</th>
            <td style="padding: 0;"><input class="form-control form1" id="historia" name="historia" value="{{old('historia', $historia->historia)}}" ></td>
        </tr>
        <tr>
            <th scope="row">Tradução</th>
            <td style="padding: 0;"><input class="form-control form2" id="traducao" name="traducao" value="{{old('traducao', $historia->traducao)}}"></td>
        </tr>
        <tr>
            <th scope="row">Nível</th>
            <td style="padding: 0;">
                <select class="btn btn-default select" style="padding:7px; border:none;" id="nivel" name="nivel">
                    @foreach (\App\Models\Historia::NIVEL_HISTORIA as $key => $value)
                        <option value="{{ $key }}" {{ old('nivel', $historia->nivel) == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        </tbody>
    </table>