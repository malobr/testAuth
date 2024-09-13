<?php

// app/Models/Test.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model 
{
    use HasFactory;

    protected $fillable = ['user_id', 'client_id', 'test_name', 'test_results'];

    // Relacionamento com o usuário (dono da ótica)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com o cliente
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
