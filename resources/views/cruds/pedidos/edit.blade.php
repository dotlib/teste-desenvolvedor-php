@extends('master.main')
@section('main')
    <div class="container my-5">
        <form action="{{route('pedido.update',$pedido->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="select my-3"  class="input-group mb-3">
                <label for="">Cliente</label>
                <select name="cliente" class="custom-select">
                        <option value="{{$pedido->cliente->id}}">{{$pedido->cliente->NomeCliente}}</option>
                </select>
            </div>
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do produto</th>
                    <th scope="col">Código de Barras</th>
                    <th scope="col">Valor</th>
                    <th scope="col">
                        Quantidade
                    </th>
                </tr>
                </thead>

                <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <th scope="row"><div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input class="check" type="checkbox" name="produtos[]" value="{{$produto->id}}"
                                        {{in_array($produto->id,$ids)? 'checked':''}}>
                                    </div>
                                </div>
                            </div></th>
                        <td>{{$produto->NomeProduto}}</td>
                        <td>{{$produto->CodBarras}}</td>
                        <td>R$ {{$produto->Valor}}</td>
                        <td>
                            <div class="select"  class="input-group mb-3">

                                <select name="quantidade[]" class="custom-select" id="inputGroupSelect01">
                                        @if(in_array($produto->id,$ids))

                                            <option selected>Quantidade</option>
                                            @for($i = 1 ; $i<=3 ; $i++)
                                                <option value="{{$i}}" {{$quantidades[array_search($produto->id,$ids)] == $i? 'selected':''}}>{{$i}}</option>
                                            @endfor

                                        @else
                                            <option selected>Quantidade</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        @endif

                                </select>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="col-5">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
        </form>
    </div>

@endsection
