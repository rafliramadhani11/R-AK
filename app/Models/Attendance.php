<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeWithoutAdmin(Builder $query)
    {
        return $query->whereHas('user', function ($query) {
            $query->where('admin', false);
        });
    }

    public function scopeSearchUser(Builder $query, $name)
    {
        return $query->whereHas('user', function ($query) use ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        });
    }

    public function scopeAttendanceToday(Builder $query)
    {
        return $query->whereDate('created_at', now()->toDateString());
    }

    public function scopeByMonth(Builder $query, $month, $year = null)
    {
        return $query->whereYear('created_at', $year ?? now()->year)
            ->whereMonth('created_at', $month);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
