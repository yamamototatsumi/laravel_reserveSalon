<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stylist>
 */
class StylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      $availableHour = $this->faker->numberBetween(10, 18); //10時~18時 
      $minutes = [0, 30]; // 00分か 30分
      $mKey = array_rand($minutes); //ランダムにキーを取得
      $addHour = $this->faker->numberBetween(1, 3); // イベント時間 1時間~3時間
      $price_ar = [5000,6000,7000,8000,9000,10000];
      $price = array_rand($price_ar);

      $dummyDate = $this->faker->dateTimeThisMonth;
      $startDate = $dummyDate->setTime($availableHour, $minutes[$mKey]);
      $clone = clone $startDate;
      $endDate = $clone->modify('+' . $addHour . 'hour');


        return [
          'name' => $this->faker->name,
          'salon_id' => $this->faker->numberBetween(1,20),
          'rank' => $this->faker->numberBetween(0,9),
          'information' => $this->faker->realText,
          'is_visiable' => $this->faker->boolean
        ];
    }
}
