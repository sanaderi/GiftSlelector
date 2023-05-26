<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftSelector
{
    private $gifts;
    private $points;
    private $walletCharge;

    public function __construct()
    {
        $this->gifts = [
            [
                'id' => '1',
                'title' => 'Gift 1',
            ],
            [
                'id' => '2',
                'title' => 'Gift 2',
            ],
            [
                'id' => '3',
                'title' => 'Gift 3',
            ],
        ];
        $this->points = 0;
        $this->walletCharge = 0;
    }

    /**
     * @brief Add gifts
     * @param Gift $gift
     * @return void
     */
    public function addGift(Gift $gift)
    {
        $this->gifts[] = $gift;
    }



    /**
     * @brief Get gift by id
     * @param $id
     * @return null
     */
    public function getGiftById($id)
    {
        $giftCollection = collect($this->gifts);
        $foundObject = $giftCollection->firstWhere('id', $id);

        if ($foundObject)
            return $foundObject;
        else
            return response()->json(['error' => 'Gift not found'], 404);


    }

    /**
     * @brief Retrive all list of gift
     * @return array[]
     */
    public function getAllGifts()
    {
        return $this->gifts;
    }

    public function setPoints($points)
    {
        $this->points = $points;
    }

    public function setWalletCharge($charge)
    {
        $this->walletCharge = $charge;
    }

    public function selectRandomGift()
    {
        if (empty($this->gifts)) {
            return null;
        }

        $randomGift = $this->gifts[array_rand($this->gifts)];

        return $randomGift;
    }


    public function getPoints()
    {
        return $this->points;
    }

    public function getWalletCharge()
    {
        return $this->walletCharge;
    }
}
