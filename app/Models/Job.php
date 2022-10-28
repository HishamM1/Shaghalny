<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    use HasFactory;
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(fn ($query) => ($query->where('title', 'like', '%' . $search . '%')
                ->orWhere('job_description', 'like', '%' . $search . '%')));
        });

        $query->when($filters['type'] ?? false, function ($query, $type) {
            $query->whereIn('type', $type);
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereIn('categories.category_name', $category);
        });
        $query->when($filters['country'] ?? false, function ($query, $country) {
            $query->whereIn('location', $country);
        });
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function application()
    {
        return $this->hasMany(Application::class);
    }
}
