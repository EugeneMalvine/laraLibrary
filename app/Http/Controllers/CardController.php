<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\User;
use App\Service\CardService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class CardController extends BaseController
{
    public function __construct(private CardService $service)
    {
    }

    public function getCards(Request $request): Factory|View
    {
        /** @var User $user */
        $user = Auth::user();

        return view('card.index', ['cards' => $this->service->getCards($user, $request->query('sortBy'))]);
    }

    public function getForm(?Card $card = null): Factory|View
    {
        return view('card.form', ['card' => $card]);
    }

    public function create(CardRequest $request): RedirectResponse
    {
        $card = $this->service->create($request->merge(['author' => Auth::user()->id])->all());

        return redirect()->route('card.edit.form', ['card' => $card]);
    }

    public function edit(CardRequest $request, Card $card): RedirectResponse
    {
        return redirect()->route('card.edit.form', ['card' => $card]);
    }
}
