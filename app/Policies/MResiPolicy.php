<?php

namespace App\Policies;

use App\Models\M_resi;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MResiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Menentukan apakah pengguna dapat melihat model apapun
        return $user->hasRole('admin');  // Contoh: hanya admin yang dapat melihat semua data
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, M_resi $mResi): bool
    {
        // Menentukan apakah pengguna dapat melihat model tertentu
        return $user->id === $mResi->user_id;  // Contoh: hanya pemilik resi yang dapat melihat
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Menentukan apakah pengguna dapat membuat model
        return $user->hasRole('admin') || $user->hasRole('manager');  // Contoh: hanya admin atau manager yang dapat membuat
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, M_resi $mResi): bool
    {
        // Menentukan apakah pengguna dapat memperbarui model
        return $user->id === $mResi->user_id;  // Contoh: hanya pemilik resi yang dapat memperbarui
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, M_resi $mResi): bool
    {
        // Menentukan apakah pengguna dapat menghapus model
        return $user->id === $mResi->user_id || $user->hasRole('admin');  // Contoh: admin atau pemilik resi yang dapat menghapus
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, M_resi $mResi): bool
    {
        // Menentukan apakah pengguna dapat mengembalikan model
        return $user->id === $mResi->user_id;  // Contoh: hanya pemilik resi yang dapat mengembalikan
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, M_resi $mResi): bool
    {
        // Menentukan apakah pengguna dapat menghapus model secara permanen
        return $user->hasRole('admin');  // Contoh: hanya admin yang dapat menghapus secara permanen
    }
}
