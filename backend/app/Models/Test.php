<?php

// app/Models/Test.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'test_name',
        'test_results',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
