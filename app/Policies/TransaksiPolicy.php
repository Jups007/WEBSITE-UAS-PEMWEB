<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Auth\Access\Response;

class TransaksiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Menentukan apakah pengguna dapat melihat daftar transaksi
        // Contoh: semua pengguna dapat melihat daftar transaksi mereka sendiri
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Transaksi $transaksi): bool
    {
        // Menentukan apakah pengguna dapat melihat transaksi tertentu
        // Contoh: hanya pemilik transaksi atau admin yang dapat melihat transaksi tersebut
        return $user->id === $transaksi->user_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Menentukan apakah pengguna dapat membuat transaksi
        // Contoh: setiap pengguna dapat membuat transaksi baru
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Transaksi $transaksi): bool
    {
        // Menentukan apakah pengguna dapat memperbarui transaksi
        // Contoh: hanya pemilik transaksi atau admin yang dapat memperbarui transaksi
        return $user->id === $transaksi->user_id || $user->hasRole('admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Transaksi $transaksi): bool
    {
        // Menentukan apakah pengguna dapat menghapus transaksi
        // Contoh: hanya admin yang dapat menghapus transaksi
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Transaksi $transaksi): bool
    {
        // Menentukan apakah pengguna dapat mengembalikan transaksi yang dihapus
        // Contoh: hanya admin yang dapat mengembalikan transaksi yang dihapus
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Transaksi $transaksi): bool
    {
        // Menentukan apakah pengguna dapat menghapus transaksi secara permanen
        // Contoh: hanya admin yang dapat menghapus transaksi secara permanen
        return $user->hasRole('admin');
    }
}
