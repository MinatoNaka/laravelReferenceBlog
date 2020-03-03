<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEntryRequest;
use App\Services\EntryService;
use Illuminate\Contracts\Auth\Guard;

class EntryController extends Controller
{
    /**
     * @var EntryService
     */
    private $entryService;
    /**
     * @var Guard
     */
    private $guard;

    public function __construct(EntryService $entryService, Guard $guard)
    {
        $this->entryService = $entryService;
        $this->guard = $guard;
    }

    public function index()
    {
        return 123123;
    }

    public function create()
    {
        return view('admin.entry.create');
    }

    public function store(StoreEntryRequest $request)
    {
        $input = $request->validated();
        $input['user_id'] = $this->guard->user()->id;
        $this->entryService->addEntry($input);

        return redirect()->route('entry.index');
    }
}
