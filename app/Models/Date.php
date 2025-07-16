<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $fillable = ['user_id', 'time_in', 'time_out'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function time($type)
    {
        $field = $type == 'time_in' ? $this->time_in : $this->time_out;

        return $field ? \Carbon\Carbon::parse($field) : null;
    }

    
    public function diff()
    {
        if (!empty($this->time_in) && !empty($this->time_out)) {
            $timeIn = Carbon::parse($this->time_in);
            $timeOut = Carbon::parse($this->time_out);

            return $timeIn->diff($timeOut)->forHumans(['short' => true]);
        }

        return null;
    }

    public function diffInHours()
    {
        if (!empty($this->time_in) && !empty($this->time_out)) {
            $timeIn = \Carbon\Carbon::parse($this->time_in);
            $timeOut = \Carbon\Carbon::parse($this->time_out);

            $hours = $timeIn->diffInMinutes($timeOut) / 60;

            $breakStart = $timeIn->copy()->setTime(12, 0, 0);
            $breakEnd = $timeIn->copy()->setTime(13, 0, 0);

            if ($timeOut > $breakStart && $timeIn < $breakEnd) {
                $hours -= 1;
            }

            return min(max($hours, 0), 8);
        }

        return 0;
    }

    public static function totalHoursWorked($dtrs, $requiredHours)
    {
        $total = 0;
        foreach ($dtrs as $dtr) {
            if ($dtr->time_in && $dtr->time_out) {
                $worked = \Carbon\Carbon::parse($dtr->time_out)->floatDiffInHours(\Carbon\Carbon::parse($dtr->time_in));
                if ($total + $worked >= $requiredHours) {
                    $worked = $requiredHours - $total;
                    $total = $requiredHours;
                    break;
                }
                $total += $worked;
            }
        }
        return $total;
    }
    public static function dtrsUpToRequiredHours($dtrs, $requiredHours)
    {
        $accumulated = 0;
        $result = [];
        foreach ($dtrs as $dtr) {
            $worked = $dtr->time_in && $dtr->time_out
                ? \Carbon\Carbon::parse($dtr->time_out)->floatDiffInHours(\Carbon\Carbon::parse($dtr->time_in))
                : 0;
            if ($accumulated >= $requiredHours) break;
            $showWorked = min($worked, $requiredHours - $accumulated);
            $accumulated += $showWorked;
            $remaining = max($requiredHours - $accumulated, 0);
            if ($showWorked > 0) {
                $result[] = [
                    'dtr' => $dtr,
                    'showWorked' => $showWorked,
                    'remaining' => $remaining,
                ];
            }
        }
        return $result;
    }
}



