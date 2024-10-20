<?php

namespace App\Generator;

use Illuminate\Support\Carbon;

class DummyGenerator
{
    /**
     * Create a new class instance.
     */
    /**
     * Generate an array of data with customizable parameters.
     *
     * @param int $count Number of data entries to generate
     * @param string $startDate Starting date in 'Y-m-d' format
     * @param float $minValue Minimum value for 'value' field
     * @param float $maxValue Maximum value for 'value' field
     * @return array Generated data
     */
    public function generateChartData(int $count, string $startDate, float $minValue, float $maxValue): array
    {
        $data = [];
        $start = Carbon::parse($startDate);

        for ($i = 0; $i < $count; $i++) {
            $data[] = [
                'time' => $start->copy()->addDays($i)->format('Y-m-d'),
                'value' => round(mt_rand($minValue * 100, $maxValue * 100) / 100, 2),
            ];
        }

        return $data;
    }
}
