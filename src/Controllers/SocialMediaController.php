<?php

namespace Koraycicekciogullari\HydroSocial\Controllers;

use App\Http\Controllers\Controller;
use Koraycicekciogullari\HydroSocial\Models\SocialMedia;
use Koraycicekciogullari\HydroSocial\Requests\SocialMediaStoreRequest;
use Koraycicekciogullari\HydroSocial\Requests\SocialMediaUpdateRequest;
use Koraycicekciogullari\HydroSocial\Resources\SocialMediaCollection;
use Koraycicekciogullari\HydroSocial\Resources\SocialMediaResource;

class SocialMediaController extends Controller
{

    public function __construct()
    {
        $this->middleware('role_or_permission:admin|root|socialmedia index')->only(['index']);
        $this->middleware('role_or_permission:admin|root|socialmedia store')->only(['store']);
        $this->middleware('role_or_permission:admin|root|socialmedia show')->only(['show']);
        $this->middleware('role_or_permission:admin|root|socialmedia update')->only(['update']);
        $this->middleware('role_or_permission:admin|root|socialmedia destroy')->only(['destroy']);
    }

    /**
     * @return SocialMediaCollection
     */
    public function index(): SocialMediaCollection
    {
        return new SocialMediaCollection(SocialMedia::orderBy('order')->get());
    }

    /**
     * @param SocialMediaStoreRequest $request
     * @return SocialMediaResource
     */
    public function store(SocialMediaStoreRequest $request): SocialMediaResource
    {
        return new SocialMediaResource(SocialMedia::create($request->validated()));
    }

    /**
     * @param $id
     * @return SocialMediaResource
     */
    public function show($id): SocialMediaResource
    {
        return new SocialMediaResource(SocialMedia::findOrFail($id));
    }

    /**
     * @param SocialMediaUpdateRequest $request
     * @param $id
     * @return SocialMediaResource
     */
    public function update(SocialMediaUpdateRequest $request, $id): SocialMediaResource
    {
        SocialMedia::findOrFail($id)->update($request->validated());
        return new SocialMediaResource(SocialMedia::findOrFail($id));
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        SocialMedia::findOrFail($id)->delete();
    }
}
