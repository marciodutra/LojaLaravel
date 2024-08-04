<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Log;


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
        'price' => (float) $data['price'],
        'quantity' => abs($data['qnt']),
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

    public function atualizaCarrinho(Request $request)
    {
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');

        Log::info('Recebido RowId: ' . $rowId);
        Log::info('Recebido Quantity: ' . $quantity);

        if ($rowId && is_numeric($quantity) && $quantity >= 0) {
            $item = Cart::get($rowId);

            if ($item) {
                Cart::update($rowId, [
                    'quantity' => [
                        'relative' => false,
                        'value' => abs($quantity),
                    ]
                ]);
                Log::info('Carrinho atualizado com sucesso.');
                return redirect()->back()->with('success', 'Carrinho atualizado com sucesso!');
            } else {
                Log::error('O item não existe no carrinho. RowId: ' . $rowId);
                return redirect()->back()->with('error', 'O item não existe no carrinho.');
            }
        } else {
            Log::error('Dados inválidos fornecidos. RowId: ' . $rowId . ', Quantity: ' . $quantity);
            return redirect()->back()->with('error', 'Quantidade inválida fornecida.');
        }
    }

    public function limparCarrinho() {
        Cart::destroy();
        return redirect()->route('site.carrinho')->with('Aviso', 'Seu carrinho está vazio!');
    }     
    
}
