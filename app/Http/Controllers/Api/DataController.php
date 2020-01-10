<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Data;


class DataController extends Controller
{
    public function users()
    {
    	$data = User::all();
    	$res = [];
    	foreach ($data as $item) {
    		$res[] = [
    			'nama_lengkap' => $item->name, 'email' => $item->email, 'password' => $item->password
    		];
    	}
    	return response()->json( $res );
    }

    public function datas(){
    	$data = Data::all();
    	$res = [];
    	foreach ($data as $item) {
    		$res[] = [
    			'nama_lengkap' => $item->user->name, 'nomor_service' => $item->service_number, 
    			'nomor_telepon' => $item->phone, 'jenis_gadget' => $item->gadget_type,
    			'kerusakan' => $item->damage
    		];
    	}
    	return response()->json( $res );    	
    }

    public function user_data(){
    	$data = Data::all();
    	$res = [];
    	foreach ($data as $item) {
    		$res[] = [
    			'nama_lengkap' => $item->user->name, 'email' => $item->user->email,
    			'nomor_service' => $item->service_number, 
    			'nomor_telepon' => $item->phone, 'jenis_gadget' => $item->gadget_type,
    			'kerusakan' => $item->damage
    		];
    	}
    	return response()->json( $res );   
    }
}
