<?php

namespace App\Http\Controllers\StudentAuth;


use Illuminate\Foundation\Auth\RedirectsUsers;

trait StudentCanResetPassword {
	
	use RedirectsUsers;

	public function reset(Request $request) 
    {
    	$this->validate($request,$this->rules(),$this->errorMessages());

    	$student = auth()->guard('student')->user();

    	if (Hash::check($request->old_password, $student->password)) {
    		$student->fill([
    			'password' => Hash::make($request->password)
    		])->save();
    	}

    	return redirect($this->redirectPath())->with('status','Password anda telah diperbarui');
    }
    
    protected function rules()
    {
    	return [
    		'old_password' => 'required',
    		'password' => 'required|confirmed'
    	];
    }

    protected function errorMessages()
    {
    	return [
    		'old_password.required' => 'Password lama harus diisi',
    		'password.confirmed' => 'password baru yang diisikan tidak sama'
    	];
    }
}