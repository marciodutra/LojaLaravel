@extends('site.layout')

@section('title', 'Carrinho')

@section('conteudo')
<div class="row container">
    @if($mensagem = Session::get('sucesso'))
        <div class="card green">
            <div class="card-content white-text">
                <span class="card-title">Parabéns!</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if($mensagem = Session::get('Aviso'))
        <div class="card blue">
            <div class="card-content white-text">
                <span class="card-title">Tudo bem!</span>
                <p>{{ $mensagem }}</p>
            </div>
        </div>
    @endif

    @if($itens->count() == 0)

    <div class="card orange">
        <div class="card-content white-text">
            <span class="card-title">Seu carrinho está vazio!</span>
            <p>Aproveite nossas promoções!</p>
        </div>
    </div>

    @else

    <h5>Seu carrinho possui {{ Cart::content()->count() }} produtos.</h5>

    <table class="striped">
        <thead>
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach (Cart::content() as $item)
                <tr>
                    <td>
                        @if($item->attributes && $item->attributes->image)
                            <img src="{{ $item->attributes->image }}" alt="" width="70" class="responsive-img circle">
                        @else
                            <img src="default-image.jpg" alt="" width="70" class="responsive-img circle">
                        @endif
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>                    

                    <form action="{{ route('site.atualizacarrinho') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                    <td><input style="width: 40px; font-weight: 900;" class="white center" min="1" type="number" name="quantity" value="{{ $item->id }}"></td>
                    <td>
                        {{-- <button  class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i> --}}
                    </form>

                        <form action="{{ route('site.removecarrinho') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                            <button type="submit" class="btn-floating waves-effect waves-light red">
                                <i class="material-icons">delete</i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach            
            </tbody>
    </table>
    
    
    <div class="card orange">
        <div class="card-content white-text">
            <span class="card-title">R$ {{ number_format( Cart::total(), 2, ',', '.') }}</span>
            <p>Pague em 12x sem juros!</p>
        </div>
    </div>

    @endif    

    <div class="row container center">
        <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">Continuar comprando<i class="material-icons right">arrow_back</i></a>
        <a href="{{ route('site.limparcarrinho') }}" class="btn waves-effect waves-light blue">Limpar carrinho<i class="material-icons right">clear</i></a>
        <button class="btn waves-effect waves-light green">Finalizar pedido<i class="material-icons right">check</i></button>
    </div>
</div>
@endsection
