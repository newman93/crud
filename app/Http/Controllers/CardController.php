<?php
namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::latest()->paginate(5);

        return view('cards.index', compact('cards'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'card_number' => 'numeric|required|digits:20',
            'pin' => 'numeric|required|digits:4',
            'activation_date' => 'required',
            'expiration_date' => 'required',
            'balance' => 'required'
        ]);

        Card::create($request->all());

        return redirect()->route('cards.index')
            ->with('success', 'Card created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        return view('cards.edit', compact('card'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        $request->validate([
            'card_number' => 'numeric|required|digits:20',
            'pin' => 'numeric|required|digits:4',
            'activation_date' => 'required',
            'expiration_date' => 'required',
            'balance' => 'required'
        ]);
       
        $card->update($request->all());
 
        return redirect()->route('cards.index')
            ->with('success', 'Card updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return redirect()->route('cards.index')
            ->with('success', 'Card deleted successfully');
    }
}
