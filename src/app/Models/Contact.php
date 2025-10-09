<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    // app/Models/Contact.php
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Contact検索スコープ
    public function scopeContactSearch($query, $first_name = null, $last_name = null, $email = null, $gender = null, $category_id = null, $created_at = null)
    {
        if (!empty($first_name)) {
            $query->where('first_name', 'like', '%' . $first_name . '%');
        }

        if (!empty($last_name)) {
            $query->where('last_name', 'like', '%' . $last_name . '%');
        }

        // フルネーム検索（first_name と last_name を結合して検索）
        if (!empty($full_name)) {
            $query->where(function ($query) use ($full_name) {
                $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$full_name}%"]);
            });
        }

        if (!empty($email)) {
            $query->where('email', 'like', '%' . $email . '%');
        }

        if (!empty($gender)) {
            $query->where('gender',$gender);
        }

        if (!empty($category_id)) {
           $query->where('category_id',$category_id);
        }

        if (!empty($created_at)) {
            $query->whereDate('created_at', '=', $created_at); // 特定の日付で検索
        }

    } // ここで scopeContactSearch メソッドを閉じます。

    // キーワード検索スコープ
    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where(function ($query) use ($keyword) {
                $query->where('first_name', 'like', '%' . $keyword . '%')
                      ->orWhere('last_name', 'like', '%' . $keyword . '%')
                      ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }
    } // ここで scopeKeywordSearch メソッドを閉じます。

}
