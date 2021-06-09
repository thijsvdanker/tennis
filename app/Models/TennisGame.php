<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TennisGame extends Model
{
    use HasFactory;

    protected $guarded = [];

    private $P1res = "";
    private $P2res = "";

    public static function create($player1Name, $player2Name)
    {
        $game = new self();
        $game->player1 = $player1Name;
        $game->player2 = $player2Name;
        $game->save();
        return $game;
    }

    public function getScore()
    {
        $score = "";
        if ($this->P1point == $this->P2point && $this->P1point < 4) {
            if ($this->P1point == 0) {
                $score = "Love";
            }
            if ($this->P1point == 1) {
                $score = "Fifteen";
            }
            if ($this->P1point == 2) {
                $score = "Thirty";
            }
            $score .= "-All";
        }

        if ($this->P1point == $this->P2point && $this->P1point >= 3) {
            $score = "Deuce"
        }

        if ($this->P1point > 0 && $this->P2point == 0) {
            if ($this->P1point == 1) {
                $this->P1res = "Fifteen";
            }
            if ($this->P1point == 2) {
                $this->P1res = "Thirty";
            }
            if ($this->P1point == 3) {
                $this->P1res = "Forty";
            }

            $this->P2res = "Love";
            $score = "{$this->P1res}-{$this->P2res}";
        }

        if ($this->P2point > 0 && $this->P1point == 0) {
            if ($this->P2point == 1) {
                $this->P2res = "Fifteen";
            }
            if ($this->P2point == 2) {
                $this->P2res = "Thirty";
            }
            if ($this->P2point == 3) {
                $this->P2res = "Forty";
            }
            $this->P1res = "Love";
            $score = "{$this->P1res}-{$this->P2res}";
        }

        if ($this->P1point > $this->P2point && $this->P1point < 4) {
            if ($this->P1point == 2) {
                $this->P1res = "Thirty";
            }
            if ($this->P1point == 3) {
                $this->P1res = "Forty";
            }
            if ($this->P2point == 1) {
                $this->P2res = "Fifteen";
            }
            if ($this->P2point == 2) {
                $this->P2res = "Thirty";
            }
            $score = "{$this->P1res}-{$this->P2res}";
        }

        if ($this->P2point > $this->P1point && $this->P2point < 4) {
            if ($this->P2point == 2) {
                $this->P2res = "Thirty";
            }
            if ($this->P2point == 3) {
                $this->P2res = "Forty";
            }
            if ($this->P1point == 1) {
                $this->P1res = "Fifteen";
            }
            if ($this->P1point == 2) {
                $this->P1res = "Thirty";
            }
            $score = "{$this->P1res}-{$this->P2res}";
        }

        if ($this->P1point > $this->P2point && $this->P2point >= 3) {
            $score = "Advantage player1";
        }

        if ($this->P2point > $this->P1point && $this->P1point >= 3) {
            $score = "Advantage player2";
        }

        if ($this->P1point >= 4 && $this->P2point >= 0 && ($this->P1point - $this->P2point) >= 2) {
            $score = "Win for player1";
        }

        if ($this->P2point >= 4 && $this->P1point >= 0 && ($this->P2point - $this->P1point) >= 2) {
            $score = "Win for player2";
        }

        return $score;
    }

    private function SetP1Score($number)
    {
        for ($i = 0; $i < $number; $i++) {
            $this->P1Score();
        }
    }

    private function SetP2Score($number)
    {
        for ($i = 0; $i < $number; $i++) {
            $this->P2Score();
        }
    }

    private function P1Score()
    {
        $this->update(['P1point' => $this->P1point + 1]);
        $this->refresh();
    }

    private function P2Score()
    {
        $this->update(['P1point' => $this->P2point + 1]);
    }

    public function wonPoint($player)
    {
        if ($player == "player1") {
            $this->P1Score();
        } else {
            $this->P2Score();
        }
    }
}
