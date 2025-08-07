<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Services\WeatherService;

class ProfileController extends Controller
{
    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $user = $request->user();

        // Get weather data from the service
        if (isset($validated['country'])) {
            $weatherData = $this->weatherService->getWeatherForCity($validated['country']);

            // Log weather data for debugging
            info('Weather API Response:', ['data' => $weatherData]);

            if ($weatherData) {
                $validated['weather_data'] = $weatherData; // No need to json_encode, the cast will handle it
            }

            // Log the validated data that will be saved
            info('Data to be saved:', $validated);
        }

        // Update user information with all validated data including weather
        $user->fill($validated);

        // Log any changes that will be saved
        info('Changes to be saved:', $user->getDirty());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Log the final user data after save
        info('User data after save:', $user->fresh()->toArray());

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    
    /**
     * Update weather data via AJAX
     */
    public function updateWeather(Request $request)
    {
        if (!$request->ajax() || !$request->has('country')) {
            return response()->json(['success' => false, 'message' => 'Invalid request'], 400);
        }
        
        $country = $request->input('country');
        $user = $request->user();
        
        // Get weather data from the service
        $weatherData = $this->weatherService->getWeatherForCity($country);
        
        if (!$weatherData) {
            return response()->json(['success' => false, 'message' => 'Could not retrieve weather data'], 500);
        }
        
        // Update user with new weather data
        $user->weather_data = $weatherData;
        $user->save();
        
        return response()->json([
            'success' => true,
            'weatherData' => $weatherData
        ]);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
