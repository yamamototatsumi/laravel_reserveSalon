<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalonFactory extends Factory
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
          'login_id' => $this->faker->userName,
          'password' => $this->faker->password(8,12),
          'address' => '大阪府大阪市中央区島之内',
          'prefectere' => '大阪府',
          'city' => '大阪市',
          'station' => '難波',
        ];
    }
}
