<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Menentukan apakah pengguna dapat melihat semua produk
        // Contoh: semua pengguna dapat melihat produk
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool
    {
        // Menentukan apakah pengguna dapat melihat model produk tertentu
        // Contoh: hanya pengguna yang memiliki produk yang dapat melihatnya
        return $user->id === $product->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Menentukan apakah pengguna dapat membuat produk baru
        // Contoh: hanya admin atau pengguna dengan peran tertentu yang dapat membuat produk
        return $user->hasRole('admin') || $user->hasRole('seller');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        // Menentukan apakah pengguna dapat memperbarui produk
        // Contoh: hanya pemilik produk yang dapat memperbarui produk
        return $user->id === $product->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        // Menentukan apakah pengguna dapat menghapus produk
        // Contoh: hanya admin atau pemilik produk yang dapat menghapus produk
        return $user->id === $product->user_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        // Menentukan apakah pengguna dapat mengembalikan produk
        // Contoh: hanya admin atau pemilik produk yang dapat mengembalikan produk
        return $user->id === $product->user_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        // Menentukan apakah pengguna dapat menghapus produk secara permanen
        // Contoh: hanya admin yang dapat menghapus produk secara permanen
        return $user->hasRole('admin');
    }
}
