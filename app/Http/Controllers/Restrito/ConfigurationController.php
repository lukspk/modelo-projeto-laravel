<?php

namespace App\Http\Controllers\Restrito;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Services\Configuration\UploadLogoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfigurationController extends Controller
{
    public function index()
    {
        return view('restrito.configuration.index')->with([
            'configuracao' => Configuration::whereUserId(Auth::user()->id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {

        $configuration = Configuration::findOrFail($id);
        $configuration->update($request->except('logo', 'mail_password'));

        if ($request->logo) {
            $this->validate($request, [
                'logo' => 'image'
            ]);
            $configuration->logo_url = UploadLogoService::uploadLogo($request->logo);
            $configuration->save();
        }


        return redirect()->back()->with(['mensagem' => 'Salvo com sucesso!']);

    }

}
