<?php

namespace App\Http\Controllers;

use App\Mail\MailtrapTrial;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:companies|max:255',
            'website' => 'required|url|max:255',
            'file' => 'required|file|max:4096|image'
        ]);

        // File being saved in storage/app/public
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('storage/', $filename);

        // Store new company using file hashname
        $company = new Company([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo_file_path' => $filename
        ]);
        $company->save();

//        Mail Send
//        Mail::to($request->email)->send(new MailtrapTrial());

        return redirect()->route('companies.index')->with('success_message', __('index.company.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Company $company)
    {
        // Validation
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'website' => 'required|url|max:255',
            'file' => 'required|file|max:4096|image'
        ]);

        // Check if file is being uploaded and update the file
        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($company->logo_file_path);
            $request->file->store('public');
            $company->update([
                'logo_file_path' => $request->file->hashName()
            ]);
        }

        // Update company with new data
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
        ]);

        return redirect()->route('companies.index')->with('success_message', __('index.company.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company)
    {
        if ($company->companyEmployee->count()) {
            return redirect()->route('companies.index')->with('info_message', __('index.company.cannot.delete'));
        }

        Storage::disk('public')->delete($company->logo_file_path);
        $company->delete();
        return redirect()->route('companies.index')->with('success_message', __('index.company.deleted'));
    }
}
