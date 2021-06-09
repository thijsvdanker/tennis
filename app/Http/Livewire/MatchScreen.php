<?php

namespace App\Http\Livewire;

use App\Models\TennisGame;
use Livewire\Component;

class MatchScreen extends Component
{
    public TennisGame $game;
    protected $player1 = 'Piet Sampless';
    protected $player2 = 'Andre Legacy';

    public function mount()
    {
        $this->game = TennisGame::create($this->player1, $this->player2);
    }

    public function render()
    {
        return view('livewire.match-screen');
    }

    public function scorePlayer1()
    {
        $this->game->wonPont('player1');
        $this->game->refresh();
    }

    public function scorePlayer2()
    {
        $this->game->wonPoint($this->player2);
        $this->game->refresh();
    }
}
