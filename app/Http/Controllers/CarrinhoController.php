<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;


class CarrinhoController extends Controller
{
    public function carrinhoLista() {
        $itens = Cart::content();
        return view('site.carrinho', compact('itens'));
    }     

    

public function adicionaCarrinho(Request $request) {
    // Validação dos dados recebidos
    $data = $request->validate([
        'id' => 'required|string',
        'name' => 'required|string',
        'price' => 'required|numeric',
        'qnt' => 'required|integer|min:1',
        'img' => 'nullable|string',
    ]);

    // Adiciona o item ao carrinho
    Cart::add([
        'id' => $data['id'],
        'name' => $data['name'],
        'price' => $data['price'],
        'quantity' => $data['qnt'],
        'attributes' => [
            'image' => $data['img'],
        ]
    ]);

    return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso');
}    

    

    public function removeCarrinho(Request $request) {
        $rowId = $request->input('rowId'); // Obtenha o rowId do campo oculto
        
        if (Cart::get($rowId)) {
            Cart::remove($rowId);
        }

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso');
    }

}
