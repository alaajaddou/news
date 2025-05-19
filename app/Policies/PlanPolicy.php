<?php

namespace App\Policies;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class PlanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can manage plans (create, update, delete).
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function managePlans(User $user)
    {
        // For now, we'll consider a user with ID 1 as admin
        // In a real application, you would check for admin role or specific permissions
        $isAdmin = $user->id === 1;
        
        Log::info('Checking if user can manage plans', [
            'user_id' => $user->id,
            'is_admin' => $isAdmin,
        ]);
        
        return $isAdmin;
    }

    /**
     * Determine whether the user can view any plans.
     *
     * @param  \App\Models\User|null  $user
     * @return bool
     */
    public function viewAny(?User $user)
    {
        // Anyone can view plans
        return true;
    }

    /**
     * Determine whether the user can view the plan.
     *
     * @param  \App\Models\User|null  $user
     * @param  \App\Models\Plan  $plan
     * @return bool
     */
    public function view(?User $user, Plan $plan)
    {
        // Anyone can view active plans
        return $plan->is_active;
    }

    /**
     * Determine whether the user can create plans.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        return $this->managePlans($user);
    }

    /**
     * Determine whether the user can update the plan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Plan  $plan
     * @return bool
     */
    public function update(User $user, Plan $plan)
    {
        return $this->managePlans($user);
    }

    /**
     * Determine whether the user can delete the plan.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Plan  $plan
     * @return bool
     */
    public function delete(User $user, Plan $plan)
    {
        return $this->managePlans($user);
    }
}