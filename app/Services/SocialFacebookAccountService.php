<?php

 namespace App\Services;

 use App\SocialAccount;
 use App\User;
 use Laravel\Socialite\Contracts\User as ProviderUser;
 use App\Mail\VerifyUser;
 use Illuminate\Support\Facades\Mail;

 class SocialFacebookAccountService
 {
    public function createOrGetUser(ProviderUser $providerUser)
    {
 		// Get the Social Account if it's already in the system
 		$account = SocialAccount::whereProvider('facebook')
 		           ->whereProviderUserId($providerUser->getId())
 		           ->first();

 		// #Activity
 		// If we found a Social Account
 		if ($account) {
 			return $account->user;
 		} else {

 			$user = User::where('email', $providerUser->getEmail())->first();

 			if($user === null) {
 				$user = User::create([
 					'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
 				]);

 				// create a Social Account
 				$account = SocialAccount::create([
 					'user_id' => $user->id,
 					'provider' => 'facebook',
 					'provider_user_id' => $providerUser->getId(),
 					'image' => $providerUser->getAvatar(),
				 ]);
				 Mail::to($user)->send(new VerifyUser());
 			}
 		return $user;
 		}
    }
 }