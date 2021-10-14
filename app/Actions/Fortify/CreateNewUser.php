<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\User;
use App\Models\DeliveryBoyLocation;
use Settings;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $vip = isset($input['vip'])? $input['vip']:0;
        $coupen = isset($input['coupen'])? $input['coupen']:'';
        $role = isset($input['role'])? $input['role']:4;
        $city = isset($input['city'])? $input['city']:'';
        $mobile = isset($input['mobile']) ? $input['mobile'] : null;
        
        if ($role==3) {
            Validator::make($input, [
                'mobile' => ['required'],
            ])->validate();
        }

        if ($role==4 && $vip==1 && $coupen!=Settings::get('general_setting_vip_coupon_code')) {
            Validator::make($input, [
                'coupenk' => ['required'],
                'mobile' => ['required'],
            ])->validate();
        }

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'vip' => $vip,
            'coupen' => $coupen,
            'role' => $role,
            'mobile' => $mobile,
            'city' => $city,
            'status' => $role===3 ? 0 :1,
            'password' => Hash::make($input['password']),
        ]);
        
        if ($city && $role==3 && $user) {
            DeliveryBoyLocation::create([
                'user_id' => $user->id,
                'city' => $city,
            ]);
        }

        return $user;
    }
}
