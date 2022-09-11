<?php

namespace App\Service;

use App\Models\Card;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;

class CardService
{
    public function create(array $cardData): Card
    {
        $card = new Card();

        $card->fill($cardData);
        $card->save();

        return $card;
    }

    public function edit(Card $card, array $cardData): Card
    {
        $card->fill($cardData);
        $card->save();

        return $card;
    }

    public function delete(Card $card): void
    {
        $card->forceDelete();
    }

    public function getCards(User $user, ?string $sortBy = null): LengthAwarePaginator
    {
        $cards = $user->cards();

        if ($sortBy && Schema::hasColumn(Card::getTableName(), $sortBy)) {
            $cards->orderBy($sortBy);
        }

        return $cards->paginate(15);
    }
}
